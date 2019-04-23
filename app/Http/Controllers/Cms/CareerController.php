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

use App\Http\Model\Career;

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

class CareerController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$careers = Career::getAll()->where('is_active','=',1);
    	return view('pages/admin/career/career', compact('careers'));
    }

    function input()
    {
    	return  view('pages/admin/career/careerinput');
    }

    function edit($id)
    {
    	$careers=Career::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/career/careeredit')
    	->with('career_data',$careers);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:career',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

    	$careers = new Career;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $careers->subtitle = $request->subtitle; 
    		$careers->title = $request->title; 
    		$careers->is_active = 1; 
    		$careers->desc = $request->desc;

            if($request->file('images') == "" || $request->file('images') == null)
            {
                $careers->images = $careers->images;
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
                $careers->images = $fileNames;
            }

            $careers->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$careers->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/career');
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
            
        	$careers = Career::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
                $careers->subtitle = $request->subtitle; 
        		$careers->title = $request->title; 
        		$careers->desc = $request->desc;
                if($request->file('images') == "" || $request->file('images') == null)
                {
                    $careers->images = $careers->images;
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
                    $careers->images = $fileNames;
                }
                $careers->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$careers->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/career');
        } 
        elseif(Input::get('deletes')) 
        {
            $careers = Career::where('id','=',$id)->first();

            // nama = nama field di database, var_nama = var_nama di dalam form input_blade

            $nol="";
            $careers->images = $nol;

            $careers->save();

            // sama aja kaya href setelak klik submit
            // mau pindah ke link mana setelah tombol submit di klik
            $request->session()->flash('status', 'Picture "Image" has been deleted');
            return  Redirect::back();
        }

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$careers = Career::find($id);
    	$careers->is_active = 0;
    	$careers->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/career');
    } 

}