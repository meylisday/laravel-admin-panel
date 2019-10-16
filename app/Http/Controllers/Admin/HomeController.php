<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Tile;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index()
    {
        $tiles = Tile::all();
        return view('home', compact('tiles'));
    }
}
