<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Base;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Notifications\Subscribed;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SubscriptionStoreRequest;
use App\Http\Requests\SubscriptionUpdateRequest;

class SubscriptionController extends Controller
{
    use Base;
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Subscription::class);

        $search = $request->get('search', '');

        $subscriptions = Subscription::search($search)
            ->paginate();

        return view('app.subscriptions.index', compact('subscriptions', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Subscription::class);

        $subscription = new Subscription();
        return view('app.subscriptions.create', compact(['subscription']));
    }

    /**
     * @param \App\Http\Requests\SubscriptionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionStoreRequest $request)
    {
        $this->authorize('create', Subscription::class);

        $validated = $request->validated();
        $isUser = User::where('email', $validated['email'])->first();
        
        if (is_null($isUser)) {
            $subscriber = Subscription::firstOrCreate($validated);
            $subscriber->notify(new Subscribed());
        }
        
        return redirect()
            ->route('subscriptions.edit', $subscriber)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Subscription $subscription)
    {
        $this->authorize('view', $subscription);

        return view('app.subscriptions.show', compact('subscription'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Subscription $subscription)
    {
        $this->authorize('update', $subscription);

        return view('app.subscriptions.edit', compact('subscription'));
    }

    /**
     * @param \App\Http\Requests\SubscriptionUpdateRequest $request
     * @param \App\Models\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriptionUpdateRequest $request, Subscription $subscription)
    {
        $this->authorize('update', $subscription);
        $validated = $request->validated();
        
        $isUser = User::where('email', $validated['email'])->first();
        
        if (is_null($isUser)) {
            $subscription->update($validated);
            $subscription->notify(new Subscribed());
        } else {
            $this->destroy($request, $subscription);
        }

        return redirect()
            ->route('subscriptions.edit', $subscription)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Subscription $subscription)
    {
        $this->authorize('delete', $subscription);

        $subscription->delete();

        return redirect()
            ->route('subscriptions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
