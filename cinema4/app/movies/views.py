from django.shortcuts import render, redirect
from app.movies.forms import CategoriaForm, ActorForm, MovieForm
from django.contrib import messages
from django.db import connection
from django.core.files.storage import FileSystemStorage
import cx_Oracle 
from PIL import Image
from app.movies.models import Categorie, Actor, Movie
from django.core.paginator import Paginator, EmptyPage, PageNotAnInteger

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
        

        form= MovieForm(request.POST, request.FILES)
       
      
      
        if form.is_valid():
            
            #el form.save() guarda los datos del formulario pero para guardar con stored procedure se utiliza el cursor
            #form.save()
            
            foto = request.FILES['path']  #obtengo la imagen
            nombre_imagen=  foto.name # me da el nombre de la imagen por ejemplo -> imagen.jpg
      
            fs = FileSystemStorage()
            filename = fs.save(foto.name, foto) # me guarda la foto en el server
            uploaded_file_url = fs.url(filename) # me da la ruta del archivo -> /media/imagen.jpg
            
            nameimg =foto.name
            path= 'C:\\xampp\\htdocs\\optativa\\cinema4\\media\\'
            imagpath = path+nameimg
            imag = Image.open (imagpath,mode='r')
            imag.save('C:\\xampp\\htdocs\\optativa\\cinema2\\public\\fotos\\'+foto.name)
            
          
            cursor = connection.cursor()
            cursor.callproc("insert_movie", (request.POST['name'],request.POST['year'],request.POST['description'],request.POST['duration'], request.POST['productora'],nombre_imagen,request.POST['director'],request.POST['categories'],))
            cursor.close()

            cursor2 = connection.cursor()
            result = cursor2.callfunc('SELECT_ID_MOVIE', cx_Oracle.NUMBER, [request.POST['name'],request.POST['year']] )
            cursor2.close()


            
            
            actores = request.POST.getlist('actors')  #aqui obtengo todos los id de los actores
            cursor3 = connection.cursor()
            for actor in actores:
                cursor3.callproc("insert_movie_actor", (result,actor)) #aqui se llena la tabla de mucho a muchos movies_actors
            
            
            cursor3.close()

            messages.success(request, 'Pelicula agregado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:movie_crear')
    else:
        form= MovieForm()
    return render(request, 'movies/movie_form.html', {'form': form})

def categoria_listar(request):
    djangoCursor = connection.cursor()
    cursor = djangoCursor.connection.cursor()

    #cursor = connection.cursor()
    #cursor.execute("select * from CATEGORIES where state=1")
    #categoria = cursor.fetchall()


    resultado = cursor.var(cx_Oracle.CURSOR)
    estado=1
    cursor.callproc('SELECT_CATEGORIA_ALL', (estado,resultado))
    categoria= resultado.getvalue().fetchall()
    cursor.close()
    
   
    
   
    
    #categoria= Categorie.objects.all().filter(state=1);
    
 
    page = request.GET.get('page', 1)
    paginator = Paginator(categoria, 3)
    try:
        cat = paginator.page(page)
    except PageNotAnInteger:
        cat = paginator.page(1)
    except EmptyPage:
        cat = paginator.page(paginator.num_pages)
    
    contexto={'categorias': cat}
    
    return render(request, 'movies/categorias_listar.html', contexto)


def actor_listar(request):
    djangoCursor = connection.cursor()
    cursor = djangoCursor.connection.cursor()

    #cursor = connection.cursor()
    #cursor.execute("select * from CATEGORIES where state=1")
    #categoria = cursor.fetchall()

    
    resultado = cursor.var(cx_Oracle.CURSOR)
    estado=1
    cursor.callproc('SELECT_ACTORES_ALL', (estado,resultado))
    actores= resultado.getvalue().fetchall()
    cursor.close()
    
   
    
   
    
    #categoria= Categorie.objects.all().filter(state=1);
    
 
    page = request.GET.get('page', 1)
    paginator = Paginator(actores, 3)
    try:
        cat = paginator.page(page)
    except PageNotAnInteger:
        cat = paginator.page(1)
    except EmptyPage:
        cat = paginator.page(paginator.num_pages)
    
    contexto={'actores': cat}
    
    return render(request, 'movies/actores_listar.html', contexto)



