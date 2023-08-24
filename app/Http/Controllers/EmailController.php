<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\ForgotPassword;

class EmailController extends Controller
{
    ////////////////////////////////////////////////CAMBIO DE PASS/////////////////////////////////////////////////////
    /**
     * Muestra la vista de "olvidó su contraseña".
     */
    public function forgotpass()
    {
        return view('auth.forgot-password');
    }

    /**
     * Procesa la solicitud de recuperación de contraseña.
     */
    public function recuperar(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            session()->flash('Error', 'Credenciales incorrectas.');
            return redirect('forgotpass');
        }

        $url = URL::temporarySignedRoute(
            'reset', // Nombre de la ruta a la que se accederá
            now()->addMinutes(15), // Tiempo de vida del token (10 minutos en este ejemplo)
            ['id' => $user->id] //id del usuario
        );

        // Enviar la URL por correo electrónico
        Mail::to($email)->send(new ForgotPassword($url));
        session()->flash('Exito', 'Revise su bandeja de entrada.');
        return redirect('forgotpass');
    }

    /**
     * Muestra la vista de restablecimiento de contraseña.
     */
    public function reset(Request $request)
    {
        $id = $request->input('id');
        return view('auth.reset-password', compact('id'));
    }

    /**
     * Procesa la solicitud de cambio de contraseña.
     */
    public function passchange(Request $request)
    {
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        $id = $request->input('id');

        if ($pass1 !== $pass2) {
            session()->flash('Error', 'Las contraseñas no coinciden.');
            return back();
        }

        $hashpass = Hash::make($pass1);

        User::where('id', $id)->update([
            'password' => $hashpass,
        ]);

        session()->flash('Exito', 'La contraseña se ha restablecido correctamente.');
        return redirect('/');
    }

////////////////////////////////////////CAMBIO EN EL PERFIL//////////////////////////////////////////////////////
    public function soportemail(Request $request){
        $asunto = $request->input('asunto');
        $comentario = $request->input('comentario');
        $user = Auth::id();
        $email = User::where('id', $user)->value('email');
        $data = [
            'destinatario' => 'soporte.encuentro.eical@gmail.com', //Correo de soporte
            'asunto' => $asunto,
            'comentario' => $comentario,
            'id' => $user,
            'email' => $email,
        ];

        Mail::send('mail.soporte', compact('data'), function ($message) use ($data) {
            $message->to($data['destinatario'], 'CINVESTAV')
                ->subject($data['asunto'])
                ->from('hello@example.com', 'Soporte CINVESTAV');
        });

        return redirect('/');
    }
}
