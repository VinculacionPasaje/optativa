from django.conf.urls import url, include
from app.movies.views import index, categoria_create, actor_create, movie_create, categoria_listar, actor_listar


urlpatterns = [
     url(r'^$', index, name='index'),
     url(r'^categoria/create/$', categoria_create, name='categoria_crear'),
      url(r'^actor/create/$', actor_create, name='actor_crear'),
       url(r'^movie/create/$', movie_create, name='movie_crear'),
        url(r'^categoria/listar/$', categoria_listar, name='categoria_listar'),
         url(r'^actor/listar/$', actor_listar, name='actor_listar'),
    
]