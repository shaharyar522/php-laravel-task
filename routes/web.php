<?php
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);





// no uay task 2 hain

Route::get('/posts', function () {
    $res = Http::get('https://jsonplaceholder.typicode.com/posts');

    return collect($res->json())->take(10)->map(function ($post) {
        return [
            'title' => $post['title'],
            'body' => $post['body']
        ];
    });
});



// uiay task  3 here is this
Route::get('/quotes', function () {
    $html = file_get_contents("http://quotes.toscrape.com/");

    preg_match_all('/<span class="text".*?>(.*?)<\/span>.*?<small class="author".*?>(.*?)<\/small>/s', $html, $matches);

    $data = [];

    foreach ($matches[1] as $i => $q) {
        $data[] = [
            'quote' => strip_tags($q),
            'author' => $matches[2][$i]
        ];
    }

    return $data;
});



// now task 4 here is this
Route::get('/custom', function () {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts/1");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "User-Agent: MyApp",
        "Accept: application/json"
    ]);

    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    return [
        'status' => $status,
        'data' => json_decode($response)
    ];
});