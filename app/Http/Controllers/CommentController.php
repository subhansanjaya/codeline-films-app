<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use Session;
class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // use comments api
        $request = Request::create('/api/films/comments/', 'POST');
        $response = Route::dispatch( $request );

        Session::flash('success', 'The comment was successfully added.');
        return redirect()->route('films.index');
    }

   
}
