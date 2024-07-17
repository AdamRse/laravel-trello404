<?php

namespace App\Http\Controllers;

use App\Models\Boards;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boards = Boards::all();
        return view('boards.index', compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request) : RedirectResponse
    // {
    //     $rules = [
    //         'name' => 'required|string|max:255',
    //         'background' => 'required|string|max:255' // Validation acceptant null initialement
    //     ];

    //     $validated = $request->validate($rules);

    //     // Définir la valeur par défaut si 'background' est vide
    //     // if (empty($validated['background'])) {
    //     //     $validated['background'] = '#ddf'; // Valeur par défaut
    //     // }

    //     $request->user()->boards()->create($validated);
    //     dd($request);

    //     return redirect(route('boards.index'));
    // }
        public function store(Request $request) : RedirectResponse
    {
        $rules = [
                    'name' => 'required|string|max:255',
                    'background' => 'required|string|max:7' // Validation acceptant null initialement
                ];
        $validated = $request->validate($rules);
        $board = $request->user()->boards()->create([
            'name' => $validated['name'],
            'background' => $validated['background'] ?? '#ddd', 
        ]);
        dd($validated);
        $board->save();

        return redirect(route('boards.index'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Boards $boards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boards $boards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boards $boards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boards $boards)
    {
        //
    }
}
