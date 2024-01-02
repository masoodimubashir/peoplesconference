<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\PhotoService;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
    public function update_photo(Request $request, PhotoService $photoService)
    {
        $request->validate(['photo' => 'mimes:jpeg,png,jpg,gif|max:2048',]);

        $user = auth()->user();

        $photoService->UpdatePhoto($user, $request);

        return redirect()->to('/dashboard');
    }


}
