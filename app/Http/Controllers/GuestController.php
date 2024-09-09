<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        // Fetch all users
        $users = User::all();
        
        // Pass the users to the view in the 'admin/index' file
        return view('guest.index', compact('users'));
    }
}
