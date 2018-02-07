from django.conf.urls import url, include
from app.servers.views import languaje_create, server_create, idioma_listar, server_listar, idioma_edit, server_edit, idioma_delete, server_delete


urlpatterns = [
  
     url(r'^idioma/create/$', languaje_create, name='idioma_crear'),
      url(r'^server/create/$', server_create, name='server_crear'),
       url(r'^idioma/listar/$', idioma_listar, name='idioma_listar'),
       url(r'^server/listar/$', server_listar, name='server_listar'),
       url(r'^editar/idioma/(?P<id_idioma>\d+)/$', idioma_edit, name='idioma_edit'),
       url(r'^editar/server/(?P<id_server>\d+)/$', server_edit, name='server_edit'),
       url(r'^eliminar/idioma/(?P<id_idioma>\d+)/$', idioma_delete, name='idioma_delete'),
              url(r'^eliminar/server/(?P<id_server>\d+)/$', server_delete, name='server_delete'),
    
]