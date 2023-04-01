<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Release;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Dashboard/Releases/Index', [
            'releases' => Release::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Dashboard/Releases/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $release = new Release();
        $release->title = $request->string('title');
        $release->slug = $request->string('slug');
        $release->artist_id = 1;
        $release->cover_url = '';
        $release->save();

        return redirect($release->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Release $release): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Release $release): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Release $release): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Release $release): RedirectResponse
    {
        //
    }
}
