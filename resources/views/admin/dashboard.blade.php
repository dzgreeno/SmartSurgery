<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>لوحة تحكم المدير — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root {
  --bg:      #0d1117;
  --bg2:     #161b22;
  --bg3:     #1c2128;
  --border:  rgba(255,255,255,.08);
  --text:    #e6edf3;
  --muted:   #7d8590;
  --accent:  #2dd4bf;
  --accent2: rgba(45,212,191,.12);
  --gold:    #f0b429;
  --green:   #3fb950;
  --red:     #f85149;
  --blue:    #58a6ff;
  --sidebar: 240px;
  --topbar:  56px;
  --r:       8px;
  --t:       .18s cubic-bezier(.4,0,.2,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%;font-family:'Cairo',sans-serif;background:var(--bg);color:var(--text)}

/* === MAIN === */
.main-wrap {
  margin-right: var(--sidebar);
  min-height: 100vh;
  display: flex; flex-direction: column;
}
.topbar {
  height: var(--topbar);
  background: var(--bg2); border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 28px; position: sticky; top: 0; z-index: 50;
}
</style>
@include('partials.sidebar')
<style>
.topbar-title { font-size: 16px; font-weight: 800; }
.topbar-badge {
  padding: 4px 14px; border-radius: 20px;
  background: var(--accent2); color: var(--accent);
  font-size: 12px; font-weight: 700;
}

.content { padding: 28px; flex: 1; }

/* === STATS GRID === */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 16px; margin-bottom: 28px;
}
.stat-card {
  background: var(--bg2); border: 1px solid var(--border);
  border-radius: 12px; padding: 20px;
  display: flex; flex-direction: column; gap: 8px;
  transition: all var(--t);
}
.stat-card:hover { border-color: rgba(255,255,255,.15); transform: translateY(-2px); }
.stat-icon {
  width: 44px; height: 44px; border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
}
.stat-value { font-size: 32px; font-weight: 900; }
.stat-label { font-size: 12px; color: var(--muted); font-weight: 600; }

/* Stat colors */
.stat-teal   .stat-icon { background: rgba(45,212,191,.12); }
.stat-teal   .stat-value { color: var(--accent); }
.stat-gold   .stat-icon { background: rgba(240,180,41,.12); }
.stat-gold   .stat-value { color: var(--gold); }
.stat-green  .stat-icon { background: rgba(63,185,80,.12); }
.stat-green  .stat-value { color: var(--green); }
.stat-blue   .stat-icon { background: rgba(88,166,255,.12); }
.stat-blue   .stat-value { color: var(--blue); }
.stat-red    .stat-icon { background: rgba(248,81,73,.12); }
.stat-red    .stat-value { color: var(--red); }

/* === QUICK ACTIONS === */
.section-title {
  font-size: 14px; font-weight: 800; color: var(--muted);
  text-transform: uppercase; letter-spacing: 1px;
  margin-bottom: 16px;
}
.actions-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 14px;
}
.action-card {
  background: var(--bg2); border: 1px solid var(--border);
  border-radius: 12px; padding: 18px;
  text-decoration: none; color: var(--text);
  display: flex; align-items: center; gap: 14px;
  transition: all var(--t);
}
.action-card:hover {
  border-color: var(--accent);
  background: var(--accent2);
  transform: translateY(-2px);
}
.action-card-icon {
  width: 48px; height: 48px; border-radius: 10px;
  background: var(--bg3);
  display: flex; align-items: center; justify-content: center;
  font-size: 24px; flex-shrink: 0;
}
.action-card h4 { font-size: 14px; font-weight: 700; margin-bottom: 2px; }
.action-card p  { font-size: 11px; color: var(--muted); }

/* Divider */
.section-divider {
  border: none; border-top: 1px solid var(--border);
  margin: 24px 0;
}
</style>
</head>
<body>


<!-- ================== MAIN ================== -->
<div class="main-wrap">
  <div class="topbar">
    <span class="topbar-title">📊 لوحة تحكم المدير</span>
    <div style="display:flex; gap:10px; align-items:center;">
      <div id="topbar-notifications" class="topbar-badge pulse-anim" style="background:var(--red);color:#fff;display:none;cursor:pointer;" onclick="window.location.href='{{ route('admin.appointment_requests') }}'">
        🔔 <span id="topbar-badge-count">0</span> طلبات جديدة
      </div>
      <span class="topbar-badge">👑 مدير النظام</span>
    </div>
  </div>

  <style>
  @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
  .pulse-anim { animation: pulse 2s infinite; }
  </style>

  <div class="content">
    <!-- WELCOME -->
    <div style="margin-bottom:24px;">
      <h1 style="font-size:22px;font-weight:900;">مرحباً، {{ session('firebase_user.fname') }} 👋</h1>
      <p style="color:var(--muted);font-size:13px;margin-top:4px;">إليك ملخص نشاط المستشفى الذكي اليوم</p>
    </div>

    <!-- STATS -->
    <div class="stats-grid">
      <div class="stat-card stat-teal">
        <div class="stat-icon">🧑‍⚕️</div>
        <div class="stat-value" id="stat-users">—</div>
        <div class="stat-label">إجمالي المستخدمين</div>
      </div>
      <div class="stat-card stat-green">
        <div class="stat-icon">🔪</div>
        <div class="stat-value">0</div>
        <div class="stat-label">عمليات مسجّلة</div>
      </div>
      <div class="stat-card stat-gold">
        <div class="stat-icon">📋</div>
        <div class="stat-value">0</div>
        <div class="stat-label">طلبات معلقة</div>
      </div>
      <div class="stat-card stat-blue">
        <div class="stat-icon">🏥</div>
        <div class="stat-value">4</div>
        <div class="stat-label">أقسام نشطة</div>
      </div>
      <div class="stat-card stat-red">
        <div class="stat-icon">💊</div>
        <div class="stat-value">0</div>
        <div class="stat-label">سجلات دواء اليوم</div>
      </div>
    </div>

    <hr class="section-divider">

    <!-- QUICK ACTIONS -->
    <div class="section-title">⚡ الإجراءات السريعة</div>
    <div class="actions-grid">
      <a href="{{ route('users.index') }}" class="action-card">
        <div class="action-card-icon">👥</div>
        <div>
          <h4>إدارة المستخدمين</h4>
          <p>إضافة وتعديل وحذف الحسابات</p>
        </div>
      </a>
      <a href="{{ route('users.create') }}" class="action-card">
        <div class="action-card-icon">➕</div>
        <div>
          <h4>إضافة مستخدم جديد</h4>
          <p>طبيب، ممرضة، رئيسة مصلحة...</p>
        </div>
      </a>
      <a href="{{ route('admin.appointment_requests') }}" class="action-card">
        <div class="action-card-icon">📅</div>
        <div>
          <h4>طلبات حجز المواعيد</h4>
          <p>قبول وترتيب مواعيد المرضى الجديدة</p>
        </div>
      </a>
      <a href="{{ route('admin.demands') }}" class="action-card">
        <div class="action-card-icon">📋</div>
        <div>
          <h4>طلبات العمليات</h4>
          <p>مراجعة وقبول أو رفض الطلبات القديمة</p>
        </div>
      </a>
      <a href="{{ route('admin.surgeries') }}" class="action-card">
        <div class="action-card-icon">🔪</div>
        <div>
          <h4>العمليات الجراحية</h4>
          <p>سجل كامل بجميع العمليات</p>
        </div>
      </a>
      <a href="{{ route('surgery.women') }}" class="action-card">
        <div class="action-card-icon">🏥</div>
        <div>
          <h4>قسم جراحة النساء</h4>
          <p>دخول مباشر للقسم</p>
        </div>
      </a>
      <a href="{{ route('surgery.men') }}" class="action-card">
        <div class="action-card-icon">🏥</div>
        <div>
          <h4>قسم جراحة الرجال</h4>
          <p>دخول مباشر للقسم</p>
        </div>
      </a>
      <a href="{{ route('planning-garde') }}" class="action-card">
        <div class="action-card-icon">📅</div>
        <div>
          <h4>جدول المناوبة</h4>
          <p>برنامج المناوبة للممارسين المختصين</p>
        </div>
      </a>
      <a href="{{ route('bon-commande-pharmacie') }}" class="action-card">
        <div class="action-card-icon">💊</div>
        <div>
          <h4>وصل طلبية الصيدلية</h4>
          <p>Bon de Commande Pharmacie</p>
        </div>
      </a>
      <a href="{{ route('mouvement-personnel') }}" class="action-card">
        <div class="action-card-icon">👥</div>
        <div>
          <h4>جدول حركة العمال</h4>
          <p>مناوبات الشبه طبي — جراحة النساء</p>
        </div>
      </a>
    </div>
  </div>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getDatabase, ref, get, onValue } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

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

// Load user count
get(ref(db, 'users')).then(snap => {
  if (snap.exists()) {
    document.getElementById('stat-users').textContent = Object.keys(snap.val()).length;
  } else {
    document.getElementById('stat-users').textContent = '0';
  }
}).catch(() => {
  document.getElementById('stat-users').textContent = '0';
});

// Listen to incoming appointments
const requestsRef = ref(db, 'appointments/requests');
onValue(requestsRef, (snapshot) => {
  let pendingCount = 0;
  if(snapshot.exists()) {
    const data = snapshot.val();
    Object.keys(data).forEach(k => {
      if(data[k].status === 'Pending') pendingCount++;
    });
  }
  
  const topBadge = document.getElementById('topbar-notifications');
  const topBadgeCount = document.getElementById('topbar-badge-count');
  const sidebarBadge = document.getElementById('sidebar-badge');
  const statBadge = document.querySelector('.stat-card.stat-gold .stat-value');
  
  if (pendingCount > 0) {
    topBadge.style.display = 'block';
    topBadgeCount.textContent = pendingCount;
    sidebarBadge.style.display = 'inline-block';
    sidebarBadge.textContent = pendingCount;
    if(statBadge) statBadge.textContent = pendingCount;
  } else {
    topBadge.style.display = 'none';
    sidebarBadge.style.display = 'none';
    if(statBadge) statBadge.textContent = '0';
  }
});
</script>
</body>
</html>
