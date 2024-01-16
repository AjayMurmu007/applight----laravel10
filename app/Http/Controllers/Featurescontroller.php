<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturesModel;
use Illuminate\Support\Str;


class FeaturesController extends Controller
{
   public function features_list(Request $request)
   {
      // echo 'wel';
      $data['getRecord'] = FeaturesModel::all();
      return view('admin.features.list', $data);
   }

   public function features_post(Request $request)
   {
   //  dd($request->all());

   if($request->add_to_update == 'Add')
   {
      $insertRecord = request()->validate([
         'image' => 'required',
      ]);
      $insertRecord = new FeaturesModel();
   }
   else
   {
      $insertRecord = FeaturesModel::find($request->id);
   }

  

   $insertRecord -> title  = trim($request->title);
   $insertRecord -> discription  = trim($request->discription);
   $insertRecord -> name_one  = trim($request->name_one);
   $insertRecord -> discription_one  = trim($request->discription_one);
   $insertRecord -> name_two  = trim($request->name_two);
   $insertRecord -> discription_two  = trim($request->discription_two);
   $insertRecord -> name_three  = trim($request->name_three);
   $insertRecord -> discription_three  = trim($request->discription_three);

   $insertRecord -> name_four  = trim($request->name_four);
   $insertRecord -> discription_four  = trim($request->discription_four);
   $insertRecord -> name_five  = trim($request->name_five);
   $insertRecord -> discription_five  = trim($request->discription_five);
   $insertRecord -> name_six  = trim($request->name_six);
   $insertRecord -> discription_six  = trim($request->discription_six);

   if(!empty($request->file('image')))
      {
         if(!empty($insertRecord->image) && file_exists('public/feature/'. $insertRecord->image))
         {
            unlink('public/feature/'. $insertRecord->image);
         }

         $file = $request->file('image');
         $randomStr = Str::random(30);
         $filename = $randomStr . '.' . $file->getClientOriginalExtension();
         $file->move('public/feature/', $filename);
         $insertRecord->image = $filename;
      }

   $insertRecord -> save();

   return redirect()->back()->with('success', 'About Page successfully save.....');
   }

}