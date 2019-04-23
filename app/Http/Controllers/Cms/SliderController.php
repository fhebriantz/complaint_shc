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

use App\Http\Model\Slider;

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

class SliderController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$sliders = Slider::getAll()->where('is_active','=',1);
    	return view('pages/admin/slider/slider', compact('sliders'));
    }

    function input()
    {
    	return  view('pages/admin/slider/sliderinput');
    }

    function edit($id)
    {
    	$sliders=Slider::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/slider/slideredit')
    	->with('slider_data',$sliders);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:slider',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

    	$sliders = new Slider;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $sliders->subtitle = $request->subtitle; 
    		$sliders->title = $request->title; 
    		$sliders->is_active = 1; 

            if($request->file('images') == "" || $request->file('images') == null)
            {
                $sliders->images = $sliders->images;
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
                $sliders->images = $fileNames;
            }

            $sliders->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$sliders->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/slider');
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
            
        	$sliders = Slider::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
                $sliders->subtitle = $request->subtitle; 
        		$sliders->title = $request->title; 
                if($request->file('images') == "" || $request->file('images') == null)
                {
                    $sliders->images = $sliders->images;
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
                    $sliders->images = $fileNames;
                }
                $sliders->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$sliders->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/slider');
        } 
        elseif(Input::get('deletes')) 
        {
            $sliders = Slider::where('id','=',$id)->first();

            // nama = nama field di database, var_nama = var_nama di dalam form input_blade

            $nol="";
            $sliders->images = $nol;

            $sliders->save();

            // sama aja kaya href setelak klik submit
            // mau pindah ke link mana setelah tombol submit di klik
            $request->session()->flash('status', 'Picture "Image" has been deleted');
            return  Redirect::back();
        }

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$sliders = Slider::find($id);
    	$sliders->is_active = 0;
    	$sliders->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/slider');
    } 

}