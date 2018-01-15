from django.shortcuts import render, redirect
from app.servers.forms import LenguajeForm, ServerForm
from django.contrib import messages
from django.db import connection
from django.core.files.storage import FileSystemStorage
import cx_Oracle 
from PIL import Image
from app.movies.models import Categorie, Actor, Movie
from app.servers.models import Server,Language
from django.core.paginator import Paginator, EmptyPage, PageNotAnInteger



def languaje_create(request):
    if request.method=='POST':
        form= LenguajeForm(request.POST)
        if form.is_valid():
            #el form.save() guarda los datos del formulario pero para guardar con stored procedure se utiliza el cursor
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("insert_idioma", (request.POST['language'],))
            cursor.close()
            messages.success(request, 'Idioma agregado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('servers:idioma_crear')
    else:
        form= LenguajeForm()
    return render(request, 'servers/lenguaje_form.html', {'form': form})


def server_create(request):
    if request.method=='POST':
        form= ServerForm(request.POST)
        if form.is_valid():
            #el form.save() guarda los datos del formulario pero para guardar con stored procedure se utiliza el cursor
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("insert_server", (request.POST['name'],request.POST['embed_code'],request.POST['languages'],request.POST['movies'],))
            cursor.close()
            messages.success(request, 'Servidor agregado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('servers:server_crear')
    else:
        form= ServerForm()
    return render(request, 'servers/server_form.html', {'form': form})

def idioma_listar(request):
    djangoCursor = connection.cursor()
    cursor = djangoCursor.connection.cursor()

    #cursor = connection.cursor()
    #cursor.execute("select * from CATEGORIES where state=1")
    #categoria = cursor.fetchall()

    
    resultado = cursor.var(cx_Oracle.CURSOR)
    estado=1
    cursor.callproc('SELECT_IDIOMA_ALL', (estado,resultado))
    idiomas= resultado.getvalue().fetchall()
   
    cursor.close()
    
   
    
   
    
    #categoria= Categorie.objects.all().filter(state=1);
    
 
    page = request.GET.get('page', 1)
    paginator = Paginator(idiomas, 3)
    try:
        cat = paginator.page(page)
    except PageNotAnInteger:
        cat = paginator.page(1)
    except EmptyPage:
        cat = paginator.page(paginator.num_pages)
    
    contexto={'idiomas': cat}
    
    return render(request, 'servers/idiomas_listar.html', contexto)

def server_listar(request):
    djangoCursor = connection.cursor()
    cursor = djangoCursor.connection.cursor()

    #cursor = connection.cursor()
    #cursor.execute("select * from CATEGORIES where state=1")
    #categoria = cursor.fetchall()

    
    resultado = cursor.var(cx_Oracle.CURSOR)
    estado=1
    cursor.callproc('SELECT_SERVERS_MOVIES_ALL', (estado,resultado))
    servers= resultado.getvalue().fetchall()
    
    cursor.close()
    
   
    
   
    
    #categoria= Categorie.objects.all().filter(state=1);
    
 
    page = request.GET.get('page', 1)
    paginator = Paginator(servers, 3)
    try:
        cat = paginator.page(page)
    except PageNotAnInteger:
        cat = paginator.page(1)
    except EmptyPage:
        cat = paginator.page(paginator.num_pages)
    
    contexto={'servers': cat}
    
    return render(request, 'servers/servers_listar.html', contexto)


def idioma_edit(request, id_idioma):
    idioma= Language.objects.get(id=id_idioma)
    
    if request.method=='GET':
        form= LenguajeForm(instance=idioma)
        
      
    else:
        form= LenguajeForm(request.POST, instance=idioma)
        if form.is_valid():
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("UPDATE_IDIOMA", (id_idioma, request.POST['language'],))
            cursor.close()
            messages.success(request, 'Idioma modificado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('servers:idioma_listar')
    return render(request, 'servers/lenguaje_form.html', {'form': form})

def server_edit(request, id_server):
    server= Server.objects.get(id=id_server)
    
    if request.method=='GET':
        form= ServerForm(instance=server)
        
      
    else:
        form= ServerForm(request.POST, instance=server)
        if form.is_valid():
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("UPDATE_SERVER_MOVIE", (id_server, request.POST['name'],request.POST['embed_code'],request.POST['languages'],request.POST['movies'],))
            cursor.close()
            messages.success(request, 'Servidor modificado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('servers:server_listar')
    return render(request, 'servers/server_form.html', {'form': form})
