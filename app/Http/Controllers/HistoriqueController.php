<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    //
    public function listeCommandes(){
        if (session('admin')) {
            $historiques = Historique::paginate(5);
            return view('dashboard.commandes',compact('historiques'));
        }else{
            return view('dashboard.dash-log-in');
        }
    }
}
