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

use App\Http\Model\Client;

use Response;
use Illuminate\Support\Facades\Input;
use Carbon;
use DateTime;
use Auth;
// use GuzzleHttp\Psr7;
// use Psr\Http\Message\ServerRequestInterface;

use DB;
use Session;
use Mail;
use Cart;

use vendor\autoload;

class ClientController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$clients = Client::getAll()->where('is_active','=',1);
    	return view('pages/admin/client/client', compact('clients'));
    }

    function input()
    {
    	return  view('pages/admin/client/clientinput');
    }

    function edit($id)
    {
    	$clients=Client::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/client/clientedit')
    	->with('client_data',$clients);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:client',
                'images' => 'required',
            ]);

    	$clients = new Client;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $clients->title = $request->title; 
    		$clients->is_active = 1; 

            if($request->file('images') == "" || $request->file('images') == null)
            {
                $clients->images = $clients->images;
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
                $clients->images = $fileNames;
            }

            $clients->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$clients->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/client');
    }

    // menampilkan fungsi edit
    function update (Request $request, $id)  
    {
        $validatedData = $request->validate([
                'title' => 'required',
                'images' => 'required',
            ]);

        if(Input::get('submit')) 
        {
            
        	$clients = Client::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
        		$clients->title = $request->title; 
                if($request->file('images') == "" || $request->file('images') == null)
                {
                    $clients->images = $clients->images;
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
                    $clients->images = $fileNames;
                }
                $clients->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$clients->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/client');
        } 
        elseif(Input::get('deletes')) 
        {
            $clients = Client::where('id','=',$id)->first();

            // nama = nama field di database, var_nama = var_nama di dalam form input_blade

            $nol="";
            $clients->images = $nol;

            $clients->save();

            // sama aja kaya href setelak klik submit
            // mau pindah ke link mana setelah tombol submit di klik
            $request->session()->flash('status', 'Picture "Image" has been deleted');
            return  Redirect::back();
        }

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$clients = Client::find($id);
    	$clients->is_active = 0;
    	$clients->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/client');
    } 

}