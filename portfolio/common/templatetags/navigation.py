from django import template
from django.template.base import logger

from portfolio.common.models import NavigationMenu

register = template.Library()


@register.simple_tag
def navigation(location):
    try:
        return NavigationMenu.objects.get_by_natural_key(location)
    except NavigationMenu.DoesNotExist:
        logger.critical('No such navigation menu %s', location)
