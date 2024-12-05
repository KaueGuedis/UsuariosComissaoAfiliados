<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Affiliate;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index()
    {
        $commissions = Commission::with('affiliate')->get();
        return view('commissions.index', compact('commissions'));
    }

    public function create()
    {
        $affiliates = Affiliate::get();
        return view('commissions.create', compact('affiliates'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'affiliate_id' => 'required|exists:affiliates,id',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);

        Commission::create($data);
        return redirect()->route('commissions.index')->with('success', 'Comissão criada com sucesso!');
    }

    public function edit(Commission $commission)
    {
        $affiliates = Affiliate::where('active', true)->get();
        return view('commissions.edit', compact('commission', 'affiliates'));
    }

    public function update(Request $request, Commission $commission)
    {
        $data = $request->validate([
            'affiliate_id' => 'required|exists:affiliates,id',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);

        $commission->update($data);
        return redirect()->route('commissions.index')->with('success', 'Comissão atualizada com sucesso!');
    }

    public function destroy(Commission $commission)
    {
        $commission->delete();
        return redirect()->route('commissions.index')->with('success', 'Comissão excluída com sucesso!');
    }
}
