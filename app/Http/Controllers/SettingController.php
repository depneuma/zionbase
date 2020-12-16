<?php

namespace App\Http\Controllers;

use App\Traits\Base;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SettingStoreRequest;
use App\Http\Requests\SettingUpdateRequest;

class SettingController extends Controller
{
    use Base;
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Setting::class);

        $search = $request->get('search', '');

        $settings = Setting::search($search)
            ->paginate();

        return view('app.settings.index', compact('settings', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Setting::class);

        $setting = new Setting();
        return view('app.settings.create', compact(['setting']));
    }

    /**
     * @param \App\Http\Requests\SettingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingStoreRequest $request)
    {
        $this->authorize('create', Setting::class);

        $validated = $request->validated();
        $setting = Setting::create($validated);

        if ($request->hasFile('image')) 
        {
            $validated['image'] = $request->file('image')->store('public');
            Setting::set($validated['key'], $validated['image']);
        } else {
            Setting::set($validated['key'], $validated['value']);
        }
        
        return redirect()
            ->route('settings.edit', $setting)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Setting $setting)
    {
        $this->authorize('view', $setting);

        return view('app.settings.show', compact('setting'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Setting $setting)
    {
        $this->authorize('update', $setting);

        return view('app.settings.edit', compact('setting'));
    }

    /**
     * @param \App\Http\Requests\SettingUpdateRequest $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $this->authorize('update', $setting);
        $validated = $request->validated();

        if ($request->hasFile('image')) 
        {

            if ( Setting::get($validated['key']) != "") {
                Storage::delete(Setting::get($validated['key']));
            }

            $validated['image'] = $request->file('image')->store('public');
            Setting::set($validated['key'], $validated['image']);

        } else {
            Setting::set($validated['key'], $validated['value']);
        }

        return redirect()
            ->route('settings.edit', $setting)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Setting $setting)
    {
        $this->authorize('delete', $setting);
        
        if ($setting->image) {
            Storage::delete($setting->image);
        }

        $setting->delete();

        return redirect()
            ->route('settings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
