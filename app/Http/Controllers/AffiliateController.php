<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function index()
    {
        $affiliates = Affiliate::all();
        return view('affiliates.index', compact('affiliates'));
    }

    public function create()
    {
        return view('affiliates.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:11|unique:affiliates',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:affiliates',
            'telefone' => 'required|string|max:15',
            'endereco' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
        ]);

        $data["cpf"] = str_replace(["-", ".", " "], "", $data["cpf"]);

        Affiliate::create($data);
        return redirect()->route('affiliates.index')->with('success', 'Afiliado criado com sucesso!');
    }

    public function edit(Affiliate $affiliate)
    {
        return view('affiliates.edit', compact('affiliate'));
    }

    public function update(Request $request, Affiliate $affiliate)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|digits:11|unique:affiliates,cpf,' . $affiliate->id,
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:affiliates,email,' . $affiliate->id,
            'telefone' => 'required|string|max:15',
            'endereco' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
        ]);

        $affiliate->update($data);
        return redirect()->route('affiliates.index')->with('success', 'Afiliado atualizado com sucesso!');
    }

    public function destroy(Affiliate $affiliate)
    {
        $affiliate->update(['active' => false]);
        return redirect()->route('affiliates.index')->with('success', 'Afiliado inativado com sucesso!');
    }

    public function activate(Affiliate $affiliate)
    {
        $affiliate->update(['active' => true]);
        return redirect()->route('affiliates.index')->with('success', 'Afiliado ativado com sucesso!');
    }
}