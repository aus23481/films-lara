<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Film;
use App\Country;
use App\Genre;



class FilmController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["films"] =  Film::with("country")->with("genre")->paginate(1, ['*'], 'film');
        $data["countries"] = Country::all();
        $data["genres"] = Genre::all();
        return view('film', $data);
    }
     /**
      * /films
      * return all films
      * return json
      */
     public function getFilms()
    {
        $data["films"] = Film::with("country")->with("genre")->get();
        
        return response()->json($data);
        
    }
}
