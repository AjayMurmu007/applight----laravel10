<?php

namespace App\Http\Controllers;

use App\Models\ContactUsModel;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Mail;
// use Mail;
use App\Mail\ContactUsMail;

class ContactUsController extends Controller
{
   public function contact_post_save(Request $request)
   {
      // dd($request->all());

      $insertRecord = new ContactUsModel();

      $insertRecord->name    = trim($request->name);
      $insertRecord->email   = trim($request->email);
      $insertRecord->subject = trim($request->subject);
      $insertRecord->message = trim($request->message);

      $insertRecord->save();

      Mail::to('ajaymurmu007@gmail.com')->send(new ContactUsMail($request));

      return redirect()->back()->with('success','Your Message submitted successfully and Mail send....');
   }


}

?>