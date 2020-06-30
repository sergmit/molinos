<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Http\Services\FeedbackService;
use App\Http\Services\FileUploadService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.index');
    }

}
