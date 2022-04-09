<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bnad;
use Image;
use Auth;

class BandController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $images = Bnad::all();
        return view('admin.multipic.index',compact('images'));
    }


    
    public function insert(Request $request){

        $img_name = $request ->file('image');

        // $gen_name = hexdec(uniqid());
        // $img_extnsn = strtolower($img_name-> getClientOriginalExtension());
        // $new_name = $gen_name.'.'.$img_extnsn;
        // $img_lctn = 'images/multipic/';
        // $db_sent = $img_lctn.$new_name;
        // $img_name -> move($img_lctn,$new_name);
        foreach($img_name as $name){
            $gen_name = hexdec(uniqid()).'.'.$name-> getClientOriginalExtension();
        Image::make($name)->resize(300,200)->save('images/multipic/'.$gen_name);
        $db_sent = 'images/multipic/'.$gen_name;
        

        $insertImage = new Bnad;
        $insertImage -> images = $db_sent;
        $insertImage->save();
        }

        
         return Redirect()->back();
        
    }
    public function logout(){
        Auth::logout();
        return Redirect()->route('login');
    }
}
