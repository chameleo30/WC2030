<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Detail_Commande;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ProduitController extends Controller
{
    //
    public function shopProducts()
    {
        $categorie = new Categorie();
        $categories = $categorie->get();

        $produit = new Produit();
        $produits = $produit->paginate(6);

        return view('shop', compact('produits', 'categories'));
    }

    public function produit(Request $request)
    {

        $produit = new Produit();
        $id = $request->input('id_produit');
        $produit = $produit->find($id);

        $produits = Produit::where('categories_id', $produit->categories_id)->where('id', '!=', $produit->id)->paginate(3);

        $categorie = Categorie::find($produit->categories_id);

        return view('single-product', compact('produits', 'produit', 'categorie'));
    }

    public function index_produits()
    {
        /*
        $produit = new Produit();
        $detail_commande = new Detail_Commande();

        $produits = $produit
        ->join($detail_commande->getTable(), 'produits.id', '=', 'detail__commandes.produits_id')
        ->select('produits.*',$produit->raw('count(detail__commandes.produits_id) as total'))
        ->groupBy('detail__commandes.produits_id')
        ->orderBy('total','desc')
        ->take(3)
        ->get();
        */
        $produits = DB::table('produits')
            ->join('detail__commandes', 'produits.id', '=', 'detail__commandes.produits_id')
            ->select('produits.id', 'produits.designation', 'produits.prix_vente', 'produits.unite_mesure', 'produits.quantite_stock', 'produits.photo', DB::raw('count(detail__commandes.produits_id) as total'))
            ->where('produits.quantite_stock', '>', '0')
            ->groupBy('produits.id', 'produits.designation', 'produits.prix_vente', 'produits.unite_mesure', 'produits.quantite_stock', 'produits.photo')
            ->orderBy('total', 'desc')
            ->take(3)
            ->get();

        $produit_solde = Produit::find(1);


        //$produits = Produit::take('3')->get();

        return view('index', compact('produits','produit_solde'));
    }

    public function chercherProduit(Request $request)
    {
        $searchTerm = $request->input('search');

        // Search for products where the designation matches the search term, with pagination
        $produits = Produit::where('designation', 'like', '%' . $searchTerm . '%')->get();

        // Search for categories where the designation matches the search term
        $categories = Categorie::where('designation', 'like', '%' . $searchTerm . '%')->get();

        $hasNoPaginate = 'hasNoPaginate';
        if ($produits->count() > 0) {
            // Return the view with the search results for both products and categories
            return view('shop', compact('produits', 'categories', 'hasNoPaginate'));
        } else {
            return redirect()->back()->with('error', 'Le produit demandé n\'existe pas.');
        }
    }

    public function addToCart(Request $request)
    {
        $id = $request->id_produit;
        $produit = Produit::find($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantite']++;
        } else {
            $cart[$id] = [
                "description" => $produit->designation,
                "quantite" => 1,
                "prix" => $produit->prix_vente,
                "stock" => $produit->quantite_stock,
                "photo" => $produit->photo
            ];
        }

        if ($produit->quantite_stock >= $cart[$id]['quantite']) {
            session()->put('cart', $cart);

            return response()->json([
                'success' => true,
                'message' => 'Produit ajouté au panier',
                'cartCount' => count($cart)
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Stock insuffisant'
        ], 404);
    }

    public function clearCart(Request $request)
    {
        if(session('cart')){
            session()->forget('cart');
        return response()->json([
            'message' => 'Votre panier a été vidé avec succès'
        ], 200);
        }else{
            return response()->json([
            'message' => 'Votre panier est déjà vide'
        ], 404);
        }
    }


    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart');
        $id = $request->input('id_produit');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Votre produit a été annulé avec succès!');
    }
    public function updateCart(Request $request)
    {

        if (!session('cart')) {
            return response()->json([
                'message' => 'Il n\'y a rien à mettre à jour pour le moment.'
            ], 404);
        } else {
            $cart = session('cart');
            // Récupérer les nouvelles quantités soumises
            $quantites = $request->input('quantite');
            // Parcourir chaque produit dans le panier et mettre à jour la quantité
            if (isset($quantites)) {
                foreach ($quantites as $id => $quantite) {
                    if (isset($cart[$id])) {
                        // Mettre à jour la quantité
                        $cart[$id]['quantite'] = $quantite;
                    }
                }
                // Mettre à jour la session avec le panier modifié
                session()->put('cart', $cart);
            }
            return response()->json([
                'message' => 'Votre commande a été mise à jour avec succès!'
            ], 200);
        }
        // Rediriger avec un message de succès
    }
    
    public function listeProduits(Request $request)
    {
        if (session('admin')) {
            $produits = DB::table('produits')
                ->join('categories', 'categories.id', '=', 'produits.categories_id')
                ->select('produits.*', 'categories.designation as categorie')
                ->paginate(5);

            return view('dashboard.produits', compact('produits'));
        } else {
            return view('dashboard.dash-log-in');
        }
    }

    public function ajouter(Request $request)
    {
        $validatedData = $request->validate([
            'designation' => 'required|string|max:50|unique:produits,designation',  // Required, must be a string, max length of 255 characters
            'categorie' => 'required|exists:categories,designation',  // Required, must exist in the 'categories' table (id column)
            'prix' => 'required|numeric|min:10',  // Required, must be numeric, minimum value of 0
            'unite' => 'required|string|max:50',  // Required, must be a string, max length of 50 characters
            'stock' => 'required|integer|min:1',  // Required, must be an integer, minimum value of 0
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',  // Optional (nullable), must be an image with specific formats, max size 2MB
            'description' => 'required|string|max:255'
        ]);
        $Produit = new Produit();
        $Produit->designation = $validatedData['designation'];

        $categorie = Categorie::where('designation', $validatedData['categorie'])->first();
        $Produit->categories_id = $categorie->id;

        $Produit->prix_vente = $validatedData['prix'];
        $Produit->unite_mesure = $validatedData['unite'];
        $Produit->quantite_stock = $validatedData['stock'];
        if ($request->hasFile('photo')) {
            $nom_photo = $request->file('photo');
            $cheminSource = $nom_photo->getClientOriginalName();
            $chemindest = base_path() . '/public/assets-0/img/products/';
            $nom_photo->move($chemindest, $cheminSource);
            $Produit->photo = $nom_photo->getClientOriginalName();
        } else {
            return redirect()->back()->with('error', 'La photo de produit est obligatoire.');
        }
        $Produit->description = $validatedData['description'];
        $Produit->save();
        return redirect()->back()->with('success', 'Le produit a été ajouté avec succès.');
    }
    public function supprimer(Request $request)
    {
        Produit::find($request->input(('id')))->delete();
        return redirect()->back()->with('success', 'Le produit a été supprimé avec succès.');
    }
    public function showEditProduct(Request $request)
    {
        if (session('admin')) {
            $produit = Produit::find($request->input(('id')));
            $categories = Categorie::get();
            return view('dashboard.editProductForm', compact('produit', 'categories'));
        } else {
            return view('dashboard.dash-log-in');
        }
    }
    public function modifier(Request $request)
    {

        $validatedData = $request->validate([
            'designation' => 'required|string|max:50',  // Required, must be a string, max length of 255 characters |unique:produits,designation
            'categorie' => 'required|exists:categories,designation',  // Required, must exist in the 'categories' table (id column)
            'prix' => 'required|numeric|min:10',  // Required, must be numeric, minimum value of 0
            'unite' => 'required|string|max:50',  // Required, must be a string, max length of 50 characters
            'stock' => 'required|integer|min:0',  // Required, must be an integer, minimum value of 0
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // Optional (nullable), must be an image with specific formats, max size 2MB
            'description' => 'required|string|max:255'
        ]);

        $Produit = Produit::find($request->input(('id')));

        $Produit->designation = $validatedData['designation'];

        $categorie = Categorie::where('designation', $validatedData['categorie'])->first();
        $Produit->categories_id = $categorie->id;

        $Produit->prix_vente = $validatedData['prix'];
        $Produit->unite_mesure = $validatedData['unite'];
        $Produit->quantite_stock = $validatedData['stock'];
        if ($request->hasFile('photo')) {
            $nom_photo = $request->file('photo');
            $cheminSource = $nom_photo->getClientOriginalName();
            $chemindest = base_path() . '/public/assets-0/img/products/';
            $nom_photo->move($chemindest, $cheminSource);
            $Produit->photo = $nom_photo->getClientOriginalName();
        }
        $Produit->description = $validatedData['description'];
        $Produit->save();
        return redirect()->back()->with('success', 'Le produit a été modifié avec succès.');
    }
}
