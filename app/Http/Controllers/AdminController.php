<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function pageLogin(){
        if(session('admin')){
            return redirect('/listeProduits');
        }else{
            return view('dashboard.dash-log-in');
        }
    }
    public function seconnecter(Request $request){

        $admin = Admin::first();
        $username = $request->input('username');
        $password = $request->input('password');

        if($admin->username == $username && $admin->password==$password){
            session(['admin' => $admin]);
            return redirect('/listeProduits')->with('success','Vous êtes connecté avec succès!');
        }else{
            return redirect()->back()->with('error', 'Les informations d\'identification ne correspondent pas.');
        }
    }
    public function deconnecter()
    {
        session()->forget('admin');
        return redirect('/dashboard')->with('success', 'Vous êtes déconnecté avec succès!');
    }
}
