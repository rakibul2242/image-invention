<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Typography\FontFactory;

class AddTextController extends Controller
{
    public function view()
    {
        return view('add-text');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title1' => 'required',
            'title2' => 'required',
            'title3' => 'required',
            'title4' => 'required',
        ]);

        $file = public_path('Baking.jpg');
        $text1 = $request->input('title1');
        $text2 = $request->input('title2');
        $text3 = $request->input('title3');
        $text4 = $request->input('title4');

        $manager = new ImageManager(new Driver());
        $image = $manager->read($file);

        $image->text($text1, 535, 418, function (FontFactory $font) {
            $font->filename(public_path('fonts/Style_Script/StyleScript.ttf'));
            $font->size(20);
            $font->color('000');
            // $font->stroke('000', 1);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1);
            $font->angle(1);
            $font->wrap(0);
        });

        $image->text($text2, 670, 417, function (FontFactory $font) {
            $font->filename(public_path('fonts/Style_Script/StyleScript.ttf'));
            $font->size(20);
            $font->color('000');
            // $font->stroke('000', 1);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1);
            $font->angle(0);
            $font->wrap(0);
        });

        $image->text($text3, 385, 525, function (FontFactory $font) {
            $font->filename(public_path('fonts/Style_Script/StyleScript.ttf'));
            $font->size(20);
            $font->color('000');
            // $font->stroke('000', 1);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1);
            $font->angle(0);
            $font->wrap(0);
        });

        $image->text($text4, 700, 525, function (FontFactory $font) {
            $font->filename(public_path('fonts/Style_Script/StyleScript.ttf'));
            $font->size(20);
            $font->color('000');
            // $font->stroke('000', 1);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1);
            $font->angle(0);
            $font->wrap(0);
        });

        $fileName = time() . '.' . 'jpg';
        $image->save(storage_path('app/public/' . $fileName));

        return back()
            ->withInput()
            ->with([
                'success' => 'Text written on image successfully',
                'image_path' => $fileName,
            ]);
    }
}
