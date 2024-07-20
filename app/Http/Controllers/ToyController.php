<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Toy;
use Illuminate\Http\Request;

class ToyController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.toy.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $imgName = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path("img"), $imgName);

        Toy::create([
            'image' => $imgName,
            'name' => $request->input('name'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
        return redirect()->route('admin.home');
    }

    public function detail(Toy $toy)
    {
        return view('admin.toy.detail', compact('toy'));
    }

    public function delete(Toy $toy)
    {
        $toy->delete();
        return redirect()->route('admin.home');
    }

    public function edit(Toy $toy)
    {
        $categories = Category::all();
        return view('admin.toy.edit', compact(['toy', 'categories']));
    }

    public function update(Request $request, Toy $toy)
    {
        $toy->update([
            "name" => $request->input('name'),
            "category" => $request->input('category'),
            "description" => $request->input('description'),
            "price" => $request->input('price'),
        ]);
        $toy->save();
        return redirect()->route('admin.home');
    }

    public function order(Toy $toy)
    {
        $toy_id = $toy->id;
        $cart = session()->get('cart', []);
        if (isset($cart[$toy_id])){
            $cart[$toy_id]["quantity"]++;
        } else {
            $cart[$toy_id] = [
                "name" => $toy->name,
                "image" => $toy->image,
                "category" => $toy->category->name,
                "price" => $toy->price,
                "quantity" => 1,
            ];
        }
        session()->put('cart', $cart);
        // dd($toy_id);
        return redirect()->route('checkout');
    }
}
