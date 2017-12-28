from django.db import models
from app.servers.models import Server

# Create your models here.

class Actor(models.Model):
    name = models.CharField(max_length=500);
    last_name = models.CharField(max_length=500);
    birthdate = models.DateField();
    state = models.CharField(max_length=1, default='1', editable=False);
    
    def __str__(self):
        return self.name;

    class Meta:
        db_table = 'ACTORS';



class Categorie(models.Model):
    categorie = models.CharField(max_length=255);
    state = models.CharField(max_length=1, default='1', editable=False);

    def __str__(self):
        return self.categorie;

    class Meta:
        db_table = 'CATEGORIES';




class Movie(models.Model):
    name = models.CharField(max_length=500);
    year = models.IntegerField();
    description = models.CharField(max_length=500);
    duration = models.TimeField();
    productora = models.CharField(max_length=500);
    path = models.ImageField(upload_to = 'imagenes/');
    director = models.CharField(max_length=500);
    categories_id = models.ForeignKey(Categorie, null=False, blank=True, on_delete=models.CASCADE);
    servers_id = models.ForeignKey(Server, null=True, blank=True, on_delete=models.CASCADE);
    actors = models.ManyToManyField(Actor, through='Actor_Movie');
    state = models.CharField(max_length=1, default='1', editable=False);
    

    def __str__(self):
        return self.name;

    class Meta:
        db_table = 'MOVIES';


class Actor_Movie(models.Model):
    actors_id = models.ForeignKey(Actor);
    movies_id = models.ForeignKey(Movie);
    
    class Meta:
        db_table = 'ACTORS_MOVIES';


   