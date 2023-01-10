<?php

namespace App\Http\Controllers\SchoolOperationalAssistances\Ajax;

use App\Http\Controllers\Controller;
use App\SchoolOperationalAssistance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolOperationalAssistanceAjaxController extends Controller
{
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
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
    //membuat validasi, jika tidak diisi maka akan menampilkan pesan error
    // $this->validate($request, [
    //     'uploader'          => 'required',
    //     'name'          => 'required',
    //     'description'    => 'required',
    //     'image'    => 'required'
    // ]);

    $file           = $request->file('image');
    $nama_file      = $file->getClientOriginalName();
    $file->move('file/upload',$file->getClientOriginalName());

        $service = new SchoolOperationalAssistance();
        $service->id_user = $request->uploader;
        $service->uploader = $request->uploader;
        $service->name = $request->name;
        $service->serial_num = $request->serial_num;
        $service->total = $request->total;
        $service->mitra = $request->mitra;
        $service->image       = $nama_file;
        $service->service_date = date_format(date_create($request->date),"d-m-Y");
        $service->description = $request->description;
        $service->status = "1";

        $service->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $service], 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school_operational_assistance = SchoolOperationalAssistance::findOrFail($id);

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $school_operational_assistance], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school_operational_assistance = SchoolOperationalAssistance::findOrFail($id);

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $school_operational_assistance], 200);
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
        $school_operational_assistance = SchoolOperationalAssistance::findOrFail($id);
        $school_operational_assistance->name = $request->name;
        $school_operational_assistance->description = $request->description;
        $school_operational_assistance->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $school_operational_assistance], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SchoolOperationalAssistance::findOrFail($id)->delete();

        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }
}
