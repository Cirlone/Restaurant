<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{
    public function index()
    {
        $tokens = auth()->user()->tokens()->orderBy('name')->get();
        return view('api-tokens', compact('tokens'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'permissions' => ['nullable', 'array'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $token = $request->user()->createToken(
            $request->name,
            $request->permissions ?? ['*']
        );

        return redirect()->route('api-tokens.index')
            ->with('success', 'API Token created successfully!')
            ->with('plainTextToken', $token->plainTextToken);
    }

    public function update(Request $request, $tokenId)
    {
        $token = PersonalAccessToken::findOrFail($tokenId);
        
        if ($token->tokenable_id !== auth()->id()) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'permissions' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $token->abilities = $request->permissions;
        $token->save();

        return back()->with('success', 'Token permissions updated successfully!');
    }

    public function destroy($tokenId)
    {
        $token = PersonalAccessToken::findOrFail($tokenId);
        
        if ($token->tokenable_id !== auth()->id()) {
            abort(403);
        }

        $token->delete();

        return back()->with('success', 'API Token deleted successfully!');
    }
}