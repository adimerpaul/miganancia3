<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request){
//        return 'aaaa';
        $this->validate($request, [
            'file'=>'required',
        ]);
//        $nombreArchivo='';
        if ($request->hasFile('file')) {
            $file=$request->file('file');
            $nombreArchivo = time().".".$file->getClientOriginalExtension();
            $file->move(\public_path('imagenes'), $nombreArchivo);
//            $mail=Mail::find($request->mail_id);
//            $mail->archivo=$nombreArchivo.'';
//            return $mail->save();
        }
        return $nombreArchivo;

    }
}
