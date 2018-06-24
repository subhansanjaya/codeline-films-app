<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Film;
use App\Http\Resources\FilmResource;
use Carbon\Carbon;
use Image;
use App\Comment;
use Illuminate\Support\Str;

class FilmAPIController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store', 'index', 'create', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return FilmResource::collection(Film::with('comments')->paginate(1));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check if request has an image
        if ($request->photo) {

        $image = $request->file('photo');

        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        $path = $request->file('photo')->store('storage/uploads','public');
        $photo = $path;

        } else {
            $photo ="default.png";
        }

        // release date change format
        $release_date = new Carbon($request->release_date);

        // save to database
        $film = Film::create([
        'name' => $request->name,
        'description' => $request->description,
        'release_date' => Carbon::createFromFormat('Y-m-d H:i:s', $release_date),
        'rating' => 5,
        'ticket_price' => $request->ticket_price,
        'country' => $request->country,
        'slug' =>Str::slug($request->name, '-'),
        'photo' => $photo,
        ]);

        $film->genres()->sync($request->genres, false);

        return new FilmResource($film);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
         return new FilmResource($film);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
