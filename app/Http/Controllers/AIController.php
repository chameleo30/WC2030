<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Produit;

class AIController extends Controller
{
    private string $gpt4allUrl = 'http://127.0.0.1:5005/chat';

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $message = $request->input('message');

        // 1. Chercher les produits pertinents dans la table `produits`
        $produits = $this->searchProduits($message);

        // 2. Formater pour l'IA
        $produitsContext = $produits->map(fn($p) => [
            'name'  => $p->designation,
            'price' => $p->prix_vente . ' MAD',
            'unit'  => $p->unite_mesure,
            'stock' => $p->quantite_stock,
            'image' => asset('assets-0/img/products/' . $p->photo), // ← adapter ici
            'url'   => url('afficher_produit?id_produit='.$p->id),
        ])->toArray();

        // 3. Appeler GPT4All Flask
        try {
            $response = Http::timeout(120)->post($this->gpt4allUrl, [
                'message'  => $message,
                'products' => $produitsContext,
            ]);

            $reply = $response->json('reply') ?? 'Désolé, je n\'ai pas pu répondre.';

        } catch (\Exception $e) {
            $reply = 'Le service IA est indisponible. Contactez-nous au +212 6XX XXX XXX.';
        }

        return response()->json([
            'reply'    => $reply,
            'products' => $produitsContext,
        ]);
    }

    private function searchProduits(string $message)
    {
        // Extraire les mots-clés du message (> 2 caractères)
        $keywords = array_filter(
            preg_split('/\s+/', strtolower($message)),
            fn($k) => strlen($k) > 2
        );

        return Produit::where(function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $query->orWhere('designation', 'LIKE', "%{$keyword}%")
                          ->orWhere('description', 'LIKE', "%{$keyword}%");
                }
            })
            ->where('quantite_stock', '>', 0)    // Uniquement en stock
            ->orderBy('quantite_stock', 'desc')   // Les plus disponibles en premier
            ->limit(3)
            ->get();
    }
}