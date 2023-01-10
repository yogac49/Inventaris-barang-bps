<?php

namespace App\Http\Controllers\SchoolOperationalAssistances;

use App\Http\Controllers\Controller;
use App\SchoolOperationalAssistance as AppSchoolOperationalAssistanceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Commodity;
use App\User;
use DB;
class SchoolOperationalAssistance extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
   
        $field =Auth::user();
    //    ddd($field);
        if($field->role == 'admin'){
         $school_operational_assistances = AppSchoolOperationalAssistanceModel::orderBy('name', 'ASC')->get();
         $commodities= Commodity::orderBy('name',  'ASC')->get();
         return view('school-operational-assistances.index', compact('school_operational_assistances','commodities'));

    }else{
        $field =Auth::user();
        // ddd($field);
        $school_operational_assistances  = DB::table('school_operational_assistances')->where('id_user',  $field->id)->get();
        // $school_operational_assistances = AppSchoolOperationalAssistanceModel::orderBy('name', 'ASC',$user)->get();
        $commodities= Commodity::orderBy('name',  'ASC')->get();
        return view('school-operational-assistances.index', compact('school_operational_assistances','commodities'));
    }
}
   public function updateconfirm(Request $request, SubmitApplication $submitApplication)
   {
       $submitApplication->update(['status', 1]);
       return back();  
    
}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
