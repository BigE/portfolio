from django.db import models
from django.utils.encoding import python_2_unicode_compatible

from wagtail.admin.edit_handlers import FieldPanel, MultiFieldPanel, StreamFieldPanel
from wagtail.core.fields import RichTextField, StreamField
from wagtail.core.models import Page
from wagtail.snippets.models import register_snippet

from .blocks import ResumeEducationListBlock, ResumeExperienceListBlock, ResumeSkillsBlock
# Create your models here.


@register_snippet
@python_2_unicode_compatible
class ResumeSkill(models.Model):
    name = models.CharField(max_length=250, unique=True)
    url = models.URLField(max_length=500, blank=True, null=True)
    description = RichTextField(blank=True, null=True)

    panels = [
        FieldPanel('name'),
        FieldPanel('url'),
        FieldPanel('description'),
    ]

    def __str__(self):
        return self.name


class ResumePage(Page):
    objective_header = models.CharField(max_length=150, default='Objective')
    objective = RichTextField()
    skills = StreamField([
        ('skill_set', ResumeSkillsBlock()),
    ])
    body = StreamField([
        ('education', ResumeEducationListBlock()),
        ('experience', ResumeExperienceListBlock()),
    ])

    content_panels = Page.content_panels + [
        MultiFieldPanel([
            FieldPanel('objective_header'),
            FieldPanel('objective'),
        ], heading='resume objective'),
        StreamFieldPanel('skills'),
        StreamFieldPanel('body'),
    ]
