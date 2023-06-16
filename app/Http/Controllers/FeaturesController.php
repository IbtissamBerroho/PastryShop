<?php

namespace App\Http\Controllers;

use App\Models\Features;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{

    public function index(Request $request)
    {
        $features = Features::all();
        $title = "all features";
        if($request->categorieSideBar == "Cookies"){
            $features = Features::where('categorie', "Cookies")->get();
            $title = "Cookies";
        }
        elseif($request->categorieSideBar == "bread" ){
            $features = Features::where('categorie', "bread")->get();
            $title = "Bread";
        }
        elseif($request->categorieSideBar == "Croissant"){
            $features = Features::where('categorie', "Croissant")->get();
            $title = "Croissants";
        }
        elseif($request->categorieSideBar == "Pancakes"){
            $features = Features::where('categorie', "Pancakes")->get();
            $title = "Pancakes";
        }
        elseif($request->categorieSideBar == "Cake" ){
            $features = Features::where('categorie', "Cakes")->get();
            $title = "Cakes";
        }
        elseif($request->categorieSideBar == "all"){
            $features = Features::all();
            $title = "Features";
        }
        elseif($request->search != null ){
            $title = $request->search;
            $features = Features::where('nom', $request->search)->get();
        }

        return view('Features.allFeatures', [
            'features' => $features,
            'title'=> $title
        ]);
    }

    public function create()
    {
        return view('Features.AddFeature');
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

        $features = new Features();
        $features->nom = $request->nom;
        $features->recette = $request->recette;
        $features->categorie = $request->categorie;
        $features->prix = $request->prix;
        $features->photo = $path;

        $features->save();

        return redirect('/features/')->with('message','added successfuly');
    }

    public function show()
    {
        return 'blablablablablablabl';
    }

    public function edit($id)
    {
        $feature = Features::find($id);
        return view('Features.EditFeature', [
            'feature' => $feature,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'=> 'required',
            'recette'=> 'required',
            'categorie'=> 'required',
            'prix'=> 'required',
        ]);
        $features = Features::findOrFail($id);
        if($request->hasFile('photo')){
            if($features->photo){
                $path = public_path('storage/'.$features->photo);
                if($path){
                    unlink($path);
                }
            }
        }
        $features->nom = $request->nom;
        $features->recette = $request->recette;
        $features->categorie = $request->categorie;
        $features->prix = $request->prix;
        $features->photo = $request->file('photo')->store('images', 'public');
        $features->save();

        return redirect('/features/')->with('message','updated successfuly');
    }

    public function destroy($id)
    {
        $p = Features::FindorFail($id);
        unlink(public_path('storage/'.$p->photo));
        $p->delete();
        return redirect('/features/')->with('message','deleted successfuly');
    }
}
