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

    public function index() {
        $characters = Character::all();
        return response()->json([
            'message' => 'characters grabbed successfully',
            'status' => 'success',
            'characters' => $characters,
        ], 200);
    }

    public function update($id, Request $request) {
        $character = Character::find($id);

        if (!$character) {
            return response()->json([
                'message' => 'character not found',
                'status' => 'fail',
            ], 404);
        }

        $this->validate($request, [
            'name' => ['required', 'string', 'max:100'],
            'pity' => ['required', 'integer'],
            'banner' => ['required', 'string', 'max:20'],
        ]);

        $character->update($request->all());

        return response()->json([
            'message' => 'character updated successfully',
            'status' => 'success',
            'characters' => $character,
        ], 200);
    }
}
