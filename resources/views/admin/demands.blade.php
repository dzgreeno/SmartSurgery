<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>طلبات العمليات — SmartSurgery</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .sidebar { min-height: 100vh; background-color: #343a40; color: white; padding-top: 20px;}
    .sidebar a { color: #c2c7d0; text-decoration: none; padding: 15px 20px; display: block; border-bottom: 1px solid #4f5962;}
    .sidebar a:hover { background-color: #495057; color: white; }
    .sidebar a.active { background-color: #495057; color: #ffc107; border-right: 3px solid #ffc107; }
    .content-area { padding: 30px; }
    .status-pending { background: #fff3cd; color: #856404; }
    .status-approved { background: #d4edda; color: #155724; }
    .status-rejected { background: #f8d7da; color: #721c24; }
    .status-scheduled { background: #cce5ff; color: #004085; }
</style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="text-center mb-4">
                <h4><i class="fas fa-hospital-user"></i> SmartSurgery</h4>
                <p class="text-muted small">{{ session('firebase_user.email') }}</p>
                <hr class="bg-secondary">
            </div>
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i> الرئيسية</a>
            <a href="{{ route('users.index') }}"><i class="fas fa-users me-2"></i> إدارة المستخدمين</a>
            <a href="{{ route('admin.demands') }}" class="active"><i class="fas fa-clipboard-list me-2"></i> طلبات العمليات</a>
            <a href="{{ route('surgeries.index') }}"><i class="fas fa-procedures me-2"></i> العمليات الجراحية</a>
            <a href="{{ route('home') }}"><i class="fas fa-globe me-2"></i> الموقع الرئيسي</a>

            <form method="POST" action="{{ route('logout') }}" class="mt-5 px-3">
                @csrf
                <button class="btn btn-danger w-100"><i class="fas fa-sign-out-alt me-2"></i> تسجيل الخروج</button>
            </form>
        </div>

        <div class="col-md-10 content-area">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-clipboard-list me-2"></i> طلبات العمليات الجراحية</h2>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped text-center bg-white shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>اسم المريض</th>
                        <th>نوع العملية</th>
                        <th>الوصف</th>
                        <th>التاريخ المطلوب</th>
                        <th>الحالة</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($demands as $index => $demand)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $demand->patient_name }}</strong></td>
                            <td>{{ $demand->surgery_type }}</td>
                            <td style="max-width:200px; font-size:13px;">{{ Str::limit($demand->description, 60) }}</td>
                            <td>{{ $demand->requested_date }}</td>
                            <td>
                                @php
                                    $statusClass = 'status-' . $demand->status;
                                    $statusLabels = [
                                        'pending' => 'معلق',
                                        'approved' => 'مقبول',
                                        'rejected' => 'مرفوض',
                                        'scheduled' => 'مجدول',
                                    ];
                                @endphp
                                <span class="badge {{ $statusClass }} px-3 py-2" style="font-size:12px;">
                                    {{ $statusLabels[$demand->status] ?? $demand->status }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.demands.status', $demand->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm d-inline-block" style="width:auto;" onchange="this.form.submit()">
                                        <option value="">-- تغيير --</option>
                                        <option value="approved">قبول ✅</option>
                                        <option value="rejected">رفض ❌</option>
                                        <option value="scheduled">جدولة 📅</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-muted">لا توجد طلبات بعد</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
