<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Candidato;
use Auth;
use Redirect;
use App\Models\votacao;
use Illuminate\Http\Request;

class VotacaoController extends Controller
{
    public function store(Request $request)
    {
        votacao::create([
        'VOT_CAN_CODIGO' => $request->CAN_CODIGO,
        'VOT_USU_CODIGO' => Auth::user()->id
        ]);
        return Redirect::route('candidatos.votar');
    }
}
