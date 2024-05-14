<?php

namespace App\Repositories;

use App\Models\Store;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\Splade\SpladeTable;

class StoreRepository
{
    public function index($perPage)
    {
        try {
            DB::beginTransaction();
            $stores = Store::paginate($perPage);
            DB::commit();

            return response()->json(["data" => $stores], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $stores = Store::create($data);
            DB::commit();

            return response()->json([
                'data' => $stores
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function show(string $id)
    {
        try {
            DB::beginTransaction();
            $store = Store::find($id);
            DB::commit();

            return response()->json([
                'data' => $store
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update($data, string $id)
    {
        try {
            DB::beginTransaction();
            $store = Store::find($id)->update($data);
            DB::commit();

            return response()->json([
                'data' => $store
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $store = Store::find($id)->delete();
            DB::commit();

            return response()->json([
                'data' => $store
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
