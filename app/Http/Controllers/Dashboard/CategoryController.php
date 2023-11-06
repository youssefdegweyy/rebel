<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        if (Category::create($request->all())) return redirect('admin/categories')->with('message', 'Category created successfully.');
        else return redirect()->back()->with('error', 'Error creating category.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);

        if ($category->update($request->all())) return redirect('admin/categories')->with('message', 'Category updated successfully.');
        else return redirect()->back()->with('error', 'Error updating category.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->delete()) return redirect()->back()->with('message', 'Category deleted successfully.');
        else return redirect()->back()->with('error', 'Error deleting category.');
    }
}
