<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\ProduitController;
use App\Http\Middleware\PreventBackHistory;
use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Historique;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {return view('basicEmail');});
Route::group(['middleware' => PreventBackHistory::class], function() {
Route::get('/dashboard', [AdminController::class,'pageLogin']);
Route::get('/listeProduits', [ProduitController::class,'listeProduits']);
Route::post('/ajouterProduit', [ProduitController::class,'ajouter']);
Route::get('/addProductForm', [CategorieController::class,'showAddProduct']);
Route::get('/supprimerProduit', [ProduitController::class,'supprimer']);
Route::get('/editProductForm', [ProduitController::class,'showEditProduct']);
Route::post('/modifierProduit', [ProduitController::class,'modifier']);
Route::get('/listeCategories', [CategorieController::class,'listeCategories']);
Route::get('/supprimerCategorie', [CategorieController::class,'supprimer']);
Route::post('/modifierCategorie', [CategorieController::class,'modifier']);
Route::post('/ajouterCategorie', [CategorieController::class,'ajouter']);
Route::post('/seconnecter', [AdminController::class,'seconnecter']);
Route::get('/dashDeconnection', [AdminController::class,'deconnecter']);
Route::get('/listeClients', [ClientController::class,'listeClients']);
Route::get('/detailClient', [ClientController::class,'detailClient']);
Route::get('/detailCommandes', [ClientController::class,'detailCommandes']);
Route::get('/supprimerClient', [ClientController::class,'supprimer']);
Route::get('/listeCommandes', [HistoriqueController::class,'listeCommandes']);
Route::get('/', [ProduitController::class,'index_produits']);
Route::get('/index', [ProduitController::class,'index_produits']);
Route::get('/afficher_produit',[ProduitController::class,'produit']);
Route::get('/search', [ProduitController::class,'chercherProduit']);
Route::post('/ajouter_cart', [ProduitController::class, 'addToCart']);
Route::get('/supprimer_cart',[ProduitController::class,'removeFromCart']);
Route::post('/update_cart',[ProduitController::class,'updateCart']);
Route::post('/ajouter_client',[ClientController::class,'addClient']);
Route::post('/authentifier',[ClientController::class,'seConnecter']);
Route::post('/ajouter_commande',[CommandeController::class,'Enregistrer']);
Route::get('/log-in', function(){return view('log-in');});
Route::get('/log-out', [ClientController::class,'deconnecter']);
Route::get('/profile', [ClientController::class,'backToLogin']);
Route::get('/log-in', [ClientController::class,'backToLogin']);
Route::post('/update_password', [ClientController::class,'Enregistrer_password']);
Route::post('/update_profile', [ClientController::class,'Enregistrer_profile']);
Route::post('/update_contact', [ClientController::class,'Enregistrer_contact']);
Route::post('/contactez', [ClientController::class,'envoyer']);
Route::get('/about', function(){return view('about');});
Route::get('/contact', function(){return view('contact');});
Route::get('/shop', [ProduitController::class,'shopProducts']);
Route::get('/cart', function(){return view('cart');});
Route::get('/checkout', function () {return view('checkout');});
Route::get('/checkout/verifier', [CommandeController::class, 'verifier']);
Route::post('/viderPanier', [ProduitController::class,'clearCart']);
Route::get('/single-product', function(){return view('single-product');});

Route::get('/test', function () {
    return response()->json([
        'cartCount' => count(session('cart', []))
    ]);
});
Route::post('/chat', [AIController::class, 'chat'])->middleware('throttle:30,1');

Route::get('/debug-db', function () {
    return [
        'host' => env('DB_HOST'),
        'port' => env('DB_PORT'),
        'db'   => env('DB_DATABASE'),
        'user' => env('DB_USERNAME'),
    ];
});
});


