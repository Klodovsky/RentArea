<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\Photo;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact ('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        Session::flash('created_user', 'The user has been created');

        if(trim($request->password) == '') {
            $input = $request->except('password'); //pass everything excerpt the pass field
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')) { //verificam daca avem photo id
            $name = time() . $file->getClientOriginalName(); //creaza numele fisierul
            $file->move('public/images', $name); //muta fisierul in images
            $photo = Photo::create(['file'=>$name]); //cu create baga in tabeta photo numele fisierului
            $input['photo_id'] = $photo->id;  //luat id-uri curent din tabela photo si il punem in tabela users
        }

        User::create($input);
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit',compact('user', 'roles'));
    }

    public function edit_author($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit-author',compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        Session::flash('updated_user','The user has been updated');
        $user = User::findOrFail($id);
        if(trim($request->password) == '') {
            $input = $request->except('password'); //pass everything excerpt the pass field
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/images',$name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        return redirect('/admin/users');
    }

    public function update_author(UserEditRequest $request, $id)
    {
        Session::flash('updated_user','The user has been updated');
        $user = User::findOrFail($id);
        if(trim($request->password) == '') {
            $input = $request->except('password'); //pass everything excerpt the pass field
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/images',$name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        //return redirect('/admin/authors/id');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Session::flash('deleted_user','The user has been deleted');

        $user = User::findOrFail($id);
        //unlink(public_path() . $user->photo->file);
        $user->delete();

        return redirect('/admin/users');
    }
}
