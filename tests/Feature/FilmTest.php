<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Film;

class FilmTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testFilmAdd()
    {
        
        $film = Film::create([
            'name' => "Testtt",
            'description' => "Test Description",
            'release_date' => date("Y-m-d H:i:s",time()),
            'rating' => 7,
            'ticket_price' => 100,
            'country_id' => 1,
            'genre_id' => 1,
            'photo' => 'https://www.gstatic.com/webp/gallery3/1.sm.png',
            'created_at' => date("Y-m-d H:i:s",time()),
            'updated_at' => date("Y-m-d H:i:s",time()),
        ]);        
        
        $this->assertEquals('Testtt', $film->name); 
        
        
        
    }

    public function testFilms()
    {
        $this->visit('/')
         ->see('Films');
    }
    
}
