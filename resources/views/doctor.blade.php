<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>صفحة الطبيب — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
:root {
  --bg: #0d1117; --bg2: #161b22; --bg3: #1c2128;
  --border: rgba(255,255,255,.08); --text: #e6edf3; --muted: #7d8590;
  --accent: #2dd4bf; --accent2: rgba(45,212,191,.12);
  --gold: #f0b429; --red: #f85149; --green: #3fb950;
  --r: 12px; --t: .2s ease;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Cairo', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; padding: 20px; }
.topbar {
  background: var(--bg2); border: 1px solid var(--border); border-radius: var(--r);
  padding: 16px 24px; display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 24px;
}
.topbar-right { display: flex; align-items: center; gap: 12px; }
.topbar h2 { font-size: 18px; font-weight: 800; }
.user-info { font-size: 12px; color: var(--muted); }
.btn-logout {
  padding: 8px 16px; background: rgba(248,81,73,.1); border: 1px solid rgba(248,81,73,.2);
  color: var(--red); border-radius: 8px; font-family: 'Cairo'; font-size: 12px; font-weight: 700;
  cursor: pointer; transition: all var(--t);
}
.btn-logout:hover { background: rgba(248,81,73,.2); }
.stats { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px; margin-bottom: 24px; }
.stat-card {
  background: var(--bg2); border: 1px solid var(--border); border-radius: var(--r);
  padding: 20px; text-align: center;
}
.stat-num { font-size: 32px; font-weight: 900; color: var(--accent); }
.stat-label { font-size: 12px; color: var(--muted); margin-top: 4px; }
.card {
  background: var(--bg2); border: 1px solid var(--border); border-radius: var(--r);
  overflow: hidden; margin-bottom: 16px;
}
.card-head { padding: 14px 18px; border-bottom: 1px solid var(--border); font-size: 14px; font-weight: 800; display: flex; align-items: center; gap: 8px; }
.card-body { padding: 18px; }
.quick-links { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 10px; }
.quick-link {
  display: flex; align-items: center; gap: 8px; padding: 12px 16px;
  background: var(--bg3); border: 1px solid var(--border); border-radius: 8px;
  text-decoration: none; color: var(--text); font-size: 13px; font-weight: 600;
  transition: all var(--t);
}
.quick-link:hover { border-color: var(--accent); background: var(--accent2); }
.empty-msg { text-align: center; padding: 40px; color: var(--muted); font-size: 14px; }
</style>
</head>
<body>

@php
    $user = session('firebase_user', []);
    $role = session('firebase_role', 'doctor');
    $fname = $user['fname'] ?? '';
    $lname = $user['lname'] ?? '';
    $email = $user['email'] ?? '';
@endphp

<div class="topbar">
    <div class="topbar-right">
        <span style="font-size: 24px;">🩺</span>
        <div>
            <h2>مرحباً د. {{ $fname }} {{ $lname }}</h2>
            <div class="user-info">{{ $email }} • {{ $role }}</div>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn-logout">🚪 تسجيل الخروج</button>
    </form>
</div>

<div class="stats">
    <div class="stat-card">
        <div class="stat-num">0</div>
        <div class="stat-label">عملياتي</div>
    </div>
    <div class="stat-card">
        <div class="stat-num">0</div>
        <div class="stat-label">مرضاي</div>
    </div>
    <div class="stat-card">
        <div class="stat-num">0</div>
        <div class="stat-label">مواعيد اليوم</div>
    </div>
</div>

<div class="card">
    <div class="card-head">📋 روابط سريعة</div>
    <div class="card-body">
        <div class="quick-links">
            <a href="{{ route('surgery.women') }}" class="quick-link">🏥 جراحة النساء</a>
            <a href="{{ route('surgery.men') }}" class="quick-link">🏥 جراحة الرجال</a>
            <a href="{{ route('daily-meds') }}" class="quick-link">💊 سجل الأدوية</a>
            <a href="{{ route('home') }}" class="quick-link">🏠 الرئيسية</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">🔬 عملياتي القادمة</div>
    <div class="card-body">
        <div class="empty-msg">لا توجد عمليات مجدولة حالياً</div>
    </div>
</div>

</body>
</html>