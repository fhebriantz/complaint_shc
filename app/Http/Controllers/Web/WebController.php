<?php 

namespace App\Http\Controllers\Web;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;

use App\Http\Model\About;
use App\Http\Model\Slider;
use App\Http\Model\Portfolio;
use App\Http\Model\Feature;
use App\Http\Model\Client;
use App\Http\Model\Team;
use App\Http\Model\Sosmed;
use App\Http\Model\Comment;
use App\Http\Model\Blog;
use App\Http\Model\Address;

use Response;
use Illuminate\Support\Facades\Input;
use Carbon;
use App\Http\Model\Contact;
use DateTime;
use Auth;
// use GuzzleHttp\Psr7;
// use Psr\Http\Message\ServerRequestInterface;

use DB;
use Session;
use Mail;
use Cart;

use vendor\autoload;

class WebController extends Controller
{
	public function coba_email($name,$email,$isi){
        $to_name = $name;
        $to_email = $email;
        $data = array('name'=>$to_name, "body" => $isi);
            
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Judul Azha Message');
            $message->cc('admin@azha.co.id', 'Admin')
                    ->subject('Judul Azha Message');
            $message->from('noreply@azha.co.id','Azha Media');
        });
    }

    public function send(Request $request){

        $validatedData = $request->validate([

                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
            ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->is_active = 1;
        $contact->created_by = "Admin Default";
        $contact->save();

        $this->coba_email($request->name, $request->email, $request->message); 
        return 'Berhasil';


    }

	public function show(){
		$slider1 = Slider::getAll()->where('is_active','=',1)->where('id','=',2)->first();

		$slider2 = Slider::getAll()->where('is_active','=',1)->where('id','=',1)->first();

		$slider3 = Slider::getAll()->where('is_active','=',1)->where('id','=',3)->first();

		$abouts = About::getAll()->where('is_active','=',1)->where('id','=',2)->first();

		$whatwedo = About::getAll()->where('is_active','=',1)->where('id','=',1)->first();

		$portfolio1 = Portfolio::getAll()->where('is_active','=',1)->where('id','=',1)->first();

		$portfolio2 = Portfolio::getAll()->where('is_active','=',1)->where('id','=',2)->first();

		$portfolio3 = Portfolio::getAll()->where('is_active','=',1)->where('id','=',3)->first();

		$portfolio4 = Portfolio::getAll()->where('is_active','=',1)->where('id','=',4)->first();

		$portfolio5 = Portfolio::getAll()->where('is_active','=',1)->where('id','=',5)->first();

		$portfolio6 = Portfolio::getAll()->where('is_active','=',1)->where('id','=',6)->first();

		$features = Feature::getAll();

		$clients = Client::getAll();

		$teams = Team::getAll();

		$comments = Comment::getAll();

		$sosmeds = Sosmed::getAll(); 

		$blogs = Blog::getAll(); 

		$address = Address::getAll()->first();

    	return view('pages/web/index/index', compact('abouts','whatwedo','slider1','slider2','slider3','portfolio1','portfolio2','portfolio3','portfolio4','portfolio5','portfolio6','features','clients','teams','comments','sosmeds','blogs','address'));
    }


    public function blog($id){

		$address = Address::getAll()->first();
		$sosmeds = Sosmed::getAll(); 
		$blogs = Blog::getAll()->where('id','=',$id)->first();

    	return view('pages/web/blog/blog', compact('address','sosmeds','blogs'));
    }

}

