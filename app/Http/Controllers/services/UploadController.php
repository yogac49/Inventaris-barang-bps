<?php
 
namespace App\Http\Controllers\services;
use Illuminate\Http\Request;
use App\gambar;
use App\Http\Controllers\Controller;
use App\SchoolOperationalAssistance as AppSchoolOperationalAssistanceModel;
use DB;

class UploadController extends Controller

{
	public function index()
    {
		$school_operational_assistances = AppSchoolOperationalAssistanceModel::orderBy('name', 'ASC')->get();
        return view('school-operational-assistances.index', compact('school_operational_assistances'));
    }
	
 
	public function store(Request $request){

        // $this->validate($request, [
        //     'file'          => 'required',
        //     'name'    => 'required',
		// 	'description'    => 'required'
        // ]);

        // //mengambil data file yang diupload
        // $file           = $request->file('image');
        // //mengambil nama file
        // $nama_file      = $file->getClientOriginalName();

        // //memindahkan file ke folder tujuan
        // $file->move('nota',$file->getClientOriginalName());


        $upload = new school_operational_assistances;
        // $upload->file       = $nama_file;
        $upload->keterangan = $request->input('description');
		$upload->keterangan = $request->input('name');

        //menyimpan data ke database
        $upload->save();

        //kembali ke halaman sebelumnya
        // return back();
    }
}