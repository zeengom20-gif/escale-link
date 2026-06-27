<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRouterRequest;
use App\Models\Router;
use App\Services\MikrotikService;
use Illuminate\Http\Request;

class RouterController extends Controller
{
    public function index()
    {
        return view('routers.index', [
            'routers' => Router::all()
        ]);
    }

    public function store(Request $request)
    {
        Router::create($request->only([
            'name',
            'ip',
            'api_port',
            'username',
            'password'
        ]));

        return redirect()
            ->route('routers.index')
            ->with('success', 'Routeur enregistré.');
    }

    public function test(Router $router, MikrotikService $mikrotik)
    {
        $result = $mikrotik->test($router->toArray());

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        $router->update([
            'identity'          => $result['data']['identity'] ?? null,
            'routeros_version'  => $result['data']['version'] ?? null,
            'board_name'        => $result['data']['board-name'] ?? null,
            'status'            => true,
        ]);

        return back()->with(
            'success',
            'Connexion réussie au MikroTik.'
        );
    }

    public function edit(Router $router)
    {
        return view('routers.edit', compact('router'));
    }

    public function update(UpdateRouterRequest $request, Router $router)
    {
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $router->update($data);

        return redirect()
            ->route('routers.index')
            ->with('success', 'Routeur modifié avec succès.');
    }
public function destroy(Router $router)
{
    $router->delete();

    return redirect()
        ->route('routers.index')
        ->with('success', 'Routeur supprimé avec succès.');
}}