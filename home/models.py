from __future__ import absolute_import, unicode_literals

from django.db import models

from wagtail.core.models import Page

from resume.models import ResumePage


class HomePage(Page):
    def get_context(self, request, *args, **kwargs):
        context = super().get_context(request, *args, **kwargs)
        context['resume_page'] = ResumePage.objects.first()
        return context
