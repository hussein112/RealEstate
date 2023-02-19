<?php

namespace App\Http\Controllers;

use App\Models\Valuation;
use Illuminate\Http\Request;

class ValuationController extends Controller
{
    public function adminIndex(){
        return view('admin.valuations')->with([
            'valuations' => Valuation::sortable()->paginate(9)
        ]);
    }

    public function adminShow($id){
        return view('admin.valuation')->with([
            'valuation' => Valuation::find($id)
        ]);
    }

    public function adminEdit($id){
        return view("admin.editValuation")->with([
            'valuation' => Valuation::find($id)
        ]);
    }
    /**
     * Display all the valuations
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new valuation.
     */
    public function create()
    {
        return view("newValuation");
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
