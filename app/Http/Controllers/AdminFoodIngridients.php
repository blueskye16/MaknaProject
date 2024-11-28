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
        return view('dashboard.food', [
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
        // $validatedData = $request->validate([
        //     'stok_awal' => ['required'],
        //     'masuk' => ['required'],
        //     'keluar' => ['required'],
        //     'stok_akhir' => ['required'],
        //     'tanggal' => ['required'],
        // ]);

        // FoodIngridients::create($validatedData);

        // return redirect('/dashboard')->with('success', 'New list has been added!');

        // Validate input
        // dd($request);
        $validatedData = $request->validate([
            'tanggal' => ['required', 'date'],
            'data.*.nama_produk' => ['required', 'string'],
            'data.*.stok_awal' => ['required', 'numeric'],
            'data.*.masuk' => ['required', 'numeric'],
            'data.*.keluar' => ['required', 'numeric'],
            'data.*.stok_akhir' => ['required', 'numeric'],
        ]);
    
        foreach ($validatedData['data'] as $data) {
            FoodIngridients::updateOrCreate(
                ['nama_produk' => $data['nama_produk']],
                [
                    'stok_awal' => $data['stok_awal'],
                    'masuk' => $data['masuk'],
                    'keluar' => $data['keluar'],
                    'stok_akhir' => $data['stok_akhir'],
                    'tanggal' => $validatedData['tanggal'],
                ]
            );
        }
        return redirect('/dashboard/food')->with('success', 'Data submitted successfully!');
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
