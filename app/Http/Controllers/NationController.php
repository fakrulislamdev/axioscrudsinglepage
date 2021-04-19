<?php

namespace App\Http\Controllers;

use App\Models\Nation;
use App\Http\Requests\NationRequest;
use Illuminate\Http\Request;

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        return view('admin.nations.index');
    }
    public function  get_table_data(){
        return response()->json(Nation::latest()->get());
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
    public function store(NationRequest $request)
    {
    
        Nation::create($request->validated());
        return 1;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function show(Nation $nation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function edit(Nation $nation)
    {
        return Nation::find($nation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nation $nation)
    {  
        Nation::find($request->id)->update($request->only(['name']));
        return 'Success';
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nation::find($id)->delete();
        return 1;
    }
}
