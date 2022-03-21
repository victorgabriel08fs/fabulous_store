<?php

namespace App\Http\Controllers;

use App\Models\LibraryProduct;
use App\Http\Requests\StoreLibraryProductRequest;
use App\Http\Requests\UpdateLibraryProductRequest;

class LibraryProductController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLibraryProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LibraryProduct  $libraryProduct
     * @return \Illuminate\Http\Response
     */
    public function show(LibraryProduct $libraryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LibraryProduct  $libraryProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(LibraryProduct $libraryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLibraryProductRequest  $request
     * @param  \App\Models\LibraryProduct  $libraryProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLibraryProductRequest $request, LibraryProduct $libraryProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LibraryProduct  $libraryProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(LibraryProduct $libraryProduct)
    {
        //
    }
}
