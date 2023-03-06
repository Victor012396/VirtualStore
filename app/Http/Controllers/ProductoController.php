<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $productos =Producto::get();//get()
        return view('productos/indexProducto',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Resource
    {
        return view('productos/createProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'=>"required|max:150",
            'year'=>['required','numeric','min:2005'],
            'creator'=>['required','max:50'],
            'description'=>['required'],
            'price'=>['required','numeric'],
            'linkPicture'=>['required'],

        ]);
       // dd($request->all());
        $productos=new Producto();
        $productos->name = $request->name;
        $productos->year = $request->year;
        $productos->creator = $request->creator;
        $productos->description = $request->description;
        $productos->price = $request->price;
        $productos->linkPicture = $request->linkPicture;
        $productos->save();
        return redirect('/producto');

    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto): RedirectResponse
    {
        $request -> validate([
            'name'=>"required|max:150",
            'year'=>['required','numeric','min:2005'],
            'creator'=>['required','max:50'],
            'description'=>['required'],
            'price'=>['required','numeric'],
            'linkPicture'=>['required'],
        ]);
        $productos=new Producto();
        $productos->name = $request->name;
        $productos->year = $request->year;
        $productos->creator = $request->creator;
        $productos->description = $request->description;
        $productos->price = $request->price;
        $productos->linkPicture = $request->linkPicture;
        $productos->save();
        return redirect()->route('producto.show',$producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto): RedirectResponse
    {
        //
    }
}
