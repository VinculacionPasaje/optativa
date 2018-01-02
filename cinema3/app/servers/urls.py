from django.conf.urls import url, include
from app.servers.views import languaje_create


urlpatterns = [
  
     url(r'^idioma/create/$', languaje_create, name='idioma_crear'),
    
]