<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Ingredient;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    // public function show(Product $product)
    // {
    //     return view('products.show', compact('product'));
    // }

    public function create()
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view('products.create', compact('categories', 'ingredients'));
    }

    public function store()
    {
        $this->validateProduct();

        Product::create([
            'category_id' => request('category_id')[0],
            'name' => request('name')
        ])->ingredients()->attach(request('ingredients_id'));

        return redirect(route('index.product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view('products.edit', compact('product', 'categories', 'ingredients'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validateProduct();
        // dd($request->ingredients_id);

        // $product->name = request('name');
        // $product->category_id = request('category_id');

        $product->update($request->except('ingredients_id'));
        $product->ingredients()->sync($request->ingredients_id);

        return redirect(route('index.product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }

    protected function validateProduct(): array
    {
        return request()->validate([
            'category_id' => 'required',
            // 'ingredients_id' => 'required',
            'name' => 'required'
        ]);
    }
}
