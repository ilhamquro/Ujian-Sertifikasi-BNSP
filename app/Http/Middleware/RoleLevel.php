<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleLevel
{
    // fungsi untuk mengelola user jika ada rolenya
    // jika user punya role yg cocok maka boleh melakukan request selanjutnya
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // memeberikan logika if (jika) rolenya sesuai
        if (in_array($request->user()->role, $roles)) {
        return $next($request);
        }
        return abort(403);
    }
}
