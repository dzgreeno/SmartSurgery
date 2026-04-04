<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>لوحة تحكم الإدارة — SmartSurgery</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .sidebar { min-height: 100vh; background-color: #343a40; color: white; padding-top: 20px;}
    .sidebar a { color: #c2c7d0; text-decoration: none; padding: 15px 20px; display: block; border-bottom: 1px solid #4f5962;}
    .sidebar a:hover { background-color: #495057; color: white; }
    .sidebar a.active { background-color: #495057; color: #ffc107; border-right: 3px solid #ffc107; }
    .content-area { padding: 30px; }
    .stat-card { border-radius: 10px; padding: 20px; color: white; margin-bottom: 20px; transition: transform .2s; }
    .stat-card:hover { transform: translateY(-3px); }
    .stat-card h3 { font-size: 36px; font-weight: 900; margin-bottom: 4px; }
    .stat-card p { font-size: 14px; opacity: .85; margin: 0; }
    .bg-teal { background: linear-gradient(135deg, #0f4c5c, #1a7a8a) !important; }
    .bg-emerald { background: linear-gradient(135deg, #059669, #34d399) !important; }
    .bg-amber { background: linear-gradient(135deg, #d97706, #fbbf24) !important; }
    .bg-rose { background: linear-gradient(135deg, #e11d48, #fb7185) !important; }
    .bg-indigo { background: linear-gradient(135deg, #4f46e5, #818cf8) !important; }
</style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- القائمة الجانبية -->
        <div class="col-md-2 sidebar">
            <div class="text-center mb-4">
                <h4><i class="fas fa-hospital-user"></i> SmartSurgery</h4>
                <p class="text-muted small">{{ session('firebase_user.email') }}</p>
                <hr class="bg-secondary">
            </div>
            <a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-tachometer-alt me-2"></i> الرئيسية</a>
            <a href="{{ route('users.index') }}"><i class="fas fa-users me-2"></i> إدارة المستخدمين</a>
            <a href="{{ route('admin.demands') }}"><i class="fas fa-clipboard-list me-2"></i> طلبات العمليات</a>
            <a href="{{ route('surgeries.index') }}"><i class="fas fa-procedures me-2"></i> العمليات الجراحية</a>
            <a href="{{ route('home') }}"><i class="fas fa-globe me-2"></i> الموقع الرئيسي</a>

            <form method="POST" action="{{ route('logout') }}" class="mt-5 px-3">
                @csrf
                <button class="btn btn-danger w-100"><i class="fas fa-sign-out-alt me-2"></i> تسجيل الخروج</button>
            </form>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="col-md-10 content-area">
            <h2 class="mb-4">مرحباً بك 👑 {{ session('firebase_user.fname') }} {{ session('firebase_user.lname') }}</h2>

            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card bg-teal shadow">
                        <h3>{{ $stats['surgeries'] ?? 0 }}</h3>
                        <p><i class="fas fa-procedures me-1"></i> إجمالي العمليات</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-emerald shadow">
                        <h3>{{ $stats['doctors'] ?? 0 }}</h3>
                        <p><i class="fas fa-user-md me-1"></i> الأطباء</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-amber shadow">
                        <h3>{{ $stats['patients'] ?? 0 }}</h3>
                        <p><i class="fas fa-bed me-1"></i> المرضى</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-rose shadow">
                        <h3>{{ $stats['appointments'] ?? 0 }}</h3>
                        <p><i class="fas fa-calendar-check me-1"></i> مواعيد معلقة</p>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="stat-card bg-indigo shadow">
                        <h3>{{ $stats['demands'] ?? 0 }}</h3>
                        <p><i class="fas fa-clipboard-list me-1"></i> طلبات جديدة</p>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>