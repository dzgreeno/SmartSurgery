<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>أرشيف الوثائق — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root {
  --bg:#0d1117;--bg2:#161b22;--bg3:#1c2128;
  --border:rgba(255,255,255,.08);--text:#e6edf3;--muted:#7d8590;
  --accent:#2dd4bf;--accent2:rgba(45,212,191,.12);
  --gold:#f0b429;--green:#3fb950;--red:#f85149;--blue:#58a6ff;--orange:#d29922;
  --sidebar:240px;--topbar:56px;--r:8px;--t:.18s cubic-bezier(.4,0,.2,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%;font-family:'Cairo',sans-serif;background:var(--bg);color:var(--text)}

/* SIDEBAR */
.sidebar{position:fixed;top:0;right:0;width:var(--sidebar);height:100vh;background:var(--bg2);border-left:1px solid var(--border);display:flex;flex-direction:column;z-index:100;overflow-y:auto}
.sidebar-brand{padding:20px 16px;border-bottom:1px solid var(--border)}
.sidebar-brand h2{font-size:16px;font-weight:800;color:var(--accent);display:flex;align-items:center;gap:8px}
.sidebar-brand .user-info{margin-top:10px;padding:10px;background:var(--bg3);border-radius:var(--r);border:1px solid var(--border)}
.sidebar-brand .user-avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--accent),#0891b2);display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:800;color:#0d1117;margin-bottom:6px}
.sidebar-brand .user-name{font-size:13px;font-weight:700}
.sidebar-brand .user-role{font-size:11px;color:var(--gold);background:rgba(240,180,41,.12);padding:2px 8px;border-radius:20px;display:inline-block;margin-top:2px}
.sidebar-brand .user-email{font-size:10px;color:var(--muted)}
.nav-section{padding:12px 8px 4px;font-size:10px;color:var(--muted);font-weight:700;letter-spacing:1px}
.nav-link{display:flex;align-items:center;gap:10px;padding:10px 16px;font-size:13px;font-weight:600;color:var(--muted);text-decoration:none;border-radius:var(--r);margin:2px 8px;transition:all var(--t)}
.nav-link:hover{background:var(--bg3);color:var(--text)}
.nav-link.active{background:var(--accent2);color:var(--accent)}
.nav-link .nav-icon{font-size:16px;width:20px;text-align:center}
.sidebar-footer{margin-top:auto;padding:16px;border-top:1px solid var(--border)}
.btn-logout{width:100%;padding:10px;background:rgba(248,81,73,.1);border:1px solid rgba(248,81,73,.2);color:var(--red);border-radius:var(--r);font-family:'Cairo',sans-serif;font-size:13px;font-weight:700;cursor:pointer;transition:all var(--t)}
.btn-logout:hover{background:rgba(248,81,73,.2)}

/* MAIN */
.main-wrap{margin-right:var(--sidebar);min-height:100vh;display:flex;flex-direction:column}
.topbar{height:var(--topbar);background:var(--bg2);border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:0 28px;position:sticky;top:0;z-index:50}
.topbar-title{font-size:16px;font-weight:800}
.topbar-badge{padding:4px 14px;border-radius:20px;background:var(--accent2);color:var(--accent);font-size:12px;font-weight:700}
.content{padding:28px;flex:1}

/* FILTER TABS */
.filter-bar{display:flex;align-items:center;gap:10px;margin-bottom:20px;flex-wrap:wrap}
.filter-chip{padding:7px 16px;border-radius:100px;font-size:12px;font-weight:700;cursor:pointer;border:1px solid var(--border);background:transparent;color:var(--muted);font-family:inherit;transition:all var(--t);display:flex;align-items:center;gap:6px}
.filter-chip:hover{background:var(--bg3);color:var(--text)}
.filter-chip.active{background:var(--accent2);color:var(--accent);border-color:rgba(45,212,191,.3)}
.filter-chip .count{background:var(--bg3);padding:1px 7px;border-radius:100px;font-size:10px;font-weight:800}
.filter-chip.active .count{background:rgba(45,212,191,.2)}

/* STATS */
.stats-row{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:14px;margin-bottom:24px}
.stat-mini{background:var(--bg2);border:1px solid var(--border);border-radius:12px;padding:16px;display:flex;align-items:center;gap:12px;transition:all var(--t)}
.stat-mini:hover{border-color:rgba(255,255,255,.15);transform:translateY(-1px)}
.stat-mini-icon{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
.stat-mini-val{font-size:24px;font-weight:900}
.stat-mini-lbl{font-size:11px;color:var(--muted);font-weight:600}

/* TABLE */
.card{background:var(--bg2);border:1px solid var(--border);border-radius:12px;overflow:hidden}
.card-head{padding:14px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;gap:10px}
.card-title{font-size:14px;font-weight:800;display:flex;align-items:center;gap:8px}
.card-title-dot{width:3px;height:16px;background:linear-gradient(to bottom,var(--accent),#0891b2);border-radius:4px}

.tbl-wrap{overflow-x:auto}
table{width:100%;border-collapse:collapse}
thead th{background:var(--bg3);padding:10px 14px;font-size:11px;font-weight:700;color:var(--muted);text-align:right;border-bottom:1px solid var(--border);white-space:nowrap}
tbody td{padding:12px 14px;font-size:12.5px;border-bottom:1px solid var(--border);color:var(--text)}
tbody tr:last-child td{border-bottom:none}
tbody tr:hover td{background:var(--bg3)}
tbody tr{cursor:pointer;transition:background var(--t)}

.badge{display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:100px;font-size:11px;font-weight:700;white-space:nowrap}
.badge-teal{background:rgba(45,212,191,.12);color:var(--accent)}
.badge-gold{background:rgba(240,180,41,.12);color:var(--gold)}
.badge-blue{background:rgba(88,166,255,.12);color:var(--blue)}
.badge-green{background:rgba(63,185,80,.12);color:var(--green)}
.badge-red{background:rgba(248,81,73,.12);color:var(--red)}

.empty-state{text-align:center;padding:60px 20px;color:var(--muted)}
.empty-state .emoji{font-size:48px;margin-bottom:12px}
.empty-state p{font-size:13px}

.loading-spin{display:flex;align-items:center;justify-content:center;padding:60px;color:var(--muted);font-size:14px;font-weight:700;gap:10px}
.spinner{width:20px;height:20px;border:2.5px solid var(--border);border-top-color:var(--accent);border-radius:50%;animation:spin .6s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}

/* MODAL */
.modal-overlay{position:fixed;inset:0;background:rgba(0,0,0,.7);z-index:500;display:none;align-items:flex-start;justify-content:center;padding:30px;overflow-y:auto;backdrop-filter:blur(4px)}
.modal-overlay.show{display:flex}
.modal-box{background:var(--bg2);border:1px solid var(--border);border-radius:16px;width:100%;max-width:950px;overflow:hidden;animation:slideUp .25s ease both}
@keyframes slideUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:none}}
.modal-header{padding:16px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between}
.modal-header h3{font-size:15px;font-weight:800;display:flex;align-items:center;gap:8px}
.modal-close{width:32px;height:32px;border-radius:8px;border:1px solid var(--border);background:var(--bg3);color:var(--muted);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;transition:all var(--t)}
.modal-close:hover{color:var(--red);border-color:rgba(248,81,73,.3);background:rgba(248,81,73,.1)}
.modal-body{padding:24px;max-height:70vh;overflow-y:auto}
.modal-body::-webkit-scrollbar{width:4px}
.modal-body::-webkit-scrollbar-thumb{background:var(--border);border-radius:10px}

/* Detail view */
.detail-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:12px;margin-bottom:20px}
.detail-item{background:var(--bg3);border:1px solid var(--border);border-radius:var(--r);padding:12px}
.detail-item label{display:block;font-size:10px;font-weight:700;color:var(--muted);letter-spacing:.5px;margin-bottom:4px;text-transform:uppercase}
.detail-item span{font-size:13px;font-weight:600;color:var(--text)}

.detail-title{font-size:13px;font-weight:800;color:var(--accent);margin:20px 0 10px;display:flex;align-items:center;gap:6px}

.detail-table{width:100%;border-collapse:collapse;font-size:11px;margin-bottom:16px}
.detail-table th{background:var(--bg3);padding:8px 10px;font-size:10px;text-align:center;border:1px solid var(--border);color:var(--muted)}
.detail-table td{padding:6px 10px;text-align:center;border:1px solid var(--border);font-size:12px}

.modal-footer{padding:14px 24px;border-top:1px solid var(--border);display:flex;justify-content:flex-end;gap:8px}
.btn-modal{padding:8px 18px;border-radius:var(--r);font-size:12px;font-weight:700;font-family:inherit;cursor:pointer;transition:all var(--t);display:flex;align-items:center;gap:6px}
.btn-modal-close{background:var(--bg3);border:1px solid var(--border);color:var(--muted)}
.btn-modal-close:hover{color:var(--text)}
.btn-modal-print{background:linear-gradient(135deg,var(--accent),#0891b2);border:none;color:#0d1117;font-weight:800}
.btn-modal-print:hover{transform:translateY(-1px);box-shadow:0 4px 14px rgba(45,212,191,.3)}
.btn-modal-delete{background:rgba(248,81,73,.1);border:1px solid rgba(248,81,73,.2);color:var(--red)}
.btn-modal-delete:hover{background:rgba(248,81,73,.2)}

@media print{
  .sidebar,.topbar,.filter-bar,.stats-row,.card-head,.modal-footer,.modal-close{display:none!important}
  .main-wrap{margin-right:0}
  .modal-overlay{position:static;background:none;padding:0}
  .modal-box{border:none;border-radius:0;box-shadow:none}
  .modal-body{max-height:none;overflow:visible}
  body{background:#fff;color:#000}
  .detail-item{border-color:#ccc}
  .detail-table th,.detail-table td{border-color:#999}
}
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <h2>🏥 SmartSurgery</h2>
    <div class="user-info">
      <div class="user-avatar">{{ mb_strtoupper(mb_substr(session('firebase_user.fname', 'م'), 0, 1)) }}</div>
      <div class="user-name">{{ session('firebase_user.fname') }} {{ session('firebase_user.lname') }}</div>
      <div class="user-role">👑 مدير النظام</div>
      <div class="user-email">{{ session('firebase_user.email') }}</div>
    </div>
  </div>

  <div style="padding: 8px 0; flex:1;">
    <div class="nav-section">الرئيسية</div>
    <a href="{{ route('admin.dashboard') }}" class="nav-link">
      <span class="nav-icon">📊</span> لوحة التحكم
    </a>
    <a href="{{ route('home') }}" class="nav-link">
      <span class="nav-icon">🌐</span> الموقع الرئيسي
    </a>

    <div class="nav-section">إدارة المستخدمين</div>
    <a href="{{ route('users.index') }}" class="nav-link">
      <span class="nav-icon">👥</span> المستخدمون
    </a>

    <div class="nav-section">العمليات</div>
    <a href="{{ route('admin.demands') }}" class="nav-link">
      <span class="nav-icon">📋</span> طلبات العمليات
    </a>
    <a href="{{ route('admin.surgeries') }}" class="nav-link">
      <span class="nav-icon">🔪</span> العمليات الجراحية
    </a>

    <div class="nav-section">الوثائق والجداول</div>
    <a href="{{ route('admin.archives') }}" class="nav-link active">
      <span class="nav-icon">📁</span> أرشيف الوثائق
    </a>
    <a href="{{ route('planning-garde') }}" class="nav-link">
      <span class="nav-icon">📅</span> جدول المناوبة
    </a>
    <a href="{{ route('bon-commande-pharmacie') }}" class="nav-link">
      <span class="nav-icon">💊</span> وصل الصيدلية
    </a>
    <a href="{{ route('mouvement-personnel') }}" class="nav-link">
      <span class="nav-icon">👥</span> حركة العمال
    </a>
    <a href="{{ route('fiche-navette') }}" class="nav-link">
      <span class="nav-icon">🚑</span> فيش نافيت
    </a>

    <div class="nav-section">الأقسام</div>
    <a href="{{ route('surgery.women') }}" class="nav-link">
      <span class="nav-icon">🏥</span> جراحة النساء
    </a>
    <a href="{{ route('surgery.men') }}" class="nav-link">
      <span class="nav-icon">🏥</span> جراحة الرجال
    </a>
  </div>

  <div class="sidebar-footer">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="btn-logout">🚪 تسجيل الخروج</button>
    </form>
  </div>
</aside>

<!-- MAIN -->
<div class="main-wrap">
  <div class="topbar">
    <span class="topbar-title">📁 أرشيف الوثائق المحفوظة</span>
    <span class="topbar-badge">👑 مدير النظام</span>
  </div>

  <div class="content">
    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-mini">
        <div class="stat-mini-icon" style="background:rgba(45,212,191,.12)">📄</div>
        <div>
          <div class="stat-mini-val" id="stat-total" style="color:var(--accent)">—</div>
          <div class="stat-mini-lbl">إجمالي الوثائق</div>
        </div>
      </div>
      <div class="stat-mini">
        <div class="stat-mini-icon" style="background:rgba(88,166,255,.12)">💊</div>
        <div>
          <div class="stat-mini-val" id="stat-pharma" style="color:var(--blue)">—</div>
          <div class="stat-mini-lbl">وصل الصيدلية</div>
        </div>
      </div>
      <div class="stat-mini">
        <div class="stat-mini-icon" style="background:rgba(240,180,41,.12)">📅</div>
        <div>
          <div class="stat-mini-val" id="stat-oncall" style="color:var(--gold)">—</div>
          <div class="stat-mini-lbl">جدول المناوبة</div>
        </div>
      </div>
      <div class="stat-mini">
        <div class="stat-mini-icon" style="background:rgba(63,185,80,.12)">👥</div>
        <div>
          <div class="stat-mini-val" id="stat-staff" style="color:var(--green)">—</div>
          <div class="stat-mini-lbl">حركة العمال</div>
        </div>
      </div>
      <div class="stat-mini">
        <div class="stat-mini-icon" style="background:rgba(248,81,73,.12)">🚑</div>
        <div>
          <div class="stat-mini-val" id="stat-fiche" style="color:var(--red)">—</div>
          <div class="stat-mini-lbl">فيش نافيت</div>
        </div>
      </div>
    </div>

    <!-- FILTERS -->
    <div class="filter-bar">
      <button class="filter-chip active" onclick="filterDocs('all', this)">
        📄 الكل <span class="count" id="count-all">0</span>
      </button>
      <button class="filter-chip" onclick="filterDocs('pharmacy_orders', this)">
        💊 وصل الصيدلية <span class="count" id="count-pharma">0</span>
      </button>
      <button class="filter-chip" onclick="filterDocs('oncall_schedules', this)">
        📅 جدول المناوبة <span class="count" id="count-oncall">0</span>
      </button>
      <button class="filter-chip" onclick="filterDocs('staff_movements', this)">
        👥 حركة العمال <span class="count" id="count-staff">0</span>
      </button>
      <button class="filter-chip" onclick="filterDocs('fiche_navettes', this)">
        🚑 فيش نافيت <span class="count" id="count-fiche">0</span>
      </button>
    </div>

    <!-- TABLE -->
    <div class="card">
      <div class="card-head">
        <div class="card-title">
          <div class="card-title-dot"></div>
          الوثائق المحفوظة
        </div>
        <span style="font-size:11px;color:var(--muted)" id="tableInfo">جاري التحميل...</span>
      </div>
      <div class="tbl-wrap">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>نوع الوثيقة</th>
              <th>المعلومات</th>
              <th>أنشئت بواسطة</th>
              <th>تاريخ الإنشاء</th>
              <th>الإجراء</th>
            </tr>
          </thead>
          <tbody id="docsTbody">
            <tr>
              <td colspan="6">
                <div class="loading-spin"><div class="spinner"></div> جاري تحميل الوثائق من قاعدة البيانات...</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- DOCUMENT DETAIL MODAL -->
<div class="modal-overlay" id="docModal">
  <div class="modal-box">
    <div class="modal-header">
      <h3 id="modalTitle">📄 تفاصيل الوثيقة</h3>
      <button class="modal-close" onclick="closeModal()">✕</button>
    </div>
    <div class="modal-body" id="modalBody">
      <!-- DYNAMIC CONTENT -->
    </div>
    <div class="modal-footer">
      <button class="btn-modal btn-modal-delete" onclick="deleteDoc()">
        🗑️ حذف
      </button>
      <button class="btn-modal btn-modal-print" onclick="window.print()">
        🖨️ طباعة
      </button>
      <button class="btn-modal btn-modal-close" onclick="closeModal()">إغلاق</button>
    </div>
  </div>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getDatabase, ref, get, remove } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

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

const collections = [
  { key: 'pharmacy_orders', label: '💊 وصل الصيدلية', badge: 'badge-blue' },
  { key: 'oncall_schedules', label: '📅 جدول المناوبة', badge: 'badge-gold' },
  { key: 'staff_movements', label: '👥 حركة العمال', badge: 'badge-green' },
  { key: 'fiche_navettes', label: '🚑 فيش نافيت', badge: 'badge-red' }
];

let allDocs = [];
let currentFilter = 'all';
let currentDocRef = null;

// Load all documents
async function loadAllDocs() {
  allDocs = [];

  for (const col of collections) {
    try {
      const snap = await get(ref(db, col.key));
      if (snap.exists()) {
        const data = snap.val();
        Object.entries(data).forEach(([id, doc]) => {
          allDocs.push({
            id,
            collection: col.key,
            label: col.label,
            badge: col.badge,
            data: doc
          });
        });
      }
    } catch (e) {
      console.error(`Error loading ${col.key}:`, e);
    }
  }

  // Sort by date descending
  allDocs.sort((a, b) => {
    const da = new Date(a.data.createdAt || 0);
    const db2 = new Date(b.data.createdAt || 0);
    return db2 - da;
  });

  updateStats();
  renderTable();
}

function updateStats() {
  const pharma = allDocs.filter(d => d.collection === 'pharmacy_orders').length;
  const oncall = allDocs.filter(d => d.collection === 'oncall_schedules').length;
  const staff = allDocs.filter(d => d.collection === 'staff_movements').length;
  const fiche = allDocs.filter(d => d.collection === 'fiche_navettes').length;
  const total = allDocs.length;

  document.getElementById('stat-total').textContent = total;
  document.getElementById('stat-pharma').textContent = pharma;
  document.getElementById('stat-oncall').textContent = oncall;
  document.getElementById('stat-staff').textContent = staff;
  document.getElementById('stat-fiche').textContent = fiche;

  document.getElementById('count-all').textContent = total;
  document.getElementById('count-pharma').textContent = pharma;
  document.getElementById('count-oncall').textContent = oncall;
  document.getElementById('count-staff').textContent = staff;
  document.getElementById('count-fiche').textContent = fiche;
}

function renderTable() {
  const tbody = document.getElementById('docsTbody');
  const filtered = currentFilter === 'all' ? allDocs : allDocs.filter(d => d.collection === currentFilter);

  if (filtered.length === 0) {
    tbody.innerHTML = `<tr><td colspan="6"><div class="empty-state"><div class="emoji">📭</div><p>لا توجد وثائق محفوظة بعد</p></div></td></tr>`;
    document.getElementById('tableInfo').textContent = '0 وثيقة';
    return;
  }

  document.getElementById('tableInfo').textContent = `${filtered.length} وثيقة`;

  tbody.innerHTML = filtered.map((doc, idx) => {
    const d = doc.data;
    const date = d.createdAt ? new Date(d.createdAt).toLocaleDateString('ar-DZ', { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' }) : '—';
    const creator = d.createdBy || 'غير معروف';
    const info = getDocInfo(doc);

    return `
      <tr onclick='viewDoc(${idx})' data-idx="${idx}">
        <td style="color:var(--muted);font-weight:700">${idx + 1}</td>
        <td><span class="badge ${doc.badge}">${doc.label}</span></td>
        <td style="font-size:12px">${info}</td>
        <td><span style="color:var(--accent);font-weight:600">${creator}</span></td>
        <td style="color:var(--muted);font-size:11.5px;direction:ltr;text-align:right">${date}</td>
        <td>
          <button style="background:var(--accent2);border:1px solid rgba(45,212,191,.25);color:var(--accent);padding:5px 12px;border-radius:6px;font-size:11px;font-weight:700;cursor:pointer;font-family:inherit" onclick="event.stopPropagation();viewDoc(${idx})">
            👁️ عرض
          </button>
        </td>
      </tr>
    `;
  }).join('');
}

function getDocInfo(doc) {
  const d = doc.data;
  switch (doc.collection) {
    case 'pharmacy_orders':
      const numItems = d.items ? d.items.length : 0;
      return `رقم: ${d.order_number || '—'} | التاريخ: ${d.date || '—'} | ${numItems} مادة`;
    case 'oncall_schedules':
      return `شهر: ${d.month_year || '—'}`;
    case 'staff_movements':
      const numStaff = d.staff ? d.staff.length : 0;
      return `شهر: ${d.month_year || '—'} | ${numStaff} موظف`;
    case 'fiche_navettes':
      return `رقم: ${d.ficheNumber || '—'}`;
    default:
      return '—';
  }
}

// Filter docs
window.filterDocs = function(type, btn) {
  currentFilter = type;
  document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
  btn.classList.add('active');
  renderTable();
};

// View document detail
window.viewDoc = function(idx) {
  const filtered = currentFilter === 'all' ? allDocs : allDocs.filter(d => d.collection === currentFilter);
  const doc = filtered[idx];
  if (!doc) return;

  currentDocRef = `${doc.collection}/${doc.id}`;
  const d = doc.data;

  document.getElementById('modalTitle').innerHTML = `${doc.label} — تفاصيل الوثيقة`;

  let html = '';

  // Common meta
  html += `<div class="detail-grid">`;
  html += `<div class="detail-item"><label>نوع الوثيقة</label><span>${doc.label}</span></div>`;
  html += `<div class="detail-item"><label>أنشئت بواسطة</label><span>${d.createdBy || 'غير معروف'}</span></div>`;
  html += `<div class="detail-item"><label>تاريخ الإنشاء</label><span>${d.createdAt ? new Date(d.createdAt).toLocaleString('ar-DZ') : '—'}</span></div>`;

  // Type-specific meta
  switch (doc.collection) {
    case 'pharmacy_orders':
      html += `<div class="detail-item"><label>الولاية</label><span>${d.wilaya || '—'}</span></div>`;
      html += `<div class="detail-item"><label>رقم الوصل</label><span>${d.order_number || '—'}</span></div>`;
      html += `<div class="detail-item"><label>التاريخ</label><span>${d.date || '—'}</span></div>`;
      html += `<div class="detail-item"><label>المصلحة</label><span>${d.service || '—'}</span></div>`;
      html += `</div>`;

      if (d.items && d.items.length > 0) {
        html += `<div class="detail-title">📋 المواد المطلوبة (${d.items.length})</div>`;
        html += `<table class="detail-table"><thead><tr>
          <th>الرقم</th><th>التسمية</th><th>المخزون</th><th>الكمية المطلوبة</th><th>الكمية المسلّمة</th><th>السعر</th><th>ملاحظات</th>
        </tr></thead><tbody>`;
        d.items.forEach(item => {
          html += `<tr>
            <td>${item.numero || ''}</td>
            <td style="text-align:right;padding-right:10px">${item.designation || ''}</td>
            <td>${item.stock || ''}</td>
            <td>${item.demandee || ''}</td>
            <td>${item.livree || ''}</td>
            <td>${item.prix || ''}</td>
            <td>${item.obs || ''}</td>
          </tr>`;
        });
        html += `</tbody></table>`;
      }
      break;

    case 'oncall_schedules':
      html += `<div class="detail-item"><label>الشهر</label><span>${d.month_year || '—'}</span></div>`;
      html += `</div>`;

      if (d.schedule) {
        const specs = ['anesthesie', 'pediatrie', 'infection', 'radio', 'cardio', 'endo'];
        const specLabels = ['التخدير', 'الأطفال', 'الأمراض المعدية', 'التصوير', 'القلب', 'الغدد'];
        html += `<div class="detail-title">📅 جدول المناوبة</div>`;
        html += `<table class="detail-table"><thead><tr><th>اليوم</th>`;
        specLabels.forEach(s => html += `<th>${s}</th>`);
        html += `</tr></thead><tbody>`;
        for (let day = 1; day <= 31; day++) {
          const dayKey = `day_${String(day).padStart(2, '0')}`;
          const dayData = d.schedule[dayKey];
          if (dayData) {
            html += `<tr><td style="font-weight:bold">${day}</td>`;
            specs.forEach(s => html += `<td>${dayData[s] || ''}</td>`);
            html += `</tr>`;
          }
        }
        html += `</tbody></table>`;
      }
      if (d.notes) {
        html += `<div class="detail-title">📝 ملاحظات</div><div style="background:var(--bg3);padding:12px;border-radius:var(--r);font-size:12px;white-space:pre-wrap;line-height:1.8">${d.notes}</div>`;
      }
      break;

    case 'staff_movements':
      html += `<div class="detail-item"><label>الشهر</label><span>${d.month_year || '—'}</span></div>`;
      html += `<div class="detail-item"><label>المصلحة</label><span>${d.service || '—'}</span></div>`;
      html += `</div>`;

      if (d.staff && d.staff.length > 0) {
        html += `<div class="detail-title">👥 جدول الموظفين (${d.staff.length})</div>`;
        html += `<div style="overflow-x:auto"><table class="detail-table"><thead><tr><th>الاسم</th><th>الرتبة</th>`;
        for (let day = 1; day <= 31; day++) html += `<th>${day}</th>`;
        html += `</tr></thead><tbody>`;
        d.staff.forEach(s => {
          html += `<tr><td style="white-space:nowrap;text-align:right">${s.name}</td><td>${s.rank || ''}</td>`;
          for (let day = 1; day <= 31; day++) {
            const val = s.days ? (s.days[`day_${day}`] || '') : '';
            let bg = '';
            switch(val.toUpperCase()) {
              case 'ص': bg = 'background:rgba(63,185,80,.15)'; break;
              case 'م': bg = 'background:rgba(240,180,41,.15)'; break;
              case 'ل': bg = 'background:rgba(88,166,255,.15)'; break;
              case 'ع': bg = 'background:rgba(248,81,73,.12)'; break;
              case 'غ': bg = 'background:rgba(255,255,255,.06)'; break;
            }
            html += `<td style="font-weight:bold;${bg}">${val}</td>`;
          }
          html += `</tr>`;
        });
        html += `</tbody></table></div>`;
      }
      break;

    case 'fiche_navettes':
      html += `<div class="detail-item"><label>رقم الفيش</label><span>${d.ficheNumber || '—'}</span></div>`;
      html += `</div>`;

      if (d.ficheData) {
        html += `<div class="detail-title">📋 بيانات المريض</div>`;
        html += `<div class="detail-grid">`;
        Object.entries(d.ficheData).forEach(([key, val]) => {
          if (val) {
            html += `<div class="detail-item"><label>${key.replace(/_/g, ' ')}</label><span>${val}</span></div>`;
          }
        });
        html += `</div>`;
      }

      if (d.movements && d.movements.length > 0) {
        html += `<div class="detail-title">🔄 حركة المريض</div>`;
        html += `<table class="detail-table"><thead><tr>
          <th>المصلحة</th><th>التاريخ</th><th>الساعة</th><th>الغرفة/السرير</th><th>الطبيب</th>
        </tr></thead><tbody>`;
        d.movements.forEach(m => {
          html += `<tr>
            <td>${m.service || ''}</td><td>${m.date || ''}</td><td>${m.heure || ''}</td>
            <td>${m.salle_lit || ''}</td><td>${m.medecin || ''}</td>
          </tr>`;
        });
        html += `</tbody></table>`;
      }
      break;
  }

  document.getElementById('modalBody').innerHTML = html;
  document.getElementById('docModal').classList.add('show');
};

window.closeModal = function() {
  document.getElementById('docModal').classList.remove('show');
  currentDocRef = null;
};

// Delete document
window.deleteDoc = async function() {
  if (!currentDocRef) return;
  if (!confirm('هل أنت متأكد من حذف هذه الوثيقة نهائياً؟')) return;

  try {
    await remove(ref(db, currentDocRef));
    closeModal();
    await loadAllDocs();
  } catch (e) {
    console.error('Delete error:', e);
    alert('حدث خطأ أثناء الحذف');
  }
};

// Close modal on overlay click
document.getElementById('docModal').addEventListener('click', function(e) {
  if (e.target === this) closeModal();
});

// Init
loadAllDocs();
</script>
</body>
</html>
