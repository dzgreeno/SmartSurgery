<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FirebaseAuth
{
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        if (!session('firebase_user')) {
            return redirect()->route('login')
                ->with('error', 'يجب تسجيل الدخول أولاً');
        }

        if (!empty($roles)) {
            $userRole = session('firebase_role', 'staff');
            if (!in_array($userRole, $roles)) {
                abort(403, 'ليس لديك صلاحية');
            }
        }

        return $next($request);
    }
}