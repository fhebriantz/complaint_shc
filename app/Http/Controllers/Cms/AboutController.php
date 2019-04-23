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

use App\Http\Model\About;

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

class AboutController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$abouts = About::getAll()->where('is_active','=',1);
    	return view('pages/admin/about/about', compact('abouts'));
    }

    function input()
    {
    	return  view('pages/admin/about/aboutinput');
    }

    function edit($id)
    {
    	$abouts=About::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/about/aboutedit')
    	->with('about_data',$abouts);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:about',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

    	$abouts = new About;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $abouts->subtitle = $request->subtitle; 
    		$abouts->title = $request->title; 
    		$abouts->is_active = 1; 
    		$abouts->desc = $request->desc;

            if($request->file('images') == "" || $request->file('images') == null)
            {
                $abouts->images = $abouts->images;
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
                $abouts->images = $fileNames;
            }

            $abouts->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$abouts->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/about');
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
            
        	$abouts = About::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
                $abouts->subtitle = $request->subtitle; 
        		$abouts->title = $request->title; 
        		$abouts->desc = $request->desc;
                if($request->file('images') == "" || $request->file('images') == null)
                {
                    $abouts->images = $abouts->images;
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
                    $abouts->images = $fileNames;
                }
                $abouts->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$abouts->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/about');
        } 
        elseif(Input::get('deletes')) 
        {
            $abouts = About::where('id','=',$id)->first();

            // nama = nama field di database, var_nama = var_nama di dalam form input_blade

            $nol="";
            $abouts->images = $nol;

            $abouts->save();

            // sama aja kaya href setelak klik submit
            // mau pindah ke link mana setelah tombol submit di klik
            $request->session()->flash('status', 'Picture "Image" has been deleted');
            return  Redirect::back();
        }

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$abouts = About::find($id);
    	$abouts->is_active = 0;
    	$abouts->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/about');
    } 

}