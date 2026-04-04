<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>إدارة المستخدمين - SmartSurgery</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .sidebar { min-height: 100vh; background-color: #343a40; color: white; padding-top: 20px;}
    .sidebar a { color: #c2c7d0; text-decoration: none; padding: 15px 20px; display: block; border-bottom: 1px solid #4f5962;}
    .sidebar a:hover { background-color: #495057; color: white; }
    .content-area { padding: 30px; }
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
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i> الرئيسية</a>
            <a href="{{ route('users.index') }}"><i class="fas fa-users me-2"></i> إدارة المستخدمين</a>
            <a href="{{ route('admin.demands') }}"><i class="fas fa-clipboard-list me-2"></i> طلبات العمليات</a>
            <a href="{{ route('surgeries.index') }}"><i class="fas fa-procedures me-2"></i> العمليات الجراحية</a>
            
            <form method="POST" action="/logout" class="mt-5 px-3">
                @csrf
                <button class="btn btn-danger w-100"><i class="fas fa-sign-out-alt me-2"></i> تسجيل الخروج</button>
            </form>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="col-md-10 content-area">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>إدارة المستخدمين</h2>
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> إضافة مستخدم
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <table class="table table-bordered table-striped text-center bg-white shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>اللقب</th>
                        <th>الدور</th>
                        <th>الصورة</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->fname ?? '-' }}</td>
                            <td>{{ $user->lname ?? '-' }}</td>
                            <td><span class="badge bg-secondary">{{ $user->role ?? '-' }}</span></td>
                            <td>
                                @if(isset($user->urlphoto) && $user->urlphoto)
                                    <img src="{{ $user->urlphoto }}" width="50" height="50" style="border-radius:50%; object-fit: cover;">
                                @else
                                    <span class="text-muted"><i class="fas fa-user-circle fa-2x"></i></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                        <i class="fas fa-trash"></i> حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">لا يوجد مستخدمين بعد</td>
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