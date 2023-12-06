<?php

namespace App\Http\Controllers\Tenancy;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index() {
        
        return view('tenancy.file-upload');
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName(); // Get the original file name

            //get sub-domain
            $host = $_SERVER['HTTP_HOST'];
            $hostParts = explode('.', $host);

            //$file->storeAs('uploads', $fileName); // Store the file in the 'uploads' directory

            // You can do more operations here, like storing the file path in the database

            return "File uploaded successfully!";
        }

        return "No file uploaded!";
    }
}
