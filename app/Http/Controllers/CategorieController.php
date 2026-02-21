<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function showAddProduct(Request $request)
    {
        if (session('admin')) {
            $categories = Categorie::get();
            return view('dashboard.addProductForm', compact('categories'));
        } else {
            return view('dashboard.dash-log-in');
        }
    }
    public function listeCategories()
    {
        if (session('admin')) {
            $categories = Categorie::paginate(5);
            return view('dashboard.categories', compact('categories'));
        } else {
            return view('dashboard.dash-log-in');
        }
    }
    public function supprimer(Request $request)
    {
        Categorie::find($request->input(('id')))->delete();
        return redirect()->back()->with('success', 'La categorie a été supprimé avec succès.');
    }
    public function modifier(Request $request)
    {
        $validatedData = $request->validate([
            'designation' => 'required|string|max:50|unique:categories,designation',
            'description' => 'required|string|max:255'
        ]);

        $categorie = Categorie::find($request->input(('id')));

        $categorie->designation = $validatedData['designation'];
        $categorie->description = $validatedData['description'];

        $categorie->save();
        return redirect()->back()->with('success', 'La categorie a été modifié avec succès.');
    }

    public function ajouter(Request $request)
    {
        $validatedData = $request->validate([
            'designation-0' => 'required|string|max:50|unique:categories,designation',
            'description-0' => 'required|string|max:255'
        ]);

        $categorie = new Categorie();

        $categorie->designation = $validatedData['designation-0'];
        $categorie->description = $validatedData['description-0'];

        $categorie->save();
        return redirect()->back()->with('success', 'La categorie a été ajouté avec succès.');
    }
}
