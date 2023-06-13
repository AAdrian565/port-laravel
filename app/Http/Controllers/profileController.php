<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class profileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    function update(Request $request)
    {
        $request->validate([
            '_photo' => 'mimes:jpeg,jpg,png,gif',
            '_email' => 'required|email'
        ], [
            '_photo.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            '_email.required' => 'Email wajib diisi',
            '_email.email' => 'Format email yang dimasukkan tidak valid'
        ]);

        if ($request->hasFile('_photo')) {
            $photo_file = $request->file('_photo');
            $Photo_extension = $photo_file->extension();
            $foto_baru = date('ymdhis') . ".$Photo_extension";
            $photo_file->move(public_path('photo'), $foto_baru);
            $old_photo = get_meta_value('_photo');
            File::delete(public_path('photo') . "/" . $old_photo);

            metadata::updateOrCreate(['meta_key' => '_photo'], ['meta_value' => $foto_baru]);
        }

        metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
        metadata::updateOrCreate(['meta_key' => '_city'], ['meta_value' => $request->_city]);
        metadata::updateOrCreate(['meta_key' => '_phone'], ['meta_value' => $request->_phone]);


        metadata::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->_linkedin]);
        metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);

        return redirect()->route('profile.index')->with('success', 'Berhasil update data profile');
    }
}
