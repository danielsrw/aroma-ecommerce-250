<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Models\Order;
use App\Models\User;
use Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.pages.dashboard.index');
    }
}
