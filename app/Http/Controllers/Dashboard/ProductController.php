<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $product = new Product();

        $product->code = $code = generateRandomCode("product");
        $product->name = $request->name;
        $product->price = $request->price;
        $product->points_price = $request->points_price;
        $product->discount_price = $request->discount_price;
        $product->description = $request->description;
        $product->size_one_stock = $request->size_one_stock;
        $product->size_two_stock = $request->size_two_stock;
        $product->category_id = $request->category_id;
        $product->featured = $request->featured ? 1 : 0;
        $product->image = upload($request->image, "products/" . $code);

        if ($product->save()) {
            foreach ($request->gallery as $single) {
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => upload($single, "products/" . $product->code),
                ]);
            }
            return redirect('/admin/products')->with('message', 'Product created successfully.');
        } else return redirect()->back()->with('error', 'Error creating product.');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->points_price = $request->points_price;
        $product->discount_price = $request->discount_price ?? null;
        $product->description = $request->description;
        $product->featured = $request->featured ? 1 : 0;
        $product->size_one_stock = $request->size_one_stock;
        $product->size_two_stock = $request->size_two_stock;
        $product->category_id = $request->category_id;
        $product->image = $request->image ? upload($request->image, "products/" . $product->code) : $product->image;

        if ($request->gallery) {
            foreach ($request->gallery as $single) {
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => upload($single, "products/" . $product->code),
                ]);
            }
        }

        if ($product->save()) return redirect('/admin/products')->with('message', 'Product updated successfully.');
        else return redirect()->back()->with('error', 'Error updating product.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->delete()) return redirect()->back()->with('message', 'Product deleted successfully.');
        else return redirect()->back()->with('error', 'Error deleting product.');
    }

    public function delete_gallery_item()
    {
        $item = request('item_id');
        if (!$item) return redirect()->back();
        $found = ProductGallery::findOrFail($item);
        if (!$found) return redirect()->back();
        if ($found->delete()) {
            return redirect()->back()->with('message', 'Image deleted');
        } else return redirect()->back()->with('error', 'Error deleting image.');
    }
}
