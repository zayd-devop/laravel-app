<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Resources\RoomResource;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Room::query();
        if ($request->has('type')) {
            $query->where('type', $request->input('type'));
        }
       $rooms = $query->paginate(10);
        return RoomResource::collection($rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:disponible,occupé',
        ]);
        $room = Room::create($validated);
        return new RoomResource($room);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return new RoomResource($room);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $room = Room::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|in:disponible,occupé',
        ]);
        $room->update($validated);
        return new RoomResource($room);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(['message' => 'Room deleted successfully']);
    }
}
