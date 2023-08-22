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
        ]);

        $user = auth()->user()->update([
            'name' => $request->name,
        ]);

        if ($user) {
            return redirect()->route('setting.profile')->with(['success' => 'Success Update Profile!']);
        } else {
            return redirect()->route('setting.profile')->with(['error' => 'Failed Update Profile!']);
        }
    }

    public function password()
    {
        return view('setting.password')->with(['title' => $this->title]);
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:30',
        ]);

        $user = User::create([
            'name' => $request->name,
        ]);

        if ($user) {
            return redirect()->route('user.index')->with(['success' => 'Success Add Data!']);
        } else {
            return redirect()->route('user.index')->with(['error' => 'Failed Add Data!']);
        }
    }
}
