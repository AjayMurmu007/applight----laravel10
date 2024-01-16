<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQModel;
use App\Models\FaqDetailModel;


use function PHPUnit\Framework\returnSelf;

class FAQController extends Controller
{
   public function faq(Request $request)
   {
      // echo 'wel';
      $data['getRecord'] = FAQModel::all();
      return view('admin.faq.list', $data);
   }    


   public function faq_post(Request $request)
   {
      // echo 'wel';

      if($request->add_to_update == 'Add')
      {
        $insertRecord =new FAQModel;
      }
      else
      {
        $insertRecord = FAQModel::find($request->id);
      }
      

      $insertRecord->title  = trim($request->title);
      $insertRecord->discription   = trim($request->discription);

      $insertRecord->save();

      return redirect()->back()->with('success', 'FAQ successfully save.....');
   } 


   public function faq_list(Request $request)
   {
      $data['getRecord'] = FaqDetailModel::get();
      return view('admin.faq.faq_list', $data);
   }  


   public function faq_add(Request $request)
   {
      
      return view('admin.faq.faq_add');
   }


   public function faq_add_post(Request $request)
   {
      
      // dd($request->all());
      
    $insertRecord = new FaqDetailModel;

    $insertRecord->title = trim($request->title);
    $insertRecord->discription = trim($request->discription);

    $insertRecord->save();

    return redirect('admin/faq/list')->with('success', 'FAQ Add successfully...');
   }


   public function faq_edit($id, Request $request)
   {
      $data['getRecord'] = FaqDetailModel::find($id);  
      return view('admin.faq.faq_edit', $data);
   }


   public function  faq_edit_update($id, Request $request)
   {
    $insertRecord = FaqDetailModel::find($id);

    $insertRecord->title = trim($request->title);
    $insertRecord->discription = trim($request->discription);

    $insertRecord->save();

    return redirect('admin/faq/list')->with('success', 'FAQ Update successfully...');

   }


   public function faq_edit_delete($id, Request $request)
   {
    $insertRecord = FaqDetailModel::find($id);

    $insertRecord->delete();

    return redirect()->back()->with('error', 'FAQ Successfully Delete....');
   }


}