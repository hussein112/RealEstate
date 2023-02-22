<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function adminIndex(){
        return view("admin.posts")->with([
            'posts' => Post::paginate(10),
        ]);
    }

    public function adminEdit($id){
        return view("admin.editPost")->with([
            'post' => Post::find($id),
            'categories' => Category::all(),
            'authors' => [Admin::all(), Employee::all()]
        ]);
    }

    public function adminCreate(){
        return view('admin.newPost');
    }


    public function employeeIndex(){
        return view('employee.posts')->with([
            'posts' => Post::paginate(10),
        ]);
    }

    public function employeeCreate(){
        return view('employee.newPost');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
