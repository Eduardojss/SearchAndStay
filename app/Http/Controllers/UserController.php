<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',

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
            'password' => 'required|sometimes'
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

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        try {
            if ($token = auth()->attempt($credentials)) {

                return response()->json($token, 200);
            } else {
                return redirect()->route('404');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout()
    {
        auth()->logout();
    }
}
