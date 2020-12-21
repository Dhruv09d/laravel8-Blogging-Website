<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    
    public function index() {
        //$title = "Welcome to the Blogs";
        //return view('pages.index', compact('title'));
        return view('pages.index');
    }
    
    public function about() {
        $title = "About us";
        return view('pages.about') -> with('title', $title);
    }
    public function services() {
        $data = array(
            'title' => 'Services',
            'services' => ['cleaning', 'robbery', 'prank', 'driving']
        );
        return view('pages.services') -> with($data);
    }
}
