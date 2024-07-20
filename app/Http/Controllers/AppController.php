<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Toy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        $toys = Toy::take(16)->orderBy('price', 'desc')->get();
        return view('index', compact('toys'));
    }

    public function item()
    {
        $toys = Toy::paginate(20);
        return view('nav.item', compact('toys'));
    }

    public function about()
    {
        return view('nav.about');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function admin()
    {
        $toys = Toy::all();
        $categories = Category::all();
        return view('admin.index', compact(['toys', 'categories']));
    }

    public function filter(Category $category)
    {
        if ($category->id)
            $toys = Toy::where("category_id", $category->id)->get();
        else
            $toys = Toy::all();
        $categories = Category::all();
        return view('admin.index', compact(['toys', 'categories']));
    }

    public function userLogin(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            $request->session()->regenerate();
            if (Auth::user()->name == "admin") {
                return redirect()->route('admin.home');
            }
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors([
            'error' => 'Invalid Credentials!'
        ]);
    }

    public function userRegister(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $toys = Toy::where("name", "like", "%$keyword%")->get();
        return view('index', compact('toys'));
    }
}
