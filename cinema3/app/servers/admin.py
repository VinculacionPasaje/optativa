from django.contrib import admin

from app.servers.models import Language, Server;


# Register your models here.
admin.site.register(Language);
admin.site.register(Server);
