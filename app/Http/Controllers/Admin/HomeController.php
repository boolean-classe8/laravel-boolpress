<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class HomeController extends Controller
{
    public function index() {
        return view('admin.home');
    }

    public function account() {
        //App::setLocale('it');
        // recupero l'utente corrente
        $user = Auth::user();
        // recupero i dettagli dell'utente corrente tramite la relazione uno a uno
        $user_details = $user->userDetail;
        return view('admin.account', ['user_details' => $user_details]);
    }
}
