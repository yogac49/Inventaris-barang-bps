<?php

namespace App\Http\Controllers\services;

use Illuminate\Http\Request;
use Validator;
use App\Upload_file;

class UploadFileController extends Controller
{
   public function index()
    {
        $school_operational_assistances = AppSchoolOperationalAssistanceModel::orderBy('name', 'ASC')->get();
        return view('school-operational-assistances.index', compact('school_operational_assistances'));
    }

    public function StoreUploadFile(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'judul' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      if ($validator->passes()) {
        $input = $request->all();
        $input['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('gambar'), $input['gambar']);

        Upload_file::create($input);
        return response()->json(['success'=>'Berhasil']);
      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }
}