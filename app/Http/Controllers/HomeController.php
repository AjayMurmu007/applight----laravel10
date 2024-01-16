<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeModel;
use App\Models\AboutModel;
use App\Models\WatchNowModel;
use App\Models\FeaturesModel;
use App\Models\OurTeamModel;
use App\Models\PositionModel;
use App\Models\TestimonialModel;
use App\Models\TestimonialDetailModel;
use App\Models\FAQModel;
use App\Models\FaqDetailModel;
use App\Models\ContactModel;
use App\Models\DownloadOurAppModel;
use App\Models\SEOModel;
use Illuminate\Support\Str;

class HomeController extends Controller
{
   public function index()
   {
      // echo 'wel';
      $data['getRecord'] = HomeModel::all();
      $data['getAbout'] = AboutModel::all();
      $data['getWatchNow'] = WatchNowModel::all();
      $data['getFeatures'] = FeaturesModel::all();
      $data['getOutTeam'] = OurTeamModel::all();
      $data['getOurTeamPosition'] = PositionModel::all();
      $data['getTestimonial'] = TestimonialModel::all();
      $data['getTestimonialDetail'] = TestimonialDetailModel::all();
      $data['getFAQ'] = FAQModel::get();
      $data['getFaqDetail'] = FaqDetailModel::get();
      $data['getContact'] = ContactModel::get();
      $data['getdownloadourapp'] = DownloadOurAppModel::get();
      $data['getSEO'] = SEOModel::get();


      return view('index', $data);
   }

   public function admin_home(Request $request)
   {
      // echo 'wel';
      $data['getRecord'] = HomeModel::get();
      return view('admin.home.list', $data);
   }

   public function admin_home_post(Request $request)
   {
      //  echo 'wel';
      //  return view('admin.home.list');

      if($request->add_to_update == "Add") 
      {
         // validate //

         $insertRecord = request()->validate([
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
         ]);

         /////////////
         $insertRecord = new HomeModel;
      }
      else
      {
         $insertRecord = HomeModel::find($request->id);
      }
      // $insertRecord = new HomeModel;
      $insertRecord -> title = trim($request->title);
      $insertRecord -> sub_title = trim($request->sub_title);
      $insertRecord -> home_url = trim($request->home_url);
      $insertRecord -> sub_title_two = trim($request->sub_title_two);
      $insertRecord -> discription = trim($request->discription);

      if(!empty($request->file('image1')))
      {
         if(!empty($insertRecord->image_one) && file_exists('public/img/'. $insertRecord->image_one))
         {
            unlink('public/img/'. $insertRecord->image_one);
         }

         $file = $request->file('image1');
         $randomStr = Str::random(30);
         $filename = $randomStr . '.' . $file->getClientOriginalExtension();
         $file->move('public/img/', $filename);
         $insertRecord->image_one = $filename;
      }

      $insertRecord -> google_play = trim($request->google_play);

      if(!empty($request->file('image2')))
      {
         if(!empty($insertRecord->image_two) && file_exists('public/img/'. $insertRecord->image_two))
         {
            unlink('public/img/'. $insertRecord->image_two);
         }

         $file = $request->file('image2');
         $randomStr = Str::random(30);
         $filename = $randomStr . '.' . $file->getClientOriginalExtension();
         $file->move('public/img/', $filename);
         $insertRecord->image_two = $filename;
      }

      $insertRecord -> app_store = trim($request->app_store);

      if(!empty($request->file('image3')))
      {
         if(!empty($insertRecord->image_three) && file_exists('public/img/'. $insertRecord->image_three))
         {
            unlink('public/img/'. $insertRecord->image_three);
         }

         $file = $request->file('image3');
         $randomStr = Str::random(30);
         $filename = $randomStr . '.' . $file->getClientOriginalExtension();
         $file->move('public/img/', $filename);
         $insertRecord->image_three = $filename;
      }
      
      $insertRecord ->save();

      return redirect()->back()->with('success' , 'Home page successfully save..');
   }
   

}
