<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

use App\supplier;

use DB;
class productController extends Controller
{
  public function store(Request $request)
{
    $validatedData = $request->validate([
      'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);
}

  public function index2()
  {
     return view('supplierpages.addProduct');
  }

   //add order
   public function StoreProduct(Request $request){
    $id=Auth::user()->id;
  $p1 = new Product();
      $p1->id = $request->id;
      $p1->productName = $request->productName ;
      $p1->description = $request->description ;

      $name=addslashes($_FILES['image']['name']);
      $p1->product_image_name=$name;

      $image=addslashes($_FILES['image']['tmp_name']);
      $image=file_get_contents($image);
      $image=base64_encode($image);
      $p1->product_image = $image;

      $p1->supplierID = Auth::user()->id; 

    $p1->save();


return  redirect('addProduct')->with('message','Add new Product..');

}

public function updateProduct(Request $request){
 
  $p1 = new Product();
 

  $p1->supplierID = Auth::user()->id; 

$p1->save();


return  redirect('addProduct')->with('message','Update the Product..');
}
public function deleteProduct(Request $request){
 
  $p1 = new Product();
  
  $id=Auth::user()->id;
      $product=Product::find($request);
      $product->delete();

return  redirect('addProduct')->with('message','Delete the Product..');
}

}