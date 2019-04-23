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

use App\Http\Model\Blog;

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

class BlogController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$blogs = Blog::getAll()->where('is_active','=',1);
    	return view('pages/admin/blog/blog', compact('blogs'));
    }

    function input()
    {
    	return  view('pages/admin/blog/bloginput');
    }

    function edit($id)
    {
    	$blogs=Blog::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/blog/blogedit')
    	->with('blog_data',$blogs);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:blog',
                'subtitle' => 'required',
                'images' => 'required',
            ]);

    	$blogs = new Blog;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
            $blogs->subtitle = $request->subtitle; 
    		$blogs->title = $request->title; 
    		$blogs->is_active = 1; 
    		$blogs->desc = $request->desc;

            if($request->file('images') == "" || $request->file('images') == null)
            {
                $blogs->images = $blogs->images;
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
                $blogs->images = $fileNames;
            }

            $blogs->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$blogs->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/blog');
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
            
        	$blogs = Blog::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
                $blogs->subtitle = $request->subtitle; 
        		$blogs->title = $request->title; 
        		$blogs->desc = $request->desc;
                if($request->file('images') == "" || $request->file('images') == null)
                {
                    $blogs->images = $blogs->images;
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
                    $blogs->images = $fileNames;
                }
                $blogs->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$blogs->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/blog');
        } 
        elseif(Input::get('deletes')) 
        {
            $blogs = Blog::where('id','=',$id)->first();

            // nama = nama field di database, var_nama = var_nama di dalam form input_blade

            $nol="";
            $blogs->images = $nol;

            $blogs->save();

            // sama aja kaya href setelak klik submit
            // mau pindah ke link mana setelah tombol submit di klik
            $request->session()->flash('status', 'Picture "Image" has been deleted');
            return  Redirect::back();
        }

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$blogs = Blog::find($id);
    	$blogs->is_active = 0;
    	$blogs->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/blog');
    } 

}