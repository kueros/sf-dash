<?php

namespace App\Http\Controllers;

use App\Models\OrderIn;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrderInRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

		$data = DB::table('order_in')
		->leftJoin('stores', 'order_in.store_id', '=', 'stores.id')
		->get();


		#dd($data);
		return view('order-in.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $orderIn = new OrderIn();

        return view('order-in.create', compact('orderIn'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderInRequest $request): RedirectResponse
    {
        OrderIn::create($request->validated());

        return Redirect::route('order-in.index')
            ->with('success', 'OrderIn created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $orderIn = OrderIn::find($id);

        return view('order-in.show', compact('orderIn'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $orderIn = OrderIn::find($id);

        return view('order-in.edit', compact('orderIn'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderInRequest $request, OrderIn $orderIn): RedirectResponse
    {
        $orderIn->update($request->validated());

        return Redirect::route('order-in.index')
            ->with('success', 'OrderIn updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        OrderIn::find($id)->delete();

        return Redirect::route('order-in.index')
            ->with('success', 'OrderIn deleted successfully');
    }
}
