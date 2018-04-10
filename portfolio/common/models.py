from django.core.exceptions import ValidationError
from django.db import models
from modelcluster.fields import ParentalKey
from modelcluster.models import ClusterableModel

from wagtail.admin.edit_handlers import MultiFieldPanel, StreamFieldPanel, FieldPanel, PageChooserPanel, InlinePanel
from wagtail.core.fields import StreamField
from wagtail.core.models import Page, Orderable
from wagtail.documents.edit_handlers import DocumentChooserPanel
from wagtail.snippets.models import register_snippet

from .blocks import SectionBlock
# Create your models here.


class LinkFields(models.Model):
    link_external = models.URLField('external link', blank=True, null=True)
    link_page = models.ForeignKey(
        'wagtailcore.Page',
        on_delete=models.SET_NULL,
        blank=True,
        null=True,
        related_name='+'
    )
    link_anchor = models.CharField('page anchor', max_length=100, blank=True, null=True)
    link_document = models.ForeignKey(
        'wagtaildocs.Document',
        on_delete=models.SET_NULL,
        blank=True,
        null=True,
        related_name='+'
    )

    @property
    def url(self):
        if self.link_page:
            url = self.link_page.url
            if self.link_anchor:
                url += '#' + self.link_anchor
            return url
        elif self.link_document:
            return self.link_document.url
        else:
            return self.link_external

    panels = [
        FieldPanel('link_external'),
        MultiFieldPanel([
            PageChooserPanel('link_page'),
            FieldPanel('link_anchor'),
        ], heading='link page'),
        DocumentChooserPanel('link_document'),
    ]

    class Meta:
        abstract = True


class NavigationMenuItem(Orderable, LinkFields):
    menu = ParentalKey(to='common.NavigationMenu', related_name='menu_items')
    menu_icon = models.CharField(max_length=255, blank=True, null=True,
                                 help_text='Menu icon (font awesome) to show')
    menu_title = models.CharField(max_length=255, blank=True, null=True,
                                  help_text='Optional link title in this menu')

    @property
    def menu_item_title(self):
        if self.menu_title:
            return self.menu_title
        elif self.link_page:
            return self.link_page.title
        elif self.link_document:
            return self.link_document.title
        else:
            return self.link_external

    def __str__(self):
        return self.menu_item_title

    panels = [
        FieldPanel('menu_title'),
        FieldPanel('menu_icon'),
    ] + LinkFields.panels


class NavigationMenuManager(models.Manager):
    def get_by_natural_key(self, menu_location):
        return self.get(menu_location=menu_location)


@register_snippet
class NavigationMenu(ClusterableModel):
    objects = NavigationMenuManager()
    menu_location = models.CharField(null=False, max_length=255, help_text='Template name', unique=True)
    menu_name = models.CharField(null=True, blank=True, max_length=255)

    def __str__(self):
        name = self.menu_name
        if not name:
            name = 'Unnamed'
        return '{name} ({location})'.format(name=name, location=self.menu_location)

    panels = [
        FieldPanel('menu_name'),
        InlinePanel('menu_items', label='linked pages'),
        FieldPanel('menu_location'),
    ]


class StandardPage(Page):
    body = StreamField([
        ('section', SectionBlock())
    ])

    class Meta:
        abstract = True


class IntroPage(StandardPage):
    intro_header = models.CharField(max_length=100)
    intro_sub_header = models.CharField(max_length=250, blank=True, null=True)
    intro_button_icon = models.CharField(max_length=50, blank=True, null=True)
    intro_button_text = models.CharField(max_length=100, blank=True, null=True)

    content_panels = Page.content_panels + [
        MultiFieldPanel([
            FieldPanel('intro_header'),
            FieldPanel('intro_sub_header'),
            FieldPanel('intro_button_icon'),
            FieldPanel('intro_button_text'),
        ], heading='Intro'),
        StreamFieldPanel('body'),
    ]
