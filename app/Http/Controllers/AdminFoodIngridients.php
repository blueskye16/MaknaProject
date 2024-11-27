<?php

namespace App\Http\Controllers;

use App\Models\FoodIngridients;
use Illuminate\Http\Request;

class AdminFoodIngridients extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', [
            'ingridients' => FoodIngridients::all()
        ]);
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
        $validatedData = $request->validate([
            'stokAwal' => ['required'],
            'masuk' => ['required'],
            'keluar' => ['required'],
            'stokAkhir' => ['required'],
            'tanggal' => ['required'],
        ]);

        FoodIngridients::create($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodIngridients $foodIngridients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodIngridients $foodIngridients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FoodIngridients $foodIngridients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodIngridients $foodIngridients)
    {
        //
    }
}
