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

use App\Http\Model\Feature;

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

class FeatureController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$features = Feature::getAll()->where('is_active','=',1);
    	return view('pages/admin/feature/feature', compact('features'));
    }

    function input()
    {
    	return  view('pages/admin/feature/featureinput');
    }

    function edit($id)
    {
    	$features=Feature::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/feature/featureedit')
    	->with('feature_data',$features);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:feature',
                'iconname' => 'required',
            ]);

    	$features = new Feature;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
    		$features->title = $request->title; 
    		$features->is_active = 1; 
    		$features->desc = $request->desc;
            $features->iconname = $request->iconname;

            $features->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$features->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/feature');
    }

    // menampilkan fungsi edit
    function update (Request $request, $id)  
    {
        $validatedData = $request->validate([
                'title' => 'required',
                'iconname' => 'required',
            ]);

        if(Input::get('submit')) 
        {
            
        	$features = Feature::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
        		$features->title = $request->title; 
        		$features->desc = $request->desc;
                $features->iconname = $request->iconname;

                $features->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$features->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/feature');
        } 
        elseif(Input::get('deletes')) 
        {
            $features = Feature::where('id','=',$id)->first();

            // nama = nama field di database, var_nama = var_nama di dalam form input_blade

            $nol="";
            $features->images = $nol;

            $features->save();

            // sama aja kaya href setelak klik submit
            // mau pindah ke link mana setelah tombol submit di klik
            $request->session()->flash('status', 'Picture "Image" has been deleted');
            return  Redirect::back();
        }

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$features = Feature::find($id);
    	$features->is_active = 0;
    	$features->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/feature');
    } 

}