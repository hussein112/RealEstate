<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Post;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    protected int $paginate = 9;

    /**
     * Display all the posts [Admins]
     */
    public function adminIndex(){
        return view("admin.posts")->with([
            'posts' => Post::paginate(10),
        ]);
    }

    /**
     * Display the form to edit specific post.
     * @param $id
     */
    public function adminEdit($id){
        return view("admin.editPost")->with([
            'post' => Post::findOrFail($id),
            'categories' => Category::all(),
            'authors' => [Admin::all(), Employee::all()]
        ]);
    }

    /**
     * Display the form to create new post.
     */
    public function adminCreate()
    {
        return view('admin.newPost')->with([
            'categories' => Category::all()
        ]);
    }

    /**
     * Display all the posts. [Users]
     */
    public function index()
    {
        return view("posts")->with([
            'posts' => Post::paginate($this->paginate)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(AddPostRequest $request)
    {
        $validate = $request->validated();

        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $clean_post = $purifier->purify($request->post);

        $post = Post::create([
            'date_posted' => now(),
            'title' => $request->title,
            'content' => $clean_post,
            'category_id' => ($request->category) ?? NULL,
            'admin_id' => Auth::guard("admin")->id()
        ]);

        $post->images()->attach($post->id, ['image_id' => session('image_id')]);

        return redirect()->back()->with('success_msg', "Post Added Successfully");
    }

    /**
     * Display the specified post. [Users]
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $similar = Post::where('id', '<>', $id)
            ->where(function ($query) use ($post) {
                $query->where('category_id', $post->category_id)
                    ->orWhere('admin_id', $post->admin_id);
            })
            ->get();
        return view("post")->with([
            'post' => $post,
            'similar_posts' => $similar
        ]);
    }

    /**
     * Update the specified post in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $validate = $request->validated();

        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        $clean_post = $purifier->purify($request->post);

        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->content = $clean_post;
        $post->category_id = $request->category;
        $post->admin_id = Auth::guard('admin')->id();

        if($post->isDirty()){
            $post->updated_at = now();
            $post->save();
            return redirect()->back()->with([
                'success_msg' => "Post Updated Successfully"
            ]);
        }

        return redirect()->back()->with([
            'error_msg' => "Nothing to Update"
        ]);
    }

    /**
     * Remove the specified post from DB.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->back()->with([
            'success_msg' => 'Post ' . $id . ' Deleted Successfully'
        ]);
    }






    /**************************************************
     **************** SEARCH LOGIC
     **************************************************/

    public function searchByDate($date){
        return view("posts")->with([
            'posts' => Post::where("created_at", $date)->paginate(9)
        ]);
    }


    public function searchByAuthor($id){
        return view("posts")->with([
            'posts' => Post::where("admin_id", $id)->paginate(9)
        ]);
    }


    public function searchByCategory($id){
        return view("posts")->with([
            'posts' => Post::where("category_id", $id)->paginate(9)
        ]);
    }
}
