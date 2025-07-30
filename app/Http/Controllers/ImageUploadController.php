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
            'file' => 'required|image',
        ]);

        $uploadedFile = $request->file('file');
        $text = $request->input('title');

        $manager = new ImageManager(new Driver());
        $image = $manager->read($uploadedFile->getRealPath());

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

        $filename = $uploadedFile->hashName();
        $image->save(storage_path('app/public/' . $filename));

        return back()->with([
            'success' => 'Image uploaded successfully',
            'image_path' => $filename,
        ]);
    }
}
