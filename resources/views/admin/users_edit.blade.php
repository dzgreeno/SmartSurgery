<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تعديل المستخدم — SmartSurgery</title>
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
.topbar{height:var(--topbar);background:var(--bg2);border-bottom:1px solid var(--border);display:flex;align-items:center;padding:0 28px;position:sticky;top:0;z-index:50;}
.topbar-title{font-size:16px;font-weight:800;}
.content{padding:28px;flex:1;max-width:640px;}
.form-card{background:var(--bg2);border:1px solid var(--border);border-radius:12px;padding:28px;}
.form-card h3{font-size:17px;font-weight:800;margin-bottom:24px;padding-bottom:16px;border-bottom:1px solid var(--border);}
.form-group{margin-bottom:20px;}
.form-group label{display:block;font-size:12px;font-weight:700;color:var(--muted);margin-bottom:8px;}
.form-group input,.form-group select{width:100%;padding:11px 14px;background:var(--bg3);border:1px solid var(--border);border-radius:var(--r);color:var(--text);font-family:'Cairo',sans-serif;font-size:14px;outline:none;transition:all var(--t);}
.form-group input:focus,.form-group select:focus{border-color:var(--accent);box-shadow:0 0 0 3px var(--accent2);}
.form-group select option{background:var(--bg3);}
.form-group input[readonly]{opacity:.6;cursor:not-allowed;}
.btn-submit{padding:12px 28px;background:var(--accent);color:#0d1117;border:none;border-radius:var(--r);font-family:'Cairo',sans-serif;font-size:14px;font-weight:800;cursor:pointer;transition:all var(--t);}
.btn-submit:disabled{opacity:.5;cursor:not-allowed;}
.btn-back{padding:12px 20px;background:var(--bg3);border:1px solid var(--border);color:var(--muted);border-radius:var(--r);font-family:'Cairo',sans-serif;font-size:14px;font-weight:600;cursor:pointer;text-decoration:none;display:inline-block;transition:all var(--t);margin-left:10px;}
.alert-success{padding:12px 16px;background:rgba(63,185,80,.1);border:1px solid rgba(63,185,80,.2);color:var(--green);border-radius:var(--r);margin-bottom:16px;font-size:13px;}
.alert-error{padding:12px 16px;background:rgba(248,81,73,.1);border:1px solid rgba(248,81,73,.2);color:var(--red);border-radius:var(--r);margin-bottom:16px;font-size:13px;}
.loading-overlay{padding:40px;text-align:center;color:var(--muted);}
.spinner{display:inline-block;width:24px;height:24px;border:2px solid var(--border);border-top-color:var(--accent);border-radius:50%;animation:spin .7s linear infinite;}
@keyframes spin{to{transform:rotate(360deg)}}
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
    <span class="topbar-title">✏️ تعديل بيانات المستخدم</span>
  </div>
  <div class="content">
    <div id="msg"></div>
    <div class="form-card">
      <h3 id="card-title">⏳ جاري تحميل بيانات المستخدم...</h3>
      <div id="form-body">
        <div class="loading-overlay"><span class="spinner"></span></div>
      </div>
    </div>
  </div>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getDatabase, ref, get, update } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

const app = initializeApp({
  apiKey: "AIzaSyC5OtqME0D8t72QsEERdRXrCCKl0bZqEQk",
  authDomain: "test-ae989.firebaseapp.com",
  databaseURL: "https://test-ae989-default-rtdb.europe-west1.firebasedatabase.app",
  projectId: "test-ae989",
  storageBucket: "test-ae989.firebasestorage.app",
  messagingSenderId: "1083766099812",
  appId: "1:1083766099812:web:a6a0170fc323d579aff471"
});
const db = getDatabase(app);

// Extract UID from URL: /admin/users/{uid}/edit
const uid = window.location.pathname.split('/').filter(Boolean).slice(-2, -1)[0];

async function loadUser() {
  const titleEl  = document.getElementById('card-title');
  const bodyEl   = document.getElementById('form-body');
  try {
    const snap = await get(ref(db, 'users/' + uid));
    if (!snap.exists()) {
      bodyEl.innerHTML = '<div style="color:var(--red);padding:20px;">❌ لم يتم العثور على المستخدم.</div>';
      return;
    }
    const u = snap.val();
    titleEl.textContent = `✏️ تعديل: ${u.fname || ''} ${u.lname || ''}`;

    const roles = [
      ['admin','👑 مدير النظام'],['doctor','👨‍⚕️ طبيب'],['head_women','👩‍🔬 رئيسة مصلحة نساء'],
      ['head_men','👨‍🔬 رئيس مصلحة رجال'],['head_orthopedics','🦴 رئيس مصلحة عظام'],
      ['head_maternity','🤰 رئيسة مصلحة أمومة'],['staff_women','🏥 طاقم نساء'],
      ['staff_men','🏥 طاقم رجال'],['nurse','👩‍⚕️ ممرضة']
    ];
    const opts = roles.map(([v,l]) => `<option value="${v}" ${u.role===v?'selected':''}>${l}</option>`).join('');

    bodyEl.innerHTML = `
      <div class="grid-2">
        <div class="form-group"><label>الاسم الأول</label><input type="text" id="fname" value="${u.fname||''}" required></div>
        <div class="form-group"><label>اسم العائلة</label><input type="text" id="lname" value="${u.lname||''}" required></div>
      </div>
      <div class="form-group"><label>البريد الإلكتروني</label><input type="email" id="email" value="${u.email||''}" readonly></div>
      <div class="form-group"><label>الدور الوظيفي</label><select id="role">${opts}</select></div>
      <div style="display:flex;gap:10px;margin-top:8px;">
        <button id="btn-save" class="btn-submit" onclick="saveUser()">💾 حفظ التغييرات</button>
        <a href="/admin/users" class="btn-back">← العودة</a>
      </div>`;
  } catch(e) {
    bodyEl.innerHTML = `<div style="color:var(--red);padding:20px;">❌ خطأ: ${e.message}</div>`;
  }
}

window.saveUser = async () => {
  const fname = document.getElementById('fname').value.trim();
  const lname = document.getElementById('lname').value.trim();
  const role  = document.getElementById('role').value;
  const msgEl = document.getElementById('msg');
  const btn   = document.getElementById('btn-save');

  if (!fname||!lname||!role) {
    msgEl.innerHTML = '<div class="alert-error">❌ يرجى ملء جميع الحقول</div>';
    return;
  }
  btn.disabled = true; btn.textContent = '⏳ جاري الحفظ...';
  try {
    await update(ref(db, 'users/' + uid), { fname, lname, role });
    msgEl.innerHTML = '<div class="alert-success">✅ تم تحديث بيانات المستخدم بنجاح!</div>';
    setTimeout(() => { window.location.href = '/admin/users'; }, 1500);
  } catch(e) {
    msgEl.innerHTML = `<div class="alert-error">❌ فشل الحفظ: ${e.message}</div>`;
    btn.disabled = false; btn.textContent = '💾 حفظ التغييرات';
  }
};

loadUser();
</script>
</body>
</html>
