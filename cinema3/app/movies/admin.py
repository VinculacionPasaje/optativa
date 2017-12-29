from django.contrib import admin
from app.movies.models import Actor, Categorie, Movie;


# Register your models here.
admin.site.register(Actor);
admin.site.register(Categorie);
admin.site.register(Movie);