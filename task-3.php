<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return response()->json(['success' => 'User updated successfully']);
        }
        return response()->json(['error' => 'User not found'], 404);
    }
}
