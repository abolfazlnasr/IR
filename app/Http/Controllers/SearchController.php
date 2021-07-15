<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->get('query');

        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'jobs',
            'body' => [
                'query' => [
                    'multi_match' => [
                        'query' => $query,
                        'type' => 'best_fields',
                        'fields' => [
                            Page::TITLE . "^3",
                            Page::DESCRIPTION
                        ],
                    ]
                ]
            ]
        ];

        $results = $client->search($params);

        return view('search', ['results' => $results]);
    }

    public function insertIntoElastic(Request $request): void
    {
        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'jobs',
        ];

        $pages = Page::all();

        foreach ($pages as $page) {
            $params['id'] = $page->id;

            $params['body'] = [
                'title' => $page->title,
                'company' => $page->company,
                'level' => $page->level,
                'contract_type' => $page->contract_type,
                'link' => $page->link,
                'description' => $page->description
            ];

            $client->index($params);
        }

        echo "insert completed.<br>";
    }
}
