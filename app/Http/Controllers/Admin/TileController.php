<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTileRequest;
use App\Http\Requests\StoreTileRequest;
use App\Http\Requests\UpdateTileRequest;
use App\Tile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tiles = Tile::all();

        return view('admin.tiles.index', compact('tiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('tile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tiles.create');
    }

    public function store(StoreTileRequest $request)
    {
        $tile = Tile::create($request->all());

        return redirect()->route('admin.tiles.index');
    }

    public function edit(Tile $tile)
    {
        abort_if(Gate::denies('tile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tiles.edit', compact('tile'));
    }

    public function update(UpdateTileRequest $request, Tile $tile)
    {
        $tile->update($request->all());

        return redirect()->route('admin.tiles.index');
    }

    public function show(Tile $tile)
    {
        abort_if(Gate::denies('tile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tiles.show', compact('tile'));
    }

    public function destroy(Tile $tile)
    {
        abort_if(Gate::denies('tile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tile->delete();

        return back();
    }

    public function massDestroy(MassDestroyTileRequest $request)
    {
        Tile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
