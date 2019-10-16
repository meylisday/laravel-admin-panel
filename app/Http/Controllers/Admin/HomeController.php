<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Tile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tiles = DB::table('tiles')->orderBy('created_at', 'desc')->paginate(2);
        if($request->ajax())
        {
            $view = view('data', compact('tiles'))->render();
            return response()->json(['html' => $view]);
        }
        return view('home', compact('tiles'));

    }

}
