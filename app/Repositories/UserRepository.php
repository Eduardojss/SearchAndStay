<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $users = User::create($data);
            DB::commit();

            return view('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function show(string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);
            DB::commit();

            return response()->json([
                'data' => $user
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update($data, string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id)->update($data);
            DB::commit();

            return response()->json([
                'data' => $user
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id)->delete();
            DB::commit();

            return response()->json([
                'data' => $user
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
