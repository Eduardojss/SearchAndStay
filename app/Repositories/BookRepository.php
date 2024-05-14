<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\Splade\SpladeTable;

class BookRepository
{
    public function index($perPage)
    {
        try {
            DB::beginTransaction();
            $books = Book::paginate($perPage);
            DB::commit();

            return response()->json(["data" => $books], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $books = Book::create($data);
            DB::commit();

            return response()->json([
                'data' => $books
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function show(string $id)
    {
        try {
            DB::beginTransaction();
            $book = Book::find($id);
            DB::commit();

            return response()->json([
                'data' => $book
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update($data, string $id)
    {
        try {
            DB::beginTransaction();
            $book = Book::find($id)->update($data);
            DB::commit();

            return response()->json([
                'data' => $book
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $book = Book::find($id)->delete();
            DB::commit();

            return response()->json([
                'data' => $book
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
