<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTileRequest;
use App\Http\Requests\UpdateTileRequest;
use App\Http\Resources\Admin\TileResource;
use App\Tile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TileResource(Tile::all());
    }

    public function store(StoreTileRequest $request)
    {
        $tile = Tile::create($request->all());

        return (new TileResource($tile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tile $tile)
    {
        abort_if(Gate::denies('tile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TileResource($tile);
    }

    public function update(UpdateTileRequest $request, Tile $tile)
    {
        $tile->update($request->all());

        return (new TileResource($tile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tile $tile)
    {
        abort_if(Gate::denies('tile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
