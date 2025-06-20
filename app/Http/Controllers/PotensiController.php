<?php
namespace App\Http\Controllers;

use App\Models\Potensi;

class PotensiController extends Controller
{
    public function index()
    {
        $potensis = Potensi::all();

        return view('potensi.index', compact('potensis'))->with('active', 'potensi');
    }
}
