<?php

namespace App\Http\Controllers;

use App\Models\Fatoora;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
class FatooraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $fatooras = Fatoora::with('product')->where('user_id', Auth::user()->id)->get();
        return view('fatoora.fatoora')->with(['fatooras'=> $fatooras, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fatoora.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = Fatoora::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('fatoora');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fatoora  $fatoora
     * @return \Illuminate\Http\Response
     */
    public function show(Fatoora $fatoora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fatoora  $fatoora
     * @return \Illuminate\Http\Response
     */
    public function edit(Fatoora $fatoora)
    {
        return view('fatoora.edit')->with('fatoora', $fatoora);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fatoora  $fatoora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fatoora $fatoora)
    {
        $res = $fatoora->update([
            'name' => $request->name,
        ]);
        return redirect('fatoora');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fatoora  $fatoora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fatoora $fatoora)
    {
        $fatoora->delete();
        return redirect('fatoora');
    }
}
