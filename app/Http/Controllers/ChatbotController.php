<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;
// use OpenAI;
// use Orhanerday\OpenAi\OpenAi;
// use OpenAI\Client as OpenAi;
// use Orhanerday\OpenAi\OpenAi;

// $open_ai = new OpenAi(env('OPEN_AI_API_KEY'));
class ChatbotController extends Controller
{
    public function generateResponse(Request $request)
    {
        // // return 'holaa';
        // return $request->input('text');
        // // dd('entra');
        // $inputText = $request->input('text');
        // $apiKey = config('openai.api_key');
        // $model = config('openai.model');

        // OpenAi::setApiKey($apiKey);
        // $response = OpenAi::completion($model, $inputText);

        // return response()->json([
        //     'response' => $response['choices'][0]['text']
        // ]);

        $openai = new OpenAi(env('OPENAI_API_KEY'));
// return($openai);
        // $response = $openai->complete([
        //     'model' => 'text-davinci-002',
        //     "messages" => ["role" => "user","content" => $request->input('text')],
        //     'temperature' => 0.5,
        //     'max_tokens' => 50,
        //     'n' => 1,
        //     'stop' => ['\n']
        // ]);
        $complete = $openai->completion([
            'model' => 'text-davinci-003',
            'prompt' => $request->input('text'),
            // 'prompt' => 'hello',
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
         ]);
        // $d = json_decode($response);
        $d = json_decode($complete);

// Get Content
        return($d->choices[0]->text);
        // return $complete;
    }
}
