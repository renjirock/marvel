<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Favorites;

class Favorite extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add_favorite(Request $request)
    {
        $comic_id = $request->input('id');
        $title = $request->input('title');
        $thumbnail = $request->input('thumbnail');

        $favorite = new Favorites;

        $favorite->comic_id = $comic_id;
        $favorite->name = $title;
        $favorite->thumbnail = $thumbnail;
        $favorite->is_active = true;

        $favorite->save();

        return redirect('comic/'.$comic_id);
    }

    public function delte_favorite(Request $request)
    {
        $comic_id = $request->input('id');

        $favorite = Favorites::where('comic_id', $comic_id)
                                ->where('is_active', true)
                                ->first();

        $favorite->is_active = false;
        $favorite->save();

        return redirect('comic/'.$comic_id);
    }

    public function get_favorites(Request $request)
    {
        if ($request->input('page') > 1)
        {
            $page = $request->input('page');

        }
        else
        {
            $favorites = Favorites::where('is_active', true)
                                    ->get();
            return view('favorites', ['favorites' => $favorites, 'page' => 1]);
        }
    }
}
