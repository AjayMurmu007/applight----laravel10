<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestimonialModel; 
use App\Models\TestimonialDetailModel;
 use Illuminate\Support\Str;

class TestimonialController extends Controller
{
   public function testimonial(Request $request)
   {
      $data['getRecord'] = TestimonialModel::all();
      return view('admin.testimonial.list', $data);
   }

   public function testimonial_post(Request $request)
   {
    // dd($request->all());

    if($request->add_to_update == 'add')
    {
        $insertRecord = new TestimonialModel;
    }
    else
    {
        $insertRecord = TestimonialModel::find($request->id);
    }

    $insertRecord->title =trim($request->title);
    $insertRecord->discription =trim($request->discription);

    $insertRecord->save();

    return redirect()->back()->with('success', 'Testimonial add successfully....');

   }  

   public function add_testimonial_list(Request $request)
   {
      $data['getRecord'] = TestimonialDetailModel::get();
      return view('admin.testimonial.testimonial_list', $data);
   }

   public function testimonial_add(Request $request)
   {
      
      return view('admin.testimonial.testimonial_add');
   }
   
   public function testimonial_add_post(Request $request)
   {
    // dd($request->all());
      
    $insertRecord = new TestimonialDetailModel;

    $insertRecord->name = trim($request->name);
    $insertRecord->position_name = trim($request->position_name);
    $insertRecord->discription = trim($request->discription);

    if(!empty($request->file('image')))
    {
        if(!empty($insertRecord->image) && file_exists('public/testimonial/'. $insertRecord->image))
        {
            unlink('public/testimonial/'. $insertRecord->image);
        }

        $file = $request->file('image');
        $randomStr = Str::random(30);
        $filename = $randomStr.'.'.$file->getClientOriginalExtension();
        $file->move('public/testimonial/', $filename);
        $insertRecord->image = $filename;
    }

    $insertRecord->save();

    return redirect('admin/testimonial/list')->with('success', 'Testimonial Add successfully...');

   }

   public function testimonial_edit($id, Request $request)
   {
      $data['getRecord'] = TestimonialDetailModel::find($id);  
      return view('admin.testimonial.testimonial_edit', $data);
   }

   
   public function  testimonial_edit_update($id, Request $request)
   {
    $insertRecord = TestimonialDetailModel::find($id);

    $insertRecord->name = trim($request->name);
    $insertRecord->position_name = trim($request->position_name);
    $insertRecord->discription = trim($request->discription);

    if(!empty($request->file('image')))
    {
        if(!empty($insertRecord->image) && file_exists('public/testimonial/'. $insertRecord->image))
        {
            unlink('public/testimonial/'. $insertRecord->image);
        }

        $file = $request->file('image');
        $randomStr = Str::random(30);
        $filename = $randomStr.'.'.$file->getClientOriginalExtension();
        $file->move('public/testimonial/', $filename);
        $insertRecord->image = $filename;
    }

    $insertRecord->save();

    return redirect('admin/testimonial/list')->with('success', 'Testimonial Update successfully...');

   }


   public function testimonial_edit_delete($id, Request $request)
   {
    $insertRecord = TestimonialDetailModel::find($id);

    if(!empty($insertRecord->image) && file_exists('public/testimonial/'. $insertRecord->image))
    {
        unlink('public/testimonial/'. $insertRecord->image);
    }

    $insertRecord->delete();

    return redirect()->back()->with('error', 'Testimonial Successfully Delete....');
   }


}