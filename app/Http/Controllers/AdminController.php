<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Movie;
use App\Season;
use App\Show;
use Illuminate\Support\Facades\File;
use Monolog\Handler\StubNewRelicHandlerWithoutExtension;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function getMovies(){
        $movies = Movie::all();
        return view('admin.movies')->with('movies', $movies);
    }

    public function getShows(){
        $shows = Show::orderBy('created_at', 'DESC')->get();
        return view('admin.shows')->with('shows', $shows);
    }

    public function getAddShow(){
        return view('admin.add_show');
    }

    public function addShow(Request $request){
        $validator = Validator::make($request->all(), [
            'name'  =>  'required|unique:shows,name',
            'image'  =>  'required|image'
        ]);

        if($validator->passes()){
            $show = new Show();
            $show->name = $request->name;
            $show->image_uri = $this->uploadImageAndReturnURI($request->file('image'),'show');
            if($show->save()){
                return redirect('/admin/shows');
            }
        }else{
            return redirect('/admin/shows/add')->withErrors($validator)->withInput();
        }
    }

    public function removeShow(Request $request){
        $show = Show::find($request->id);

        if($this->removeImage($show->image_uri) && $show->delete()){
            return response()->json(true);
        }

        return response()->json(false);
    }

    public function getUpdateShow($id){
        $show = Show::find($id);
        return view('admin.update_show')->with('show', $show);
    }

    public function updateShow(Request $request){
        $validator = Validator::make($request->all(), [
            'name'  =>  'required|unique:shows,name,'.$request->id,
            'image'  =>  $request->hasFile('image') ? 'required|image' : ''
        ]);

        if($validator->passes()){
            $show = Show::find($request->id);
            $show->name = $request->name;
            if($request->hasFile('image')){
                $show->image_uri = $this->updateImageAndReturnURI($request->file('image'),'show', $show->image_uri);
            }

            if($show->save()){
                return redirect('/admin/shows');
            }
        }else{
            return redirect('/admin/shows/update/'.$request->id)->withErrors($validator)->withInput();
        }
    }

    public function getAddMovie(){
        return view('admin.add_movie');
    }

    public function addMovie(Request $request){
        $validator = Validator::make($request->all(), [
            'name'  =>  'required|unique:movies,name',
            'image'  =>  'required|image',
            'video_uri' =>  'required',
            'year'  =>  'required|numeric|digits:4'
        ]);

        if($validator->passes()){
            $movie = new Movie();
            $movie->name = $request->name;
            $movie->video_uri = $request->video_uri;
            $movie->year = $request->year;
            $movie->image_uri = $this->uploadImageAndReturnURI($request->file('image'),'movie');
            if($movie->save()){
                return redirect('/admin/movies');
            }
        }else{
            return redirect('/admin/movies/add')->withErrors($validator)->withInput();
        }
    }

    public function removeMovie(Request $request){
        $movie = Movie::find($request->id);

        if($this->removeImage($movie->image_uri) && $movie->delete()){
            return response()->json(true);
        }

        return response()->json(false);
    }

    public function getUpdateMovie($id){
        $movie = Movie::find($id);
        return view('admin.update_movie')->with('movie', $movie);
    }

    public function updateMovie(Request $request){
        $validator = Validator::make($request->all(), [
            'name'  =>  'required|unique:movies,name,'.$request->id,
            'image'  =>  $request->hasFile('image') ? 'required|image' : '',
            'video_uri' =>  'required',
            'year'  =>  'required|numeric|digits:4'
        ]);

        if($validator->passes()){
            $movie = Movie::find($request->id);
            $movie->name = $request->name;
            $movie->video_uri = $request->video_uri;
            $movie->year = $request->year;
            if($request->hasFile('image')){
                $movie->image_uri = $this->updateImageAndReturnURI($request->file('image'),'movie', $movie->image_uri);
            }

            if($movie->save()){
                return redirect('/admin/movies');
            }
        }else{
            return redirect('/admin/shows/update/'.$request->id)->withErrors($validator)->withInput();
        }
    }



    public function uploadImageAndReturnURI($file, $type){
        $path = Storage::disk('public')->putFileAs(
            $type, $file, str_random(10).'.'.$file->getClientOriginalExtension()
        );
        return $path;
    }

    public function updateImageAndReturnURI($file, $type, $uri){
        if(Storage::disk('public')->delete($uri)){
            $path = Storage::disk('public')->putFileAs(
                $type, $file, str_random(10).'.'.$file->getClientOriginalExtension()
            );
            return $path;
        }
        return false;
    }

    public function removeImage($uri){
        return Storage::disk('public')->delete($uri);
    }

    public function getShowSeasons($id){
        $show = Show::find($id);
        return view('admin.seasons')->with('show', $show);
    }

    public function getAddSeason($id){
        $show = Show::find($id);
        return view('admin.add_season')->with('show', $show);
    }

    public function addSeason(Request $request){
        $validator = Validator::make($request->all(), [
            'season_no'  =>  'required|numeric|min:1',
            'year'  =>  'required|numeric|digits:4'
        ]);

        if($validator->passes()){
            $season = new Season();
            $season->season_no = $request->season_no;
            $season->year = $request->year;
            $season->show_id = $request->id;
            if($season->save()){
                return redirect('/admin/shows/'.$request->id.'/seasons');
            }
        }else{
            return redirect('/admin/shows/'.$request->id.'/seasons/add')->withErrors($validator)->withInput();
        }
    }

    public function updateSeason(Request $request){
        $validator = Validator::make($request->all(), [
            'season_no'  =>  'required|numeric|min:1',
            'year'  =>  'required|numeric|digits:4'
        ]);

        if($validator->passes()){
            $season = Season::find($request->id);
            $season->season_no = $request->season_no;
            $season->year = $request->year;
            if($season->save()){
                return redirect('/admin/shows/'.$season->show->id.'/seasons');
            }
        }else{
            return redirect('/admin/shows/seasons/'.$request->id.'/update')->withErrors($validator)->withInput();
        }
    }

    public function removeSeason(Request $request){
        $season = Season::find($request->id);

        if($season->delete()){
            return response()->json(true);
        }

        return response()->json(false);
    }

    public function getUpdateSeason($id){
        $season = Season::find($id);
        return view('admin.update_season')->with('season', $season);
    }

    public function getSeasonEpisodes($id){
        $season = Season::find($id);
        return view('admin.season')->with('season', $season);
    }

    public function getAddSeasonEpisodes($id){
        $season = Season::find($id);
        return view('admin.add_episode')->with('season', $season);
    }

    public function addEpisode(Request $request){
        $validator = Validator::make($request->all(), [
            'episode_no'  =>  'required|numeric|min:1',
            'video_uri' =>  'required',
        ]);

        if($validator->passes()){
            $episode = new Episode();
            $episode->episode_no = $request->episode_no;
            $episode->video_uri = $request->video_uri;
            $episode->season_id = $request->id;
            if($episode->save()){
                return redirect('/admin/seasons/'.$request->id.'/episodes');
            }

        }else{
            return redirect('/admin/seasons/'.$request->id.'/episodes/add')->withErrors($validator)->withInput();
        }
    }

    public function removeEpisode(Request $request){
        $episode = Episode::find($request->id);

        if($episode->delete()){
            return response()->json(true);
        }
        return response()->json(false);
    }

    public function getUpdateSeasonEpisode($id){
        $episode = Episode::find($id);
        return view('admin.update_episode')->with('episode', $episode);
    }

    public function updateEpisode(Request $request){
        $validator = Validator::make($request->all(), [
            'episode_no'  =>  'required|numeric|min:1',
            'video_uri' =>  'required',
        ]);


        if($validator->passes()){
            $episode = Episode::find($request->id);
            $episode->episode_no = $request->episode_no;
            $episode->video_uri = $request->video_uri;
            if($episode->save()){
                return redirect('/admin/seasons/'.$episode->season->id.'/episodes');
            }

        }else{
            return redirect('/admin/episode/'.$request->id.'/update')->withErrors($validator)->withInput();
        }
    }

    public function syncContent(){
        $movies = File::allFiles('D:/Movies/pkstreams');

        shuffle($movies);
        foreach ($movies as $movie) {
            dump($this->getMovieInfo($movie));
            dump($movie);
        }
    }

    public function getMovieInfo($movie){
        $info = explode('_',File::name($movie));
        return [
            'name'  => $info[0],
            'year'  => $info[1]
        ];
    }
}
