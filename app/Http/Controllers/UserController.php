<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function profile()
    {   
        $user = Auth::user();
        
        $role = 'Reader';
        if($user->is_librarian){
            $role = 'Librarian';
        }
        
        return view('auth/profile', [
            'user' => $user,
            'role' => $role
        ]);
    }
    
}
