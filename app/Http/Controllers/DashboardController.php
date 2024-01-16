<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogoModel;
use App\Models\SEOModel;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\ContactUsModel;
use Carbon\Carbon;

class DashboardController extends Controller
{
   public function dashboard()
   {
    // echo 'wel';
      $data['TotalUserCount'] = User::count();
      $data['TotalContactUsCount'] = ContactUsModel::count();
      $data['TodayContactUsCount'] = ContactUsModel::whereDate('created_at', Carbon::today())->count();
      $data['YesterdayContactUsCount'] = ContactUsModel::whereDate('created_at', Carbon::yesterday())->count();

      return view('admin.dashboard', $data);
   }

   public function admin_logo(Request $request)
   {
    // echo 'wel';
      $data['getRecord'] = LogoModel::get();
      return view('admin.logo.list', $data);
   }

   public function admin_logo_post(Request $request)
   {
   //  dd($request->all());

      if($request->add_to_update == "Add") 
      {
         // validate //

         $insertRecord = request()->validate([
            'logo' => 'required',
            'fevicon_icon' => 'required',
         ]);

         /////////////
         $insertRecord = new LogoModel;
      }
      else
      {
         $insertRecord = LogoModel::find($request->id);
      }
   
      if(!empty($request->file('logo')))
      {
         if(!empty($insertRecord->logo) && file_exists('public/logo/'. $insertRecord->logo))
         {
            unlink('public/logo/'. $insertRecord->logo);
         }

         $file = $request->file('logo');
         $randomStr = Str::random(30);
         $filename = $randomStr . '.' . $file->getClientOriginalExtension();
         $file->move('public/logo/', $filename);
         $insertRecord->logo = $filename;
      }

      if(!empty($request->file('fevicon_icon')))
      {
         if(!empty($insertRecord->fevicon_icon) && file_exists('public/logo/'. $insertRecord->fevicon_icon))
         {
            unlink('public/logo/'. $insertRecord->fevicon_icon);
         }

         $file = $request->file('fevicon_icon');
         $randomStr = Str::random(30);
         $filename = $randomStr . '.' . $file->getClientOriginalExtension();
         $file->move('public/logo/', $filename);
         $insertRecord->fevicon_icon = $filename;
      }
      
      $insertRecord ->save();

      return redirect()->back()->with('success' , 'Logo successfully save..');
   }

   public function admin_seo(Request $request)
   {
      $data['getRecord'] = SEOModel::get();
      return view('admin.seo.list', $data);
   }

   public function admin_seo_post(Request $request)
   {
      if($request->add_to_update == 'Add')
      {
        $insertRecord =new SEOModel;
      }
      else
      {
        $insertRecord = SEOModel::find($request->id);
      }
      

      $insertRecord->meta_title  = trim($request->meta_title);
      $insertRecord->meta_discription   = trim($request->meta_discription);
      $insertRecord->meta_keyword  = trim($request->meta_keyword);
      $insertRecord->website_developer  = trim($request->website_developer);

      $insertRecord->save();

      return redirect()->back()->with('success', 'SEO successfully save.....');
   }

   

   
}
