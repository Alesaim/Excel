<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator,Redirect,Response,File;

class ProductController extends Controller
{
	public function add(Request $request)
    {
    	$product = new Product;
    	$product->product = $request->product;
    	$product->price   = $request->price;
    	$result = $product->save();

    	if($result)
    	{
    		return ["Result"=>"Data has been saved"];
    	}else{
    		return ["Result"=>"Operation faild"];
    	}
    }

    public function update(Request $request)
    {
    	$product = Product::find($request->id);
    	$product->product = $request->product;
    	$product->price   = $request->price;
    	$result = $product->save();

    	if($result)
    	{
    		return ["Result"=>"Data has been updated"];
    	}else{
    		return ["Result"=>"Operation faild"];
    	}
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $result = $product->delete();

        if($result)
        {
            return ["Result"=>"Data has been deleted"];
        }else{
            return ["Result"=>"Operation faild"];
        }
    }

    function search($name)
    {
    	return Product::where("product","like","%".$name."%")->get();
    }

    public function testData(Request $request)
    {
        $rules = array(
            "price" => "required"
            );

    $validator = Validator::make($request->all(),$rules);
    if($validator->fails())
    {
        return response()->json($validator->errors(),401);
    }else{
        $product = new Product;
        $product->product = $request->product;
        $product->price   = $request->price;
        $result = $product->save();

        if($result)
        {
            return ["Result"=>"Data has been saved"];
        }else{
            return ["Result"=>"Operation faild"];
        }
    }
  }

    public function fileUpload(Request $request)
    {
        $validator = Validator::make($request->all(), 
              [ 
              'file' => 'required|mimes:jpg|max:2048',
             ]);   
 
        if ($validator->fails()) {          
                return response()->json(['error'=>$validator->errors()], 401);                        
             }  
     
      
            if ($files = $request->file('file')) {
                 
                //store file into document folder
                $file = $request->file->store('public/documents');
                \Log::info($file);
     
                //store your file into database
                $document = new Product();
                $document->product = $request->product;
                $document->price   = $request->price;
                $document->file = $file;
                $document->save();
                  
                return response()->json([
                    "success" => true,
                    "message" => "File successfully uploaded",
                    "file" => $file
                ]);
      
            }
        }
    
}
