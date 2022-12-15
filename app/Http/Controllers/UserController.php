<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('role', function ($query) {
            $query->where('nama_role', 'user');
        })->get();
        return view('admin.users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'dashboard_link' => 'required',
        ]);

        $password = "Mandiricoal" . now()->year . "!";

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'dashboard_link' => $request->dashboard_link,
            'password' => Hash::make($password),
            'role_id' => 2
        ]);

        if($user) {
            return redirect()->route('admin.users')->with('success', 'User Registered Succesfully');
        }

        return back()->with('fail', 'Failed to add new user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('users.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $updated = $user->update($request->all());

        if ($updated) {
            return redirect()->route('admin.users')->with('success', 'Data Updated Succesfully');
        }

        return redirect()->back()->with('fail', 'Update data failed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request)
    {
        $request->validate([
            'old_password' => 'required'
        ]);

        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        if (Hash::check($request->old_password, $user->password)) {
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'nullable|confirmed|min:12|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            ]);

            if($request->password) {
                $updated = $user->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);

                if($updated) {
                    return back()->with('success', 'Profile updated succesfully');
                }

                return back()->with('fail', 'failed to update profile');
            }

            $updated = $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email
            ]);

            if($updated) {
                return back()->with('success', 'Profile updated succesfully');
            }
        } else {
            return back()->with('old_password', 'Old password does not match!');
        }

        return back()->with('fail', 'failed to update profile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Data has been deleted');
    }
}
