<?php 

namespace App\Http\Controllers\Cms;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Http\Controllers\Controller;

use Illuminate\Routing\Middleware\LoginCheck;

use Illuminate\Support\Facades\Redirect;

use App\Http\Model\Team;

use Response;
use Illuminate\Support\Facades\Input;
use Carbon;
use DateTime;
use Auth;
use GuzzleHttp\Client; 
// use GuzzleHttp\Psr7;
// use Psr\Http\Message\ServerRequestInterface;

use DB;
use Session;
use Mail;
use Cart;

use vendor\autoload;

class TeamController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$teams = Team::getAll()->where('is_active','=',1);
    	return view('pages/admin/team/team', compact('teams'));
    }

    function input()
    {
    	return  view('pages/admin/team/teaminput');
    }

    function edit($id)
    {
    	$teams=Team::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/team/teamedit')
    	->with('team_data',$teams);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:team',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

    	$teams = new Team;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $teams->subtitle = $request->subtitle; 
    		$teams->title = $request->title; 
            $teams->facebook = $request->facebook; 
            $teams->instagram = $request->instagram; 
            $teams->twitter = $request->twitter; 
            $teams->linkedin = $request->linkedin; 
    		$teams->is_active = 1; 

            if($request->file('images') == "" || $request->file('images') == null)
            {
                $teams->images = $teams->images;
            } 
             else
            {
                $this->validate($request, [
                    'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
                ]);

                $files      = $request->file('images');
                $fileNames   = 'a'.time().'.'.$files->getClientOriginalExtension();
                $destinationPath = public_path('/asset/img');
                $files->move($destinationPath, $fileNames);
                $teams->images = $fileNames;
            }

            $teams->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$teams->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/team');
    }

    // menampilkan fungsi edit
    function update (Request $request, $id)  
    {
        $validatedData = $request->validate([
                'title' => 'required',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

        if(Input::get('submit')) 
        {
            
        	$teams = Team::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
                $teams->subtitle = $request->subtitle; 
        		$teams->title = $request->title; 
                $teams->facebook = $request->facebook; 
                $teams->instagram = $request->instagram; 
                $teams->twitter = $request->twitter; 
                $teams->linkedin = $request->linkedin; 
                if($request->file('images') == "" || $request->file('images') == null)
                {
                    $teams->images = $teams->images;
                } 
                 else
                {
                    $this->validate($request, [
                        'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
                    ]);

                    $files      = $request->file('images');
                    $fileNames   = 'a'.time().'.'.$files->getClientOriginalExtension();
                    $destinationPath = public_path('/asset/img');
                    $files->move($destinationPath, $fileNames);
                    $teams->images = $fileNames;
                }
                $teams->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$teams->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/team');
        } 
        elseif(Input::get('deletes')) 
        {
            $teams = Team::where('id','=',$id)->first();

            // nama = nama field di database, var_nama = var_nama di dalam form input_blade

            $nol="";
            $teams->images = $nol;

            $teams->save();

            // sama aja kaya href setelak klik submit
            // mau pindah ke link mana setelah tombol submit di klik
            $request->session()->flash('status', 'Picture "Image" has been deleted');
            return  Redirect::back();
        }

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$teams = Team::find($id);
    	$teams->is_active = 0;
    	$teams->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/team');
    } 

}