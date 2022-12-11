<?php

namespace App\Http\Controllers\Commodities;

use PDF;
use App\Commodity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $commodities = Commodity::all();
        $sekolah = env('Nama barang', 'Barang Milik Sekolah');
        $pdf = PDF::loadView('commodities.pdf', compact(['commodities', 'sekolah']))->setPaper('a4');
        // return view('commodities.pdf', compact(['commodities', 'sekolah']));
        return $pdf->download('print.pdf');
    }
    public function generatePdffilter(Request $request)
    {
        // dd($request);
        $awal=$request->tglawal;
        $akhir=$request->tglakhir;
        $sekolah = env('Nama barang', 'Barang Milik Sekolah');

      $commodities=Commodity::whereBetween('created_at', [$awal, $akhir])->get();
    //   dd($commodities);
      $pdf = PDF::loadView('commodities.pdf', compact(['commodities','sekolah']))->setPaper('a4');
      return $pdf->download('print.pdf');
     
    }
}
