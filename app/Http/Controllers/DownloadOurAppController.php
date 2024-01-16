<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DownloadOurAppModel;


class DownloadOurAppController extends Controller
{
   public function download_our_app(Request $request)
   {
    //   echo 'wel';

      $data['getRecord'] = DownloadOurAppModel::all();
      return view('admin.download.list', $data);
   }

   public function download_our_app_post(Request $request)
   {
    //   echo 'wel';

    if($request->add_to_update == 'Add')
    {
      $insertRecord =new DownloadOurAppModel;
    }
    else
    {
      $insertRecord = DownloadOurAppModel::find($request->id);
    }
    

    $insertRecord->title  = trim($request->title);
    $insertRecord->discription   = trim($request->discription);

    $insertRecord->save();

    return redirect()->back()->with('success', 'Download our app successfully save.....');


   }


   
}

?>