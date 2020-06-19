<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Customer;
use App\User;
use DB;
class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
      $this->middleware('auth',['except' =>['customerReg','addCustomer','customerdash']]);
    }


    public function customerReg()
    {
       return view('customerpages.customer');
    }

 
    public function addCustomer(Request $request){
      //dd($request->all());
     
        $x1 = new User();
        $x1->name = $request->name;
        //$x1->nic = $request->nic;
        $x1->password =  bcrypt($request->password);
        $x1->category = $request->category;
        $x1->email = $request->email;
       $x1->save();
       $customerId = $x1->id;
       //return $customerId;
 
        $u1 = new Customer;
        
              $u1->id = $request->id;
              $u1->customerId = $customerId;
              $u1->companyname = $request->companyname;
              $u1->name = $request->name;
              $u1->nic = $request->nic;
              $u1->phoneNo = $request->phoneNo;
              $u1->email = $request->email;
              $u1->regNo = $request->regNo;
             // $u1->accountNo = $request->accountNo;
              $u1->address = $request->address;
              $u1->homeTown = $request->homeTown ;
             
              $name=addslashes($_FILES['image']['name']);
              $u1->image=$name;

              $image=addslashes($_FILES['image']['tmp_name']);
              $image=file_get_contents($image);
              $image=base64_encode($image);
              $u1->image = $image;
              $Customer ="Customer";
              //$u1->category = $Customer  ;        
              $u1->save();

              return view('homepage');    
       //return  view('homepage')->with('message','You are registered successfully..');
       
    }
    
     
         public function getProfile(){
            return view('customerpages.customerProfile');
         } 

       public function displayProfileCus(){
        $id=Auth::user()->id;
        $category='Customer';
        $category=DB::table('customers')->where('customerId' ,'=',$id)->where('category','=',$category)->get();

         if($category=="Supplier"){
          return view('home');
              
        }
          else{
       
             $customers=DB::select("select* from customers where customerId='$id' and category='$category' ");
         
             $customers = Customer::get();
     
             return view('customerpages.customerProfile',['customers'=>$customers]);
          }

        }


       public function edit($id){
            $customer = Customer::find($id);
           
            return view('customerpages.edit',['customer'=>$customer]);
       }

       public function update(Request $request,$id){
         
        $u1 = Customer::find($id);

            
              $u1->phoneNo = $request->phoneNo;
              $u1->email = $request->email;
              $u1->accountNo = $request->accountNo;
              //$u1->image = $request->image;

              $u1->save();
                      
       return  redirect('customerProfile')->with('message','Your Profile is successfully Updated...');
       }


     //****************************************Hansana******************************************* */

    public function orders(){
        $title='customer-Orders';
        return view('customerpages.orders')->with('title',$title);
    }

    
}
