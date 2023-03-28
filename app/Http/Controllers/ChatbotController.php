<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Orhanerday\OpenAi\OpenAi;
// use OpenAI\Client as OpenAi;
use Orhanerday\OpenAi\OpenAi;

$open_ai = new OpenAi(env('OPEN_AI_API_KEY'));
class ChatbotController extends Controller
{
    public function generateResponse(Request $request)
    {
        // return 'holaa';
        // return $request->input('text');
        // dd('entra');
        $inputText = $request->input('text');
        $apiKey = config('openai.api_key');
        $model = config('openai.model');

        OpenAi::setApiKey($apiKey);
        $response = OpenAi::completion($model, $inputText);

        return response()->json([
            'response' => $response['choices'][0]['text']
        ]);
    }
}
