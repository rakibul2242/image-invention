<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

use Illuminate\Foundation\Bus\Dispatchable;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Typography\FontFactory;

class GenerateCertificate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $name, $title, $subtitle, $date;
    /**
     * Create a new job instance.
     */
    public function __construct($name, $title, $subtitle, $date)
    {
        $this->name = $name;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->date = $date;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $file = public_path('Baking.jpg');
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file);

        $image->text($this->title, 535, 418, function (FontFactory $font) {
            $font->filename(public_path('fonts/Style_Script/StyleScript.ttf'));
            $font->size(20);
            $font->color('000');
            // $font->stroke('000', 1);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1);
            $font->angle(1);
            // $font->wrap(0);
        });

        $image->text($this->subtitle, 670, 417, function (FontFactory $font) {
            $font->filename(public_path('fonts/Style_Script/StyleScript.ttf'));
            $font->size(20);
            $font->color('000');
            // $font->stroke('000', 1);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1);
            $font->angle(0);
            // $font->wrap(0);
        });

        $image->text($this->date, 385, 525, function (FontFactory $font) {
            $font->filename(public_path('fonts/Style_Script/StyleScript.ttf'));
            $font->size(20);
            $font->color('000');
            // $font->stroke('000', 1);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1);
            $font->angle(0);
            // $font->wrap(0);
        });

        $image->text($this->name, 700, 525, function (FontFactory $font) {
            $font->filename(public_path('fonts/Style_Script/StyleScript.ttf'));
            $font->size(20);
            $font->color('000');
            // $font->stroke('000', 1);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1);
            $font->angle(0);
            // $font->wrap(0);
        });

        $fileName = time() . '.' . 'jpg';
        $image->save(storage_path('app/public/' . $fileName));
        Cache::put('certificate_generated_file', $fileName, 60);
    }
}
