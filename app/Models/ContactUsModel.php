<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Request;

class ContactUsModel extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    
    // filter add

    static public function getRecordAll($request)
    {
    // $return = self::select('contact_us.*')
    //         -> orderBy('id', 'desc')
    //         -> paginate(10);

    //         return $return;

    $return = self::select('contact_us.*')
            -> orderBy('id', 'desc');

            if(!empty(Request::get('id')))
            {
                $return = $return->where('contact_us.id', '=', Request::get('id'));
            }

            if(!empty(Request::get('name')))
            {
                $return = $return->where('contact_us.name', 'like', '%'.Request::get('name').'%');
            }

            if(!empty(Request::get('email')))
            {
                $return = $return->where('contact_us.email', 'like', '%'.Request::get('email').'%');
            }

            if(!empty(Request::get('subject')))
            {
                $return = $return->where('contact_us.subject', 'like', '%'.Request::get('subject').'%');
            }

            if(!empty(Request::get('message')))
            {
                $return = $return->where('contact_us.message', 'like', '%'.Request::get('message').'%');
            }

            $return = $return-> paginate(10);

            return $return;
    }

} 