<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Film;
use App\Country;
use App\Genre;
use App\Comment;



class FilmController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
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
      * show films
      * return all films
      * return format json
      */
     public function getFilms()
    {
        $data["success"] = false;
            
        try {           
            
            $data["films"] = Film::with("country")->with("genre")->get();
            $data["success"] = true;
        }
        catch (\Exception $e) {
            $data["error"] = $e->getMessage();
        }
      //end of try
        return response()->json($data);
        
    }
    
    /**
      * Create films
      * return created film, status
      * param post films fields
      * return format json
      */
    public function createFilm(Request $request)
    {
        $data["success"] = false;

        try {
            
            $film = Film::create([
                
                        'name' => $request->input("name"),
                        'description' => $request->input("description"),
                        'release_date' => date("Y-m-d H:i:s", strtotime($request->input("release_date"))),
                        'rating' => $request->input("rating"),
                        'ticket_price' => $request->input("ticket_price"),
                        'country_id' => $request->input("country_id"),
                        'genre_id' => $request->input("genre_id"),
                        'photo' => $request->input("photo"),
                        'created_at' => date("Y-m-d H:i:s",time()),
                        'updated_at' => date("Y-m-d H:i:s",time()),
            
                    ]);
                
            if($film != null) {
                $data["success"] = true;
                $data["film"] = $film;
            }
                
        }
        catch (\Exception $e) {
            $data["error"] = $e->getMessage();
        }
        
        return response()->json($data);
        
    }

        /**
      * Create films
      * return created film, status
      * param post films fields
      * return format json
      */
      public function addComment(Request $request)
      {
          $data["success"] = false;
  
          try {
              
              $comment = Comment::create([                  
                          'comment' => $request->input("comment"),                          
                          'user_id' => Auth::id(),
                          'film_id' => $request->input("film_id"),
                          'created_at' => date("Y-m-d H:i:s",time()),
                          'updated_at' => date("Y-m-d H:i:s",time()),
                      ]);
                  
              if($comment != null) {
                  $data["success"] = true;
                  $data["comment"] = $comment;
              }
                  
          }
          catch (\Exception $e) {
              $data["error"] = $e->getMessage();
          }
          
          return response()->json($data);
          
      }

    public function getComments() {

        $data["success"] = false;
        
        try {           
            
            $data["comments"] = Comment::with("user")->where("film_id", $_REQUEST["film_id"])->get();
            $data["success"] = true;

        }
        catch (\Exception $e) {
            $data["error"] = $e->getMessage();
        }
        //end of try
        
        return response()->json($data);

    }

    public function redirectToFilm($name) {

        $data["films"] =  Film::with("country")->with("genre")->where("name", $name)->paginate(1, ['*'], 'film');
        $data["countries"] = Country::all();
        $data["genres"] = Genre::all();
        return view('film', $data);
        
    }


}
