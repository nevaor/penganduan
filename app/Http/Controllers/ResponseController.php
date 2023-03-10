<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;


class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($report_id)
    {
        //ambil data response yang bakal di munculin, data yang diambil data response yang report_id nya 
        //sama kaya $report_id dari path dinamis {report_id}
        //kalau ada, datanya diambil satu / first()
        //kenapa gak pake firstOrFile() karrnan nanti bakal munculin not found view, kalau pake first()
        // view,kalau pake first() view nya bakal tetep di tampilin
        $report = Response::where('report_id', $report_id)->first();
        //karena mau kirim data {report_id} buat di route updatenya, jadi biar bisa dipake di blade kita 
        //simpen data kita dipath dinamis $report_id nya ke variable baru yag bakal di compact dan di panggil di blade nya 
        $reportId = $report_id;
        return view('response', compact('report', 'reportId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, $report_id)
    {
        $request->validate([
            'status' => 'required',
            'pesan'=> 'required',
        ]);
        //updateOrCreate() fungsinya untuk melakukan update data kalo emang di db responsenya uda ada data yg 
        //punya report_id sama dengan $report_id dari path dinamis, kalau gada data itu maka di create 
        //array pertama, acuan dari datanya
        //array ke dua, data yang dikirim 
        //kenapa pake updateOrCreate? karena response ini kan kalo tdnya gada mau di tambahin tapi kalo ada maua di update aja 
        Response::updateOrCreate(
            [
                'report_id' => $report_id, 
            ],
            [
                'status' => $request->status,
                'pesan' => $request->pesan,
            ]
        );
        //setelah berhasil, arahkannke route yang name nya data.petugas dengan pesan alert 
        return redirect()->route('data.petugas')->with('responseSuccess', 'berhasil mengubah response!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        //
    }
}
