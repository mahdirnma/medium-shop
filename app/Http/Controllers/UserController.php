<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    public function index()
    {
        $users=User::where('is_active',1)->paginate(4);
        return view('users.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('user-create')) {
            return view('users.create');
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if (Gate::allows('user-create')) {
            $user=User::create($request->all());
            if($user){
                return to_route('users.index');
            }else{
                return to_route('users.create');
            }
        }
        abort(403);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (Gate::allows('user-update', $user)) {
            return view('users.update',compact('user'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (Gate::allows('user-update', $user)) {
            $status=$user->update($request->all());
            if($status){
                return to_route('users.index');

            }else{
                return to_route('users.edit',$user);
            }
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Gate::allows('user-delete', $user)) {
            $user->update(['is_active'=>0]);
            return to_route('users.index');
        }
        abort(403);
    }
}
