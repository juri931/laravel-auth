<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = Category::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.categories.index')->with('error', 'Categoria già esistente');
        }else{
            $new = new Category();
            $new->name = $request->name;
            $new->slug = Helper::generateSlug($new->name, Category::class);
            $new->save();

            return redirect()->route('admin.categories.index')->with('success', 'Categoria creata correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:20',
        ],[
            'name.required' => 'Il nome della categoria è obbligatorio',
            'name.min' => 'Il nome della categoria deve avere almeno 2 caratteri',
            'name.max' => 'Il nome della categoria deve avere al massimo 20 caratteri',
        ]);

        $exists = Category::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.categories.index')->with('error', 'Categoria già esistente');
        }else{
            $val_data['slug'] = Helper::generateSlug($request->name, Category::class);
            $category->update($val_data);

            return redirect()->route('admin.categories.index')->with('success', 'Categoria creata correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}