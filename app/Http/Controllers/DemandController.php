<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        Demand::create([
            'patient_name' => $request->name,
            'surgery_type' => $request->type,
            'description' => $request->description,
            'requested_date' => $request->date,
            'status' => 'pending',
        ]);

        return back()->with('success', 'تم إرسال طلبك بنجاح. سيتم مراجعته من قبل الإدارة.');
    }

    public function index()
    {
        $demands = Demand::latest()->get();
        return view('admin.demands', compact('demands'));
    }

    public function updateStatus(Request $request, $id)
    {
        $demand = Demand::findOrFail($id);
        $demand->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', 'تم تحديث حالة الطلب بنجاح.');
    }
}
