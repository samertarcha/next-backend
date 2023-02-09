<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return Quote::with('services')->get();
    }

    public function show($id)
    {
        return Quote::with('services')->find($id);
    }

    public function store(Request $request)
    {
        $quote = Quote::create($request->all());
        $quote->services()->attach($request->services);
        return $quote;
    }
}