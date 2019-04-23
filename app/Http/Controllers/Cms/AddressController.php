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

use App\Http\Model\Address;

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

class AddressController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$addresss = Address::getAll()->where('is_active','=',1);
    	return view('pages/admin/address/address', compact('addresss'));
    }

    function input()
    {
    	return  view('pages/admin/address/addressinput');
    }

    function edit($id)
    {
    	$addresss=Address::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/address/addressedit')
    	->with('address_data',$addresss);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:address',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

    	$addresss = new Address;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $addresss->subtitle = $request->subtitle; 
    		$addresss->title = $request->title; 
    		$addresss->is_active = 1; 
    		$addresss->desc = $request->desc;
            $addresss->images = $request->images;
            

            $addresss->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$addresss->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/address');
    }

    // menampilkan fungsi edit
    function update (Request $request, $id)  
    {
        $validatedData = $request->validate([
                'title' => 'required',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

            
        	$addresss = Address::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
                $addresss->subtitle = $request->subtitle; 
                $addresss->title = $request->title; 
                $addresss->is_active = 1; 
                $addresss->desc = $request->desc;
                $addresss->images = $request->images;
                $addresss->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$addresss->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/address');
        

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$addresss = Address::find($id);
    	$addresss->is_active = 0;
    	$addresss->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/address');
    } 

}