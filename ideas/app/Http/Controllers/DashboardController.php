<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ideas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Ideas::orderBy('created_at', 'DESC');
        if (\request()->has('search')) {
            $ideas = $ideas->where('idea', 'like', '%' . \request()->get('search', '') . '%');
        }
        return view(
            'dashboard', [
            'ideas' => $ideas->paginate(5),
        ]);
    }

    public function terms()
    {
        return view('terms'
        );
    }
    public function feed(){
        $ideas = Ideas::orderBy('created_at', 'DESC');
        return view(
            'feed', [
            'ideas' => $ideas->paginate(5),
        ]);
    }


}

