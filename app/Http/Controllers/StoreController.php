<?php

namespace App\Http\Controllers;

use App\Repositories\StoreRepository;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private StoreRepository $repository;

    public function __construct(StoreRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perPage') ?? 10;
        return $this->repository->index($perPage);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|sometimes',
            'ISBN' => 'required|sometimes',
            'value' => 'required|sometimes',
        ]);
        if (!$validated) {
            return response()->json(['error' => 'Invalid data'], 400);
        }
        return $this->repository->store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->repository->show($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|sometimes',
            'ISBN' => 'required|sometimes',
            'value' => 'required|sometimes',
        ]);
        if (!$validated) {
            return response()->json(['error' => 'Invalid data'], 400);
        }
        return $this->repository->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->repository->destroy($id);
    }
}
