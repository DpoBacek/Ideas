<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $users = [
            [
                'name' => 'oleg',
                'age' => 12
            ],
            [
                'name' => 'vasa',
                'age' => 43
            ]

        ];

        return view(
            'profile',
            [
                'users' => $users
            ]
        );
    }
}
