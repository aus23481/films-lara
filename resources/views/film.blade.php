@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All Films
                    <div style="float:right"><button type="button" data-toggle="modal" data-target="#addFilmModal" class="btn btn-primary">Add New Film</button></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    
                            @if(count($films))
                            @foreach($films as $film)
                            
                            <div class="media">
                                <div class="media-left media-top">
                                <img src="{{$film->photo}}" class="media-object" style="width:60px">
                                </div>
                                <div class="media-body">
                                <input type="hidden" name="film_id" id="film_id" value="{{$film->id}}">
                                  <h4 class="media-heading">{{$film->name}}</h4>
                                  <p>{{$film->description}}</p>

                                  <h4 class="media-heading">Release Date:{{date("Y-m-d",strtotime($film->release_date))}}</h4>
                                  <h4 class="media-heading">Rating:{{$film->rating}}</h4>
                                  <h4 class="media-heading">Ticket Price:{{$film->ticket_price}}</h4>
                                  <h4 class="media-heading">Country:{{$film->country->name}}</h4>  
                                  <h4 class="media-heading">Genre:{{$film->genre->name}}</h4>  
                                  <h4 class="media-heading">Created:{{date("Y-m-d",strtotime($film->created_at))}}</h4>

                                  <hr >
                                </div>
                              </div>
                              
                                
                            @endforeach
                        @endif
    

                        <div class="text-right"> {{ $films->links() }} </div> 


                      
                         

                        <div class="panel panel-default">
                                <div class="panel-heading">Comments</div>
                                <div class="panel-body">

                                    @if (Auth::check())
                                        <div class="form-control">
                                       
                                            <textarea class="form-control" name="comment" id="comment"></textarea>
                              
                                        </div>
                                        <div class="form-control">
                                                <button id="btn_comment" onclick="addComment()" class="btn btn-primary">Comment</button>

                                        </div>
                                    @endif

                                    <br><br>

                                    <div id="div_comments">
                                        No comments
                                    </div>

                                </div>
                        </div>       




            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="addFilmModal" class="modal fade" role="dialog">
    <form id="form_add_film">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Modal Header</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
             

                    <div class="form-group">                            
                            <b>Name (Also film's slug)</b>
                            <input class="form-control" type="text" required id="name" name="name" placeholder="Number here... ">
                    </div>
                    
                    <div class="form-group">                            
                            <b>Description</b>
                            <textarea class="form-control" type="text"
                             required id="description" name="description" 
                             placeholder="Description here"> </textarea>
                    </div>
                    <div class="form-group">                            
                            <b>Release Date</b>
                            <input class="form-control" type="date"  required id="release_date" name="release_date" >
                    </div>


                    <div class="form-group">                            
                            <b>Rating</b>
                            <input class="form-control" type="range" min="1" max="5" value="5" required id="rating" name="rating" >
                    </div>

                    <div class="form-group">                            
                            <b>Ticket Price</b>
                            <input class="form-control" type="text" required id="ticket_price" name="ticket_price" >
                    </div>

                    <div class="form-group">                            
                            <b>Country</b>
                            <select class="form-control"  required id="country_id" name="country_id" >
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                            </select>    
                    </div>

                    <div class="form-group">                            
                            <b>Genre</b>
                            <select class="form-control"  required id="genre_id" name="genre_id" >
                            @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                            @endforeach
                            </select>    
                    </div>

                    <div class="form-group">                            
                            <b>Photo (Online URL)</b>
                            <input value="https://www.gstatic.com/webp/gallery3/1.sm.png" class="form-control" type="text" required id="photo" name="photo" placeholder="https://www.gstatic.com/webp/gallery3/1.sm.png" >
                            
                    </div>





            </div>
            <div class="modal-footer">
                    <button id="btn_add_film" type="button" onclick="addFilm()" class="btn btn-default" >Add Film</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      
        </div>
    </form>
      </div>
<!-- modal-->      
@endsection
