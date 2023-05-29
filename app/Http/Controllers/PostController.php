<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Contact;

class PostController extends Controller
{



    public function save(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'mobile'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message'       => 'required',
        ]);


        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->message = $request->message;
        $contact->save();

        return response()->json(['success'=>'Successfully']);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $posts = Post::get();
  
        return view('posts', compact('posts'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'email' => 'required|email',
            'body' => 'required',
        ]);
  
        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
       
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
  
        return response()->json(['success' => 'Post created successfully.']);
    }
}