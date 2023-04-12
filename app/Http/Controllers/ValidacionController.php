<?php

namespace App\Http\Controllers;


use App\Models\Form; //importante declarar la ruta que vamos a utilizar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

//el controlador da las ordenes de lo que se tiene que hacer
class ValidacionController extends Controller
{
    public function index(Request $request)
    {
        //return view ('santi'); //el index retorna 'santi' que es la parte visual
    }//hay que ver como se conecta el html de santi a este index
    //recordar que tiene que ser por separado, no lo podemos hacer aca porque nos piden que esten separados

    public function guardar(Request $request)
    {
        //reglas de la validacion que vamos a poner
        $request -> validate([//aca se hace la validacion
            //required: es para requerir y no dejar el campo en blanco
            'nombre'=> 'required',
            'email'=> 'required | email | unique:forms',
            //email: laravel indentifica si es email
            //unique:forms    chequea que el email que se vaya a utilizar no se repita en la tabla 'forms'
            'edad'=> 'required | numeric',
            'contrasena'=> 'required | confirmed',
            'contrasena_confirmation'=> 'required',

            //todo esto es para validar, si todo esta bien y ya validado
            //se guarda acontinuacion
        ]);
        $form = new Form; //se crea un nuevo objeto de la clase 'form'
        $form->nombre = $request ->nombre;
        //nos captura el valor que se encuentre en el input 'nombre', y una 
        //ves que tiene los datos se lo asigna a 'form -> nombre' osea la tabla 
        //lo mismo con los demas campos
        $form->email = $request ->email;
        $form->edad = $request ->edad;
        $form->contrasena = $request ->contrasena;
        $form->contrasena_confirmation = $request ->contrasena_confirmation;


        $form ->save();
        //guardar en la base de datos

        //    ruta copiada de envio de mail
        $details = [
            //le decimos a la varible details
            'nombre' =>$request->nombre,
            'email' =>$request->email
            ];
           
            Mail::to('leo.sosa.96@hotmail.com')->send(new \App\Mail\PruebaMailTrap($details));
            //es el mensaje que se manda al final de la accion

            
//desde aca 
        return response()->json(['success'=>'se registro correctamente el fomulario y se envio el email']);
        //return va al final de todo, todo lo que va despues del return no se va a ejecutar
        //cuando ponemos enviar el formulario muestra un cartel
        //tambien se reinicia los campos

                

        
    } 


    
}



