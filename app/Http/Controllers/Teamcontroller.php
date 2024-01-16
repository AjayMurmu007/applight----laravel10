<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\OurTeamModel;
use App\Models\PositionModel;
use Illuminate\Support\Str;


class TeamController extends Controller
{
   public function our_team_list(Request $request)
   {
    //   echo 'wel';
      $data['getRecord'] = OurTeamModel::all();
      return view('admin.our_team.list', $data);
   }

   public function our_team_post(Request $request)
   {
    // dd($request->all());

    if($request->add_to_update == 'Add')
    {
        $insertRecord = new OurTeamModel;
    }
    else
    {
        $insertRecord = OurTeamModel::find($request->id);
    }

    $insertRecord -> title  = trim($request->title);
    $insertRecord -> discription  = trim($request->discription);

    $insertRecord -> save();

    return redirect()->back()->with('success', 'Our Team Page successfully save.....');

   }

   public function our_team_position($id, Request $request)
   {
    //  echo $id;

    $data['getId'] = $id;

    // Position Model
    $data['getRecord'] = PositionModel::where('position.our_team_id','=', $id)->get();
    return view('admin.our_team.our_team_position',  $data);
   }
    
   public function our_team_position_add($id, Request $request)
   {
    //  echo $id;
    $data['getId'] = $id;
    return view('admin.our_team.our_team_position_add', $data);
   }
   
   public function our_team_position_add_post($id, Request $request)
   {
    // dd($request->all());

    $insertRecord = new PositionModel();

    $insertRecord->our_team_id = trim($request->our_team_id);
    $insertRecord->name = trim($request->name);
    $insertRecord->position_name = trim($request->position_name);

    if(!empty($request->file('image')))
    {
        $file = $request->file('image');
        $randomStr = Str::random(30);
        $filename = $randomStr.'.'.$file->getClientOriginalExtension();
        $file->move('public/img/', $filename);
        $insertRecord->image = $filename;
    }

    $insertRecord->save();

    return redirect('admin/our_team/list/'. $request->our_team_id)->with('success', 'Position Add successfully...');
    
   }


   public function our_team_position_edit($id, Request $request)
   {
    // echo 'edit';

    $data['getRecord'] = PositionModel::find($id);
    return view('admin.our_team.our_team_position_edit', $data);
   }

   public function our_team_position_edit_update($id, Request $request)
   {

    $insertRecord = PositionModel::find($id);

    $insertRecord->name = trim($request->name);
    $insertRecord->position_name = trim($request->position_name);

    if(!empty($request->file('image')))
    {
        if(!empty($insertRecord->image) && file_exists('public/img/'. $insertRecord->image))
        {
            unlink('public/img/'. $insertRecord->image);
        }

        $file = $request->file('image');
        $randomStr = Str::random(30);
        $filename = $randomStr.'.'.$file->getClientOriginalExtension();
        $file->move('public/img/', $filename);
        $insertRecord->image = $filename;
    }

    $insertRecord->save();

    return redirect('admin/our_team/list/'. $insertRecord->our_team_id)->with('success', 'Position Update successfully...');

   }

   public function our_team_position_delete($id, Request $request)
   {
    $insertRecord = PositionModel::find($id);

    if(!empty($insertRecord->image) && file_exists('public/img/'. $insertRecord->image))
    {
        unlink('public/img/'. $insertRecord->image);
    }

    $insertRecord->delete();

    return redirect()->back()->with('error', 'Position Successfully Delete....');
   }

   

}