from django.contrib import admin
from wagtail.contrib.modeladmin.options import ModelAdmin, modeladmin_register

from .models import NavigationItem
# Register your models here.


class NavigationItemAdmin(ModelAdmin):
    model = NavigationItem


modeladmin_register(NavigationItemAdmin)
