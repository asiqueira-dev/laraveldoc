<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Guia;
use Illuminate\Http\Request;

class GuiaController extends Controller
{
    public function index()
    {
        // Busca temas com os comandos, ordenados
        $temas = Tema::with(['comandos' => function($query) {
            $query->orderBy('ordem');
        }])->orderBy('ordem')->get();

        // Busca os guias do topo (Início Rápido / Helper)
        $guias = Guia::with(['itens' => function($query) {
            $query->orderBy('ordem');
        }])->orderBy('ordem')->get();

        return view('welcome', compact('temas', 'guias'));
    }
}