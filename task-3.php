<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        // validate the incoming request  make sure the email is unique
        try {
            $validator = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email,' . $id,
            ]);

            // does not improve performance but increases code readability and maintainability.  U can also add findOrFail to inprove readability even more
            $user = User::where('id', $id)->first();


            if ($user) {

                // instead of save use update .The update() method allows you to update multiple attributes in a single, concise line of code  enhancing security and readability

                $user->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);
                // added a status code 200 or better understanding or api response
                return response()->json(['success' => 'User updated successfully'], 200);
            }
            return response()->json(['error' => 'User not found'], 404);
        } catch (ValidationException $e) {
            // added try catch for better error handling
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }



    ////// old code  ////////
    public function Oldupdate(Request $request, $id)
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


