<?php

namespace App\Http\Controllers;

use App\Models\Surgery;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;

class SurgeryController extends Controller
{
    // عرض جميع العمليات
    public function index()
    {
        $surgeries = Surgery::latest()->get();
        $departments = Department::where('type', 'surgery')->get();
        return view('surgeries.index', compact('surgeries', 'departments'));
    }

    // حفظ عملية جديدة
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'surgery_date' => 'required|date',
            'room' => 'required|string|max:100',
        ]);

        Surgery::create([
            'patient_name' => $request->patient_name,
            'doctor_name' => $request->doctor_name,
            'surgery_date' => $request->surgery_date,
            'surgery_time' => $request->surgery_time,
            'room' => $request->room,
            'department_id' => $request->department_id,
            'patient_id' => $request->patient_id,
            'status' => $request->status ?? 'scheduled',
            'notes' => $request->notes,
        ]);

        return redirect()->route('surgeries.index')
                         ->with('success', 'تمت إضافة العملية بنجاح');
    }

    // تعديل عملية
    public function update(Request $request, $id)
    {
        $surgery = Surgery::findOrFail($id);

        $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'surgery_date' => 'required|date',
            'room' => 'required|string|max:100',
        ]);

        $surgery->update($request->only([
            'patient_name', 'doctor_name', 'surgery_date', 'surgery_time',
            'room', 'department_id', 'patient_id', 'status', 'notes'
        ]));

        return redirect()->route('surgeries.index')
                         ->with('success', 'تم تعديل العملية بنجاح');
    }

    // حذف عملية
    public function destroy($id)
    {
        $surgery = Surgery::findOrFail($id);
        $surgery->delete();

        return redirect()->route('surgeries.index')
                         ->with('success', 'تم حذف العملية');
    }

    public function women()
    {
        return view('surgery-women');
    }
}