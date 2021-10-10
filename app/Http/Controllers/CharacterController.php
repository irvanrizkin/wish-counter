<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function store(Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100'],
            'pity' => ['required', 'integer'],
            'banner' => ['required', 'string', 'max:20'],
        ]);

        Character::create($request->all());
        return response()->json([
            'message' => 'character created successfully',
            'status' => 'success'
        ], 200);
    }
}
