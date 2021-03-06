from django.conf.urls import url, include
from app.movies.views import index, categoria_create, actor_create, movie_create, categoria_listar, actor_listar, movie_listar, categoria_edit, actor_edit, movie_edit,categoria_delete, actor_delete, movie_delete


urlpatterns = [
     url(r'^$', index, name='index'),
     url(r'^categoria/create/$', categoria_create, name='categoria_crear'),
      url(r'^actor/create/$', actor_create, name='actor_crear'),
       url(r'^movie/create/$', movie_create, name='movie_crear'),
        url(r'^categoria/listar/$', categoria_listar, name='categoria_listar'),
         url(r'^actor/listar/$', actor_listar, name='actor_listar'),
          url(r'^movie/listar/$', movie_listar, name='movie_listar'),
          url(r'^editar/categoria/(?P<id_categoria>\d+)/$', categoria_edit, name='categoria_editar'),
           url(r'^editar/actor/(?P<id_actor>\d+)/$', actor_edit, name='actor_editar'),
           url(r'^editar/movie/(?P<id_movie>\d+)/$', movie_edit, name='movie_editar'),
            url(r'^eliminar/categoria/(?P<id_categoria>\d+)/$', categoria_delete, name='categoria_delete'),
              url(r'^eliminar/actor/(?P<id_actor>\d+)/$', actor_delete, name='actor_delete'),
                url(r'^eliminar/movie/(?P<id_movie>\d+)/$', movie_delete, name='movie_delete'),

    
]