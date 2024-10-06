<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view ('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required|min:3']);

        Category::create([
            'name' => $request->get('name')
        ]);
        return redirect()->back()->with('message', 'Kategori berhasil di buat');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['name'=>'required|min:3']);

        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->save();
        return redirect()->route('category.index')->with('message', 'Kategori berhasil di update');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Kategori berhasli di hapus');
    }
}
?>