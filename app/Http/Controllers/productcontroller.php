<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use App\Models\Category;
use App\Models\products;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function index(){
        $products = products::all();
        $cart = cart::select("product_id")->where('user', auth()->id())->first();
        $cart = json_decode($cart['product_id']);
        return view("products.index",compact("products","cart"));
    }

    public function create(){
        $categories = Category::all();
        return view("products.create",compact("categories"));
    }

    public function store(Request $request){
        try{   
        $data = $request->all();
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        
        if($data['image']){
            $image = $data['image'];
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/products/'),$imageName);

            $data['image'] = '/assets/products/'.$imageName;
        }
        products::create($data);
        return redirect()->route('products.index');
    }catch(\Exception $e){
        $errors = $e->getMessage();
        return redirect()->back()->with(["errors"=>$errors]);
    }
  }

  public function show($huid){
    $data = products::findOrFail($huid);
    return view('products.show',['products' => $data]);
}

public function edit($id){
    $data = products::findOrFail($id);
    $categories = Category::all();
    return view('products.edit',['products' => $data,'categories' => $categories]);
}

 public function update(Request $request,$id){
    $form_data = $request->all();
    if($form_data['image']){
        $image = $form_data['image'];
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/assets/products/'),$imageName);

        $form_data['image'] = '/assets/products/'.$imageName;
    }
    $data = products::findOrFail($id);
    $data->update($form_data);
    $data->save();
    return redirect()->route('index');
}

public function delete($id){
    $data = products::findOrFail($id);
    $data->delete();
    return redirect()->back();
}

public function products($id)
{
    $data = products::where('category_id','=', $id)->get();
    return view('products.products_list',['data'=> $data]);
}

}

