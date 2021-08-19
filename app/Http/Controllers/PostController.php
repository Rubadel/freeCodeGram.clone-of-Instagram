<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

/* Efforts
 * use Faker\Provider\Image;
//use Intervention\Image\ImageManagerStatic as Image;
//use Image;
//use Intervention\Image\ImageManagerStatic as Image;
//use Intervention\Image\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image; */


class PostController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('/uploads', 'public');

        //This lines for customize the image size put, i have a problem with version in my own device,
        // so i will fit it in css

//        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1200, 1200);
//        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
