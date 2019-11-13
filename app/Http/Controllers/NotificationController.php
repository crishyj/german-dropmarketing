<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function viewCheck($id){
        
        $options = Notification::find($id);
        $options->status = '0';        
        $options->save();       
        if( $options->oneform == '1'){ 
            return redirect('/dashboard/oneform')->with('success', 'Successfully added');
        }
        return redirect('/dashboard')->with('success', 'Successfully added');
        // return response()->json('success');
    }
}
