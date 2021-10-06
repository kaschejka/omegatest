<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class uploadController extends Controller
{
  public function fileupload (Request $req)
  {

Storage::put('/public/photo',$req->file);
return redirect()->route('upload')->with('success','Фото загружено.');

}
}
