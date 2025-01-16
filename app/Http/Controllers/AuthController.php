<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function profilPage(){
        return view("compte.profil", ['user' => Auth::user()]);
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // print("Vous ête déconnectés")
        return redirect("/login");
    }

    public  function home(){
        // $produit = Product::orderBy("id", "desc")->paginate(10);

        $produit = DB::table('products')
            ->join('users', 'products.user_id','=', 'users.id')
            ->select('products.*', 'users.name as user_name')
            ->orderBy('products.id', 'desc')
            ->get();

        return view('page.home', ['user' => Auth::user()])->with('produits', $produit);
    }

    public function login(){
        return view("auth.login");
    }

    public function loginPost(Request $request){
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $data = $request->only("email", "password");
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended(route("home"));
        }

        return redirect(route("login"))->with("error", "Login failed");

    }

    public function register(){
        return view("auth.register");
    }


    public function registerPost(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "photo" => "required"
        ]);

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images/profiles'), $imageName);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->photo = $imageName;
        if ($user->save()){
            return redirect(route("login"))->with("success","User created successfully");
        }

        return redirect("register")->with("error", "Failed to create account");

    }



}
