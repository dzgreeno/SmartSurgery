<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>إضافة مستخدم - SmartSurgery</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .sidebar { min-height: 100vh; background-color: #343a40; color: white; padding-top: 20px;}
    .sidebar a { color: #c2c7d0; text-decoration: none; padding: 15px 20px; display: block; border-bottom: 1px solid #4f5962;}
    .sidebar a:hover { background-color: #495057; color: white; }
    .content-area { padding: 30px; }
    .glass-form { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
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
            <h2 class="mb-4">إضافة مستخدم جديد</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="col-md-8 mx-auto glass-form">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">الاسم الأول (fname)</label>
                            <input type="text" name="fname" class="form-control" value="{{ old('fname') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">اللقب (lname)</label>
                            <input type="text" name="lname" class="form-control" value="{{ old('lname') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">كلمة المرور</label>
                        <input type="password" name="password" class="form-control" required minlength="6">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">دور المستخدم (Role)</label>
                        <select name="role" class="form-select" required>
                            <option value="">-- اختر --</option>
                            <option value="admin">مدير النظام (Admin)</option>
                            <option value="doctor">طبيب (Doctor)</option>
                            <option value="head_women">رئيسة مصلحة جراحة النساء</option>
                            <option value="staff_women">طاقم جراحة النساء</option>
                            <option value="head_men">رئيس مصلحة جراحة الرجال</option>
                            <option value="staff_men">طاقم جراحة الرجال</option>
                            <option value="head_orthopedics">رئيس مصلحة العظام</option>
                            <option value="head_maternity">رئيسة مصلحة الأمومة</option>
                            <option value="nurse">ممرض/ة (Nurse)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">الصورة الشخصية (يتم رفعها لـ Cloudinary)</label>
                        <input type="file" name="photo" class="form-control" accept="image/*">
                    </div>

                    <div class="text-end">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">إلغاء</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> حفظ المستخدم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
