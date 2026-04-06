<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>العمليات الجراحية — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root{--bg:#0d1117;--bg2:#161b22;--bg3:#1c2128;--border:rgba(255,255,255,.08);--text:#e6edf3;--muted:#7d8590;--accent:#2dd4bf;--accent2:rgba(45,212,191,.12);--gold:#f0b429;--green:#3fb950;--red:#f85149;--blue:#58a6ff;--orange:#d29922;--sidebar:240px;--topbar:56px;--r:8px;--t:.18s cubic-bezier(.4,0,.2,1);}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%;font-family:'Cairo',sans-serif;background:var(--bg);color:var(--text)}
.sidebar{position:fixed;top:0;right:0;width:var(--sidebar);height:100vh;background:var(--bg2);border-left:1px solid var(--border);display:flex;flex-direction:column;z-index:100;overflow-y:auto;}
.sidebar-brand{padding:20px 16px;border-bottom:1px solid var(--border);}
.sidebar-brand h2{font-size:16px;font-weight:800;color:var(--accent);}
.user-info{margin-top:10px;padding:10px;background:var(--bg3);border-radius:var(--r);border:1px solid var(--border);}
.user-avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--accent),#0891b2);display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:800;color:#0d1117;margin-bottom:6px;}
.user-name{font-size:13px;font-weight:700;}.user-role{font-size:11px;color:var(--gold);background:rgba(240,180,41,.12);padding:2px 8px;border-radius:20px;display:inline-block;margin-top:2px;}.user-email{font-size:10px;color:var(--muted);}
.nav-section{padding:12px 8px 4px;font-size:10px;color:var(--muted);font-weight:700;letter-spacing:1px;}
.nav-link{display:flex;align-items:center;gap:10px;padding:10px 16px;font-size:13px;font-weight:600;color:var(--muted);text-decoration:none;border-radius:var(--r);margin:2px 8px;transition:all var(--t);}
.nav-link:hover{background:var(--bg3);color:var(--text);}.nav-link.active{background:var(--accent2);color:var(--accent);}
.sidebar-footer{margin-top:auto;padding:16px;border-top:1px solid var(--border);}
.btn-logout{width:100%;padding:10px;background:rgba(248,81,73,.1);border:1px solid rgba(248,81,73,.2);color:var(--red);border-radius:var(--r);font-family:'Cairo',sans-serif;font-size:13px;font-weight:700;cursor:pointer;}
.main-wrap{margin-right:var(--sidebar);min-height:100vh;display:flex;flex-direction:column;}
.topbar{height:var(--topbar);background:var(--bg2);border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:0 28px;position:sticky;top:0;z-index:50;}
.topbar-title{font-size:16px;font-weight:800;}
.content{padding:28px;flex:1;}

/* Cards grid for departments */
.dept-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:18px;margin-bottom:28px;}
.dept-card{background:var(--bg2);border:1px solid var(--border);border-radius:14px;padding:22px;text-decoration:none;color:var(--text);display:flex;flex-direction:column;gap:12px;transition:all var(--t);}
.dept-card:hover{border-color:var(--accent);transform:translateY(-3px);box-shadow:0 8px 24px rgba(0,0,0,.3);}
.dept-icon{font-size:36px;}
.dept-name{font-size:15px;font-weight:800;}
.dept-desc{font-size:12px;color:var(--muted);line-height:1.6;}
.dept-badge{display:inline-flex;align-items:center;gap:5px;padding:4px 12px;border-radius:20px;font-size:11px;font-weight:700;width:fit-content;}
.dept-badge.open{background:rgba(63,185,80,.12);color:var(--green);}
.dept-badge.view{background:var(--accent2);color:var(--accent);}

/* Table */
.table-card{background:var(--bg2);border:1px solid var(--border);border-radius:12px;overflow:hidden;}
.table-header{padding:16px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;}
.table-header h3{font-size:15px;font-weight:800;}
table{width:100%;border-collapse:collapse;}
th{padding:12px 16px;font-size:11px;font-weight:700;color:var(--muted);text-align:right;border-bottom:1px solid var(--border);}
td{padding:14px 16px;font-size:13px;border-bottom:1px solid var(--border);}
tr:last-child td{border-bottom:none;}tr:hover td{background:var(--bg3);}
.badge{padding:4px 12px;border-radius:20px;font-size:11px;font-weight:700;}
.badge-women{background:rgba(248,81,73,.12);color:var(--red);}
.badge-men{background:rgba(88,166,255,.12);color:var(--blue);}
.badge-orth{background:rgba(210,153,34,.12);color:var(--orange);}
.badge-mat{background:rgba(45,212,191,.12);color:var(--accent);}
.loading{padding:40px;text-align:center;color:var(--muted);}
.spinner{display:inline-block;width:24px;height:24px;border:2px solid var(--border);border-top-color:var(--accent);border-radius:50%;animation:spin .7s linear infinite;margin-left:8px;}
@keyframes spin{to{transform:rotate(360deg)}}
.section-title{font-size:13px;font-weight:800;color:var(--muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:14px;}
.section-divider{border:none;border-top:1px solid var(--border);margin:24px 0;}
</style>
</head>
<body>

@include('components.admin-sidebar', ['active' => 'surgeries'])

<div class="main-wrap">
  <div class="topbar">
    <span class="topbar-title">🔪 العمليات الجراحية</span>
    <span style="font-size:12px;color:var(--muted);" id="total-label">جاري التحميل...</span>
  </div>

  <div class="content">
    <!-- Departments Quick Access -->
    <div class="section-title">🏥 الأقسام الجراحية</div>
    <div class="dept-grid">
      <a href="{{ route('surgery.women') }}" class="dept-card">
        <div class="dept-icon">👩‍⚕️</div>
        <div class="dept-name">قسم جراحة النساء</div>
        <div class="dept-desc">جميع ملفات المريضات وجداول العمل والعمليات الجراحية الخاصة بالنساء</div>
        <div class="dept-badge view">📂 فتح القسم →</div>
      </a>
      <a href="{{ route('surgery.men') }}" class="dept-card">
        <div class="dept-icon">👨‍⚕️</div>
        <div class="dept-name">قسم جراحة الرجال</div>
        <div class="dept-desc">جميع ملفات المرضى وجداول العمل والعمليات الجراحية الخاصة بالرجال</div>
        <div class="dept-badge view">📂 فتح القسم →</div>
      </a>
      <a href="{{ route('maternite') }}" class="dept-card">
        <div class="dept-icon">🤰</div>
        <div class="dept-name">قسم الأمومة والولادة</div>
        <div class="dept-desc">متابعة حالات الأمهات والولادة والرعاية ما بعد الولادة</div>
        <div class="dept-badge view">📂 فتح القسم →</div>
      </a>
      <a href="{{ route('daily-meds') }}" class="dept-card">
        <div class="dept-icon">💊</div>
        <div class="dept-name">سجل الأدوية اليومي</div>
        <div class="dept-desc">متابعة صرف الأدوية والجرعات اليومية لجميع المرضى</div>
        <div class="dept-badge open">✅ نشط</div>
      </a>
    </div>

    <hr class="section-divider">

    <!-- Surgeries Table from Firebase RTDB -->
    <div class="section-title">📋 سجل العمليات الأخيرة</div>
    <div class="table-card">
      <div class="table-header">
        <h3>🔪 العمليات المسجّلة في قاعدة البيانات</h3>
      </div>
      <div id="table-container">
        <div class="loading"><span class="spinner"></span> جاري تحميل سجل العمليات...</div>
      </div>
    </div>
  </div>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
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
const db = getDatabase(app);

const deptNames = {
  women: '👩‍⚕️ نساء', men: '👨‍⚕️ رجال',
  orthopedics: '🦴 عظام', maternity: '🤰 أمومة'
};

const deptBadge = { women:'badge-women', men:'badge-men', orthopedics:'badge-orth', maternity:'badge-mat' };

async function loadSurgeries() {
  const container = document.getElementById('table-container');
  const label     = document.getElementById('total-label');
  try {
    // Look for surgeries under all dept nodes
    const paths = ['women', 'men', 'orthopedics', 'maternity'];
    const allRows = [];

    for (const dept of paths) {
      const snap = await get(ref(db, `surgeries/${dept}`));
      if (snap.exists()) {
        const items = snap.val();
        Object.entries(items).forEach(([id, s]) => {
          allRows.push({ id, dept, ...s });
        });
      }
    }

    if (allRows.length === 0) {
      container.innerHTML = `<div class="loading">📭 لا توجد عمليات مسجّلة في قاعدة البيانات بعد.<br><small style="opacity:.6">يتم تسجيل العمليات من خلال صفحات الأقسام.</small></div>`;
      label.textContent = '0 عمليات';
      return;
    }

    label.textContent = `${allRows.length} عملية مسجّلة`;

    const rows = allRows.map((s, i) => `<tr>
      <td>${i+1}</td>
      <td><strong>${s.patient_name || s.patientName || '—'}</strong></td>
      <td><span class="badge ${deptBadge[s.dept]||''}">${deptNames[s.dept]||s.dept}</span></td>
      <td>${s.surgery_type || s.surgeryType || '—'}</td>
      <td>${s.date || s.surgery_date || '—'}</td>
      <td>${s.doctor || s.doctor_name || '—'}</td>
    </tr>`).join('');

    container.innerHTML = `<table>
      <thead><tr><th>#</th><th>اسم المريض</th><th>القسم</th><th>نوع العملية</th><th>التاريخ</th><th>الطبيب</th></tr></thead>
      <tbody>${rows}</tbody>
    </table>`;

  } catch(e) {
    container.innerHTML = `<div class="loading" style="color:var(--red);">❌ تعذّر تحميل البيانات: ${e.message}</div>`;
    label.textContent = 'خطأ في التحميل';
  }
}

loadSurgeries();
</script>
</body>
</html>
