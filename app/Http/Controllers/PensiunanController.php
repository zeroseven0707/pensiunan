<?php

namespace App\Http\Controllers;

use App\Imports\PensiunanImport;
use App\Models\Pensiunan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PensiunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pensiunan'] = Pensiunan::all();
        return view('welcome')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['pensiunan'] = Pensiunan::create([
            'nama' =>$request->nama,
            'no_pensiunan' =>$request->no_pensiunan,
            'alamat' =>$request->alamat,
            'no_telp' =>$request->no_telp,
        ]);
        return redirect('/')->with('success','created success');;
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
        $data['data'] = Pensiunan::where('no_pensiunan',$id)->first();
        return view('edit')->with($data);
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
        $data = Pensiunan::where('no_pensiunan',$id)->first();
        $data->update([
            'nama' =>$request->nama,
            'no_pensiunan' =>$request->no_pensiunan,
            'alamat' =>$request->alamat,
            'no_telp' =>$request->no_telp,
        ]);
        return redirect('/')->with('success','Updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pensiunan::where('no_pensiunan',$id)->delete();
        return back()->with('success','Deleted success');;
    }
    public function import(Request $request){
     $file= $request->file('file')->store('public/import');
     $import = new PensiunanImport;
     $import->import($file);
     if ($import->failures()->isNotEmpty()) {
        return redirect()->back()->withFailures($import->failures());
     }
        return redirect()->back()->with('success','Upload success');
    }
}
