from django.shortcuts import render, redirect
from app.servers.forms import LenguajeForm
from django.contrib import messages
from django.db import connection


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
