<?php

namespace App\Http\Requests;

use App\Tile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
