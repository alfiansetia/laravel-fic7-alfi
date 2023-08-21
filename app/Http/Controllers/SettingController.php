<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    private $title = 'Setting';

    public function profile()
    {
        return view('setting.profile')->with(['title' => $this->title]);
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('user.index')->with(['success' => 'Success Add Data!']);
        } else {
            return redirect()->route('user.index')->with(['error' => 'Failed Add Data!']);
        }
    }
}
