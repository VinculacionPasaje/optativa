from django.conf.urls import url, include
from app.movies.views import index


urlpatterns = [
    url(r'^$', index),
]