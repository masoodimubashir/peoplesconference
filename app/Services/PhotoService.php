<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class PhotoService
{

    public function UpdatePhoto($user, $request): void
    {
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            if ($user && $user->photo) {
                Storage::delete('public/images/' . $user->photo);
            }

            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/images', $fileName);
            $user->update(['photo' => $fileName]);
        }
    }

}
