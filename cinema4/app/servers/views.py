from django.shortcuts import render, redirect
from app.servers.forms import LenguajeForm, ServerForm
from django.contrib import messages
from django.db import connection
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
