<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required',
            'password' => ['required', 'string', 'min:8'],
        ]);

        //create post
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $getIdUser = User::latest('id')->first();
        $member = new Member;
        $member->id_user = $getIdUser->id;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->id_member = Carbon::now()->format('Ymd').$getIdUser->id;
        $member->save();


        // User::create([
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'password'  => Hash::make($request->password),
        //     'created_at' => now()
        // ]);


        

        //redirect to index
        return redirect()->route('admin.users')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $users = User::findOrFail($id);
        return view('admin.user.edit',compact('users'));
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
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required',
            'password' => ['required', 'string', 'min:8'],
            'type'      => 'required',
        ]);

        $users = User::findOrFail($id);
        $users->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'type'      => $request->type
        ]);
        return redirect()->route('admin.users')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users')->with(['success' => 'User deleted successfully']);
    }
}
