<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        try {
            DB::beginTransaction();
            $books = Book::get();
            $stores = Store::get();
            DB::commit();

            return view('home', ['books' => $books, 'stores' => $stores]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
