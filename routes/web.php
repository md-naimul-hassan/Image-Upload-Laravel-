<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    return "user";
});



Route::post('/user',  function (Request $request) {

    return "ddsdjsfdjslk";
    try {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,gif|max:5120', // Max 5MB
        ]);

        // Define the destination folder for uploads
        $path = $request->file('image')->store('uploads', 'public');

        return response()->json([
            'message' => 'Image uploaded successfully!',
            'file_path' => Storage::url($path),
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
        ], 400);
    }
});
