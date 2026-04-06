<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>جدول حركة العمال — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#0d1117; --bg2:#161b22; --bg3:#1c2128;
  --border:rgba(255,255,255,.08); --text:#e6edf3; --muted:#7d8590;
  --accent:#2dd4bf; --gold:#f0b429; --r:7px; --t:.18s ease;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
body{font-family:"Cairo",Arial,sans-serif;background:var(--bg);color:var(--text);min-height:100vh;display:flex;flex-direction:column;}

.topbar{
  height:48px;background:var(--bg2);border-bottom:1px solid var(--border);
  display:flex;align-items:center;padding:0 16px;gap:10px;
  position:sticky;top:0;z-index:200;flex-shrink:0;
}
.back-btn{
  display:flex;align-items:center;gap:6px;padding:6px 13px;
  border-radius:var(--r);background:rgba(45,212,191,.1);
  border:1px solid rgba(45,212,191,.25);color:var(--accent);
  font-size:12px;font-weight:700;font-family:inherit;cursor:pointer;text-decoration:none;transition:all var(--t);
}
.back-btn:hover{background:rgba(45,212,191,.2);}
.sep{width:1px;height:26px;background:var(--border);}
.tb-title{font-size:13px;font-weight:800;}
.tb-sub{font-size:11px;color:var(--muted);}
.sp{flex:1;}
.btn-print{
  display:flex;align-items:center;gap:6px;padding:7px 13px;
  border-radius:var(--r);background:var(--bg3);border:1px solid var(--border);
  color:var(--muted);font-size:12px;font-weight:700;font-family:inherit;cursor:pointer;transition:all var(--t);
}
.btn-print:hover{color:var(--text);}
.btn-save{
  display:flex;align-items:center;gap:6px;padding:7px 16px;
  border-radius:var(--r);background:linear-gradient(135deg,var(--gold),#d08000);
  border:none;color:#0d1117;font-size:12px;font-weight:800;font-family:inherit;
  cursor:pointer;transition:all var(--t);box-shadow:0 4px 14px rgba(240,180,41,.25);
}
.btn-save:hover{transform:translateY(-1px);box-shadow:0 8px 22px rgba(240,180,41,.35);}
.btn-save:disabled{opacity:.5;cursor:not-allowed;transform:none;}

.pw{padding:20px;max-width:1400px;margin:auto;width:100%;overflow-x:auto;}

.fiche{
  background:#fff;color:#111;font-family:Arial,"Cairo",sans-serif;font-size:12px;
  border:1px solid #555;box-shadow:0 20px 60px rgba(0,0,0,.6);padding:20px;
  min-width:1200px;
}

.header-titles{text-align:center;margin-bottom:10px;line-height:1.6;}
.header-titles h1{font-size:16px;font-weight:900;}
.header-titles h2{font-size:14px;font-weight:700;color:#444;}
.header-titles h3{font-size:17px;font-weight:900;margin-top:5px;}

.header-flex{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:10px;gap:10px;flex-wrap:wrap;}
.header-flex .org-info{text-align:right;font-size:13px;font-weight:bold;line-height:1.8;}
.header-flex .month-input{font-size:16px;font-weight:bold;padding:10px;display:flex;align-items:center;gap:8px;}
.header-flex .month-input input{border:none;border-bottom:2px solid #000;font-family:inherit;font-size:14px;font-weight:bold;outline:none;padding:4px;}
.header-flex .controller-box{
  font-size:14px;font-weight:bold;padding:10px 20px;
  border:2px solid #000;border-radius:4px;text-align:center;
}

table.data-table{width:100%;border-collapse:collapse;margin-bottom:15px;font-size:10px;text-align:center;}
table.data-table th,table.data-table td{border:1px solid #000;padding:2px;}
table.data-table th{background-color:#f0f0f0;font-weight:bold;font-size:9px;-webkit-print-color-adjust:exact;print-color-adjust:exact;}
table.data-table td input{width:100%;border:none;outline:none;text-align:center;font-family:inherit;font-size:10px;font-weight:bold;background:transparent;text-transform:uppercase;}
table.data-table td input:focus{background-color:#e6f2ff;}

.col-name{width:140px;text-align:right!important;}
.col-rank{width:75px;}

.legend{display:flex;gap:20px;flex-wrap:wrap;margin-top:12px;padding:10px;background:#f8f8f8;border:1px solid #ddd;border-radius:4px;}
.legend-item{display:flex;align-items:center;gap:6px;font-size:11px;font-weight:bold;}
.legend-dot{width:18px;height:18px;border-radius:3px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:900;border:1px solid #000;}

.sigs{display:flex;justify-content:space-around;margin-top:25px;}
.sig-box{text-align:center;width:30%;}
.sig-box strong{display:block;font-size:13px;margin-bottom:40px;text-decoration:underline;}

.toast{
  position:fixed;bottom:18px;left:50%;transform:translateX(-50%) translateY(16px);
  background:#161b22;border:1px solid rgba(63,185,80,.35);color:#3fb950;
  padding:9px 20px;border-radius:100px;font-size:12px;font-weight:700;
  font-family:"Cairo",sans-serif;opacity:0;pointer-events:none;
  z-index:999;transition:all .3s;display:flex;align-items:center;gap:6px;
}
.toast.error{border-color:rgba(248,81,73,.35);color:#f85149;}
.toast.show{opacity:1;transform:translateX(-50%) translateY(0);}

@media print{
  body,html{background:#fff;}
  .topbar,.toast{display:none!important;}
  .pw{padding:0;max-width:100%;overflow:visible;}
  .fiche{box-shadow:none;border:none;padding:5px;min-width:auto;transform:scale(0.92);transform-origin:top center;}
  @page{margin:0.5cm;size:landscape;}
}
</style>
</head>
<body>

<div class="topbar">
  <a href="/surgery/women" class="back-btn">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
    جراحة النساء
  </a>
  <div class="sep"></div>
  <div>
    <div class="tb-title">جدول حركة العمال</div>
    <div class="tb-sub">جدول المناوبات للشبه طبي — مصلحة جراحة النساء</div>
  </div>
  <div class="sp"></div>
  <button class="btn-print" onclick="window.print()">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
    طباعة
  </button>
  <button class="btn-save" id="btnSave" onclick="saveData()">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
    حفظ في قاعدة البيانات
  </button>
</div>

<div class="pw">
  <div class="fiche" id="ficheMain">
    <div class="header-titles">
      <h1>الجمهورية الجزائرية الديمقراطية الشعبية</h1>
      <h2>وزارة الصحة</h2>
    </div>

    <div class="header-flex">
      <div class="org-info">
        مديرية الصحة والسكان لولاية أولاد جلال<br>
        المؤسسة العمومية الإستشفائية أولاد جلال<br>
        مصلحة جراحة النساء
      </div>
      <div class="month-input">
        <h3>جدول حركة العمال لشهر:</h3>
        <input type="month" id="f_month">
      </div>
      <div class="controller-box">
        مراقب المصلحة
      </div>
    </div>

    <table class="data-table" id="staffTable">
      <thead>
        <tr id="staffTheadDays"></tr>
      </thead>
      <tbody id="staffTbody"></tbody>
    </table>

    <div class="legend">
      <div class="legend-item"><div class="legend-dot" style="background:#d4edda;">ص</div> صباح (Matin)</div>
      <div class="legend-item"><div class="legend-dot" style="background:#fff3cd;">م</div> مساء (Soir)</div>
      <div class="legend-item"><div class="legend-dot" style="background:#d1ecf1;">ل</div> ليل (Nuit)</div>
      <div class="legend-item"><div class="legend-dot" style="background:#f8d7da;">ع</div> عطلة (Repos)</div>
      <div class="legend-item"><div class="legend-dot" style="background:#e2e3e5;">غ</div> غياب (Absence)</div>
    </div>

    <div class="sigs">
      <div class="sig-box"><strong>رئيسة مصلحة جراحة النساء</strong></div>
      <div class="sig-box"><strong>مدير الموارد البشرية</strong></div>
    </div>
  </div>
</div>

<div class="toast" id="toast">
  <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
  <span id="toastMsg">تم الحفظ بنجاح</span>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getDatabase, ref, push, set } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

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

// Set default month
const now = new Date();
document.getElementById('f_month').value = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}`;

// Build table header (31 days)
const thead = document.getElementById('staffTheadDays');
let thHTML = '<th class="col-name">الإسم واللقب</th><th class="col-rank">الرتبة</th>';
for (let d = 1; d <= 31; d++) thHTML += `<th>${d}</th>`;
thead.innerHTML = thHTML;

// Build 15 staff rows
const tbody = document.getElementById('staffTbody');
for (let i = 1; i <= 15; i++) {
  const tr = document.createElement('tr');
  let html = `
    <td><input type="text" class="col-name" data-col="name" style="text-align:right;"></td>
    <td><input type="text" class="col-rank" data-col="rank"></td>
  `;
  for (let d = 1; d <= 31; d++) {
    html += `<td><input type="text" maxlength="1" data-day="${d}" data-row="${i}" style="text-transform:uppercase;"></td>`;
  }
  tr.innerHTML = html;
  tbody.appendChild(tr);
}

// Save to Firebase RTDB
window.saveData = async function() {
  const btn = document.getElementById('btnSave');
  btn.disabled = true;

  const monthYear = document.getElementById('f_month').value;

  const meta = {
    month_year: monthYear,
    service: 'مصلحة جراحة النساء',
    createdAt: new Date().toISOString(),
    createdBy: '{{ session("firebase_user.fname", "") }} {{ session("firebase_user.lname", "") }}'.trim() || 'غير معروف',
    type: 'staff_movement'
  };

  const staff = [];
  let hasData = false;

  document.querySelectorAll('#staffTbody tr').forEach((row, idx) => {
    const nameInput = row.querySelector('input[data-col="name"]');
    const rankInput = row.querySelector('input[data-col="rank"]');
    const name = nameInput ? nameInput.value.trim() : '';
    const rank = rankInput ? rankInput.value.trim() : '';

    if (!name) return; // skip empty name rows

    const days = {};
    let rowHasDay = false;
    row.querySelectorAll('input[data-day]').forEach(inp => {
      if (inp.value.trim()) {
        days[`day_${inp.getAttribute('data-day')}`] = inp.value.trim().toUpperCase();
        rowHasDay = true;
      }
    });

    hasData = true;
    staff.push({ name, rank, days });
  });

  if (!hasData) {
    showToast('⚠️ يرجى إدخال موظف واحد على الأقل', true);
    btn.disabled = false;
    return;
  }

  try {
    const newRef = push(ref(db, 'staff_movements'));
    await set(newRef, { ...meta, staff });
    showToast('✅ تم حفظ جدول حركة العمال بنجاح في قاعدة البيانات');
  } catch (error) {
    console.error('Firebase Error:', error);
    showToast('❌ حدث خطأ أثناء الحفظ، تحقق من الاتصال', true);
  }

  btn.disabled = false;
};

function showToast(msg, isError = false) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  if (isError) t.classList.add('error');
  else t.classList.remove('error');
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}
</script>
</body>
</html>
