<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Detail_Commande;
use App\Models\Historique;
use App\Models\Produit;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommandeController extends Controller
{
    //
    public function Enregistrer(Request $request)
    {
        if (!session()->has('cart') || empty(session('cart'))) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        } else {

            if (session('client')) {
                $client = session('client');
            } else {
                $client = Client::where('email', $request->input('email'))
                    ->where('nom', $request->input('nom'))
                    ->where('prenom', $request->input('prenom'))
                    ->first();
                if ($client) {
                    if ($client->tel != $request->input('tel')) {
                        $validatedData = $request->validate([
                            'tel' => 'required|digits_between:10,15|unique:clients,tel'
                        ]);
                        $client->tel = $validatedData['tel'];
                        $client->save();
                    }
                } else {
                    $validatedData = $request->validate([
                        'nom' => 'required|string|max:50',
                        'prenom' => 'required|string|max:50',
                        'adresse' => 'required|string|max:255',
                        'tel' => 'required|digits_between:10,15|unique:clients,tel',
                        'email' => 'required|email|unique:clients,email',
                    ]);
                    $client = new Client();
                    $client->nom = $validatedData['nom'];
                    $client->prenom = $validatedData['prenom'];
                    $client->email = $validatedData['email'];
                    $client->tel = $validatedData['tel'];
                    $client->adresse = $validatedData['adresse'];
                    $client->save();
                }
            }

            $cart = session('cart');

            $total = 0;
            foreach ($cart as $item) {
                $total += $item['quantite'] * $item['prix'];
            }
            if ($total < 500) {
                $total += 50;
            }

            $commande = new Commande();
            $commande->clients_id = $client->id;
            $commande->date_commande = Carbon::now()->toDateString();
            $commande->heure_commande = Carbon::now()->toTimeString();
            $validatedData = $request->validate([
                'adresse' => 'required|string|max:255'
            ]);
            $commande->adresse_livraison = $validatedData['adresse'];
            $commande->montant_total = $total;
            $commande->save();

            $historique = new Historique();
            $historique->clients_id = $client->id;
            $historique->clients_nom_email_tel = $client->nom . ';' . $client->prenom . ';' . $client->email . ';' . $client->tel;
            $historique->commandes_id = $commande->id;
            $historique->commandes_date = $commande->date_commande . ';' . $commande->heure_commande . ';' . $commande->adresse_livraison;
            $historique->montant_total = $commande->montant_total;

            foreach ($cart as $id => $item) {
                $produit = Produit::find($id);
                $produit->quantite_stock -= $item['quantite'];
                $produit->save();

                $Detail_Commande = new Detail_Commande();
                $Detail_Commande->commandes_id = $commande->id;
                $Detail_Commande->produits_id = $id;
                $Detail_Commande->quantite_commande = $item['quantite'];
                $Detail_Commande->save();

                $historique->produits_nom .= $produit->designation . ';';
                $historique->produits_prix .= $produit->prix_vente . ';';
                $historique->produits_quantite .= $Detail_Commande->quantite_commande . ';';
            }

            $historique->save();
            session()->forget('cart');

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

            return redirect('shop')->with('success', 'Votre commande a été effectuée avec succès!');
        }
    }

    public function verifier()
    {
        if (session('cart')) {
            return response()->json([
                'success' => true,
                'redirect' => '/checkout'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Votre panier est vide'
            ], 404);
        }
    }
}