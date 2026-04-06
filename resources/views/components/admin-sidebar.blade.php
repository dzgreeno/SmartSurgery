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
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ $active === 'dashboard' ? 'active' : '' }}">
      <span class="nav-icon">📊</span> لوحة التحكم
    </a>
    <a href="{{ route('home') }}" class="nav-link">
      <span class="nav-icon">🌐</span> الموقع الرئيسي
    </a>

    <div class="nav-section">إدارة المستخدمين</div>
    <a href="{{ route('users.index') }}" class="nav-link {{ $active === 'users' ? 'active' : '' }}">
      <span class="nav-icon">👥</span> المستخدمون
    </a>

    <div class="nav-section">العمليات والمواعيد</div>
    <a href="{{ route('admin.appointment_requests') }}" class="nav-link {{ $active === 'appointments' ? 'active' : '' }}">
      <span class="nav-icon">📅</span> طلبات المواعيد
      <span id="sidebar-badge" style="display:none;background:var(--red);color:#fff;border-radius:10px;padding:2px 8px;font-size:10px;margin-right:auto;">0</span>
    </a>
    <a href="{{ route('admin.demands') }}" class="nav-link {{ $active === 'demands' ? 'active' : '' }}">
      <span class="nav-icon">📋</span> طلبات العمليات
    </a>
    <a href="{{ route('admin.surgeries') }}" class="nav-link {{ $active === 'surgeries' ? 'active' : '' }}">
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
      <button type="submit" class="btn-logout">🚪 تسجيل الخروج</button>
    </form>
  </div>
</aside>
