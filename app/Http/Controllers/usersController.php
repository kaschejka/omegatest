<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\company_user;
use App\Models\user_position;
use App\Models\user_department;
use App\Models\position;
use App\Models\department;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $data = company_user::with(['user_departments','user_positions'])->latest()->paginate(5);
     // echo dd(compact('data'));
      return view('user_company\index',compact('data'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_company\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new company_user;
        $user->fio = $request->name;
        $user->save();
        $user_id = company_user::where('fio',$request->name)->latest()->first();
        $user_id = $user_id->id;

        $position_id = position::where('name',$request->position)->first();
        $user_position = new user_position;
        $user_position->company_user_id = $user_id;
        $user_position->position_id = $position_id->id;
        $user_position->save();




        foreach ($request->department as $key => $value) {
          DB::table('user_departments')->insert([
            ['department_id' => $value, 'company_user_id' => $user_id]]);
        }
        return redirect()->route('users.index')
                              ->with('success','Пользователь успешно добавлен.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      company_user::destroy($id);

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
