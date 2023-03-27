<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class ChatbotController extends Controller
{
    public function generateResponse(Request $request)
    {
        $inputText = $request->input('text');
        $apiKey = config('openai.api_key');
        $model = config('openai.model');

        OpenAi::setApiKey($apiKey);
        $response = OpenAI::completion($model, $inputText);

        return response()->json([
            'response' => $response['choices'][0]['text']
        ]);
    }
}
