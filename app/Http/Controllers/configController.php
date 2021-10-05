<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class configController extends Controller
{
  public function addmanager (Request $req)
  {
if (isset($req->mail)) {
  $man = DB::table('manager')->where('mail','=',$req->mail)->first();
  if ($man == Null) {
    DB::table('manager')->insert([
  'mail' => $req->mail,
  'FIO' => $req->fiom
]);
  }
}
if (isset($req->email)) {
  DB::table('users')
            ->where('email', $req->email)
            ->update(['role' => $req->role]);
}

    return redirect()->back();
  }

public function delUser(Request $req)
{
  DB::table('users')
            ->where('id', $req->id)
            ->delete();
            return $req;
}

}
