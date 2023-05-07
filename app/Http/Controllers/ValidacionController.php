<?php

namespace App\Http\Controllers;


use App\Models\Form; //importante declarar la ruta que vamos a utilizar
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ValidacionController extends Controller
{
    public function index(Request $request)
    {

    }
    public function guardar(Request $request)
    {
        //reglas de la validacion que vamos a poner
        $request -> validate([

            'nombre'=> 'required',
            'email'=> 'required | email | unique:forms',
            'edad'=> 'required | numeric',
            'contrasena'=> 'required | confirmed',
            'contrasena_confirmation'=> 'required',

        ]);
        $form = new Form; //se crea un nuevo objeto de la clase 'form'
        $form->nombre = $request ->nombre;
        $form->email = $request ->email;
        $form->edad = $request ->edad;
        $form->contrasena = $request ->contrasena;
        $form->contrasena_confirmation = $request ->contrasena_confirmation;


        $form ->save();

        $details = [
            'nombre' =>$request->nombre,
            'email' =>$request->email
            ];

            Mail::to('leo.sosa.96@hotmail.com')->send(new \App\Mail\PruebaMailTrap($details));


        return response()->json(['se registro correctamente el fomulario y se envio el email']);





    }



}



