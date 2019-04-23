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

use App\Http\Model\Comment;

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

class CommentController extends Controller
{
	 public function __construct()
    {
        $this->middleware('logincheck');
    }
    
	public function show(){
    	$comments = Comment::getAll()->where('is_active','=',1);
    	return view('pages/admin/comment/comment', compact('comments'));
    }

    function input()
    {
    	return  view('pages/admin/comment/commentinput');
    }

    function edit($id)
    {
    	$comments=Comment::getAll()->where('id','=',$id)->first();
    	return  view('pages/admin/comment/commentedit')
    	->with('comment_data',$comments);
    }

    // menampilkan fungsi input
    function insert (Request $request)  
    {

        $validatedData = $request->validate([

                'title' => 'required|unique:comment',
                'desc' => 'required',
            ]);

    	$comments = new Comment;

    		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
    		$comments->title = $request->title; 
    		$comments->is_active = 1; 
    		$comments->desc = $request->desc;

            $comments->created_by = session()->get('session_name'); 
    	// untuk mengsave
    	$comments->save();

    	// sama aja kaya href setelak klik submit
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/comment');
    }

    // menampilkan fungsi edit
    function update (Request $request, $id)  
    {
        $validatedData = $request->validate([
                'title' => 'required',
                'desc' => 'required',
            ]);

            
        	$comments = Comment::where('id','=',$id)->first();

        		// nama = nama field di database, var_nama = var_nama di dalam form input_blade
        		$comments->title = $request->title; 
        		$comments->desc = $request->desc;
                
                $comments->updated_by = session()->get('session_name') ;
        	// untuk mengsave
        	$comments->save();

        	// sama aja kaya href setelak klik submit
        	// mau pindah ke link mana setelah tombol submit di klik
        	return  redirect('admin/comment');
        

    }

    public function delete($id){
    	// find khusus untuk primary key di database
    	$comments = Comment::find($id);
    	$comments->is_active = 0;
    	$comments->save();

    	// sama aja kaya href setelak klik delete
    	// mau pindah ke link mana setelah tombol submit di klik
    	return  redirect('admin/comment');
    } 

}