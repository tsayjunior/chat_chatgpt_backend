<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;
// $open_ai_key = getenv('OPENAI_API_KEY');
// $open_ai = new OpenAi($open_ai_key);

// $chat = $open_ai->chat([
//    'model' => 'gpt-3.5-turbo',
//    'messages' => [
//        [
//            "role" => "system",
//            "content" => "You are a helpful assistant."
//        ],
//        [
//            "role" => "user",
//            "content" => "Who won the world series in 2020?"
//        ],
//        [
//            "role" => "assistant",
//            "content" => "The Los Angeles Dodgers won the World Series in 2020."
//        ],
//        [
//            "role" => "user",
//            "content" => "Where was it played?"
//        ],
//    ],
//    'temperature' => 1.0,
//    'max_tokens' => 4000,
//    'frequency_penalty' => 0,
//    'presence_penalty' => 0,
// ]);


// var_dump($chat);
// echo "<br>";
// echo "<br>";
// echo "<br>";
// // decode response
// $d = json_decode($chat);
// // Get Content
// echo($d->choices[0]->message->content);
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
