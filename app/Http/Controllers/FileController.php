<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * @param File $file
     * @return mixed
     */
    public function index(File $file)
    {
        return Storage::download($file->path);
    }
}
