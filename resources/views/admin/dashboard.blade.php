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

/* === SIDEBAR === */
.sidebar {
  position: fixed; top: 0; right: 0;
  width: var(--sidebar); height: 100vh;
  background: var(--bg2); border-left: 1px solid var(--border);
  display: flex; flex-direction: column;
  z-index: 100; overflow-y: auto;
}
.sidebar-brand {
  padding: 20px 16px;
  border-bottom: 1px solid var(--border);
}
.sidebar-brand h2 {
  font-size: 16px; font-weight: 800; color: var(--accent);
  display: flex; align-items: center; gap: 8px;
}
.sidebar-brand .user-info {
  margin-top: 10px; padding: 10px;
  background: var(--bg3); border-radius: var(--r);
  border: 1px solid var(--border);
}
.sidebar-brand .user-avatar {
  width: 36px; height: 36px; border-radius: 50%;
  background: linear-gradient(135deg, var(--accent), #0891b2);
  display: flex; align-items: center; justify-content: center;
  font-size: 16px; font-weight: 800; color: #0d1117;
  margin-bottom: 6px;
}
.sidebar-brand .user-name { font-size: 13px; font-weight: 700; }
.sidebar-brand .user-role {
  font-size: 11px; color: var(--gold);
  background: rgba(240,180,41,.12); padding: 2px 8px;
  border-radius: 20px; display: inline-block; margin-top: 2px;
}
.sidebar-brand .user-email { font-size: 10px; color: var(--muted); }

.nav-section { padding: 12px 8px 4px; font-size: 10px; color: var(--muted); font-weight: 700; letter-spacing: 1px; }
.nav-link {
  display: flex; align-items: center; gap: 10px;
  padding: 10px 16px; font-size: 13px; font-weight: 600;
  color: var(--muted); text-decoration: none;
  border-radius: var(--r); margin: 2px 8px;
  transition: all var(--t);
}
.nav-link:hover { background: var(--bg3); color: var(--text); }
.nav-link.active { background: var(--accent2); color: var(--accent); }
.nav-link .nav-icon { font-size: 16px; width: 20px; text-align: center; }

.sidebar-footer {
  margin-top: auto; padding: 16px;
  border-top: 1px solid var(--border);
}
.btn-logout {
  width: 100%; padding: 10px;
  background: rgba(248,81,73,.1); border: 1px solid rgba(248,81,73,.2);
  color: var(--red); border-radius: var(--r); font-family: 'Cairo', sans-serif;
  font-size: 13px; font-weight: 700; cursor: pointer; transition: all var(--t);
}
.btn-logout:hover { background: rgba(248,81,73,.2); }

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

<!-- ================== SIDEBAR ================== -->
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
    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
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

    <div class="nav-section">الأقسام</div>
    <a href="{{ route('surgery.women') }}" class="nav-link">
      <span class="nav-icon">🏥</span> جراحة النساء
    </a>
    <a href="{{ route('surgery.men') }}" class="nav-link">
      <span class="nav-icon">🏥</span> جراحة الرجال
    </a>
    <a href="{{ route('daily-meds') }}" class="nav-link">
      <span class="nav-icon">💊</span> سجل الأدوية
    </a>

    <div class="nav-section">الوثائق والجداول</div>
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
  </div>

  <div class="sidebar-footer">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="btn-logout">🚪 تسجيل الخروج</button>
    </form>
  </div>
</aside>

<!-- ================== MAIN ================== -->
<div class="main-wrap">
  <div class="topbar">
    <span class="topbar-title">📊 لوحة تحكم المدير</span>
    <span class="topbar-badge">👑 مدير النظام</span>
  </div>

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
      <a href="{{ route('admin.demands') }}" class="action-card">
        <div class="action-card-icon">📋</div>
        <div>
          <h4>طلبات العمليات</h4>
          <p>مراجعة وقبول أو رفض الطلبات</p>
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
</script>
</body>
</html>
