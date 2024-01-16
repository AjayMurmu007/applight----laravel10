<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Models\ContactUsModel;


class ContactController extends Controller
{
   public function contact(Request $request)
   {
      // echo 'wel';

      $data['getRecord'] = ContactModel::all();
      return view('admin.contact.list', $data);
   }


   public function  contact_post(Request $request)
   {
    if($request->add_to_update == 'Add')
    {
      $insertRecord =new ContactModel;
    }
    else
    {
      $insertRecord = ContactModel::find($request->id);
    }

    $insertRecord->title = trim($request->title);
    $insertRecord->discription = trim($request->discription);
    $insertRecord->address1 = trim($request->address1);
    $insertRecord->address2 = trim($request->address2);
    $insertRecord->phone1 = trim($request->phone1);
    $insertRecord->phone2 = trim($request->phone2);
    $insertRecord->email1 = trim($request->email1);
    $insertRecord->email2 = trim($request->email2);
    $insertRecord->working1 = trim($request->working1);
    $insertRecord->working2 = trim($request->working2);

    $insertRecord->save();

    return redirect()->back()->with('success', 'Contact Add successfully...');

   }     


   public function contact_us_list(Request $request)
   {
      // echo 'wel';

      // $data['getRecord'] = ContactUsModel::all();
      $data['getRecord'] = ContactUsModel::getRecordAll($request);                      // filter add

      return view('admin.contact_us.list', $data);
   }
   

   public function contact_us_delete($id, Request $request)
   {
      // echo 'wel';

      $deleteRecord = ContactUsModel::find($id);
      $deleteRecord->delete();

      return redirect()->back()->with('error', 'Contact Us successfully delete...');
   }

}