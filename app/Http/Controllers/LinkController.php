<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function encurtar(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $originalUrl = $request->input('url');
        $shortUrl = $this->gerarCodigoUnico();

        Link::create([
            'original_url' => $originalUrl,
            'short_url' => $shortUrl,
        ]);

        return response()->json(['short_url' => 'localhost:8000/api/' . $shortUrl]);
    }

    public function redirecionar($codigo)
    {
        $link = Link::where('short_url', $codigo)->first();

        if ($link) {
            return redirect($link->original_url);
        } else {
            abort(404);
        }
    }

    private function gerarCodigoUnico()
    {
        $tamanho = (int) 6;
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $tamanho);
    }
}
