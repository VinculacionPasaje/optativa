from django.db import models
from app.movies.models import Movie
# Create your models here.

class Language(models.Model):
    language = models.CharField(max_length=255);
    state = models.CharField(max_length=1, default='1', editable=False);

    def __str__(self):
        return self.language;
    
    class Meta:
        db_table = 'LANGUAGES';

class Server(models.Model):
    name = models.CharField(max_length=255);
    embed_code = models.CharField(max_length=255);
    languages = models.ForeignKey(Language, null=True, blank=True, on_delete=models.CASCADE);
    movies = models.ForeignKey(Movie, null=True, blank=True, on_delete=models.CASCADE);
    state = models.CharField(max_length=1, default='1', editable=False);

    def __str__(self):
        return self.name;
    
    class Meta:
        db_table = 'SERVERS_MOVIES';
