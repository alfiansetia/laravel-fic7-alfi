<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $title = 'User';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->filled('search')) {
            $query->orWhere('email', 'like', "%$request->search%")->orWhere('name', 'like', "%$request->search%");
        }
        $data = $query->latest()->paginate(10)->withQueryString();
        return view('user.index', compact('data'))->with(['title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create')->with(['title' => $this->title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|min:3|max:30',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:5',
            'active'    => 'nullable',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => $request->has('active') ? now() : null,
        ]);

        if ($user) {
            return redirect()->route('user.index')->with(['success' => 'Success Add Data!']);
        } else {
            return redirect()->route('user.index')->with(['error' => 'Failed Add Data!']);
        }
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
        $data = $user;
        return view('user.edit', compact('data'))->with(['title' => $this->title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'      => 'required|min:3|max:30',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'nullable|min:5',
            'active'    => 'nullable',
        ]);
        if ($request->filled('password')) {
            $user->update([
                'password'  => Hash::make($request->password),
            ]);
        }

        $user = $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'email_verified_at' => $request->has('active') ? now() : null,
        ]);
        if ($user) {
            return redirect()->route('user.index')->with(['success' => 'Success Update Data!']);
        } else {
            return redirect()->route('user.index')->with(['error' => 'Failed Update Data!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        if ($user) {
            return redirect()->route('user.index')->with(['success' => 'Success Delete Data!']);
        } else {
            return redirect()->route('user.index')->with(['error' => 'Failed Delete Data!']);
        }
    }
}
