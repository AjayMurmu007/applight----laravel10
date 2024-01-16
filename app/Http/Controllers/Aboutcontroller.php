<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutModel;


class AboutController extends Controller
{
   public function admin_about(Request $request)
   {
      // echo 'wel';
      $data['getRecord'] = AboutModel::all();
      return view('admin.about.list', $data);
   }

   public function admin_about_post(Request $request)
   {
    //   dd($request->all());

    if($request->admin_about_post == 'Add')
    {
        $insertRecord = new AboutModel;
    }
    else
    {
        $insertRecord = AboutModel::find($request->id);
    }

    $insertRecord -> title  = trim($request->title);
    $insertRecord -> discription  = trim($request->discription);
    $insertRecord -> title_one  = trim($request->title_one);
    $insertRecord -> discription_one  = trim($request->discription_one);
    $insertRecord -> title_two  = trim($request->title_two);
    $insertRecord -> discription_two  = trim($request->discription_two);
    $insertRecord -> title_three  = trim($request->title_three);
    $insertRecord -> discription_three  = trim($request->discription_three);

    $insertRecord -> save();

    return redirect()->back()->with('success', 'About Page successfully save.....');




      
   }
   

}