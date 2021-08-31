<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drag;

class DropzoneController extends Controller
{
    public function dropzone()
    {
        $files = Drag::all();
        return view('dropzone.index',compact('files'));   
    }

    public function dropzoneStore(Request $request)
    {
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            if($file->move('images', $name)){ 

                $data = new Drag();
                $data->file = $name;
                $data->save();
                return redirect()->back();
            }
        }
    	//$imageName = time(). '.' . $image->extension();
    	//$file = $image->move(public_path('images'),$imageName);
    	//return response()->json(['success'=>$imageName]);

        // $this->dropzoneShow();
        
        
    }
}
