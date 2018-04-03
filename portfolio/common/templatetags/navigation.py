from django import template
from portfolio.common.models import NavigationItem

register = template.Library()


@register.inclusion_tag('common/tags/navigation.html', takes_context=True)
def navigation(context):
    return {
        'items': NavigationItem.objects.all(),
        'request': context['request']
    }
