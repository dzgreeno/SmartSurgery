<!-- resources/views/head.blade.php -->

@extends('layouts.admin') {{-- ترث من layout الرئيسي للإدارة --}}

@section('title', 'رئيسة المصلحة - قسم النساء')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">مرحبا، {{ auth()->user()->name }}</h1>

    {{-- لوحة الجراحات الخاصة بالنساء --}}
    <div class="card mb-4">
        <div class="card-header">
            جراحات النساء
        </div>
        <div class="card-body">
            @if($surgeries->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>اسم المريض</th>
                            <th>تاريخ الجراحة</th>
                            <th>الحالة</th>
                            <th>الملاحظات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($surgeries as $surgery)
                            <tr>
                                <td>{{ $surgery->patient_name }}</td>
                                <td>{{ $surgery->date }}</td>
                                <td>{{ $surgery->status }}</td>
                                <td>{{ $surgery->notes }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>لا توجد جراحات مسجّلة حاليا.</p>
            @endif
        </div>
    </div>

    {{-- روابط سريعة --}}
    <div class="card">
        <div class="card-header">روابط سريعة</div>
        <div class="card-body">
            <a href="{{ route('fiche-navette') }}" class="btn btn-primary mb-2">ملف التنقلات</a>
            <a href="{{ route('patient-movements') }}" class="btn btn-secondary mb-2">حركة المرضى</a>
            <a href="{{ route('daily-meds') }}" class="btn btn-success mb-2">الأدوية اليومية</a>
        </div>
    </div>
</div>
@endsection
