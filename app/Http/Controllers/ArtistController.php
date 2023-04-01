<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Inertia\Inertia;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Dashboard/Artists/Index', [
            'artists' => Artist::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist): \Inertia\Response
    {
        if($artist->payment) {
            $artist->payment = Crypt::decryptString($artist->payment);
        }
        return Inertia::render('Dashboard/Artists/Show', [
            'artist' => $artist
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist): RedirectResponse
    {
        //
    }
}
