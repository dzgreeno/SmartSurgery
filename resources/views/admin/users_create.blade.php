<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>إضافة مستخدم جديد — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root{--bg:#0d1117;--bg2:#161b22;--bg3:#1c2128;--border:rgba(255,255,255,.08);--text:#e6edf3;--muted:#7d8590;--accent:#2dd4bf;--accent2:rgba(45,212,191,.12);--gold:#f0b429;--green:#3fb950;--red:#f85149;--sidebar:240px;--topbar:56px;--r:8px;--t:.18s cubic-bezier(.4,0,.2,1);}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%;font-family:'Cairo',sans-serif;background:var(--bg);color:var(--text)}
.sidebar{position:fixed;top:0;right:0;width:var(--sidebar);height:100vh;background:var(--bg2);border-left:1px solid var(--border);display:flex;flex-direction:column;z-index:100;overflow-y:auto;}
.sidebar-brand{padding:20px 16px;border-bottom:1px solid var(--border);}
.sidebar-brand h2{font-size:16px;font-weight:800;color:var(--accent);}
.user-info{margin-top:10px;padding:10px;background:var(--bg3);border-radius:var(--r);border:1px solid var(--border);}
.user-avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--accent),#0891b2);display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:800;color:#0d1117;margin-bottom:6px;}
.user-name{font-size:13px;font-weight:700;} .user-role{font-size:11px;color:var(--gold);background:rgba(240,180,41,.12);padding:2px 8px;border-radius:20px;display:inline-block;margin-top:2px;} .user-email{font-size:10px;color:var(--muted);}
.nav-section{padding:12px 8px 4px;font-size:10px;color:var(--muted);font-weight:700;letter-spacing:1px;}
.nav-link{display:flex;align-items:center;gap:10px;padding:10px 16px;font-size:13px;font-weight:600;color:var(--muted);text-decoration:none;border-radius:var(--r);margin:2px 8px;transition:all var(--t);}
.nav-link:hover{background:var(--bg3);color:var(--text);} .nav-link.active{background:var(--accent2);color:var(--accent);}
.sidebar-footer{margin-top:auto;padding:16px;border-top:1px solid var(--border);}
.btn-logout{width:100%;padding:10px;background:rgba(248,81,73,.1);border:1px solid rgba(248,81,73,.2);color:var(--red);border-radius:var(--r);font-family:'Cairo',sans-serif;font-size:13px;font-weight:700;cursor:pointer;}
.main-wrap{margin-right:var(--sidebar);min-height:100vh;display:flex;flex-direction:column;}
.topbar{height:var(--topbar);background:var(--bg2);border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:0 28px;position:sticky;top:0;z-index:50;}
.topbar-title{font-size:16px;font-weight:800;}
.content{padding:28px;flex:1;max-width:640px;}

/* Form */
.form-card{background:var(--bg2);border:1px solid var(--border);border-radius:12px;padding:28px;}
.form-card h3{font-size:17px;font-weight:800;margin-bottom:24px;padding-bottom:16px;border-bottom:1px solid var(--border);}
.form-group{margin-bottom:20px;}
.form-group label{display:block;font-size:12px;font-weight:700;color:var(--muted);margin-bottom:8px;letter-spacing:.5px;}
.form-group input,.form-group select{width:100%;padding:11px 14px;background:var(--bg3);border:1px solid var(--border);border-radius:var(--r);color:var(--text);font-family:'Cairo',sans-serif;font-size:14px;outline:none;transition:all var(--t);}
.form-group input:focus,.form-group select:focus{border-color:var(--accent);box-shadow:0 0 0 3px var(--accent2);}
.form-group select option{background:var(--bg3);color:var(--text);}
.btn-submit{padding:12px 28px;background:var(--accent);color:#0d1117;border:none;border-radius:var(--r);font-family:'Cairo',sans-serif;font-size:14px;font-weight:800;cursor:pointer;transition:all var(--t);min-width:140px;}
.btn-submit:hover{opacity:.85;} .btn-submit:disabled{opacity:.5;cursor:not-allowed;}
.btn-back{padding:12px 20px;background:var(--bg3);border:1px solid var(--border);color:var(--muted);border-radius:var(--r);font-family:'Cairo',sans-serif;font-size:14px;font-weight:600;cursor:pointer;text-decoration:none;display:inline-block;transition:all var(--t);margin-left:10px;}
.btn-back:hover{color:var(--text);}
.alert-success{padding:12px 16px;background:rgba(63,185,80,.1);border:1px solid rgba(63,185,80,.2);color:var(--green);border-radius:var(--r);margin-bottom:16px;font-size:13px;}
.alert-error{padding:12px 16px;background:rgba(248,81,73,.1);border:1px solid rgba(248,81,73,.2);color:var(--red);border-radius:var(--r);margin-bottom:16px;font-size:13px;}
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
</style>
</head>
<body>

<aside class="sidebar">
  <div class="sidebar-brand">
    <h2>🏥 SmartSurgery</h2>
    <div class="user-info">
      <div class="user-avatar">{{ mb_strtoupper(mb_substr(session('firebase_user.fname','م'),0,1)) }}</div>
      <div class="user-name">{{ session('firebase_user.fname') }} {{ session('firebase_user.lname') }}</div>
      <div class="user-role">👑 مدير النظام</div>
      <div class="user-email">{{ session('firebase_user.email') }}</div>
    </div>
  </div>
  <div style="padding:8px 0;flex:1;">
    <div class="nav-section">الرئيسية</div>
    <a href="{{ route('admin.dashboard') }}" class="nav-link">📊 لوحة التحكم</a>
    <div class="nav-section">إدارة المستخدمين</div>
    <a href="{{ route('users.index') }}" class="nav-link active">👥 المستخدمون</a>
    <div class="nav-section">العمليات</div>
    <a href="{{ route('admin.demands') }}" class="nav-link">📋 طلبات العمليات</a>
    <a href="{{ route('admin.surgeries') }}" class="nav-link">🔪 العمليات الجراحية</a>
  </div>
  <div class="sidebar-footer">
    <form method="POST" action="{{ route('logout') }}">@csrf
      <button class="btn-logout">🚪 تسجيل الخروج</button>
    </form>
  </div>
</aside>

<div class="main-wrap">
  <div class="topbar">
    <span class="topbar-title">➕ إضافة مستخدم جديد</span>
  </div>
  <div class="content">
    <div id="msg"></div>
    <div class="form-card">
      <h3>👤 بيانات المستخدم الجديد</h3>
      <div id="create-form">
        <div class="grid-2">
          <div class="form-group">
            <label>الاسم الأول</label>
            <input type="text" id="fname" placeholder="مثال: أحمد" required>
          </div>
          <div class="form-group">
            <label>اسم العائلة</label>
            <input type="text" id="lname" placeholder="مثال: بن علي" required>
          </div>
        </div>
        <div class="form-group">
          <label>البريد الإلكتروني</label>
          <input type="email" id="email" placeholder="doctor@hospital.com" required>
        </div>
        <div class="form-group">
          <label>كلمة المرور</label>
          <input type="password" id="password" placeholder="••••••••• (6 أحرف على الأقل)" required>
        </div>
        <div class="form-group">
          <label>الدور الوظيفي</label>
          <select id="role" required>
            <option value="">— اختر الدور —</option>
            <option value="admin">👑 مدير النظام</option>
            <option value="doctor">👨‍⚕️ طبيب</option>
            <option value="head_women">👩‍🔬 رئيسة مصلحة جراحة النساء</option>
            <option value="head_men">👨‍🔬 رئيس مصلحة جراحة الرجال</option>
            <option value="head_orthopedics">🦴 رئيس مصلحة عظام</option>
            <option value="head_maternity">🤰 رئيسة مصلحة أمومة</option>
            <option value="staff_women">🏥 طاقم نساء</option>
            <option value="staff_men">🏥 طاقم رجال</option>
            <option value="nurse">👩‍⚕️ ممرضة</option>
          </select>
        </div>
        <div style="display:flex;gap:10px;margin-top:8px;">
          <button id="btn-create" class="btn-submit" onclick="createUser()">➕ إنشاء الحساب</button>
          <a href="{{ route('users.index') }}" class="btn-back">← العودة</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

const API_KEY = "AIzaSyC5OtqME0D8t72QsEERdRXrCCKl0bZqEQk";
const app = initializeApp({
  apiKey: API_KEY,
  authDomain: "test-ae989.firebaseapp.com",
  databaseURL: "https://test-ae989-default-rtdb.europe-west1.firebasedatabase.app",
  projectId: "test-ae989",
  storageBucket: "test-ae989.firebasestorage.app",
  messagingSenderId: "1083766099812",
  appId: "1:1083766099812:web:a6a0170fc323d579aff471"
});
const db = getDatabase(app);

window.createUser = async () => {
  const fname  = document.getElementById('fname').value.trim();
  const lname  = document.getElementById('lname').value.trim();
  const email  = document.getElementById('email').value.trim();
  const pass   = document.getElementById('password').value;
  const role   = document.getElementById('role').value;
  const msgEl  = document.getElementById('msg');
  const btn    = document.getElementById('btn-create');

  if (!fname||!lname||!email||!pass||!role) {
    msgEl.innerHTML = '<div class="alert-error">❌ يرجى ملء جميع الحقول</div>';
    return;
  }
  if (pass.length < 6) {
    msgEl.innerHTML = '<div class="alert-error">❌ كلمة المرور يجب أن تكون 6 أحرف على الأقل</div>';
    return;
  }

  btn.disabled = true;
  btn.textContent = '⏳ جاري الإنشاء...';
  msgEl.innerHTML = '';

  try {
    // 1. Create Firebase Auth user via REST API (without signing out current admin)
    const res = await fetch(`https://identitytoolkit.googleapis.com/v1/accounts:signUp?key=${API_KEY}`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email, password: pass, returnSecureToken: false })
    });
    const data = await res.json();

    if (!res.ok) {
      const errMsg = data.error?.message || 'فشل الإنشاء';
      if (errMsg === 'EMAIL_EXISTS') throw new Error('هذا البريد الإلكتروني مستخدم بالفعل');
      if (errMsg === 'WEAK_PASSWORD : Password should be at least 6 characters') throw new Error('كلمة المرور ضعيفة جداً');
      throw new Error(errMsg);
    }

    const uid = data.localId;

    // 2. Save user data to Realtime Database
    await set(ref(db, 'users/' + uid), {
      fname, lname, role, email, urlphoto: null
    });

    msgEl.innerHTML = `<div class="alert-success">✅ تم إنشاء حساب ${fname} ${lname} بنجاح!</div>`;
    document.getElementById('fname').value = '';
    document.getElementById('lname').value = '';
    document.getElementById('email').value = '';
    document.getElementById('password').value = '';
    document.getElementById('role').value = '';

    setTimeout(() => { window.location.href = '{{ route("users.index") }}'; }, 1500);

  } catch(e) {
    msgEl.innerHTML = `<div class="alert-error">❌ ${e.message}</div>`;
  } finally {
    btn.disabled = false;
    btn.textContent = '➕ إنشاء الحساب';
  }
};
</script>
</body>
</html>
