<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // index
    public function index()
    {
        $data = [
            'messages' => Message::with('comments', 'user')->get()
        ];

        return view('home', $data);
    }
}
