<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ingredients;

class IngredientController extends Controller
{
    public function view()
    {
        return view('ingredient.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ingredients,name',
            'description' => 'required|string|max:1000'
        ]);

        ingredients::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('ingredients')->with('success', 'Ингредиент добавлен!');

    }
}
