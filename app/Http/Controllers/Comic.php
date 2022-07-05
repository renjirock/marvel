<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Favorites;

class Comic extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function get_comic($id)
    {
        $response = Http::get('https://gateway.marvel.com/v1/public/comics/'.$id.'?ts='.env('TS').'&apikey='.env('MARVEL_PUBLIC_KEY').'&hash='.env('MARVEL_HASH'));

        $comic = $response->json()['data']['results'][0];

        $thumbnail = $comic['thumbnail']['path'].'.'.$comic['thumbnail']['extension'];

        $creators = $comic['creators']['items'];

        $stories = $comic['stories']['items'];

        $title = $comic['title'];

        $is_favorite = $this->is_favorite($id);

        return view('comic', [
            'thumbnail' => $comic,
            'creators' => $creators,
            'stories' => $stories,
            'title' => $title,
            'thumbnail' => $thumbnail,
            'is_favorite' => $is_favorite,
            'id' => $id
        ]);
    }



    private function is_favorite($comic_id)
    {
        $favorite = Favorites::where('comic_id', $comic_id)
                                ->where('is_active', true)
                                ->first();

        if ($favorite)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
