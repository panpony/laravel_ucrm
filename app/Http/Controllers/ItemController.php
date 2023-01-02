<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Inertia\Inertia;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::select('id', 'name', 'price', 'is_selling')->get();

        return Inertia::render('Items/Index', [
            'items' => $items
        ]);
        // return Inertia::render('Inertia/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Items/Create', [
            // 'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $itemRequest = [
            'name' => $request->name,
            'memo' => $request->memo,
            'price' => $request->price,
        ];
        \DB::beginTransaction();
        try {
            Item::create($itemRequest);
            \DB::commit();
            return to_route('items.index')
                ->with([
                    'message' => '登録しました',
                    'status' => 'success'
                ]);
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {

        return Inertia::render('Items/Show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return Inertia::render('Items/Edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $itemRequest = $request->all();
        // dd($itemRequest);
        $item_id = $itemRequest['id'];
        \DB::beginTransaction();
        try {
            $target = Item::find($item_id);
            $target->fill([
                'name' => $request->name,
                'memo' => $request->memo,
                'price' => $request->price,
                'is_selling' => $request->is_selling,
            ]);
            $target->save();
            \DB::commit();

            return to_route('items.index')
                ->with([
                    'message' => '更新しました',
                    'status' => 'success'
                ]);
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return to_route('items.index')->with([
            'message' => '削除しました。',
            'status' => 'delete'
        ]);
    }
}
