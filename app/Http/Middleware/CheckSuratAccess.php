<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSuratAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login
        $surat = $request->route('surat'); // Ambil data surat dari route parameter

        // Jika surat tidak ditemukan
        if (!$surat) {
            abort(404, 'Surat tidak ditemukan.');
        }

        // Jika pengguna adalah RT, cek akses berdasarkan rt_id
        if ($user->role_id == 3 && $surat->user->rt_id != $user->rt_id) {
            abort(403, 'Anda tidak memiliki akses ke surat ini.');
        }

        // Jika pengguna adalah RW, cek akses berdasarkan rw_id
        if ($user->role_id == 2) {
            $rt = $surat->user->rt; // Ambil data RT pengguna yang membuat surat
            if (!$rt || $rt->rw_id != $user->rt->rw_id) {
                abort(403, 'Anda tidak memiliki akses ke surat ini.');
            }
        }

        return $next($request);
    }
}
