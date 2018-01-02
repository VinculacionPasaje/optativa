from django.shortcuts import render, redirect
from app.movies.forms import CategoriaForm, ActorForm, MovieForm
from django.contrib import messages
from django.db import connection

# Create your views here.
def index(request):
    return render(request, 'movies/index.html');

def categoria_create(request):
    if request.method=='POST':
        form= CategoriaForm(request.POST)
        if form.is_valid():
            #el form.save() guarda los datos del formulario pero para guardar con stored procedure se utiliza el cursor
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("insert_categorie", (request.POST['categorie'],))
            cursor.close()
            messages.success(request, 'Categoria agregada correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:categoria_crear')
    else:
        form= CategoriaForm()
    return render(request, 'movies/categorias_form.html', {'form': form})

def actor_create(request):
    if request.method=='POST':
        form= ActorForm(request.POST)
        if form.is_valid():
            #el form.save() guarda los datos del formulario pero para guardar con stored procedure se utiliza el cursor
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("insert_actor", (request.POST['name'],request.POST['last_name'],request.POST['birthdate'],))
            cursor.close()
            messages.success(request, 'Actor agregado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:actor_crear')
    else:
        form= ActorForm()
    return render(request, 'movies/actor_form.html', {'form': form})

def movie_create(request):
    if request.method=='POST':
        valores = request.POST.getlist('actors')
        print(valores)

        form= MovieForm(request.POST)
        if form.is_valid():
            #el form.save() guarda los datos del formulario pero para guardar con stored procedure se utiliza el cursor
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("insert_movie", (request.POST['name'],request.POST['year'],request.POST['description'],request.POST['duration'], request.POST['productora'],request.POST['path'],request.POST['director'],request.POST['categories_id'],request.POST['actors'],))
            cursor.close()
            messages.success(request, 'Pelicula agregado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:movie_crear')
    else:
        form= MovieForm()
    return render(request, 'movies/movie_form.html', {'form': form})


