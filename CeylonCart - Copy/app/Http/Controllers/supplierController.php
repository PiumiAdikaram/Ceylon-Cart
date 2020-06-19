<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\supplier;
use App\User;
use App\Product;
use DB;


class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //*****************************************piumi**************************************** */
    public function __construct()
    {
     $this->middleware('auth',['except' =>['supplierReg','addSupplier','supplierdash']]);
    }

    public function supplierReg()
    {
       return view('supplierpages.supplier');
    }

    public function supdash()
    {
         return view('supplierpages.supplierdash');
     
    }


    public function addSupplier(Request $request){
        $y1 = new User();
        $y1->name = $request->name;
       // $y1->nic = $request->nic;
        $y1->password =  bcrypt($request->password);
        $y1->category = $request->category;
        $y1->email = $request->email;
        $y1->save();
        $supplierId = $y1->id;
              
          $u1 = new supplier;
           $u1->id = $request->id;
           $u1->supplierId = $supplierId;
          $u1->farmName = $request->farmname;
          $u1->name = $request->name;
          $u1->nic = $request->nic;
          $u1->phoneNo = $request->phoneNo;
          $u1->email = $request->email;
          $u1->farmRegNo = $request->farmRegNo;
          $u1->accountNo = $request->accountNo;
          $u1->address = $request->address;
          $u1->homeTown = $request->homeTown ;
          //$u1->location = $request->location ;
         
         // $u1->rating = $request->rating ;
         $name=addslashes($_FILES['image']['name']);
         $u1->image=$name;

         $image=addslashes($_FILES['image']['tmp_name']);
         $image=file_get_contents($image);
         $image=base64_encode($image);
         $u1->image = $image;
         $u1->supplier_description = $request->description ;
         $Supplier ="Supplier";

         //$u1->category =  $Supplier ;   
          $u1->save();

          return view('supplierpages.supplierdash');
      // return  redirect('supplierdash')->with('message','You are registered successfully..');
    }

    public function getProfile(){
        return view('supplierpages.supplierProfile');
     } 

   public function displayProfileSup(){
        $id=Auth::user()->id;
        $category='Supplier';
        $category=DB::table('suppliers')->where('supplierId' ,'=',$id)->where('category','=',$category)->get();
    
        if($category=="Customer"){
        return view('home');
        
        }
        else{
    
            $suppliers=DB::select("select* from suppliers where supplierId='$id' and category='$category' ");
            $suppliers = supplier::get();
            
            return view('supplierpages.supplierProfile',['suppliers'=>$suppliers]);
        }
    }
         
    public function edit(){
        $id=Auth::user()->id;
        $supplier = supplier::find($id);
        return view('supplierpages.edit2',['supplier'=>$supplier]);
    }

   public function update(Request $request,$id){
     
        $u1 = supplier::find($id);

          $u1->email = $request->email;
          $u1->accountNo = $request->accountNo;
                     
      
          // $u1->image = $request->image;

          $u1->save();
          return  redirect('supplierProfile')->with('message','Your Profile is successfully Updated...');
   }

   public function index2()
   {
      return view('supplierpages.addProduct');
   }


//************************************************************************** */


    //**************************** hansana********************************** */
    public function vieworders($id){
        $customerID=$id;
        $title="Customer - view Orders";
        $cutomerData=DB::select("select name from customers where customerId='$customerID' limit 1 ");
        //$orderData=DB::select("select * from orders where customer_number='$customerID'");
        //return $customerID;
        $orderData=DB::table('productimages')->join('orders','orders.product_id','=','productimages.id')->select('orders.id','productimagename','customer_id','quantity','price','order_number','image')->where('customer_id','=',$customerID)->get();
       //return $orderData;
        return view('customerpages.vieworder',compact('customerID'))->with('title',$title)->with('orderData',$orderData)->with('cutomerData',$cutomerData);
       //return view('supplierpages.orders')->with('title',$title)->with('customerID',$customerID)->with('orderData',$orderData)->with('cutomerData',$cutomerData);
    }

    public function viewmyorders($id){ //id.>> orderRefNo
        $title="Supplier - My order";
       // $supplier_Id=5;
       $supplier_Id=Auth::user()->id;
        //$reservedData=DB::select("select* from reserved where order_number='$id'");
        //$reservedData=DB::select("select* from orders left join reserves on reserves.order_Id=orders.id where order_refNo ='$id' and supplier_Id='$supplier_Id'");
        //$reservedData=DB::table('orders')->join('reserves','reserves.order_Id','=','orders.id')->join('productimages','productimages.id','=','orders.product_id')->select('*')->where('supplier_Id','=',$supplier_Id)->where('reserves.order_refNo','=',$id)->get();
        $reservedData=DB::table('orders')->join('reserves','reserves.order_Id','=','orders.id')->join('productimages','productimages.id','=','orders.product_id')->select('productimagename','image','quantity','reserves.id as r_id','reserved_quantity','order_Id','price','reserved_quantity','orders.created_at as o_created_at','reserved_price')->where('supplier_Id','=',$supplier_Id)->where('reserves.order_refNo','=',$id)->get();
        
        //return $reservedData;
        $billData=$reservedData;
        $totalprice=DB::select("SELECT SUM(reserved_price) AS totalprice FROM reserves WHERE order_refNo ='$id' and supplier_Id='$supplier_Id' ");
        //return $totalprice;
        return view('supplierpages.vieworder')->with('title',$title)->with('reservedData',$reservedData)->with('billData',$billData)->with('totalprice',$totalprice);
    }
    //************************************************************************* */
    
//*****************************************udara********************************************* */

public function show($supplierId)
    {
        
                $supplierData=DB::select("select* from suppliers where supplierId='$supplierId' limit 1");
                $productData=DB::select("select* from products where supplierId='$supplierId'");
                /* $commentData=DB::select("select* from comments where supplierId='$supplierId'"); */


                $commentData =DB::table('comments')
                ->join('customers', 'customers.customerId', '=', 'comments.customer_Id')

                ->select('name','customer_Id','comment_body')->where('supplierId','=',$supplierId)->orderBy('comments.created_at','desc')
                ->get();

                return view ('supplier.supplierProfile',compact('supplierId'))->with('supplierData', $supplierData)->with('productData',$productData)->with('commentData', $commentData);


      
    }


//******************************************************************************************** */


}
