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

use App\Http\Model\Contact;

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

class ContactController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }

    
    
	public function show(){
    	$contacts = Contact::getAll()->where('is_active','=',1);
    	return view('pages/admin/contact/contact', compact('contacts'));
    }

    function input()
    {
    	return  view('pages/admin/contact/contactinput');
    }

    function edit($id)
    {
    	$contacts=Contact::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/contact/contactedit')
    	->with('contact_data',$contacts);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:contact',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

    	$contacts = new Contact;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $contacts->subtitle = $request->subtitle; 
    		$contacts->title = $request->title; 
    		$contacts->is_active = 1; 
    		$contacts->desc = $request->desc;

            if($request->file('images') == "" || $request->file('images') == null)
            {
                $contacts->images = $contacts->images;
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
                $contacts->images = $fileNames;
            }

            $contacts->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$contacts->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/contact');
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
            
        	$contacts = Contact::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
                $contacts->subtitle = $request->subtitle; 
        		$contacts->title = $request->title; 
        		$contacts->desc = $request->desc;
                if($request->file('images') == "" || $request->file('images') == null)
                {
                    $contacts->images = $contacts->images;
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
                    $contacts->images = $fileNames;
                }
                $contacts->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$contacts->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/contact');
        } 
        elseif(Input::get('deletes')) 
        {
            $contacts = Contact::where('id','=',$id)->first();

            // nama = nama field di database, var_nama = var_nama di dalam form input_blade

            $nol="";
            $contacts->images = $nol;

            $contacts->save();

            // sama aja kaya href setelak klik submit
            // mau pindah ke link mana setelah tombol submit di klik
            $request->session()->flash('status', 'Picture "Image" has been deleted');
            return  Redirect::back();
        }

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$contacts = Contact::find($id);
    	$contacts->is_active = 0;
    	$contacts->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/contact');
    } 

}