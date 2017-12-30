from django.conf.urls import url, include
from app.movies.views import index, categoria_create


urlpatterns = [
     url(r'^$', index, name='index'),
     url(r'^categoria/create/$', categoria_create, name='categoria_crear'),
]