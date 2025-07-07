<?php

namespace App\Modules\User\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User\Application\Services\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $service) {}

    public function index()
    {
        return response()->json($this->service->all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'user_Role' => 'required|string',
        ]);

        $user = $this->service->create(...array_values($data));
        return response()->json($user, 201);
    }

    public function show(string $id)
    {
        $user = $this->service->find($id);
        return $user ? response()->json($user) : response()->json(['error' => 'User not found'], 404);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'user_Role' => 'required|string',
        ]);

        $user = $this->service->update($id, ...array_values($data));
        return $user ? response()->json($user) : response()->json(['error' => 'User not found'], 404);
    }

    public function destroy(string $id)
    {
        return $this->service->delete($id)
            ? response()->json(['message' => 'Deleted'])
            : response()->json(['error' => 'User not found'], 404);
    }
}
