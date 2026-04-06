<style>
/* Sidebar */
.sidebar {
  position: fixed; top: 0; right: 0;
  width: var(--sidebar); height: 100vh;
  background: var(--bg2); border-left: 1px solid var(--border);
  display: flex; flex-direction: column; z-index: 100; overflow-y: auto;
}
.sidebar::-webkit-scrollbar { width: 4px; }
.sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.1); }

.sidebar-brand {
  padding: 24px 20px;
  border-bottom: 1px solid var(--border);
}
.sidebar-brand h2 { font-size: 16px; font-weight: 800; color: var(--accent); margin-bottom: 16px; }

.sidebar-brand .user-info {
  background: var(--bg3); padding: 12px; border-radius: 12px;
  border: 1px solid var(--border);
  display: flex; flex-direction: column; align-items: center; text-align: center;
}
.sidebar-brand .user-avatar {
  width: 36px; height: 36px; border-radius: 50%;
  background: linear-gradient(135deg, var(--accent), #0891b2);
  display: flex; align-items: center; justify-content: center;
  font-size: 16px; font-weight: 800; color: #0d1117;
  margin-bottom: 6px;
}
.sidebar-brand .user-name { font-size: 13px; font-weight: 700; color: var(--text); }
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
  border-radius: 8px; margin: 2px 8px;
  transition: all 0.2s ease;
}
.nav-link:hover { background: var(--bg3); color: var(--text); }
.nav-link.active { background: rgba(45,212,191,.12); color: var(--accent); }
.nav-link .nav-icon { font-size: 16px; width: 20px; text-align: center; }

.sidebar-footer {
  margin-top: auto; padding: 16px;
  border-top: 1px solid var(--border);
}
.sidebar-footer .btn-logout {
  width: 100%; padding: 10px;
  background: rgba(248,81,73,.1); border: 1px solid rgba(248,81,73,.2);
  color: var(--red); border-radius: 8px; font-family: 'Cairo', sans-serif;
  font-size: 13px; font-weight: 700; cursor: pointer; transition: all 0.2s ease;
}
.sidebar-footer .btn-logout:hover { background: rgba(248,81,73,.2); }

@keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
.pulse-anim { animation: pulse 2s infinite; }
</style>

<!-- ================== SIDEBAR ================== -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <h2>🏥 SmartSurgery</h2>
    <div class="user-info">
      <div class="user-avatar">{{ mb_strtoupper(mb_substr(session('firebase_user.fname', 'م'), 0, 1)) }}</div>
      <div class="user-name">{{ session('firebase_user.fname') }} {{ session('firebase_user.lname') }}</div>
      <div class="user-role">{{ session('firebase_role') == 'admin' ? '👑 مدير النظام' : session('firebase_role') }}</div>
      <div class="user-email">{{ session('firebase_user.email') }}</div>
    </div>
  </div>

  <div style="padding: 8px 0; flex:1;">
    <div class="nav-section">الرئيسية</div>
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <span class="nav-icon">📊</span> لوحة التحكم
    </a>
    <a href="{{ route('home') }}" class="nav-link">
      <span class="nav-icon">🌐</span> الموقع الرئيسي
    </a>

    @if(session('firebase_role') == 'admin')
        <div class="nav-section">إدارة المستخدمين</div>
        <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
          <span class="nav-icon">👥</span> المستخدمون
        </a>

        <div class="nav-section">العمليات والمواعيد</div>
        <a href="{{ route('admin.appointment_requests') }}" class="nav-link {{ request()->routeIs('admin.appointment_requests') ? 'active' : '' }}">
          <span class="nav-icon">📅</span> طلبات المواعيد
          <span id="sidebar-badge" style="display:none;background:var(--red);color:#fff;border-radius:10px;padding:2px 8px;font-size:10px;margin-right:auto;">0</span>
        </a>
        <a href="{{ route('admin.demands') }}" class="nav-link {{ request()->routeIs('admin.demands') ? 'active' : '' }}">
          <span class="nav-icon">📋</span> طلبات العمليات
        </a>
        <a href="{{ route('surgeries.index') }}" class="nav-link {{ request()->routeIs('surgeries.index') ? 'active' : '' }}">
          <span class="nav-icon">🔪</span> العمليات الجراحية
        </a>
    @endif

    <!-- Departmental/Internal Navigation -->
    @yield('sidebar_content')

    <div class="nav-section">الأقسام</div>
    @php
        $userRole = session('firebase_role');
        $isHead = strpos($userRole, 'head_') === 0;
        $isStaff = strpos($userRole, 'staff_') === 0;
    @endphp

    @if($userRole == 'admin' || $userRole == 'head_women' || $userRole == 'staff_women')
        <a href="{{ route('surgery.women') }}" class="nav-link {{ request()->routeIs('surgery.women') ? 'active' : '' }}">
          <span class="nav-icon">🏥</span> جراحة النساء
        </a>
    @endif

    @if($userRole == 'admin' || $userRole == 'head_men' || $userRole == 'staff_men')
        <a href="{{ route('surgery.men') }}" class="nav-link {{ request()->routeIs('surgery.men') ? 'active' : '' }}">
          <span class="nav-icon">🏥</span> جراحة الرجال
        </a>
    @endif

    <a href="{{ route('daily-meds') }}" class="nav-link {{ request()->routeIs('daily-meds') ? 'active' : '' }}">
      <span class="nav-icon">💊</span> سجل الأدوية
    </a>

    <div class="nav-section">الوثائق والجداول</div>
    <a href="{{ route('planning-garde') }}" class="nav-link {{ request()->routeIs('planning-garde') ? 'active' : '' }}">
      <span class="nav-icon">📅</span> جدول المناوبة
    </a>
    <a href="{{ route('bon-commande-pharmacie') }}" class="nav-link {{ request()->routeIs('bon-commande-pharmacie') ? 'active' : '' }}">
      <span class="nav-icon">💊</span> وصل الصيدلية
    </a>
    <a href="{{ route('mouvement-personnel') }}" class="nav-link {{ request()->routeIs('mouvement-personnel') ? 'active' : '' }}">
      <span class="nav-icon">👥</span> حركة العمال
    </a>
    <a href="{{ route('fiche-navette') }}" class="nav-link {{ request()->routeIs('fiche-navette') ? 'active' : '' }}">
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

<script type="module" id="sidebar-script">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
    import { getDatabase, ref, onValue } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

    if (!window.firebaseAppInitializedForSidebar) {
        window.firebaseAppInitializedForSidebar = true;
        
        try {
            const firebaseConfig = {
              apiKey: "AIzaSyC5OtqME0D8t72QsEERdRXrCCKl0bZqEQk",
              authDomain: "test-ae989.firebaseapp.com",
              databaseURL: "https://test-ae989-default-rtdb.europe-west1.firebasedatabase.app",
              projectId: "test-ae989",
              storageBucket: "test-ae989.firebasestorage.app",
              messagingSenderId: "1083766099812",
              appId: "1:1083766099812:web:a6a0170fc323d579aff471"
            };
            // Prevent multiple initializations if other scripts already initialized Firebase
            let app;
            const existingApps = window.firebase ? window.firebase.apps : [];
            if (!existingApps || existingApps.length === 0) {
                app = initializeApp(firebaseConfig);
            }

            const db = getDatabase(app);
            const requestsRef = ref(db, 'appointments/requests');
            onValue(requestsRef, (snapshot) => {
              let pendingCount = 0;
              if(snapshot.exists()) {
                const data = snapshot.val();
                Object.keys(data).forEach(k => {
                  if(data[k].status === 'Pending') pendingCount++;
                });
              }
              const sidebarBadge = document.getElementById('sidebar-badge');
              if(sidebarBadge) {
                  if (pendingCount > 0) {
                    sidebarBadge.style.display = 'inline-block';
                    sidebarBadge.textContent = pendingCount;
                  } else {
                    sidebarBadge.style.display = 'none';
                  }
              }
            });
        } catch(e) {
            console.warn('Firebase sidebar badge error', e);
        }
    }
</script>
