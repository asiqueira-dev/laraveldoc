<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Guia;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Carrega Temas e seus Comandos, ordenados
        $temas = Tema::with(['comandos' => function($q) {
            $q->orderBy('ordem', 'asc');
        }])->orderBy('ordem', 'asc')->get();

        // Carrega Guias e seus Itens (Passos)
        $guias = Guia::with(['itens' => function($q) {
            $q->orderBy('ordem', 'asc');
        }])->orderBy('ordem', 'asc')->get();

        return view('welcome', compact('temas', 'guias'));
    }
}