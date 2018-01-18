<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
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


        return view('admin.users.index', compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles= Role::lists('name', 'id')->all();
        return view('admin.users.create', compact('roles'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if(trim($request->password) =='' ) {

            $input = $request->except('password');

        } else {
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }



        //Persist data to the DB
        $input = $request->all();

        //If the user has a photo file, move the file (line 59) to a public/images folder as you create the user

        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        // How to Persist Data to Model w/o a picture file/encrypt Pword



        User::create($input);

        Session::flash('updated_user', "The user has been created!");

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
        //When you click on the link on their name in admin/users it will take you to the edit form
        //for this particular ind.
        $user = User::findOrFail($id);

        //pass in roles
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditrequest $request, $id)
    {


        $user = User::findOrFail($id);

        if(trim($request->password) =='' ) {

            $input = $request->except('password');

        } else {
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }





        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move($name, 'images');

            //allows you to upload a new image for edit form (notice we're in Update)

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        //Updates the Sel. User w/ new inputs
        $user->update($input);

        Session::flash('updated_user', "The user has been updated!");


        //After the form udpates, redirect to Users Table page

        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //User clicks the Delete button on Edit Form and deletes the user at the ID and Redir. to A/Users

        $user = User::findOrFail($id);


        unlink(public_path() . $user->photo->file);

        $user->delete();

        Session::flash('deleted_user', "The user has been deleted!");

        return redirect('/admin/users');
    }
}
