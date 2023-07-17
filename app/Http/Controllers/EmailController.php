<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;
use App\Models\Authors;
use App\Models\Files;
use App\Models\Projects;
use App\Models\ProjectsUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\ForgotPassword;

class EmailController extends Controller
{
    public function forgotpass(){
        return view('auth.forgot-password');
    }

    public function recuperar(Request $request){
        $email = $request->input('email');
        $consulta = User::where('email', '=', $email)
            ->get();
        $id = User::where('email', $email)->value('id');

            $url = URL::temporarySignedRoute(
                'reset', // Nombre de la ruta a la que se accederá
                now()->addMinutes(15),// Tiempo de vida del token (10 minutos en este ejemplo)
                ['id' => $id] //id del usuario
            );

            if (count($consulta) == 0) {
                session()->flash('Error', 'Credenciales Incorrectas.');
                return redirect('forgotpass');
            } else {
                // Enviar la URL por correo electrónico
                Mail::to($email)->send(new ForgotPassword($url));
                session()->flash('Exito', 'Revise su bandeja de entrada.');
                return redirect('forgotpass');
        }
    }
///////////////////////////////UNA VEZ QUE SE ENVIO EL CORREO DE RECUPERACION DE CLAVE
    public function reset(Request $request)
    {
        //recuperar contrase!!
        $id = $request->input('id');
        return view('auth.reset-password', compact('id'));
    }
}
