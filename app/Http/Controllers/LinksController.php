<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use App\Link;

class LinksController extends Controller
{
    public function show($id){
      $link = Link::findOrFail($id);
      return new RedirectResponse($link->url, 301);
    }

    public function create(){
      return view('links.create');
    }

    public function store(){
      $url = Input::get('url');
      //Première solution
      // $link = Link::where('url', $url)->first();
      // if(!$link){
      //   $link = Link::create(['url' => $url]);
      // }

      //Deuxième solution
      $link = Link::firstOrCreate(['url' => $url]);
      return view('links.success', compact('link'));
      // dd(Input::get('url'));
    }
}
