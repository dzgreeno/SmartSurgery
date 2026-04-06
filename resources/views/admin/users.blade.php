<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>إدارة المستخدمين — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root {
  --bg:#0d1117;--bg2:#161b22;--bg3:#1c2128;--border:rgba(255,255,255,.08);
  --text:#e6edf3;--muted:#7d8590;--accent:#2dd4bf;--accent2:rgba(45,212,191,.12);
  --gold:#f0b429;--green:#3fb950;--red:#f85149;--blue:#58a6ff;
  --sidebar:240px;--topbar:56px;--r:8px;--t:.18s cubic-bezier(.4,0,.2,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%;font-family:'Cairo',sans-serif;background:var(--bg);color:var(--text)}

.btn-logout:hover{background:rgba(248,81,73,.2);}
</style>
@include('partials.sidebar')
<style>
.main-wrap{margin-right:var(--sidebar);min-height:100vh;display:flex;flex-direction:column;}
.topbar{height:var(--topbar);background:var(--bg2);border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:0 28px;position:sticky;top:0;z-index:50;}
.topbar-title{font-size:16px;font-weight:800;}
.content{padding:28px;flex:1;}

/* Table */
.table-card{background:var(--bg2);border:1px solid var(--border);border-radius:12px;overflow:hidden;margin-top:20px;}
.table-header{padding:16px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;}
.table-header h3{font-size:15px;font-weight:800;}
.btn-add{padding:8px 18px;background:var(--accent);color:#0d1117;border:none;border-radius:var(--r);font-family:'Cairo',sans-serif;font-size:12px;font-weight:800;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:all var(--t);}
.btn-add:hover{opacity:.85;}
table{width:100%;border-collapse:collapse;}
th{padding:12px 16px;font-size:11px;font-weight:700;color:var(--muted);text-align:right;border-bottom:1px solid var(--border);letter-spacing:.5px;}
td{padding:14px 16px;font-size:13px;border-bottom:1px solid var(--border);}
tr:last-child td{border-bottom:none;}
tr:hover td{background:var(--bg3);}

.role-badge{padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700;}
.role-admin  {background:rgba(240,180,41,.15);color:var(--gold);}
.role-doctor {background:rgba(45,212,191,.12);color:var(--accent);}
.role-nurse  {background:rgba(63,185,80,.12);color:var(--green);}
.role-head_women,.role-head_men {background:rgba(88,166,255,.12);color:var(--blue);}
.role-other  {background:var(--bg3);color:var(--muted);}

.avatar-circle{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--accent),#0891b2);display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:800;color:#0d1117;}
.btn-edit{padding:5px 12px;background:rgba(240,180,41,.1);border:1px solid rgba(240,180,41,.2);color:var(--gold);border-radius:6px;font-size:12px;cursor:pointer;text-decoration:none;font-family:'Cairo',sans-serif;transition:all var(--t);}
.btn-edit:hover{background:rgba(240,180,41,.2);}
.btn-delete{padding:5px 12px;background:rgba(248,81,73,.1);border:1px solid rgba(248,81,73,.2);color:var(--red);border-radius:6px;font-size:12px;cursor:pointer;font-family:'Cairo',sans-serif;transition:all var(--t);}
.btn-delete:hover{background:rgba(248,81,73,.2);}

.loading{padding:40px;text-align:center;color:var(--muted);}
.spinner{display:inline-block;width:24px;height:24px;border:2px solid var(--border);border-top-color:var(--accent);border-radius:50%;animation:spin .7s linear infinite;margin-left:8px;}
@keyframes spin{to{transform:rotate(360deg)}}

.alert-success{padding:10px 16px;background:rgba(63,185,80,.1);border:1px solid rgba(63,185,80,.2);color:var(--green);border-radius:var(--r);margin-bottom:16px;font-size:13px;}
.alert-error{padding:10px 16px;background:rgba(248,81,73,.1);border:1px solid rgba(248,81,73,.2);color:var(--red);border-radius:var(--r);margin-bottom:16px;font-size:13px;}
</style>
</head>
<body>


<div class="main-wrap">
  <div class="topbar">
    <span class="topbar-title">👥 إدارة المستخدمين</span>
    <a href="{{ route('users.create') }}" class="btn-add">➕ إضافة مستخدم جديد</a>
  </div>

  <div class="content">
    @if(session('success'))<div class="alert-success">✅ {{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert-error">❌ {{ session('error') }}</div>@endif

    <div id="global-msg"></div>

    <div class="table-card">
      <div class="table-header">
        <h3>📋 قائمة المستخدمين</h3>
        <span id="user-count" style="font-size:12px;color:var(--muted);">جاري التحميل...</span>
      </div>
      <div id="table-container">
        <div class="loading"><span class="spinner"></span> جاري تحميل المستخدمين من قاعدة البيانات...</div>
      </div>
    </div>
  </div>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getDatabase, ref, get, remove, update } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

const CONFIG = {
  apiKey: "AIzaSyC5OtqME0D8t72QsEERdRXrCCKl0bZqEQk",
  authDomain: "test-ae989.firebaseapp.com",
  databaseURL: "https://test-ae989-default-rtdb.europe-west1.firebasedatabase.app",
  projectId: "test-ae989",
  storageBucket: "test-ae989.firebasestorage.app",
  messagingSenderId: "1083766099812",
  appId: "1:1083766099812:web:a6a0170fc323d579aff471"
};

const app = initializeApp(CONFIG);
const db = getDatabase(app);

const roleLabels = {
  admin: '👑 مدير النظام',
  doctor: '👨‍⚕️ طبيب',
  nurse: '👩‍⚕️ ممرضة',
  head_women: '👩‍🔬 رئيسة مصلحة نساء',
  head_men: '👨‍🔬 رئيس مصلحة رجال',
  head_orthopedics: '🦴 رئيس مصلحة عظام',
  head_maternity: '🤰 رئيسة مصلحة أمومة',
  staff_women: '🏥 طاقم نساء',
  staff_men: '🏥 طاقم رجال',
};

function showMsg(msg, type='success') {
  const el = document.getElementById('global-msg');
  el.innerHTML = `<div class="alert-${type}" style="margin-bottom:16px;">${msg}</div>`;
  setTimeout(() => el.innerHTML = '', 4000);
}

async function loadUsers() {
  const container = document.getElementById('table-container');
  const countEl = document.getElementById('user-count');
  try {
    const snap = await get(ref(db, 'users'));
    if (!snap.exists()) {
      container.innerHTML = `<div class="loading">لا يوجد مستخدمون حتى الآن. <a href="{{ route('users.create') }}" style="color:var(--accent);">أضف أول مستخدم</a></div>`;
      countEl.textContent = '0 مستخدمين';
      return;
    }
    const usersObj = snap.val();
    const users = Object.entries(usersObj).map(([uid, data]) => ({ uid, ...data }));
    countEl.textContent = `${users.length} مستخدمين`;

    let rows = users.map((u, i) => {
      const initial = (u.fname || 'م').charAt(0).toUpperCase();
      const roleClass = `role-${u.role || 'other'}`;
      const roleLabel = roleLabels[u.role] || u.role || '—';
      return `<tr>
        <td>${i+1}</td>
        <td><div style="display:flex;align-items:center;gap:10px;">
          ${u.urlphoto ? `<img src="${u.urlphoto}" style="width:34px;height:34px;border-radius:50%;object-fit:cover;">` : `<div class="avatar-circle">${initial}</div>`}
          <div><div style="font-weight:700;">${u.fname||''} ${u.lname||''}</div><div style="font-size:11px;color:var(--muted);">${u.email||''}</div></div>
        </div></td>
        <td><span class="role-badge ${roleClass}">${roleLabel}</span></td>
        <td>
          <a href="/admin/users/${u.uid}/edit" class="btn-edit">✏️ تعديل</a>
          <button onclick="deleteUser('${u.uid}','${u.fname||''} ${u.lname||''}')" class="btn-delete" style="margin-right:6px;">🗑️ حذف</button>
        </td>
      </tr>`;
    }).join('');

    container.innerHTML = `<table>
      <thead><tr>
        <th>#</th><th>المستخدم</th><th>الدور</th><th>الإجراءات</th>
      </tr></thead>
      <tbody>${rows}</tbody>
    </table>`;
  } catch(e) {
    container.innerHTML = `<div class="loading" style="color:var(--red);">❌ فشل التحميل: ${e.message}</div>`;
  }
}

window.deleteUser = async (uid, name) => {
  if (!confirm(`هل أنت متأكد من حذف المستخدم "${name}"؟`)) return;
  try {
    await remove(ref(db, 'users/' + uid));
    showMsg(`✅ تم حذف بيانات ${name} من قاعدة البيانات. (يُنصح بحذف حساب Auth من Firebase Console)`);
    loadUsers();
  } catch(e) {
    showMsg(`❌ فشل الحذف: ${e.message}`, 'error');
  }
};

loadUsers();
</script>
</body>
</html>
