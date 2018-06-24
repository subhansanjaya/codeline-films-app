<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Film;
use App\Comment;
use App\Http\Resources\CommentResource;

class CommentAPIController extends Controller
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

        // save data
        $data = [
        'film_id' => 1,
        'user_id' => 1,
        'name' => $request->name,
        'comment' => $request->comment
        ];

        $comment = Comment::create($data);

      return new CommentResource($comment);
    }
 
}
