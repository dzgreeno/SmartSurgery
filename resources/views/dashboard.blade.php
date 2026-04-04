<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم — SmartSurgery</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
    :root {
      --bg: #0d1117; --bg2: #161b22; --bg3: #1c2128;
      --border: rgba(255,255,255,.08); --text: #e6edf3; --muted: #7d8590;
      --accent: #2dd4bf; --accent2: rgba(45,212,191,.12);
      --gold: #f0b429; --red: #f85149;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Cairo', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
    .container { max-width: 600px; width: 100%; }
    .card { background: var(--bg2); border: 1px solid var(--border); border-radius: 12px; padding: 32px; margin-bottom: 20px; }
    h1 { font-size: 22px; margin-bottom: 16px; }
    p { color: var(--muted); margin-bottom: 10px; }
    .role-badge { display: inline-block; padding: 4px 12px; border-radius: 100px; font-size: 12px; font-weight: 700; background: var(--accent2); color: var(--accent); }
    .links { display: flex; flex-direction: column; gap: 8px; margin-top: 20px; }
    .links a { display: block; padding: 12px 16px; background: var(--bg3); border: 1px solid var(--border); border-radius: 8px; color: var(--text); text-decoration: none; font-weight: 600; transition: all .2s; }
    .links a:hover { border-color: var(--accent); background: var(--accent2); }
    .btn-logout { display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; background: rgba(248,81,73,.1); border: 1px solid rgba(248,81,73,.2); color: var(--red); border-radius: 8px; font-family: 'Cairo'; font-size: 13px; font-weight: 700; cursor: pointer; transition: all .2s; margin-top: 16px; }
    .btn-logout:hover { background: rgba(248,81,73,.2); }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        @php
            $role = session('firebase_role', 'user');
            $user = session('firebase_user', []);
            $fname = $user['fname'] ?? '';
            $lname = $user['lname'] ?? '';
            $email = $user['email'] ?? '';
        @endphp

        <h1>
            @if($role == 'admin')
                👑 لوحة تحكم الأدمن
            @elseif($role == 'head_women')
                👩‍⚕️ لوحة رئيسة مصلحة جراحة النساء
            @elseif($role == 'head_men')
                👨‍⚕️ لوحة رئيس مصلحة جراحة الرجال
            @elseif($role == 'doctor')
                🩺 لوحة الطبيب
            @elseif($role == 'nurse')
                💉 لوحة الممرض/ة
            @else
                📋 لوحة التحكم
            @endif
        </h1>

        <p>مرحباً <strong>{{ $fname }} {{ $lname }}</strong></p>
        <p>{{ $email }}</p>
        <span class="role-badge">{{ $role }}</span>

        <div class="links">
            {{-- جراحة النساء --}}
            @if(in_array($role, ['admin', 'head_women', 'staff_women', 'doctor']))
                <a href="{{ route('surgery.women') }}">🏥 الدخول إلى جناح جراحة النساء</a>
            @endif

            {{-- جراحة الرجال --}}
            @if(in_array($role, ['admin', 'head_men', 'staff_men', 'doctor']))
                <a href="{{ route('surgery.men') }}">🏥 الدخول إلى جناح جراحة الرجال</a>
            @endif

            {{-- سجل الأدوية --}}
            @if(in_array($role, ['admin', 'head_women', 'head_men', 'nurse']))
                <a href="{{ route('daily-meds') }}">💊 سجل الأدوية اليومي</a>
            @endif

            {{-- لوحة الأدمن --}}
            @if($role == 'admin')
                <a href="{{ route('admin.dashboard') }}">⚙️ لوحة إدارة النظام</a>
            @endif

            {{-- الصفحة الرئيسية --}}
            <a href="{{ route('home') }}">🏠 الصفحة الرئيسية</a>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">🚪 تسجيل الخروج</button>
        </form>
    </div>
</div>
</body>
</html>
