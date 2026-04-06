<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>لوحة التحكم — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">
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

.card {
  background: var(--bg2); border: 1px solid var(--border); border-radius: var(--r);
  overflow: hidden; margin-bottom: 16px;
}
.card-head { padding: 14px 18px; border-bottom: 1px solid var(--border); font-size: 14px; font-weight: 800; display: flex; align-items: center; gap: 8px; }
.card-body { padding: 18px; }

.quick-links { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 14px; }
.quick-link {
  display: flex; align-items: center; gap: 10px; padding: 14px 18px;
  background: var(--bg3); border: 1px solid var(--border); border-radius: 10px;
  text-decoration: none; color: var(--text); font-size: 14px; font-weight: 700;
  transition: all var(--t);
}
.quick-link:hover { border-color: var(--accent); background: var(--accent2); transform: translateY(-2px); }
</style>
</head>
<body>

@php
    $user = session('firebase_user', []);
    $role = session('firebase_role', 'user');
    $fname = $user['fname'] ?? 'مستخدم';
    $lname = $user['lname'] ?? '';
    $email = $user['email'] ?? '';

    // تحديد المسمى والإيقونة
    $roleTitle = 'موظف طبي';
    $roleIcon = '👩‍⚕️';
    
    switch($role) {
        case 'head_women': $roleTitle = 'رئيسة مصلحة جراحة النساء'; $roleIcon = '👩‍⚕️'; break;
        case 'head_men': $roleTitle = 'رئيس مصلحة جراحة الرجال'; $roleIcon = '👨‍⚕️'; break;
        case 'head_orthopedics': $roleTitle = 'رئيس مصلحة جراحة العظام'; $roleIcon = '🦴'; break;
        case 'head_maternity': $roleTitle = 'رئيسة مصلحة الأمومة'; $roleIcon = '🤱'; break;
        case 'staff_women': $roleTitle = 'طاقم جراحة النساء'; $roleIcon = '👩‍⚕️'; break;
        case 'staff_men': $roleTitle = 'طاقم جراحة الرجال'; $roleIcon = '👨‍⚕️'; break;
        case 'nurse': $roleTitle = 'طاقم التمريض'; $roleIcon = '🩹'; break;
    }
@endphp

<div class="topbar">
    <div class="topbar-right">
        <span style="font-size: 30px;">{{ $roleIcon }}</span>
        <div>
            <h2>مرحباً، {{ $fname }} {{ $lname }}</h2>
            <div class="user-info">{{ $email }} • {{ $roleTitle }}</div>
        </div>
    </div>
    <div style="display:flex;gap:10px;align-items:center;">
        <a href="{{ route('home') }}" style="color:var(--accent);text-decoration:none;font-size:13px;font-weight:700;">الصفحة الرئيسية 🌍</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn-logout">🚪 خروج</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-head">⚡ الأدوات المتاحة لصلاحياتك ({{ $roleTitle }})</div>
    <div class="card-body">
        <div class="quick-links">
            
            @if(in_array($role, ['head_women', 'staff_women']))
                <a href="{{ route('surgery.women') }}" class="quick-link">🏥 غرفة جراحة النساء</a>
                <a href="{{ route('fiche-navette') }}" class="quick-link">🚑 فيش نافيت (نساء)</a>
                <a href="{{ route('patient-movements') }}" class="quick-link">🔄 حركة المرضى</a>
                <a href="{{ route('mouvement-personnel') }}" class="quick-link">👥 حركة العمال</a>
            @endif

            @if(in_array($role, ['head_men', 'staff_men']))
                <a href="{{ route('surgery.men') }}" class="quick-link">🏥 غرفة جراحة الرجال</a>
                <a href="{{ route('fiche-navette-men') }}" class="quick-link">🚑 فيش نافيت (رجال)</a>
            @endif

            @if(in_array($role, ['head_women', 'head_men', 'head_orthopedics']))
                <a href="{{ route('surgeries.index') }}" class="quick-link">🔪 العمليات الجراحية</a>
            @endif

            @if(in_array($role, ['head_orthopedics']))
                <a href="{{ route('orthopedics') }}" class="quick-link">🦴 قسم جراحة العظام</a>
            @endif

            @if(in_array($role, ['head_maternity']))
                <a href="{{ route('maternite') }}" class="quick-link">🤱 قسم الأمومة والطفولة</a>
            @endif

            @if(in_array($role, ['nurse', 'head_women', 'head_men', 'head_orthopedics', 'head_maternity']))
                <a href="{{ route('daily-meds') }}" class="quick-link">💊 سجل الأدوية اليومي</a>
            @endif
            
            @if(in_array($role, ['head_women', 'staff_women', 'nurse']))
                <a href="{{ route('patient-journal') }}" class="quick-link">📓 يوميات المريض</a>
            @endif

            @if(in_array($role, ['head_women']))
                <a href="{{ route('bon-commande-pharmacie') }}" class="quick-link">💊 طلبية الصيدلية</a>
            @endif

            @if(in_array($role, ['head_women', 'head_men', 'head_orthopedics', 'head_maternity']))
                <a href="{{ route('admin.appointment_requests') }}" class="quick-link" style="background:var(--accent2); border-color:var(--accent);">📅 طلبات حجز المواعيد</a>
            @endif

        </div>
    </div>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getAuth, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";
import { getDatabase, ref, get } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

const app = initializeApp({
  apiKey: "AIzaSyC5OtqME0D8t72QsEERdRXrCCKl0bZqEQk",
  authDomain: "test-ae989.firebaseapp.com",
  databaseURL: "https://test-ae989-default-rtdb.europe-west1.firebasedatabase.app",
  projectId: "test-ae989",
  storageBucket: "test-ae989.firebasestorage.app",
  messagingSenderId: "1083766099812",
  appId: "1:1083766099812:web:a6a0170fc323d579aff471"
});

const auth = getAuth(app);
const db = getDatabase(app);

// Verify authentication state matches with server session
onAuthStateChanged(auth, (user) => {
    if (user) {
        get(ref(db, 'users/' + user.uid)).then(snap => {
            if(snap.exists()) {
                const data = snap.val();
                if(data.role !== '{{ $role }}') {
                    // Role mismatch warning
                    console.warn('Role mismatch detected. Firebase role:', data.role, 'Session role:', '{{$role}}');
                }
            }
        });
    } else {
        // Logged out on Firebase, force logout on server
        fetch('/logout', {
            method: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        }).then(()=>window.location.href='/home');
    }
});
</script>

</body>
</html>
