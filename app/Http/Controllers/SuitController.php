<?php

namespace App\Http\Controllers;

use App\Suit;
use Illuminate\Http\Request;

class SuitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Suit::get();
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
     * @param  \App\Suit  $suit
     * @return \Illuminate\Http\Response
     */
    public function show(Suit $suit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suit  $suit
     * @return \Illuminate\Http\Response
     */
    public function edit(Suit $suit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suit  $suit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suit $suit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suit  $suit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suit $suit)
    {
        //
    }
}
