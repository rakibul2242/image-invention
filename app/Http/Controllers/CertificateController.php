<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Jobs\GenerateCertificate;

class CertificateController extends Controller
{
    public function generate(Request $request)
    {
        $name = 'MD Rakibul Islam';
        // $title = 'Certificate of Achievement';
        $title = 'text';
        // $subtitle = 'Successfully completed the Baking & Cooking Course';
        $subtitle = 'text 2';
        $date = now()->format('F d, Y');

        GenerateCertificate::dispatch($name, $title, $subtitle, $date);
        Cache::forget('certificate_generated_file');
        return redirect()
            ->back()
            ->with([
                'status' => 'processing',
                'message' => 'Your certificate is being generated. Please wait...',
            ]);
    }
}
