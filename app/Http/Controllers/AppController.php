<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Movie;
use App\Season;
use App\Show;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        $shows = Show::inRandomOrder()->take(10)->get();
        $movies = Movie::inRandomOrder()->take(10)->get();
        return view('index')->with('shows', $shows)->with('movies', $movies);

    }

    public function getTvShows(){
        $shows = Show::all();
        return view('shows.index')->with('shows', $shows);
    }

    public function getMovies(){
        $movies = Movie::orderBy('year', 'DESC')->orderBy('created_at', 'DESC')->get();
        return view('movies.index')->with('movies', $movies);
    }

    public function getShow($id){
        $show = Show::find($id);
        return view('show')->with('show', $show);
    }

    public function getMovie($id){
        $movie = Movie::find($id);
        return view('movie')->with('movie', $movie);
    }

    public function getSeason($id){
        $season = Season::find($id);
        return view('season')->with('season', $season);
    }

    public function getEpisode($id){
        $episode = Episode::find($id);
        return view('episode')->with('episode', $episode);
    }
}
