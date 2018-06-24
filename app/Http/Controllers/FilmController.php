<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Genre;

use App\Film;

use App\Comment;
use App\Country;

use Session;

class FilmController extends Controller
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
        $request = Request::create('/api/films/', 'GET');

        $response = Route::dispatch($request);

        return view('film.index')->withFilms($response) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $genres = Genre::all();
        $countries = Country::all();
        
      return view('film.create')->withGenres($genres)->withCountries($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request = Request::create('/api/films/', 'POST');
        $response = Route::dispatch( $request );

        Session::flash('success', 'The Film was successfully create.!');
        return redirect()->route('film.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $request = Request::create('/api/films/'.$slug, 'GET');

        $response = Route::dispatch($request);

        return view('film.show')->withFilms($response) ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
