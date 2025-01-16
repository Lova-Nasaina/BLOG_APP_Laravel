<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Session;

class PageController extends Controller
{

    public function deleteproduct($id){
        $element = Product::find($id);
        $element->delete();

        return redirect('/service')->with('success', 'Element supprimer avec succès');
    }

    public function saveModifProduct(Request $request, $id){

        print("identifiant : ".$id);
        $produit = Product::find($id);


        // if($produit){
        // print("data : ".$request->id." et ".$request->product_name." et ". $request->product_price);
        // $data = array();

        // $data['product_name'] = $request->product_name;
        // $data['product_price'] = $request->product_price;
        // $data['description'] = $request->description;

        // DB::table('products')
        //     ->where('id', $request->id)
        //     ->update($data);

        $produit->product_name = $request->product_name;
        $produit->product_price = $request->product_price;
        $produit->description = $request->description;
        $produit->update();

        // session(['message'=> 'Les produits '.$request->product_name.'a été modifier avec succès']);

        return redirect("/service")->with('success', 'Les Modification ont été apporté avec succès');
    }


    public function editproduct($id){

        $produit = Product::find($id);

        return view("page.editProduct")->with('produit', $produit);
    }


    public function service(){

    // UTILISATION DE LARAVEL QUERY BUILLDER pour Recuperé les Données
       /* $produits = DB::table('products')
                        ->paginate(1);
                        // ->get();
        return view("page.service")->with('produits', $produits); */

    // UTILISATION DE LARAVAL HELLO COINTS
    $produits = Product::orderBy('product_name', 'desc')
                                ->get();

    return view('page.service')->with('produits', $produits);

    }

    public function show($id){
        $produit = Product::find($id);
        // $produit = DB::table('products')
        //                 ->where('id', $id)
        //                 ->first();
        return view('page.show')->with('produit', $produit);
    }

    public function createproduct(){
        return view('page.create', ['user' => Auth::user()]);
    }

    public function saveproduct(Request $request){

        print('données :' . $request->product_name .' '. $request->product_price .' '.$request->description);
        print('données :' . $request->user_id.'  '. $request->product_image  );

        // $produit = new Product();

        // $produit->product_name = $request->product_name;
        // $produit->product_price = $request->product_price;
        // $produit->description = $request->description;

        // $produit->save();

        // AUTRE METHODE D'INSERTION DES DONNEES
        $data = array();

        $imageName = time() . '.' . $request->product_image->extension();
        $request->product_image->move(public_path('images/profiles'), $imageName);


        $data['user_id'] = $request->user_id;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['description'] = $request->description;
        $data['photos'] = $imageName;

        DB::table('products')
            ->insert($data);
        $data_insert = TRUE;

        if ($data_insert){
                return redirect(route("home"))->with("success","Produit publier avec succès");
            }

        return redirect("/createproduct")->with("error", "Produit non publier");

        // // Session::put('message', 'Les produits '.$request->product_name.'a été inseré avec succès');
        // session(['message'=> 'Les produits '.$request->product_name.'a été inseré avec succès']);
        // return redirect("/createproduct");
    }

}
