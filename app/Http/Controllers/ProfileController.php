<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $breadcrumb = [
            'items' => [
                [
                    'title' => 'حساب کاربری',
                ],
            ]
        ];

        return view('profile.dashboard', [
            'breadcrumb' => $breadcrumb,
        ]);
    }
}
