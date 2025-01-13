<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public  function home(){
        return view('page.home');
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
        return view('page.create');
    }

    public function saveproduct(Request $request){

        // $produit = new Product();

        // $produit->product_name = $request->product_name;
        // $produit->product_price = $request->product_price;
        // $produit->description = $request->description;

        // $produit->save();

        // AUTRE METHODE D'INSERTION DES DONNEES
        $data = array();

        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['description'] = $request->description;

        DB::table('products')
            ->insert($data);



        // Session::put('message', 'Les produits '.$request->product_name.'a été inseré avec succès');
        session(['message'=> 'Les produits '.$request->product_name.'a été inseré avec succès']);
        return redirect("/createproduct");
    }

}
