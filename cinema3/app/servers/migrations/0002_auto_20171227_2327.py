# -*- coding: utf-8 -*-
# Generated by Django 1.11.6 on 2017-12-28 04:27
from __future__ import unicode_literals

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('servers', '0001_initial'),
    ]

    operations = [
        migrations.RenameField(
            model_name='server',
            old_name='languages_id',
            new_name='languages',
        ),
    ]
