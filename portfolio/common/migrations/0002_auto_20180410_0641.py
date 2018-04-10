# Generated by Django 2.0.4 on 2018-04-10 06:41

from django.db import migrations, models
import django.db.models.deletion
import modelcluster.fields


class Migration(migrations.Migration):

    dependencies = [
        ('wagtaildocs', '0007_merge'),
        ('wagtailcore', '0040_page_draft_title'),
        ('common', '0001_initial'),
    ]

    operations = [
        migrations.CreateModel(
            name='NavigationMenu',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('menu_location', models.CharField(help_text='Template name', max_length=255, unique=True)),
                ('menu_name', models.CharField(blank=True, max_length=255, null=True)),
            ],
            options={
                'abstract': False,
            },
        ),
        migrations.CreateModel(
            name='NavigationMenuItem',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('sort_order', models.IntegerField(blank=True, editable=False, null=True)),
                ('link_external', models.URLField(blank=True, null=True, verbose_name='external link')),
                ('link_anchor', models.CharField(blank=True, max_length=100, null=True, verbose_name='page anchor')),
                ('menu_icon', models.CharField(blank=True, help_text='Menu icon (font awesome) to show', max_length=255, null=True)),
                ('menu_title', models.CharField(blank=True, help_text='Optional link title in this menu', max_length=255, null=True)),
                ('link_document', models.ForeignKey(blank=True, null=True, on_delete=django.db.models.deletion.SET_NULL, related_name='+', to='wagtaildocs.Document')),
                ('link_page', models.ForeignKey(blank=True, null=True, on_delete=django.db.models.deletion.SET_NULL, related_name='+', to='wagtailcore.Page')),
                ('menu', modelcluster.fields.ParentalKey(on_delete=django.db.models.deletion.CASCADE, related_name='menu_items', to='common.NavigationMenu')),
            ],
            options={
                'ordering': ['sort_order'],
                'abstract': False,
            },
        ),
        migrations.RemoveField(
            model_name='navigationitem',
            name='page',
        ),
        migrations.DeleteModel(
            name='NavigationItem',
        ),
    ]