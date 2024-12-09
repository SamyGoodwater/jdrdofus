<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;

use App\Models\Modules\Ressourcetype;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Services\DataService;

class RessourcetypeController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request): \Inertia\Response
    {
        $this->authorize('viewAny', Ressourcetype::class);

        // Récupère la valeur de 'paginationMaxDisplay' depuis la requête, avec une valeur par défaut de 25
        $paginationMaxDisplay = max(1, min(500, (int) $request->input('paginationMaxDisplay', 25)));

        $ressourcetypes = Ressourcetype::paginate($paginationMaxDisplay);

        return Inertia::render('ressourcetype.index', [
            'ressourcetypes' => $ressourcetypes,
        ]);
    }

    public function show(Ressourcetype $ressourcetype, Request $request): \Inertia\Response
    {
        $this->authorize('view', $ressourcetype);

        return Inertia::render('Ressourcetypes/Show', [
            'ressources' => $ressourcetype->ressources()
        ]);
    }

    public function create(): \Inertia\Response
    {
        $this->authorize('create', Ressourcetype::class);

        return Inertia::render('ressourcetype.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', Ressourcetype::class);

        $data = DataService::extractData($request, new Ressourcetype());
        if ($data === []) {
            return redirect()->back()->withInput();
        }
        $data['created_by'] = Auth::user()?->id ?? "-1";
        $ressourcetype = Ressourcetype::create($data);

        return redirect()->route('ressourcetype.show', ['ressourcetype' => $ressourcetype]);
    }

    public function edit(Ressourcetype $ressourcetype): \Inertia\Response
    {
        $this->authorize('update', $ressourcetype);

        return Inertia::render('ressourcetype.edit', [
            'ressourcetype' => $ressourcetype
        ]);
    }

    public function update(Ressourcetype $ressourcetype, Request $request): RedirectResponse
    {
        $this->authorize('update', $ressourcetype);

        $data = DataService::extractData($request, $ressourcetype());
        if ($data === []) {
            return redirect()->back()->withInput();
        }
        $ressourcetype->update($data);

        return redirect()->route('ressourcetype.show', ['ressourcetype' => $ressourcetype]);
    }

    public function delete(Ressourcetype $ressourcetype): RedirectResponse
    {
        $this->authorize('delete', $ressourcetype);

        $ressourcetype->delete();

        return redirect()->route('ressourcetype.index');
    }

    public function forceDelete(Ressourcetype $ressourcetype): RedirectResponse
    {
        $this->authorize('forceDelete', $ressourcetype);

        $ressourcetype->forceDelete();

        return redirect()->route('ressourcetype.index');
    }

    public function restore(Ressourcetype $ressourcetype): RedirectResponse
    {
        $this->authorize('restore', $ressourcetype);

        $ressourcetype->restore();

        return redirect()->route('ressourcetype.index');
    }
}