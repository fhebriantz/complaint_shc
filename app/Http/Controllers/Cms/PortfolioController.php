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

use App\Http\Model\Portfolio;

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

class PortfolioController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$portfolios = Portfolio::getAll()->where('is_active','=',1);
    	return view('pages/admin/portfolio/portfolio', compact('portfolios'));
    }

    function input()
    {
    	return  view('pages/admin/portfolio/portfolioinput');
    }

    function edit($id)
    {
    	$portfolios=Portfolio::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/portfolio/portfolioedit')
    	->with('portfolio_data',$portfolios);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:portfolio',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

    	$portfolios = new Portfolio;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $portfolios->subtitle = $request->subtitle; 
    		$portfolios->title = $request->title; 
    		$portfolios->is_active = 1; 

            if($request->file('images') == "" || $request->file('images') == null)
            {
                $portfolios->images = $portfolios->images;
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
                $portfolios->images = $fileNames;
            }

            $portfolios->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$portfolios->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/portfolio');
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
            
        	$portfolios = Portfolio::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
                $portfolios->subtitle = $request->subtitle; 
        		$portfolios->title = $request->title; 
                if($request->file('images') == "" || $request->file('images') == null)
                {
                    $portfolios->images = $portfolios->images;
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
                    $portfolios->images = $fileNames;
                }
                $portfolios->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$portfolios->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/portfolio');
        } 
        elseif(Input::get('deletes')) 
        {
            $portfolios = Portfolio::where('id','=',$id)->first();

            // nama = nama field di database, var_nama = var_nama di dalam form input_blade

            $nol="";
            $portfolios->images = $nol;

            $portfolios->save();

            // sama aja kaya href setelak klik submit
            // mau pindah ke link mana setelah tombol submit di klik
            $request->session()->flash('status', 'Picture "Image" has been deleted');
            return  Redirect::back();
        }

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$portfolios = Portfolio::find($id);
    	$portfolios->is_active = 0;
    	$portfolios->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/portfolio');
    } 

}