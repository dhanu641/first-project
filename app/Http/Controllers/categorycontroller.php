<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function index(){
        $category = Category::all();
        return view("category.index",compact("category"));
    }
    public function store(Request $request){
        try{
        $data = $request->all();
        if($data['image']){
            $image = $data['image'];
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/category/'),$imageName);

            $data['image'] = '/assets/category/'.$imageName;
        }
        Category::create($data);
        return redirect()->route('home');
    }catch(\Exception $e){
        $errors = $e->getMessage();
        return redirect()->back()->with(["errors"=>$errors]);
    }
  }

  public function show($huid){
    $data = category::findOrFail($huid);
    return view('category.show',['category' => $data]);
}

public function edit($id){
    $data = category::findOrFail($id);
    return view('category.edit',['category' => $data]);
}

public function update(Request $request,$id){
    $form_data = $request->all();
    if($form_data['image']){
        $image = $form_data['image'];
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/assets/category/'),$imageName);

        $form_data['image'] = '/assets/category/'.$imageName;
    }
    $data = category::findOrFail($id);
    $data->update($form_data);
    $data->save();
    return redirect()->route('index');
} 

public function delete($id)
{
    $data = category::findOrFail($id);
    $data->delete();
    // return redirect()->back();
    return response()->json(['success'=> true]);
}
}
