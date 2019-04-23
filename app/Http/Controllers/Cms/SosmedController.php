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

use App\Http\Model\Sosmed;

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

class SosmedController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$sosmeds = Sosmed::getAll()->where('is_active','=',1);
    	return view('pages/admin/sosmed/sosmed', compact('sosmeds'));
    }

    function input()
    {
    	return  view('pages/admin/sosmed/sosmedinput');
    }

    function edit($id)
    {
    	$sosmeds=Sosmed::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/sosmed/sosmededit')
    	->with('sosmed_data',$sosmeds);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:sosmed',
                'subtitle' => 'required',
            ]);

    	$sosmeds = new Sosmed;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $sosmeds->subtitle = $request->subtitle; 
    		$sosmeds->title = $request->title; 
    		$sosmeds->is_active = 1; 

            $sosmeds->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$sosmeds->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/sosmed');
    }

    // menampilkan fungsi edit
    function update (Request $request, $id)  
    {
        $validatedData = $request->validate([
                'title' => 'required',
                'subtitle' => 'required',
            ]);

        	$sosmeds = Sosmed::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
                $sosmeds->subtitle = $request->subtitle; 
        		$sosmeds->title = $request->title; 
              
                $sosmeds->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$sosmeds->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/sosmed');
        

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$sosmeds = Sosmed::find($id);
    	$sosmeds->is_active = 0;
    	$sosmeds->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/sosmed');
    } 

}