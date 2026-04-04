<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>اتصل بنا | مستشفى عاشور زيان</title>

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600&display=swap" rel="stylesheet">

<style>
*{box-sizing:border-box}

body{
  margin:0;
  font-family:"Cairo",sans-serif;
  background:#f4f7f9;
  color:#1f2937;
}

/* TOP BAR & NAVBAR (Standardized) */
.top-bar{
  background:linear-gradient(90deg,#071e26,#0b3c49);
  color:#fff;padding:8px 48px;
  display:flex;justify-content:space-between;align-items:center;
  font-size:12px;letter-spacing:.3px;
  border-bottom:2px solid #ffd166;
}
.top-bar strong{color:#ffd166}
.pulse-dot{
  width:8px;height:8px;background:#ef4444;
  border-radius:50%;animation:pdot 1.5s infinite;
  display:inline-block;margin-left:7px;vertical-align:middle;
}
@keyframes pdot{
  0%,100%{transform:scale(1);box-shadow:0 0 0 0 rgba(239,68,68,.7)}
  50%{transform:scale(1.3);box-shadow:0 0 0 6px rgba(239,68,68,0)}
}

/* NAVBAR */
.navbar{
  background:rgba(255,255,255,.97);
  backdrop-filter:blur(20px);
  padding:0 48px;
  display:flex;align-items:center;justify-content:space-between;
  box-shadow:0 2px 20px rgba(11,60,73,.1);
  position:sticky;top:0;z-index:1000;height:68px;
  border-bottom:1px solid rgba(11,60,73,.08);
  transition:all 0.3s cubic-bezier(0.4,0,0.2,1);
}
body.dark .navbar{background:rgba(7,30,38,.97);border-bottom:1px solid rgba(255,255,255,.06)}
body.dark {
  background:#071e26;color:#e8f4f7;
}
body.dark .contact-info { background:#0d3d4a; box-shadow:0 6px 20px rgba(0,0,0,0.5); }
body.dark .info-item strong, body.dark .page-title h1 { color:#ffd166; }

.logo{display:flex;align-items:center;gap:12px;text-decoration:none}
.logo-icon{
  width:42px;height:42px;
  background:linear-gradient(135deg,#0f4c5c,#1a7a8a);
  border-radius:12px;display:flex;align-items:center;justify-content:center;
  font-size:20px;box-shadow:0 4px 12px rgba(15,76,92,.3);color:#fff;
}
.logo-name{font-size:14px;font-weight:700;color:#0b3c49;display:block}
body.dark .logo-name{color:#ffd166}
.logo-sub{font-size:10px;color:#4a6572;display:block}
.nav-links{list-style:none;display:flex;gap:2px;align-items:center}
.nav-links a,.nav-links > li > span{
  text-decoration:none;color:#1a2e35;
  font-size:12.5px;font-weight:600;
  padding:8px 12px;border-radius:8px;
  cursor:pointer;transition:background 0.2s, color 0.2s;display:block;white-space:nowrap;
}
.nav-links a:hover,.nav-links > li > span:hover{background:rgba(15,76,92,.08);color:#0f4c5c}
body.dark .nav-links a,body.dark .nav-links > li > span{color:#c8e6ec}
body.dark .nav-links a:hover{background:rgba(42,166,184,.15);color:#ffd166}
.dropdown{position:relative}
.dropdown-menu{
  position:absolute;top:calc(100% + 8px);right:0;
  background:#fff;min-width:220px;
  border-radius:12px;box-shadow:0 12px 40px rgba(11,60,73,.15);
  display:none;overflow:hidden;
  border:1px solid rgba(15,76,92,.1);
  animation:dropIn .2s ease;
}
body.dark .dropdown-menu { background:#0d3d4a; border-color:rgba(255,255,255,0.1); }
.dropdown-menu.show{display:block}
@keyframes dropIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:translateY(0)}}
.dropdown-menu a{
  display:flex;align-items:center;gap:10px;
  padding:11px 16px;font-size:12.5px;
  border-bottom:1px solid rgba(15,76,92,.06);
  color:#1a2e35;transition:background 0.2s, color 0.2s;
  font-weight:500;
}
body.dark .dropdown-menu a { color:#c8e6ec; border-bottom:1px solid rgba(255,255,255,0.06); }
.dropdown-menu a:hover{background:rgba(15,76,92,.06);color:#0f4c5c;padding-right:22px}
body.dark .dropdown-menu a:hover { background:rgba(255,255,255,0.05); color:#ffd166; }
.nav-actions{display:flex;align-items:center;gap:10px}
.dark-toggle{
  width:38px;height:38px;background:#ffd166;
  border:none;border-radius:10px;cursor:pointer;font-size:17px;
  display:flex;align-items:center;justify-content:center;
  transition:transform 0.2s;box-shadow:0 2px 8px rgba(245,166,35,.3);
}
.dark-toggle:hover{transform:scale(1.1)}
.nav-login{
  display:inline-flex;align-items:center;gap:7px;
  padding:9px 18px;border-radius:8px;
  background:linear-gradient(135deg,#0f4c5c,#1a7a8a);
  color:#fff !important;font-size:12.5px !important;font-weight:700 !important;
  text-decoration:none;transition:transform 0.2s;
  box-shadow:0 3px 12px rgba(15,76,92,.3);
}
.nav-login:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(15,76,92,.4); color:#fff !important;}

/* ===== TITLE ===== */
.page-title{
  text-align:center;
  margin:35px 0 15px;
}

.page-title h1{
  font-size:22px;
  color:#0b3c5d;
}

/* ===== MAP ===== */
.map-section{
  width:90%;
  height:75vh;
  margin:0 auto 40px;
  border-radius:14px;
  overflow:hidden;
  box-shadow:0 10px 30px rgba(0,0,0,.18);
}

.map-section iframe{
  width:100%;
  height:100%;
  border:0;
}

/* ===== INFO BOX ===== */
.contact-info{
  width:90%;
  margin:0 auto 50px;
  background:#fff;
  padding:25px;
  border-radius:14px;
  box-shadow:0 6px 20px rgba(0,0,0,.08);
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
  gap:20px;
}

.info-item{
  font-size:13.5px;
  line-height:1.8;
}

.info-item strong{
  color:#0b3c5d;
}
</style>
</head>

<body>

<!-- TOP BAR -->
<div class="top-bar" id="topBar">
  <div style="display:flex;align-items:center;gap:6px">
    <span class="pulse-dot"></span>
    خدمة الطوارئ العاجلة <strong>24/24</strong>
  </div>
  <span>⏰ ساعات الاستقبال: 08:00 — 20:00 &nbsp;|&nbsp; 📍 ولاية اولاد جلال</span>
</div>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <a href="{{ route('home') }}" class="logo">
    <div class="logo-icon">🏥</div>
    <div>
      <span class="logo-name">عاشور زيان</span>
      <span class="logo-sub">المؤسسة الاستشفائية</span>
    </div>
  </a>
  <ul class="nav-links">
    <li><a href="{{ route('home') }}">الرئيسية</a></li>
    <li class="dropdown">
      <span class="dropdown-toggle" style="cursor:pointer">قسم الجراحة▾</span>
      <div class="dropdown-menu">
        <a href="{{ route('surgery.women') }}">جراحة النساء والتوليد</a>
        <a href="{{ route('surgery.men') }}">جراحة الرجال</a>
        <a href="{{ route('orthopedics') }}">جراحة العظام والمفاصل</a>
        <a href="{{ route('urology') }}">جراحة المسالك البولية</a>
        <a href="{{ route('general.surgery') }}">الجراحة العامة</a>
      </div>
    </li>
    <li><a href="{{ route('maternite') }}">الأمومة والطفولة</a></li>
    <li><a href="{{ route('services') }}">خدماتنا</a></li>
    <li><a href="{{ route('about') }}">نبذة عنا</a></li>
    <li><a href="{{ route('contact') }}">اتصل بنا</a></li>
  </ul>
  <div class="nav-actions">
    <button class="dark-toggle" id="darkToggle">🌙</button>
    <a href="{{ route('login') }}" class="nav-login">تسجيل الدخول</a>
  </div>
</nav>

<!-- TITLE -->
<div class="page-title">
  <h1>📍 موقعنا الجغرافي</h1>
</div>

<!-- MAP -->
<div class="map-section">
 <iframe 
  src="https://www.google.com/maps?q=34.4283009,5.2068999&z=13&output=embed"
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade">
</iframe>
</div>

<!-- INFO -->
<div class="contact-info">
  <div class="info-item">
    <strong>العنوان:</strong><br>
    المؤسسة العمومية الاستشفائية عاشور زيان<br>
    ولاية أولاد جلال
  </div>

  <div class="info-item">
    <strong>الهاتف:</strong><br>
    014 25 36 78
  </div>

  <div class="info-item">
    <strong>أوقات العمل:</strong><br>
    08:00 صباحًا – 20:00 مساءً<br>
    الطوارئ 24/24
  </div>
</div>

<script>
// Dropdown click
document.querySelector('.dropdown-toggle').addEventListener('click', function(e) {
  e.stopPropagation();
  this.nextElementSibling.classList.toggle('show');
});
window.addEventListener('click', function(e) {
  const menu = document.querySelector('.dropdown-menu');
  if (menu && menu.classList.contains('show') && !e.target.closest('.dropdown')) {
    menu.classList.remove('show');
  }
});

// Dark mode logic
const darkBtn = document.getElementById('darkToggle');
if(localStorage.getItem('theme') === 'dark') {
  document.body.classList.add('dark');
  if(darkBtn) darkBtn.textContent = '☀️';
}
if(darkBtn) {
  darkBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    const isDark = document.body.classList.contains('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    darkBtn.textContent = isDark ? '☀️' : '🌙';
  });
}
</script>

</body>
</html>
