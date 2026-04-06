<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>طلبات حجز المواعيد — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root {
  --bg:      #0d1117; --bg2:     #161b22; --bg3:     #1c2128;
  --border:  rgba(255,255,255,.08); --text:    #e6edf3; --muted:   #7d8590;
  --accent:  #2dd4bf; --accent2: rgba(45,212,191,.12);
  --gold:    #f0b429; --green:   #3fb950; --red:     #f85149;
  --sidebar: 240px; --topbar:  56px; --r:       8px;
  --t:       .18s cubic-bezier(.4,0,.2,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%;font-family:'Cairo',sans-serif;background:var(--bg);color:var(--text)}

.nav-link:hover { background: var(--bg3); color: var(--text); }
.nav-link.active { background: var(--accent2); color: var(--accent); }
</style>
@include('partials.sidebar')
<style>
/* Main */
.main-wrap { margin-right: var(--sidebar); min-height: 100vh; display: flex; flex-direction: column; }
.topbar {
  height: var(--topbar); background: var(--bg2); border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between; padding: 0 28px; position: sticky; top: 0; z-index: 50;
}
.content { padding: 28px; flex: 1; }

.section-title { font-size: 18px; font-weight: 800; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }

/* Table */
.table-wrap {
  background: var(--bg2); border: 1px solid var(--border);
  border-radius: 12px; overflow: hidden;
}
table { width: 100%; border-collapse: collapse; text-align: right; }
th, td { padding: 14px 20px; border-bottom: 1px solid var(--border); font-size: 13px; }
th { background: var(--bg3); font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: .5px; }
tr:last-child td { border-bottom: none; }
tr:hover { background: rgba(255,255,255,.02); }

.badge { padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; }
.badge-pending { background: rgba(240,180,41,.15); color: var(--gold); }

.btn {
  padding: 6px 12px; border-radius: 6px; font-family: 'Cairo', sans-serif;
  font-size: 12px; font-weight: 700; cursor: pointer; border: none; transition: var(--t);
}
.btn-confirm { background: rgba(63,185,80,.15); color: var(--green); border: 1px solid rgba(63,185,80,.3); }
.btn-confirm:hover { background: var(--green); color: #fff; }
.btn-reject { background: rgba(248,81,73,.15); color: var(--red); border: 1px solid rgba(248,81,73,.3); margin-right: 6px; }
.btn-reject:hover { background: var(--red); color: #fff; }

.empty-state { text-align: center; padding: 60px 20px; color: var(--muted); }
.empty-state text { font-size: 14px; margin-top: 10px; display: block; }
.empty-state .icon { font-size: 40px; margin-bottom: 10px; }
</style>
</head>
<body>


@php
    $role = session('firebase_role', 'admin');
    $deptFilter = '';
    switch($role) {
        case 'head_women': $deptFilter = 'جراحة النساء'; break;
        case 'head_men': $deptFilter = 'جراحة الرجال'; break;
        case 'head_orthopedics': $deptFilter = 'جراحة العظام'; break;
        case 'head_maternity': $deptFilter = 'الأمومة'; break;
    }
@endphp

<div class="main-wrap">
  <div class="topbar">
    <span style="font-weight:700;">إدارة طلبات المواعيد
      @if($deptFilter) ({{ $deptFilter }}) @endif
    </span>
    <a href="{{ route('home') }}" style="color:var(--accent);text-decoration:none;font-size:13px;font-weight:700;">العودة للموقع 🌍</a>
  </div>

  <div class="content">
    <h2 class="section-title">📅 قائمة الطلبات الواردة (قيد الانتظار)</h2>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>تاريخ الطلب</th>
            <th>الاسم واللقب</th>
            <th>رقم الهاتف</th>
            <th>القسم المطلوب</th>
            <th>التاريخ المفضل</th>
            <th>الحالة</th>
            <th>الإجراءات</th>
          </tr>
        </thead>
        <tbody id="requests-list">
          <tr><td colspan="7" class="empty-state"><div class="icon">⏳</div><text>جاري تحميل الطلبات...</text></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";
import { getDatabase, ref, onValue, remove, set, get } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

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
const listEl = document.getElementById('requests-list');
const DEPT_FILTER = '{{ $deptFilter }}';

onValue(ref(db, 'appointments/requests'), (snapshot) => {
  listEl.innerHTML = '';
  if(!snapshot.exists()) {
    listEl.innerHTML = `<tr><td colspan="7" class="empty-state"><div class="icon">📫</div><text>لا توجد طلبات جديدة حالياً.</text></td></tr>`;
    return;
  }

  const data = snapshot.val();
  const reqs = Object.keys(data).map(k => ({id: k, ...data[k]}))
      .filter(r => r.status === 'Pending')
      .filter(r => {
          if(!DEPT_FILTER) return true; // Admin sees all
          return r.department && r.department.includes(DEPT_FILTER);
      })
      .sort((a,b) => b.createdAt - a.createdAt);

  if(reqs.length === 0) {
    listEl.innerHTML = `<tr><td colspan="7" class="empty-state"><div class="icon">✅</div><text>تمت معالجة جميع الطلبات.</text></td></tr>`;
    return;
  }

  reqs.forEach(req => {
    const tr = document.createElement('tr');
    const d = new Date(req.createdAt).toLocaleString('ar-DZ');
    tr.innerHTML = `
      <td style="color:var(--muted);">${d}</td>
      <td style="font-weight:700;">${req.fname} ${req.lname}</td>
      <td dir="ltr" style="text-align:right;">${req.phone}</td>
      <td style="color:var(--accent);">${req.department}</td>
      <td>${req.date}</td>
      <td><span class="badge badge-pending">قيد الانتظار</span></td>
      <td>
        <button class="btn btn-confirm" onclick="confirmAppt('${req.id}')">تأكيد الموعد ✅</button>
        <button class="btn btn-reject" onclick="rejectAppt('${req.id}')">رفض ❌</button>
      </td>
    `;
    listEl.appendChild(tr);
  });
});

window.confirmAppt = async (id) => {
  if(!confirm('هل أنت متأكد من تأكيد هذا الموعد وإرساله للقسم المختص؟')) return;
  const time = prompt("يرجى تحديد وقت حضور المريض (مثال: 09:30 صباحاً):", "08:00");
  if(!time) return; // User cancelled prompt

  try {
    const rRef = ref(db, `appointments/requests/${id}`);
    const snapshot = await get(rRef);
    
    if(snapshot.exists()) {
      const data = snapshot.val();
      data.status = 'Confirmed';
      data.exactTime = time;
      
      // Move to Confirmed
      await set(ref(db, `appointments/confirmed/${id}`), data);
      // Remove from requests
      await remove(rRef);
      alert('تم التأكيد بنجاح ونقل الموعد إلى الجدول.');
    } else {
        alert('حدث خطأ: لم يتم العثور على الطلب.');
    }
  } catch (e) {
    console.error(e);
    alert('حدث خطأ أثناء التأكيد. المرجو التحقق من الرصيد أو الصلاحيات.');
  }
};

window.rejectAppt = async (id) => {
  if(!confirm('هل تريد فعلاً رفض وحذف هذا الطلب؟')) return;
  try {
    await remove(ref(db, `appointments/requests/${id}`));
  } catch (e) {
    alert('حدث خطأ.');
  }
};
</script>
</body>
</html>
