# -*- coding: utf-8 -*-
# Generated by Django 1.11.10 on 2018-02-25 07:05
from __future__ import unicode_literals

from django.db import migrations, models
import django.db.models.deletion
import resume.blocks
import wagtail.wagtailcore.blocks
import wagtail.wagtailcore.fields
import wagtail.wagtailsnippets.blocks


class Migration(migrations.Migration):

    initial = True

    dependencies = [
        ('wagtailcore', '0040_page_draft_title'),
    ]

    operations = [
        migrations.CreateModel(
            name='ResumePage',
            fields=[
                ('page_ptr', models.OneToOneField(auto_created=True, on_delete=django.db.models.deletion.CASCADE, parent_link=True, primary_key=True, serialize=False, to='wagtailcore.Page')),
                ('objective_header', models.CharField(default='Objective', max_length=150)),
                ('objective', wagtail.wagtailcore.fields.RichTextField()),
                ('skills', wagtail.wagtailcore.fields.StreamField((('skill_set', wagtail.wagtailcore.blocks.StructBlock((('header', wagtail.wagtailcore.blocks.CharBlock(max_length=150)), ('skills', wagtail.wagtailcore.blocks.ListBlock(wagtail.wagtailsnippets.blocks.SnippetChooserBlock('resume.ResumeSkill')))))),))),
                ('body', wagtail.wagtailcore.fields.StreamField((('education', wagtail.wagtailcore.blocks.StructBlock((('header', wagtail.wagtailcore.blocks.CharBlock(max_length=200)), ('education', wagtail.wagtailcore.blocks.ListBlock(resume.blocks.ResumeEducationBlock))))), ('experience', wagtail.wagtailcore.blocks.StructBlock((('header', wagtail.wagtailcore.blocks.CharBlock(max_length=200)), ('experience', wagtail.wagtailcore.blocks.ListBlock(resume.blocks.ResumeExperienceBlock)))))))),
            ],
            options={
                'abstract': False,
            },
            bases=('wagtailcore.page',),
        ),
        migrations.CreateModel(
            name='ResumeSkill',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=250, unique=True)),
                ('url', models.URLField(blank=True, max_length=500, null=True)),
                ('description', wagtail.wagtailcore.fields.RichTextField(blank=True, null=True)),
            ],
        ),
    ]