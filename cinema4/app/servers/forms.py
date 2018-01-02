from django import forms

from app.servers.models import Server, Language

class LenguajeForm(forms.ModelForm):

    class Meta:
        model= Language

        fields=[
            'language',
           
        ]

        labels={
            'language': 'Idioma',
        }

        widgets={
            'language': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el idioma'}),

        }