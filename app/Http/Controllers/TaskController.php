<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller  
{
    /**
     * Task 2: Consume an External API
     */
    public function fetchPosts(Request $request)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch posts'], 500);
        }

        $posts = collect($response->json())->take(10);

        // Bonus: Search feature
        if ($request->has('search')) {
            $search = strtolower($request->get('search'));
            $posts = $posts->filter(function ($post) use ($search) {
                return str_contains(strtolower($post['title']), $search);
            });
        }

        $formattedPosts = $posts->map(function ($post) {
            return [
                'title' => $post['title'],
                'body' => $post['body']
            ];
        })->values();

        return response()->json($formattedPosts);
    }

    /**
     * Task 3: Basic Web Scraping Task
     */
    public function scrapeQuotes()
    {
        $quotes = [];
        $pagesToScrape = 2; // Bonus: Scrape multiple pages

        for ($i = 1; $i <= $pagesToScrape; $i++) {
            $url = "http://quotes.toscrape.com/page/{$i}/";
            $html = @file_get_contents($url);

            if (!$html) continue;

            $dom = new \DOMDocument();
            @$dom->loadHTML($html);
            $xpath = new \DOMXPath($dom);

            $quoteElements = $xpath->query('//div[@class="quote"]');

            foreach ($quoteElements as $element) {
                $text = $xpath->query('.//span[@class="text"]', $element)->item(0)->nodeValue;
                $author = $xpath->query('.//small[@class="author"]', $element)->item(0)->nodeValue;

                $quotes[] = [
                    'quote' => trim($text, " \t\n\r\0\x0B\u{A0}“”\""),
                    'author' => $author
                ];
            }
        }

        return response()->json($quotes);
    }

    /**
     * Task 4: HTTP Request with Custom Headers
     */
    public function customRequest()
    {
        // Bonus: Implement retry logic
        $response = Http::withHeaders([
            'User-Agent' => 'My_php_laravel_task',
            'Accept' => 'application/json'
        ])->retry(3, 100)->get('https://jsonplaceholder.typicode.com/posts/1');

        return response()->json([
            'status' => $response->status(),
            'headers' => [
                'User-Agent' => 'My_php_laravel_task',
                'Accept' => 'application/json'
            ],
            'response' => $response->json()
        ]);
    }
}
