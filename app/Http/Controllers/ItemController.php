<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    public function index()
    {
        $items = auth()->user()->items;
        return response()->json($items);
    }

    public function show(Item $item)
    {
        // $this->authorize('view', $item);
        return response()->json($item);
    }

    public function store(StoreItemRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo_path'] = $path;
        }

        $data['user_id'] = auth()->id();
        $item = Item::create($data);

        return response()->json([
            'message' => 'Item created successfully',
            'item' => $item
        ], 201);
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        // $this->authorize('update', $item);
        
        $data = $request->validated();
        
        if ($request->hasFile('photo')) {
            if ($item->photo_path) {
                Storage::disk('public')->delete($item->photo_path);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo_path'] = $path;
        }

        $item->update($data);

        return response()->json([
            'message' => 'Item updated successfully',
            'item' => $item
        ]);
    }

    public function destroy(Item $item)
    {
       
        
        if ($item->photo_path) {
            Storage::disk('public')->delete($item->photo_path);
        }
        
        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully'
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->query('q');
        if (!$query) {
            return response()->json(['message' => 'Search query is required'], 400);
        }

        $items = Item::search($query)
            ->where('user_id', auth()->id());

        return response()->json($items);
    }
}