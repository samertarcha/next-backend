<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the quotes with their services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::with('services')->get();

        return response()->json([
            'quotes' => $quotes,
        ], 200);
    }

    /**
     * Display a single quote with its services.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote = Quote::with('services')->find($id);

        if (!$quote) {
            return response()->json([
                'error' => 'Quote not found',
            ], 404);
        }

        return response()->json([
            'quote' => $quote,
        ], 200);
    }

    /**
     * Store a newly created quote with its services.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quote = Quote::create([
            'deal_id' => $request->deal_id,
            'project_id' => $request->project_id,
            'title' => $request->title,
            'project_deliverables' => $request->project_deliverables,
            'date' => $request->date,
            'quote_status' => $request->quote_status,
            'term_id' => $request->term_id,
            'creator_id' => $request->creator_id,
            'currency' => $request->currency,
            'amount' => $request->amount,
            'tax_status' => $request->tax_status,
            'delete' => 0,
        ]);

        if ($request->has('services')) {
            $services = $request->get('services');
            $quote->services()->attach($services);
        }

        return response()->json([
            'quote' => $quote,
        ], 201);
    }
}