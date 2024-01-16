<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountcontroller extends Controller
{
   public function my_account()
   {
         // echo 'wel';
         $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.my_account.update', $data);
   }

   public function my_account_update(Request $request)
   {
    //  echo 'wel';
    //  dd($request->all());

      $user = request()->validate([
              'email' => 'required|unique:users,email,' .Auth::user()->id
      ]);
      $user = User::find(Auth::user()->id);

      $user -> name = trim($request->name);
      $user -> email = trim($request->email);

      if(!empty($request->password))
      {
        $user->password=Hash::make($request->password);
      }
      $user->save();

      return Redirect('admin/my_account')->with('success', "Update successfully...");
   }
}

