<?php

namespace App\Http\Controllers;

use App\Discussions;
use App\DiscussionReplies;
use App\Videos;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
     $this->middleware('auth');
    }

    public function index()
    {

      return view('home');
    }

}
