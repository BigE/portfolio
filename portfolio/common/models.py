from django.core.exceptions import ValidationError
from django.db import models

from wagtail.admin.edit_handlers import MultiFieldPanel, StreamFieldPanel, FieldPanel, PageChooserPanel
from wagtail.core.fields import StreamField
from wagtail.core.models import Page, Orderable

from .blocks import SectionBlock
# Create your models here.


class StandardPage(Page):
    body = StreamField([
        ('section', SectionBlock())
    ])

    class Meta:
        abstract = True


class NavigationItem(Orderable, models.Model):
    icon = models.CharField(max_length=50)
    text = models.CharField(max_length=250)
    page = models.ForeignKey(
        'wagtailcore.Page',
        on_delete=models.SET_NULL,
        blank=True,
        null=True,
        related_name='+'
    )
    page_anchor = models.CharField(max_length=50, blank=True, null=True)
    external_url = models.URLField(blank=True, null=True)

    panels = [
        FieldPanel('icon'),
        FieldPanel('text'),
        MultiFieldPanel([
            PageChooserPanel('page'),
            FieldPanel('page_anchor'),
        ], heading='page'),
        FieldPanel('external_url'),
    ]

    @property
    def url(self):
        if self.page:
            url = self.page.url
            if self.page_anchor:
                url += '#' + self.page_anchor.__str__()
            return url
        else:
            return self.external_url

    def __str__(self):
        return self.text

    def clean(self):
        if self.page is None and self.external_url is None:
            raise ValidationError('You must specify a page or an external url')


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
