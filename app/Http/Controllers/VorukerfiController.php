<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VorukerfiController extends Controller
{
    public $crumbs = [];

    public function index()
    {
        $cats   = \App\Category::where('status', 1)->where('parent_id', 0)->orderBy('order')->get();
        $prods  = \App\Product::where('status', 1)->where('category_id', 0)->orderBy('order')->get();

        $data['items'] = $cats->merge($prods);
        $data['title'] = 'Vörur';

        return view('frontend.products')->with($data);
    }

    // Sýnir annaðhvort vöru eða flokk
    public function show($slug)
    {
        // Tökum bara síðasta stykkið
        $e = array_filter(explode("/", $slug));
        $last = end($e);

        $item = \App\Category::where('status', 1)->where('slug', $last)->first();

        if($item) {
            $cats   = \App\Category::where('status', 1)->where('parent_id', $item->id)->orderBy('order')->get();
            $prods  = \App\Product::where('status', 1)->where('category_id', $item->id)->orderBy('order')->get();

            $data['items'] = $cats->merge($prods);
            $data['title'] = $item->title;

            return view('frontend.products')->with($data);
        }

        $item = \App\Product::where('status', 1)->where('slug', $last)->first();

        if(!$item) {
            if (!$item) abort(404, 'Fann ekki síðu!');
        }

        $data['item'] = $item;
        $data['siblings'] = $item->getSiblings();

        $data['title'] = isset($item->category->title) ? $item->category->title : 'Vörur';

        if($item->category_id < 1) {
            $data['title'] = $item->title;
        }

        return view('frontend.product')->with($data);
    }
}
