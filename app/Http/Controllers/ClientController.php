<?php

namespace App\Http\Controllers;

use App\Mail\basicEmail;
use App\Models\Client;
use App\Models\Historique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class ClientController extends Controller
{
    //
    public function addClient(Request $request)
    {
        $client = Client::where('email', $request->input('email'))
            ->where('nom', $request->input('nom'))
            ->where('prenom', $request->input('prenom'))
            ->first();

        if (!$client) {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:50',
                'prenom' => 'required|string|max:50',
                'sexe' => 'required|string|in:Homme,Femme',
                'date' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
                'adresse' => 'required|string|max:255',
                'ville' => 'required|string|max:50',
                'tel' => 'required|digits_between:10,15|unique:clients,tel',
                'email' => 'required|email|unique:clients,email',
                'password' => 'required|min:6|confirmed',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $client = new Client();
            $client->nom = $validatedData['nom'];
            $client->prenom = $validatedData['prenom'];
            $client->sexe = $validatedData['sexe'];
            $client->date_naissance = $validatedData['date'];
            $client->adresse = $validatedData['adresse'];
            $client->ville = $validatedData['ville'];
            $client->tel = $validatedData['tel'];
            $client->email = $validatedData['email'];
            $client->mot_de_passe = $validatedData['password']; // Encrypt the password
            if ($request->hasFile('photo')) {
                $nom_photo = $request->file('photo');
                $cheminSource = $nom_photo->getClientOriginalName();
                $chemindest = base_path() . '/public/assets-0/img/clients/';
                $nom_photo->move($chemindest, $cheminSource);
                $client->photo = $nom_photo->getClientOriginalName();
            }
            $client->save();
            session(['client' => $client]);
            $historiques = Historique::where('clients_id', $client->id)->get();
            $history = [];
            foreach ($historiques as $historique) {
                $history[$historique->commandes_id] = [
                    'date' => $historique->commandes_date,
                    'nom' => $historique->produits_nom,
                    'quantite' => $historique->produits_quantite,
                    'prix' => $historique->produits_prix,
                    'total' => $historique->montant_total
                ];
            }
            session(['historiques' => $history]);
            Mail::to($request->input('email'))->send(new basicEmail('contact@Kitly.com','MyEmail'));
            return redirect('profile')->with('success', 'Vous êtes inscrit avec succès!');
        } else if (!$client->mot_de_passe) {
            $validatedData = $request->validate([
                'sexe' => 'required|string|in:Homme,Femme',
                'date' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
                'adresse' => 'required|string|max:255',
                'ville' => 'required|string|max:50',
                'password' => 'required|min:6|confirmed',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $client->sexe = $validatedData['sexe'];
            $client->date_naissance = $validatedData['date'];
            $client->adresse = $validatedData['adresse'];
            $client->ville = $validatedData['ville'];
            if($request->input('tel')!=$client->tel){
                $validatedData = $request->validate([
                    'tel' => 'required|digits_between:10,15|unique:clients,tel'
                ]);
                $client->tel = $validatedData['tel'];
            }
            $client->mot_de_passe = $validatedData['password']; // Encrypt the password
            if ($request->hasFile('photo')) {
                $nom_photo = $request->file('photo');
                $cheminSource = $nom_photo->getClientOriginalName();
                $chemindest = base_path() . '/public/assets-0/img/clients/';
                $nom_photo->move($chemindest, $cheminSource);
                $client->photo = $nom_photo->getClientOriginalName();
            }
            $client->save();
            session(['client' => $client]);
            $historiques = Historique::where('clients_id', $client->id)->get();
            $history = [];
            foreach ($historiques as $historique) {
                $history[$historique->commandes_id] = [
                    'date' => $historique->commandes_date,
                    'nom' => $historique->produits_nom,
                    'quantite' => $historique->produits_quantite,
                    'prix' => $historique->produits_prix,
                    'total' => $historique->montant_total
                ];
            }
            session(['historiques' => $history]);
            Mail::to($request->input('email'))->send(new basicEmail('contact@Kitly.com','MyEmail'));
            return redirect('profile')->with('success', 'Vous êtes inscrit avec succès!');
        } else {
            return redirect()->back()->with('error', 'Vous êtes déja inscrit!');
        }
    }

    public function seConnecter(Request $request)
    {
        $client = Client::where('email', $request->input('email'))
            ->where('mot_de_passe', $request->input('password'))->first();
        if ($client) {
            session(['client' => $client]);
            $historiques = Historique::where('clients_id', $client->id)->get();
            $history = [];
            foreach ($historiques as $historique) {
                $history[$historique->commandes_id] = [
                    'date' => $historique->commandes_date,
                    'nom' => $historique->produits_nom,
                    'quantite' => $historique->produits_quantite,
                    'prix' => $historique->produits_prix,
                    'total' => $historique->montant_total
                ];
            }
            session(['historiques' => $history]);
            return redirect('profile')->with('success', 'Vous êtes connecté avec succès!');
        } else {
            return redirect()->back()->with('auth-failed', 'Les informations d\'identification ne correspondent pas.');
        }
    }
    public function deconnecter()
    {
        session()->forget('client');
        session()->forget('historiques');
        return redirect('log-in')->with('success', 'Vous êtes déconnecté avec succès!');
    }
    public function backToLogin()
    {
        if (session('client')) {
            return view('profile');
        } else {
            return view('log-in');
        }
    }
    public function Enregistrer_password(Request $request)
    {
        $validatedData = $request->validate([
            'password_old' => 'required|min:6',
            'password' => 'required|min:6|confirmed'
        ]);
        $client = Client::where('id', session('client')->id)->first();
        if ($client->mot_de_passe == $validatedData['password_old']) {
            $client->mot_de_passe = $validatedData['password'];
            $client->save();
            return redirect()->back()->with('success', 'Le mot de passe a été mis à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Votre ancien mot de passe est incorrect.');
        }
    }
    public function Enregistrer_profile(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'sexe' => 'required|string|in:Homme,Femme',
            'date' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $client = Client::where('id', session('client')->id)->first();
        $client->nom = $validatedData['nom'];
        $client->prenom = $validatedData['prenom'];
        $client->sexe = $validatedData['sexe'];
        $client->date_naissance = $validatedData['date'];
        if ($request->hasFile('photo')) {
            $nom_photo = $request->file('photo');
            $cheminSource = $nom_photo->getClientOriginalName();
            $chemindest = base_path() . '/public/assets-0/img/clients/';
            $nom_photo->move($chemindest, $cheminSource);
            $client->photo = $nom_photo->getClientOriginalName();
        }
        $client->save();
        session(['client' => $client]);
        return redirect()->back()->with('success', 'Le profile a été mis à jour avec succès.');
    }
    public function Enregistrer_contact(Request $request)
    {
        $validatedData = $request->validate([
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:50'
        ]);
        $client = Client::where('id', session('client')->id)->first();
        $client->adresse = $validatedData['adresse'];
        $client->ville = $validatedData['ville'];
        if($request->input('tel')!=$client->tel){
            $validatedData = $request->validate([
                'tel' => 'required|digits_between:10,15|unique:clients,tel'
            ]);
            $client->tel = $validatedData['tel'];
        }
        $client->save();
        session(['client' => $client]);
        return redirect()->back()->with('success', 'Le contact a été mis à jour avec succès.');
    }
    public function envoyer(Request $request){
        $nom = '';
        $prenom = '';
        $email = '';
        $tel = '';
        if(!session('client')){
            $client = Client::where('email', $request->input('email'))
            ->where('nom', $request->input('nom'))
            ->where('prenom', $request->input('prenom'))
            ->first();
            if(!$client){
                $validatedData = $request->validate([
                    'nom' => 'required|string|max:50',
                    'prenom' => 'required|string|max:50',
                    'tel' => 'required|digits_between:10,15|unique:clients,tel',
                    'email' => 'required|email|unique:clients,email'
                ]);
                $nom = $validatedData['nom'];
                $prenom = $validatedData['prenom'];
                $email = $validatedData['email'];
                $tel = $validatedData['tel'];
            }else{
                if($request->input('tel')!=$client->tel){
                    $validatedData = $request->validate([
                        'tel' => 'required|digits_between:10,15|unique:clients,tel'
                    ]);
                    $tel = $validatedData['tel'];
                }else{
                    $tel = $client->tel;
                }
                $nom = $client->nom;
                $prenom = $client->prenom;
                $email = $client->email;
            }
        }else{
            $client = session('client');
            $nom = session('client')->nom;
            $prenom = session('client')->prenom;
            $email = session('client')->email;
            $tel = session('client')->tel;
        }

        $validatedData = $request->validate([
            'objet' => 'required|string|max:50',
            'message' => 'required|string|max:255'
        ]);
        $objet = $validatedData['objet'];
        $message = $validatedData['message'];

        Mail::to('amahane.abdelmoula@gmail.com')->send(new basicEmail($email,'clientEmail',$nom,$prenom,$tel,$objet,$message));
        return redirect()->back()->with('success','Votre message a été envoyé avec succès.');
    }

    public function listeClients(){
        if (session('admin')) {
            $clients = Client::paginate(6);
            return view('dashboard.clients',compact('clients'));
        }else{
            return view('dashboard.dash-log-in');
        }
    }
    public function detailClient(Request $request){
        if (session('admin')) {
            $client = Client::find($request->input('id'));
            return view('dashboard.detailClient',compact('client'));
        }else{
            return view('dashboard.dash-log-in');
        }
    }
    public function detailCommandes(Request $request){
        if (session('admin')) {
            $client = Client::find($request->input('id'));
            $historiques = Historique::where('clients_id', $request->input('id'))->paginate(5);
            return view('dashboard.detailCommandes',compact('client','historiques'));
        }else{
            return view('dashboard.dash-log-in');
        }
    }
    public function supprimer(Request $request)
    {
        Client::find($request->input(('id')))->delete();
        return redirect()->back()->with('success', 'Le client a été supprimé avec succès.');
    }
}
