<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gemini\Laravel\Facades\Gemini;

class GeminiController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        // working already

        // $apikey = getenv('GEMINI_API_KEY');

        // $result = Gemini::geminiPro()->generateContent($apikey,'what is test');

        // dd($result->text()); // Hello! How can I assist you today?

        return view('instructor.dashboard');
    }
}
