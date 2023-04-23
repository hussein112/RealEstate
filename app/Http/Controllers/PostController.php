<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
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
    public function adminIndex(){
        return view("admin.posts")->with([
            'posts' => Post::paginate(10),
        ]);
    }

    public function adminEdit($id){
        return view("admin.editPost")->with([
            'post' => Post::findOrFail($id),
            'categories' => Category::all(),
            'authors' => [Admin::all(), Employee::all()]
        ]);
    }

    public function adminCreate()
    {
        return view('admin.newPost')->with([
            'categories' => Category::all()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return redirect()->back()->with([
            'success_msg' => "Post Added Successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        return view("post")->with([
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(AddPostRequest $request, $id)
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
     * Remove the specified resource from storage.
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
}
