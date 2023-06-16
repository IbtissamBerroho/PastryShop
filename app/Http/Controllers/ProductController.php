<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        if($request->categorieSideBar == "Cookies"){
            $allproducts = Product::where('categorie', "Cookies")->get();
            $title = "All Cookies";
        }
        elseif( $request->categorieSideBar == "bread"){
            // dd($request->categorieSideBar);
            $allproducts = Product::where('categorie', 'bread')->get();
            $title = "All Bread";
        }
        elseif( $request->categorieSideBar == "Croissant"){
            $allproducts = Product::where('categorie', 'Croissant')->get();
            $title = "All Croissant";
        }
        elseif( $request->categorieSideBar == "Pancakes"){
            $allproducts = Product::where('categorie', 'Pancakes')->get();
            $title = "All Pancakes";
        }
        elseif( $request->categorieSideBar == "all"){
            $allproducts = Product::all();
            $title = "All Products";
        }
        elseif( $request->search != null){
            $allproducts = Product::where("nom", $request->search)->get();
            $title = $request->search;
        }
        elseif ($request->categorieSideBar == null){
            $allproducts = Product::all();
            $title = "All Products";
        }
        // $products =  Product::Paginate(3);
        $cookProducts = Product::where('categorie', 'Cookies');
        $breadProducts = Product::where('categorie', 'bread')->get();
        $pancProducts = Product::where('categorie', 'Pancakes')->get();
        $croiProducts = Product::where('categorie', 'Croissant')->get();
        return view('Products.AllProducts', [
            'title' => $title,
            'allproducts' => $allproducts,
            'cookProducts' => $cookProducts,
            'breadProducts' => $breadProducts,
            'pancProducts' => $pancProducts,
            'croiProducts' => $croiProducts
        ]);
    }
    public function aff(Request $request){

    }

    public function create()
    {
        return view('products.AddProduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'=> 'required',
            'recette'=> 'required',
            'categorie'=> 'required',
            'prix'=> 'required',
            'photo'=> 'required|image|mimes:png,jpg',
        ]);

        $path = $request->file('photo')->store('images', 'public');

        $products = new Product();
        $products->nom = $request->nom;
        $products->recette = $request->recette;
        $products->categorie = $request->categorie;
        $products->prix = $request->prix;
        $products->photo = $path;

        $products->save();

        return redirect('/products/')->with('message','added successfuly');

    }
    public function show()
    {
        $Trasheds = Product::onlyTrashed()->get();
        // return $Trasheds;
        return view('Products.ProductsTrached', compact('Trasheds', $Trasheds));
    }

    public function edit($id)
    {
        $prd = Product::findOrFail($id);
        return view('Products.EditProduct', [
            'product' => $prd
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'=> 'required',
            'recette'=> 'required',
            'categorie'=> 'required',
            'prix'=> 'required',
            'photo'=> 'required|image|mimes:png,jpg|max:2048',
        ]);
        $produit = Product::findOrFail($id);
        if($request->hasFile('photo')){
            if($produit->photo){
                $path = public_path('storage/'.$produit->photo);
                unlink($path);
            }
        }
        $produit->nom = $request->nom;
        $produit->recette = $request->recette;
        $produit->categorie = $request->categorie;
        $produit->prix = $request->prix;
        $produit->photo = $request->file('photo')->store('images', 'public');
        $produit->save();
        return redirect('/products/')->with('message', 'updated successfully');
    }
    public function restore($id){
        Product::withTrashed()
        ->where('id', $id)
        ->restore();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $p = Product::FindorFail($id);
        // unlink(public_path('storage/'.$p->photo));
        $p->delete();
        return redirect('/products/')->with('message','deleted successfuly');
    }
}
