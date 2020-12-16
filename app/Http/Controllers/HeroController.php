<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\HeroStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\HeroUpdateRequest;

class HeroController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Hero::class);

        $search = $request->get('search', '');

        $heros = Hero::search($search)
            ->latest()
            ->paginate();

        return view('app.heros.index', compact('heros', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Hero::class);

        $roles = Role::get();

        return view('app.heros.create', compact('roles'));
    }

    /**
     * @param \App\Http\Requests\HeroStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeroStoreRequest $request)
    {
        $this->authorize('create', Hero::class);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $hero = Hero::create($validated);

        return redirect()
            ->route('heros.edit', $hero)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hero $hero
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Hero $hero)
    {
        $this->authorize('view', $hero);

        return view('app.heros.show', compact('hero'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hero $hero
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Hero $hero)
    {
        $this->authorize('update', $hero);

        $roles = Role::get();

        return view('app.heros.edit', compact('hero', 'roles'));
    }

    /**
     * @param \App\Http\Requests\HeroUpdateRequest $request
     * @param \App\Models\Hero $hero
     * @return \Illuminate\Http\Response
     */
    public function update(HeroUpdateRequest $request, Hero $hero)
    {
        $this->authorize('update', $hero);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($hero->image) {
                Storage::delete($hero->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $hero->update($validated);

        return redirect()
            ->route('heros.edit', $hero)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hero $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Hero $hero)
    {
        $this->authorize('delete', $hero);

        if ($hero->image) {
            Storage::delete($hero->image);
        }

        $hero->delete();

        return redirect()
            ->route('heros.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
