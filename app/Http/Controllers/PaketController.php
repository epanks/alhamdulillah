<?php

namespace App\Http\Controllers;

use App\Paket;
use App\Balai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Exports\PaketExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.paket-list');
    }

    public function query(Request $request)
    {
        if (request()->ajax()) {
            if ($request->balaipaket) {
                $data = DB::table('paket')
                    ->join('satker', 'paket.kdsatker', '=', 'satker.kdsatker')
                    ->join('balai', 'satker.balai_id', '=', 'balai.id')
                    ->select('balai.nmbalai', 'paket.id', 'paket.nmpaket', 'paket.pagurmp', 'paket.keuangan', 'paket.progres_fisik')
                    ->where('balai.id', $request->balaipaket);
            } else {
                $data = DB::table('paket')
                    ->join('satker', 'paket.kdsatker', '=', 'satker.kdsatker')
                    ->join('balai', 'satker.balai_id', '=', 'balai.id')
                    ->select('balai.nmbalai', 'paket.id', 'paket.nmpaket', 'paket.pagurmp', 'paket.keuangan', 'paket.progres_fisik');
            }
            return datatables()->of($data)->make(true);
            // return Datatables::of(Paket::query())
            //     ->make(true);
        }
        $balaipaket = DB::table('balai')
            ->select("*")
            ->get();
        return view('pages.paket-list', compact('balaipaket'));
    }

    public function export()
    {
        return Excel::download(new PaketExport, 'paket.xlsx');
    }

    public function download()
    {
        return Excel::download(new PaketExport, 'books.xlsx');
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
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        //
    }
}
