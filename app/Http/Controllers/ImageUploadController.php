<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Typography\FontFactory;

class ImageUploadController extends Controller
{
    public function view()
    {
        return view('upload');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|image|max:2048',
        ]);

        $uploadedFile = $request->file('file');
        $text = $request->input('title');

        // ✅ Create the ImageManager instance manually (v3)
        $manager = new ImageManager(new Driver());

        // ✅ Read image using ImageManager
        $image = $manager->read($uploadedFile->getRealPath());

        // ✅ Add text
        $image->text($text, 120, 100, function (FontFactory $font) {
            $font->filename(public_path('Bitcount_Prop_Double/BitcountPropDouble.ttf'));
            $font->size(70);
            $font->color('fff');
            $font->stroke('ff5500', 2);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1.6);
            $font->angle(10);
        });

        // ✅ Save the image
        $filename = $uploadedFile->hashName();
        $image->save(storage_path('app/public/' . $filename));

        return back()->with('success', 'Image uploaded: ' . $filename . ' with text: ' . $text);
    }
}
