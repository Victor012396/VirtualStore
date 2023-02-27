<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $productos =Producto::all();//get()
        return view('createProducto',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return view('createProducto');
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
        dd($request->all());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto): RedirectResponse
    {
        //
    }
}
