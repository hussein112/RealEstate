<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->category = $request->get('category');
        if($category->isDirty()){
            $category->save();
            return redirect()->back()->with("success_msg", "Category Updated.");
        }
    }
}
