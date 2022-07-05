<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->input('page') > 1)
        {
            $page = $request->input('page');
            $get_comics = $this->get_comics($page);
            return view('index', ['comics' => $get_comics['results'], 'page' => $page]);;
        }
        else
        {
            $get_comics = $this->get_comics();
            $total_pages = $get_comics['total']/10;
            return view('index', ['comics' => $get_comics['results'],'total_pages' => $total_pages, 'page' => 1]);
        }


    }

    private function get_comics($page = 0)
    {
        if ($page > 1)
        {
            $page = 10 * ($page - 1) + 1;
        }
        $response = Http::get('https://gateway.marvel.com/v1/public/comics?ts='.env('TS').'&apikey='.env('MARVEL_PUBLIC_KEY').'&hash='.env('MARVEL_HASH').'&offset='.$page.'&format=comic&formatType=comic&limit=10');

        $comics = $response->json()['data'];

        return $comics;
    }
}
