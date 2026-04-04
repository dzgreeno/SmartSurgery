<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surgery;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('firebase.auth');
    }

    /**
     * عرض لوحة تحكم الدكتور
     */
    public function dashboard(Request $request)
    {
        $uid = session('firebase_uid');
        $userInfo = session('firebase_user');

        // جلب العمليات الخاصة بهذا الدكتور
        $surgeries = Surgery::where('doctor_uid', $uid)
                            ->orderBy('surgery_date', 'desc')
                            ->get();

        return view('doctor', compact('surgeries', 'userInfo'));
    }
}