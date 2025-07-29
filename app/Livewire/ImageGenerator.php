<?php

namespace App\Livewire;

use Livewire\Component;
use Intervention\Image\Facades\Image;
use Intervention\Image\Font;
use Livewire\WithFileUploads;

class ImageGenerator extends Component
{
    use WithFileUploads;
    public $text, $image, $font, $generatedImagePath;

    public function generateImage()
    {
        $this->validate([
            'image' => 'required|image',
            'text' => 'required|string|max:255',
        ]);

        $uploadedPath = $this->image->store('temp-images', 'public');
        $image = Image::make(storage_path('app/public/' . $uploadedPath));

        $image->text('The quick brown fox', 120, 100, function (FontFactory $font) {
            $font->filename('./Bitcount_Prop_Double/BitcountPropDouble.ttf');
            $font->size(70);
            $font->color('fff');
            $font->stroke('ff5500', 2);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1.6);
            $font->angle(10);
            $font->wrap(250);
        });

        $image->save(storage_path('app/public/' . $uploadedPath));

        $this->generatedImagePath = 'storage/' . $uploadedPath;
    }
    public function render()
    {
        return view('livewire.image-generator');
    }
}
