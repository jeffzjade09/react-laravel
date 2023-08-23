<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
       // return view('products.index'); //the reason why it is name products.index, under views folder the folder name is 'products' and the file under the folder is 'index'

        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }


    //Display the Create page
    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        //dd($request); display the request data of create.blade form
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        //catch error if theres any 
        try {
            $newProduct = Product::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        //redirect to the index page
        return redirect(route('product.index'));
    }


    //display the specific product in blade
    public function edit(Product $product){
       return view('products.edit', ['product' => $product]);
    }


    //update records in database and then redirect to page index
    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success','Product Successfully Updated');
    }

    public function delete(Product $product){
        $product->delete();

        return redirect(route('product.index'))->with('success','Product deleted Succesfully');
    }
}
