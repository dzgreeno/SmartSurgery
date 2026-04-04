<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>قسم الأمومة والطفولة — مستشفى عاشور زيان</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root {
  --pink:   #db2777;
  --pink2:  #ec4899;
  --pink3:  #f9a8d4;
  --pinkbg: rgba(219,39,119,.09);
  --pinkbd: rgba(219,39,119,.18);
  --rose:   #fff1f7;
  --bg:     #ffffff;
  --bg2:    #fdf2f8;
  --text:   #1e1b2e;
  --muted:  #6b7280;
  --border: #fce7f3;
  --green:  #059669;
  --blue:   #0ea5e9;
  --orange: #f59e0b;
  --purple: #8b5cf6;
  --r:      12px;
  --r2:     18px;
  --t:      .2s cubic-bezier(.4,0,.2,1);
  --sh:     0 4px 24px rgba(219,39,119,.08);
  --shh:    0 12px 40px rgba(219,39,119,.15);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:"Cairo",sans-serif;background:var(--bg);color:var(--text);transition:background .4s,color .4s;-webkit-font-smoothing:antialiased}

body.dark {
  --bg: #071e26;
  --bg2: #0d3d4a;
  --text: #e8f4f7;
  --muted: #8ab8c4;
  --border: rgba(219,39,119,.15);
  --pinkbg: rgba(219,39,119,.15);
  --rose: #1a0f14;
}

body.dark .hero { background:linear-gradient(160deg,#1a0f14 0%,#0d3d4a 100%); }
body.dark .hstat, body.dark .hero-card, body.dark .leave-card, body.dark .cnas-box, body.dark .tip-card, body.dark .article-card, body.dark .contact-box { background:var(--bg2); border-color:var(--border); }


/* TOP BAR & NAVBAR (Standardized) */
.top-bar{
  background:linear-gradient(90deg,#4a0f2b,#701a45);
  color:#fff;padding:8px 48px;
  display:flex;justify-content:space-between;align-items:center;
  font-size:12px;letter-spacing:.3px;
  border-bottom:2px solid var(--pink3);
}
.top-bar strong{color:var(--pink3)}
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
  box-shadow:0 2px 20px rgba(219,39,119,.1);
  position:sticky;top:0;z-index:1000;height:68px;
  border-bottom:1px solid rgba(219,39,119,.08);
  transition:var(--t);
}
body.dark .navbar{background:rgba(20,10,15,.97);border-bottom:1px solid rgba(255,255,255,.06)}
.logo{display:flex;align-items:center;gap:12px;text-decoration:none}
.logo-icon{
  width:42px;height:42px;
  background:linear-gradient(135deg,var(--pink),var(--pink2));
  border-radius:12px;display:flex;align-items:center;justify-content:center;
  font-size:20px;box-shadow:0 4px 12px rgba(219,39,119,.3);
}
.logo-name{font-size:14px;font-weight:700;color:var(--text);display:block}
body.dark .logo-name{color:var(--pink3)}
.logo-sub{font-size:10px;color:var(--muted);display:block}
.nav-links{list-style:none;display:flex;gap:2px;align-items:center}
.nav-links a,.nav-links > li > span{
  text-decoration:none;color:var(--text);
  font-size:12.5px;font-weight:600;
  padding:8px 12px;border-radius:8px;
  cursor:pointer;transition:var(--t);display:block;white-space:nowrap;
}
.nav-links a:hover,.nav-links > li > span:hover{background:var(--pinkbg);color:var(--pink)}
body.dark .nav-links a,body.dark .nav-links > li > span{color:#fce7f3}
body.dark .nav-links a:hover{background:rgba(219,39,119,.15);color:var(--pink3)}
.dropdown{position:relative}
.dropdown-menu{
  position:absolute;top:calc(100% + 8px);right:0;
  background:var(--bg);min-width:220px;
  border-radius:12px;box-shadow:0 12px 40px rgba(219,39,119,.15);
  display:none;overflow:hidden;
  border:1px solid rgba(219,39,119,.1);
  animation:dropIn .2s ease;
}
.dropdown-menu.show{display:block}
@keyframes dropIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:translateY(0)}}
.dropdown-menu a{
  display:flex;align-items:center;gap:10px;
  padding:11px 16px;font-size:12.5px;
  border-bottom:1px solid rgba(219,39,119,.06);
  color:var(--text);transition:var(--t);
  font-weight:500;
}
.dropdown-menu a::before{content:'🌸';font-size:10px}
.dropdown-menu a:hover{background:rgba(219,39,119,.06);color:var(--pink);padding-right:22px}
.nav-actions{display:flex;align-items:center;gap:10px}
.dark-toggle{
  width:38px;height:38px;background:var(--pink3);
  border:none;border-radius:10px;cursor:pointer;font-size:17px;
  display:flex;align-items:center;justify-content:center;
  transition:var(--t);box-shadow:0 2px 8px rgba(249,168,212,.3);
}
.dark-toggle:hover{transform:scale(1.1)}
body.dark .dark-toggle{background:var(--pink2)}
.search-wrap{position:relative;display:flex;align-items:center}
.search-wrap input{
  padding:8px 14px 8px 36px;
  border:1.5px solid rgba(219,39,119,.15);
  border-radius:20px;font-family:'Cairo',sans-serif;font-size:12px;
  background:var(--bg);color:var(--text);
  width:160px;transition:var(--t);outline:none;
}
.search-wrap input:focus{border-color:var(--pink3);width:200px;box-shadow:0 0 0 3px rgba(219,39,119,.08)}
.search-wrap::before{content:'🔍';position:absolute;left:10px;font-size:13px;pointer-events:none}
.nav-login{
  display:inline-flex;align-items:center;gap:7px;
  padding:9px 18px;border-radius:8px;
  background:linear-gradient(135deg,var(--pink),var(--pink2));
  color:#fff;font-size:12.5px;font-weight:700;
  text-decoration:none;transition:var(--t);
  box-shadow:0 3px 12px rgba(219,39,119,.3);
}
.nav-login:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(219,39,119,.4)}

/* ══ HERO ══ */
.hero{
  background:linear-gradient(160deg,#fff1f7 0%,#fce7f3 40%,#fbcfe8 100%);
  padding:72px 44px 60px;
  position:relative;overflow:hidden;
}
.hero-orb{
  position:absolute;border-radius:50%;pointer-events:none;
  background:radial-gradient(circle,rgba(219,39,119,.12),transparent 70%);
}
.o1{width:500px;height:500px;top:-150px;left:-100px}
.o2{width:350px;height:350px;bottom:-100px;right:-80px;background:radial-gradient(circle,rgba(244,114,182,.15),transparent 70%)}

.hero-inner{
  max-width:1200px;margin:0 auto;
  display:grid;grid-template-columns:1fr 380px;gap:48px;align-items:center;
  position:relative;z-index:2;
}
.hero-badge{
  display:inline-flex;align-items:center;gap:7px;
  background:rgba(219,39,119,.1);color:var(--pink);
  border:1px solid rgba(219,39,119,.2);
  padding:5px 14px;border-radius:100px;
  font-size:12px;font-weight:700;margin-bottom:18px;
}
.hero h1{font-size:40px;font-weight:900;line-height:1.25;margin-bottom:14px}
.hero h1 em{font-style:normal;color:var(--pink)}
.hero p{font-size:14.5px;color:var(--muted);line-height:1.9;margin-bottom:28px}
.hero-stats{display:flex;gap:24px;flex-wrap:wrap}
.hstat{text-align:center;padding:14px 20px;background:#fff;border:1px solid var(--border);border-radius:var(--r);box-shadow:var(--sh)}
.hstat strong{display:block;font-size:24px;font-weight:900;color:var(--pink)}
.hstat span{font-size:11.5px;color:var(--muted)}

/* hero card */
.hero-card{
  background:#fff;border-radius:var(--r2);
  border:1px solid var(--border);padding:28px;
  box-shadow:var(--shh);
}
.hero-card h3{font-size:15px;font-weight:800;color:var(--text);margin-bottom:16px;display:flex;align-items:center;gap:8px}
.hc-item{
  display:flex;align-items:flex-start;gap:11px;
  padding:11px 0;border-bottom:1px solid var(--border);
}
.hc-item:last-child{border-bottom:none;padding-bottom:0}
.hc-dot{
  width:32px;height:32px;border-radius:9px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;font-size:15px;
}
.hc-item h4{font-size:12.5px;font-weight:700;color:var(--text);margin-bottom:2px}
.hc-item p{font-size:11.5px;color:var(--muted);line-height:1.6}

/* ══ SECTION COMMONS ══ */
.sec{padding:64px 44px;max-width:1200px;margin:0 auto}
.sec-alt{background:var(--bg2);padding:64px 44px}
.sec-alt .sec-in{max-width:1200px;margin:0 auto}
.sec-head{text-align:center;margin-bottom:44px}
.sec-head h2{font-size:27px;font-weight:900;color:var(--text);margin-bottom:6px}
.sec-head h2 em{font-style:normal;color:var(--pink)}
.sec-head p{font-size:13.5px;color:var(--muted);max-width:520px;margin:0 auto}
.sec-line{width:48px;height:3px;background:linear-gradient(to right,var(--pink),var(--pink2));border-radius:10px;margin:10px auto 0}

/* ══ MATERNITY LEAVE ══ */
.leave-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:20px}
.leave-card{
  background:#fff;border:1px solid var(--border);
  border-radius:var(--r2);padding:26px 22px;
  transition:all var(--t);position:relative;overflow:hidden;
}
.leave-card::after{
  content:'';position:absolute;bottom:0;left:0;right:0;height:3px;
  background:linear-gradient(to right,var(--pink),var(--pink2));
  transform:scaleX(0);transition:transform var(--t);transform-origin:right;
}
.leave-card:hover{transform:translateY(-4px);box-shadow:var(--shh);border-color:var(--pinkbd)}
.leave-card:hover::after{transform:scaleX(1)}
.leave-icon{
  width:52px;height:52px;border-radius:14px;
  background:var(--pinkbg);
  display:flex;align-items:center;justify-content:center;
  font-size:22px;margin-bottom:14px;
  transition:all var(--t);
}
.leave-card:hover .leave-icon{background:linear-gradient(135deg,var(--pink),var(--pink2));font-size:22px}
.leave-card h3{font-size:14.5px;font-weight:800;color:var(--text);margin-bottom:8px}
.leave-card p{font-size:12.5px;color:var(--muted);line-height:1.85}
.leave-tag{
  display:inline-flex;align-items:center;gap:4px;
  margin-top:12px;padding:4px 11px;border-radius:100px;
  font-size:11px;font-weight:700;
}
.lt-pink{background:var(--pinkbg);color:var(--pink)}
.lt-green{background:rgba(5,150,105,.1);color:var(--green)}
.lt-blue{background:rgba(14,165,233,.1);color:var(--blue)}
.lt-orange{background:rgba(245,158,11,.1);color:var(--orange)}
.lt-purple{background:rgba(139,92,246,.1);color:var(--purple)}

/* ══ CNAS BENEFITS ══ */
.cnas-wrap{display:grid;grid-template-columns:1fr 1fr;gap:24px}
.cnas-box{
  background:#fff;border:1px solid var(--border);
  border-radius:var(--r2);overflow:hidden;box-shadow:var(--sh);
}
.cnas-box-head{
  background:linear-gradient(135deg,var(--pink),var(--pink2));
  padding:16px 20px;display:flex;align-items:center;gap:10px;
}
.cnas-box-head h3{font-size:14px;font-weight:800;color:#fff}
.cnas-box-head span{font-size:11px;color:rgba(255,255,255,.7);display:block;margin-top:1px}
.cnas-list{padding:18px 20px;display:flex;flex-direction:column;gap:12px}
.cnas-item{display:flex;align-items:flex-start;gap:10px}
.cnas-check{
  width:20px;height:20px;border-radius:50%;
  background:var(--pinkbg);
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;margin-top:1px;
}
.cnas-check svg{color:var(--pink)}
.cnas-item-txt strong{display:block;font-size:12.5px;font-weight:700;color:var(--text)}
.cnas-item-txt span{font-size:11.5px;color:var(--muted);line-height:1.6}

/* ══ TIPS ══ */
.tips-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:18px}
.tip-card{
  background:#fff;border:1px solid var(--border);
  border-radius:var(--r2);padding:22px;
  display:flex;gap:14px;align-items:flex-start;
  transition:all var(--t);
}
.tip-card:hover{border-color:var(--pinkbd);box-shadow:var(--sh);transform:translateY(-2px)}
.tip-num{
  width:36px;height:36px;border-radius:10px;flex-shrink:0;
  background:linear-gradient(135deg,var(--pink),var(--pink2));
  display:flex;align-items:center;justify-content:center;
  font-size:13px;font-weight:900;color:#fff;
}
.tip-card h4{font-size:13px;font-weight:800;color:var(--text);margin-bottom:5px}
.tip-card p{font-size:12px;color:var(--muted);line-height:1.8}

/* ══ ARTICLES ══ */
.articles-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:22px}
.article-card{
  background:#fff;border:1px solid var(--border);
  border-radius:var(--r2);overflow:hidden;
  transition:all var(--t);box-shadow:var(--sh);
}
.article-card:hover{transform:translateY(-4px);box-shadow:var(--shh);border-color:var(--pinkbd)}
.article-img{
  height:160px;
  display:flex;align-items:center;justify-content:center;
  font-size:52px;position:relative;overflow:hidden;
}
.a-img1{background:linear-gradient(135deg,#fce7f3,#fbcfe8)}
.a-img2{background:linear-gradient(135deg,#ede9fe,#ddd6fe)}
.a-img3{background:linear-gradient(135deg,#d1fae5,#a7f3d0)}
.a-img4{background:linear-gradient(135deg,#fef3c7,#fde68a)}
.a-img5{background:linear-gradient(135deg,#e0f2fe,#bae6fd)}
.a-img6{background:linear-gradient(135deg,#fce7f3,#f9a8d4)}
.article-body{padding:18px 18px 20px}
.art-cat{
  display:inline-flex;align-items:center;gap:4px;
  padding:3px 10px;border-radius:100px;
  font-size:10.5px;font-weight:700;margin-bottom:10px;
}
.article-card h3{font-size:14px;font-weight:800;color:var(--text);margin-bottom:7px;line-height:1.5}
.article-card p{font-size:12px;color:var(--muted);line-height:1.8;margin-bottom:14px}
.art-meta{display:flex;align-items:center;justify-content:space-between;font-size:11px;color:var(--muted)}
.art-read{
  display:flex;align-items:center;gap:4px;
  color:var(--pink);font-weight:700;font-size:11.5px;
  text-decoration:none;transition:gap var(--t);
}
.art-read:hover{gap:7px}

/* ══ CONTACT ══ */
.contact-grid{display:grid;grid-template-columns:1fr 1fr;gap:24px}
.contact-box{
  background:#fff;border:1px solid var(--border);
  border-radius:var(--r2);padding:28px;box-shadow:var(--sh);
}
.contact-box h3{font-size:15px;font-weight:800;color:var(--text);margin-bottom:18px;display:flex;align-items:center;gap:8px}
.contact-row{display:flex;align-items:flex-start;gap:12px;margin-bottom:14px}
.contact-row:last-child{margin-bottom:0}
.c-icon{
  width:38px;height:38px;border-radius:10px;flex-shrink:0;
  background:var(--pinkbg);
  display:flex;align-items:center;justify-content:center;color:var(--pink);
}
.c-txt strong{display:block;font-size:12.5px;font-weight:700;color:var(--text)}
.c-txt span{font-size:12px;color:var(--muted)}

/* emergency */
.emer-box{
  background:linear-gradient(135deg,var(--pink),var(--pink2));
  border-radius:var(--r2);padding:28px;color:#fff;
  display:flex;align-items:center;gap:20px;
  box-shadow:0 8px 30px rgba(219,39,119,.3);
}
.emer-icon{font-size:48px;flex-shrink:0}
.emer-txt h3{font-size:17px;font-weight:900;margin-bottom:5px}
.emer-txt p{font-size:13px;opacity:.85;line-height:1.7}
.emer-num{
  margin-top:12px;padding:8px 20px;
  background:rgba(255,255,255,.2);
  border:1px solid rgba(255,255,255,.3);
  border-radius:8px;display:inline-block;
  font-size:18px;font-weight:900;letter-spacing:1px;
}

/* ══ FOOTER ══ */
footer{
  background:#1e1b2e;padding:28px 44px;
  display:flex;align-items:center;justify-content:space-between;
  flex-wrap:wrap;gap:12px;font-size:12.5px;
  color:rgba(255,255,255,.5);
}
footer strong{color:rgba(255,255,255,.85)}
.ft-heart{color:var(--pink)}

@media(max-width:900px){
  .hero-inner{grid-template-columns:1fr}
  .hero-card{display:none}
  .cnas-wrap,.contact-grid{grid-template-columns:1fr}
}
@media(max-width:640px){
  nav{padding:0 16px}
  .hero{padding:44px 16px}
  .hero h1{font-size:27px}
  .sec{padding:44px 16px}
  .sec-alt{padding:44px 16px}
  .nav-links{display:none}
  footer{padding:20px 16px;flex-direction:column;text-align:center}
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
    <div class="logo-icon">🌸</div>
    <div>
      <span class="logo-name">عاشور زيان</span>
      <span class="logo-sub">قسم الأمومة والطفولة</span>
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
    <li><a href="{{ route('maternite') }}" style="color:var(--pink)">الأمومة والطفولة</a></li>
    <li><a href="{{ route('services') }}">خدماتنا</a></li>
    <li><a href="{{ route('about') }}">نبذة عنا</a></li>
    <li><a href="{{ route('contact') }}">اتصل بنا</a></li>
  </ul>
  <div class="nav-actions">
    <button class="dark-toggle" id="darkToggle">🌙</button>
    <a href="{{ route('login') }}" class="nav-login">تسجيل الدخول</a>
  </div>
</nav>

{{-- HERO --}}
<div class="hero">
  <div class="hero-orb o1"></div>
  <div class="hero-orb o2"></div>
  <div class="hero-inner">
    <div>
      <div class="hero-badge">🌸 قسم الأمومة والطفولة</div>
      <h1>رعاية استثنائية<br>لـ <em>الأم والطفل</em></h1>
      <p>
        قسم متخصص في متابعة الحمل، الولادة الآمنة ورعاية المواليد.<br>
        نوفر لك كل المعلومات عن حقوقك، عطلة الأمومة، وفوائد الضمان الاجتماعي.
      </p>
      <div class="hero-stats">
        <div class="hstat">
          <strong>14</strong>
          <span>أسبوع إجازة أمومة</span>
        </div>
        <div class="hstat">
          <strong>100%</strong>
          <span>من الراتب مدفوع</span>
        </div>
        <div class="hstat">
          <strong>24/7</strong>
          <span>خدمة الطوارئ</span>
        </div>
      </div>
    </div>
    <div class="hero-card">
      <h3>🗓️ ما تحتاجينه عند الولادة</h3>
      <div class="hc-item">
        <div class="hc-dot" style="background:#fce7f3">📋</div>
        <div>
          <h4>شهادة العمل</h4>
          <p>من مصلحة الموارد البشرية تثبت وضعيتك المهنية</p>
        </div>
      </div>
      <div class="hc-item">
        <div class="hc-dot" style="background:#ede9fe">🏥</div>
        <div>
          <h4>شهادة طبية بالحمل</h4>
          <p>من طبيب النساء تحدد تاريخ الولادة المتوقع</p>
        </div>
      </div>
      <div class="hc-item">
        <div class="hc-dot" style="background:#d1fae5">💳</div>
        <div>
          <h4>بطاقة CNAS / CASNOS</h4>
          <p>للاستفادة من التعويضات اليومية كاملة</p>
        </div>
      </div>
      <div class="hc-item">
        <div class="hc-dot" style="background:#fef3c7">📄</div>
        <div>
          <h4>بطاقة التعريف الوطنية</h4>
          <p>نسخة أصلية + نسخة مصورة</p>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- MATERNITY LEAVE --}}
<div class="sec" id="leave">
  <div class="sec-head">
    <h2>عطلة الأمومة في <em>القطاع الصحي</em></h2>
    <p>كل ما تحتاجين معرفته عن حقوقك القانونية كموظفة في القطاع الصحي الجزائري</p>
    <div class="sec-line"></div>
  </div>
  <div class="leave-grid">

    <div class="leave-card">
      <div class="leave-icon">📅</div>
      <h3>مدة عطلة الأمومة</h3>
      <p>تستفيد الموظفة في القطاع الصحي من <strong>14 أسبوعاً</strong> كإجازة أمومة مدفوعة الأجر كاملاً، منها 6 أسابيع قبل الولادة و8 أسابيع بعدها وفق المرسوم 85-59.</p>
      <span class="leave-tag lt-pink">14 أسبوع مدفوعة</span>
    </div>

    <div class="leave-card">
      <div class="leave-icon">💰</div>
      <h3>الراتب خلال الإجازة</h3>
      <p>تحتفظ الموظفة بـ <strong>100% من راتبها</strong> خلال فترة إجازة الأمومة. يتكفل صاحب العمل (المستشفى) بالأجر كاملاً مع الاحتفاظ بجميع الامتيازات.</p>
      <span class="leave-tag lt-green">100% من الراتب</span>
    </div>

    <div class="leave-card">
      <div class="leave-icon">📝</div>
      <h3>إجراءات طلب العطلة</h3>
      <p>تقدمي بطلب خطي لرئيس المصلحة <strong>قبل 15 يوم</strong> من الولادة المتوقعة، مرفوقاً بشهادة طبية من طبيب النساء المعالج.</p>
      <span class="leave-tag lt-blue">15 يوم مسبقاً</span>
    </div>

    <div class="leave-card">
      <div class="leave-icon">👶</div>
      <h3>الولادة المتعددة والمبكرة</h3>
      <p>في حالة التوائم أو الولادة المبكرة، يمكن مد عطلة الأمومة لتصل إلى <strong>18 أسبوعاً</strong>. كذلك في حالة وفاة المولود تمنح إجازة خاصة.</p>
      <span class="leave-tag lt-purple">تمديد ممكن</span>
    </div>

    <div class="leave-card">
      <div class="leave-icon">🍼</div>
      <h3>إجازة الرضاعة الطبيعية</h3>
      <p>بعد العودة للعمل، يحق للأم <strong>ساعة يومياً</strong> للرضاعة الطبيعية لمدة 6 أشهر. هذه الساعة مدفوعة ولا تُخصم من الراتب.</p>
      <span class="leave-tag lt-pink">ساعة يومياً مدفوعة</span>
    </div>

    <div class="leave-card">
      <div class="leave-icon">🔄</div>
      <h3>العودة للعمل</h3>
      <p>عند العودة يحق للأم طلب <strong>تخفيف العبء الوظيفي</strong> لمدة 3 أشهر. المناوبات الليلية ممنوعة قانونياً على الأم المرضعة.</p>
      <span class="leave-tag lt-orange">حماية قانونية</span>
    </div>

  </div>
</div>

{{-- CNAS --}}
<div class="sec-alt" id="cnas">
  <div class="sec-in">
    <div class="sec-head">
      <h2>فوائد <em>CNAS</em> للحوامل والأمهات</h2>
      <p>الاستفادة الكاملة من الضمان الاجتماعي خلال الحمل وبعد الولادة</p>
      <div class="sec-line"></div>
    </div>
    <div class="cnas-wrap">

      <div class="cnas-box">
        <div class="cnas-box-head">
          <div style="font-size:22px">🤰</div>
          <div>
            <h3>خلال فترة الحمل</h3>
            <span>الاستفادات المتاحة من CNAS</span>
          </div>
        </div>
        <div class="cnas-list">
          <div class="cnas-item">
            <div class="cnas-check"><svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cnas-item-txt">
              <strong>تغطية فحوصات الحمل</strong>
              <span>تكفل بـ 80% من تكلفة الكشوفات الطبية والتحاليل</span>
            </div>
          </div>
          <div class="cnas-item">
            <div class="cnas-check"><svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cnas-item-txt">
              <strong>إيكوغرافيا مجانية</strong>
              <span>3 فحوصات إيكو مجانية كاملة خلال الحمل</span>
            </div>
          </div>
          <div class="cnas-item">
            <div class="cnas-check"><svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cnas-item-txt">
              <strong>الأدوية المدعومة</strong>
              <span>فيتامينات الحمل والأدوية الضرورية بسعر مخفض</span>
            </div>
          </div>
          <div class="cnas-item">
            <div class="cnas-check"><svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cnas-item-txt">
              <strong>تعويض الغياب الطبي</strong>
              <span>تعويض يومي عن أيام التوقف الطبي الموصوف</span>
            </div>
          </div>
        </div>
      </div>

      <div class="cnas-box">
        <div class="cnas-box-head">
          <div style="font-size:22px">👶</div>
          <div>
            <h3>بعد الولادة</h3>
            <span>منح ومساعدات ما بعد الوضع</span>
          </div>
        </div>
        <div class="cnas-list">
          <div class="cnas-item">
            <div class="cnas-check"><svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cnas-item-txt">
              <strong>منحة الولادة</strong>
              <span>منحة لمرة واحدة عند كل ولادة تُصرف خلال 3 أشهر</span>
            </div>
          </div>
          <div class="cnas-item">
            <div class="cnas-check"><svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cnas-item-txt">
              <strong>منح الأطفال المعالين</strong>
              <span>منحة شهرية عن كل طفل حتى سن 21 سنة</span>
            </div>
          </div>
          <div class="cnas-item">
            <div class="cnas-check"><svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cnas-item-txt">
              <strong>تغطية صحية للمولود</strong>
              <span>تسجيل المولود تلقائياً في CNAS مع أم أو أب</span>
            </div>
          </div>
          <div class="cnas-item">
            <div class="cnas-check"><svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div class="cnas-item-txt">
              <strong>تعويض التوقف عن العمل</strong>
              <span>14 أسبوع تعويض يومي بمعدل 100% من الأجر</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

{{-- HEALTH TIPS --}}
<div class="sec" id="tips">
  <div class="sec-head">
    <h2>نصائح صحية <em>للحامل</em></h2>
    <p>إرشادات طبية مهمة لحمل صحي وولادة آمنة</p>
    <div class="sec-line"></div>
  </div>
  <div class="tips-grid">
    <div class="tip-card">
      <div class="tip-num">01</div>
      <div>
        <h4>التغذية السليمة</h4>
        <p>تناولي أغذية غنية بحمض الفوليك، الحديد والكالسيوم. تجنبي الأجبان غير المبسترة والأسماك التي تحتوي على زئبق عالي.</p>
      </div>
    </div>
    <div class="tip-card">
      <div class="tip-num">02</div>
      <div>
        <h4>المتابعة الطبية المنتظمة</h4>
        <p>احرصي على حضور جميع مواعيد الكشف الدورية — على الأقل كشف طبي كل شهر في الثلث الأول والثاني، وكل أسبوعين في الثلث الأخير.</p>
      </div>
    </div>
    <div class="tip-card">
      <div class="tip-num">03</div>
      <div>
        <h4>النشاط البدني المعتدل</h4>
        <p>المشي اليومي لـ 30 دقيقة مفيد جداً. تجنبي التمارين الشاقة والرفع الثقيل. يمكن ممارسة اليوغا الخاصة بالحوامل.</p>
      </div>
    </div>
    <div class="tip-card">
      <div class="tip-num">04</div>
      <div>
        <h4>الراحة والنوم الكافي</h4>
        <p>نامي على الجانب الأيسر لتحسين تدفق الدم للجنين. احتاجي لـ 8-9 ساعات نوم يومياً خاصة في الأشهر الأخيرة.</p>
      </div>
    </div>
    <div class="tip-card">
      <div class="tip-num">05</div>
      <div>
        <h4>تجنب المخاطر</h4>
        <p>ابتعدي تماماً عن التدخين والتدخين السلبي، الكحول، والأدوية غير الموصوفة. استشيري الطبيب قبل أي دواء.</p>
      </div>
    </div>
    <div class="tip-card">
      <div class="tip-num">06</div>
      <div>
        <h4>الصحة النفسية</h4>
        <p>القلق طبيعي لكن الضغط الزائد يؤثر على الجنين. تحدثي مع شريك حياتك وعائلتك. لا تترددي في طلب الدعم النفسي.</p>
      </div>
    </div>
    <div class="tip-card">
      <div class="tip-num">07</div>
      <div>
        <h4>التطعيمات الضرورية</h4>
        <p>لقاح الإنفلونزا وlقاح السعال الديكي موصى بهما أثناء الحمل. تحققي من جدول التطعيمات مع طبيبك.</p>
      </div>
    </div>
    <div class="tip-card">
      <div class="tip-num">08</div>
      <div>
        <h4>متى تتصلين بالطوارئ</h4>
        <p>اتصلي فوراً إذا لاحظت نزيف، ألم شديد في البطن، توقف حركة الجنين، أو صداع شديد مفاجئ.</p>
      </div>
    </div>
  </div>
</div>

{{-- ARTICLES --}}
<div class="sec-alt" id="articles">
  <div class="sec-in">
    <div class="sec-head">
      <h2>مقالات <em>توعوية</em></h2>
      <p>معلومات مفيدة للأمهات في كل مراحل الأمومة</p>
      <div class="sec-line"></div>
    </div>
    <div class="articles-grid">

      <div class="article-card">
        <div class="article-img a-img1">🤱</div>
        <div class="article-body">
          <span class="art-cat" style="background:var(--pinkbg);color:var(--pink)">الرضاعة</span>
          <h3>فوائد الرضاعة الطبيعية للأم والمولود</h3>
          <p>الرضاعة الطبيعية تقي الطفل من الأمراض وتعزز المناعة، كما تساعد الأم على التعافي السريع وتقليل خطر سرطان الثدي.</p>
          <div class="art-meta">
            <span>5 دقائق للقراءة</span>
            <a href="#" class="art-read">اقرأي أكثر ←</a>
          </div>
        </div>
      </div>

      <div class="article-card">
        <div class="article-img a-img2">🧠</div>
        <div class="article-body">
          <span class="art-cat" style="background:rgba(139,92,246,.1);color:var(--purple)">صحة نفسية</span>
          <h3>اكتئاب ما بعد الولادة — الأسباب والعلاج</h3>
          <p>1 من 5 أمهات تعاني من اكتئاب ما بعد الولادة. تعرفي على الأعراض المبكرة وكيفية طلب المساعدة دون خجل.</p>
          <div class="art-meta">
            <span>7 دقائق للقراءة</span>
            <a href="#" class="art-read">اقرأي أكثر ←</a>
          </div>
        </div>
      </div>

      <div class="article-card">
        <div class="article-img a-img3">🍎</div>
        <div class="article-body">
          <span class="art-cat" style="background:rgba(5,150,105,.1);color:var(--green)">تغذية</span>
          <h3>التغذية المثالية في الأشهر الثلاثة الأولى</h3>
          <p>الغذاء في الثلث الأول حاسم لنمو الجهاز العصبي للجنين. اكتشفي أهم العناصر الغذائية وأين تجدينها.</p>
          <div class="art-meta">
            <span>6 دقائق للقراءة</span>
            <a href="#" class="art-read">اقرأي أكثر ←</a>
          </div>
        </div>
      </div>

      <div class="article-card">
        <div class="article-img a-img4">⚖️</div>
        <div class="article-body">
          <span class="art-cat" style="background:rgba(245,158,11,.1);color:var(--orange)">حقوق قانونية</span>
          <h3>حقوق المرأة العاملة خلال الحمل في الجزائر</h3>
          <p>القانون الجزائري يحمي الحامل من الفصل التعسفي ويضمن لها كل حقوقها. تعرفي على قانون العمل رقم 90-11.</p>
          <div class="art-meta">
            <span>8 دقائق للقراءة</span>
            <a href="#" class="art-read">اقرأي أكثر ←</a>
          </div>
        </div>
      </div>

      <div class="article-card">
        <div class="article-img a-img5">💧</div>
        <div class="article-body">
          <span class="art-cat" style="background:rgba(14,165,233,.1);color:var(--blue)">صحة الطفل</span>
          <h3>جدول تطعيمات المولود من الولادة حتى السنة الأولى</h3>
          <p>التطعيمات الأساسية في الجزائر مجانية. اطلعي على الجدول الوطني الرسمي للتلقيح وأهمية كل لقاح.</p>
          <div class="art-meta">
            <span>4 دقائق للقراءة</span>
            <a href="#" class="art-read">اقرأي أكثر ←</a>
          </div>
        </div>
      </div>

      <div class="article-card">
        <div class="article-img a-img6">🏥</div>
        <div class="article-body">
          <span class="art-cat" style="background:var(--pinkbg);color:var(--pink)">طوارئ</span>
          <h3>متى تذهبين للطوارئ فوراً؟</h3>
          <p>علامات التحذير التي لا يجب تجاهلها أثناء الحمل — متى تكون الأعراض طبيعية ومتى تستدعي التدخل الفوري.</p>
          <div class="art-meta">
            <span>3 دقائق للقراءة</span>
            <a href="#" class="art-read">اقرأي أكثر ←</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

{{-- CHECKLIST --}}
<div class="sec" id="checklist">
  <div class="sec-head">
    <h2>قائمة تحضير <em>الحقيبة</em></h2>
    <p>كل ما تحتاجينه عند الذهاب للمستشفى — ضعي علامة على كل ما حضّرتِه</p>
    <div class="sec-line"></div>
  </div>

  <div style="max-width:860px;margin:0 auto">

    {{-- Progress --}}
    <div style="background:#fff;border:1px solid var(--border);border-radius:var(--r2);padding:20px 24px;margin-bottom:22px;display:flex;align-items:center;gap:18px;box-shadow:var(--sh)">
      <div style="flex:1">
        <div style="display:flex;justify-content:space-between;margin-bottom:8px">
          <span style="font-size:13px;font-weight:700;color:var(--text)">تقدم التحضير</span>
          <span id="prog-txt" style="font-size:13px;font-weight:800;color:var(--pink)">0 / 0</span>
        </div>
        <div style="height:10px;background:#fce7f3;border-radius:10px;overflow:hidden">
          <div id="prog-bar" style="height:100%;background:linear-gradient(to left,var(--pink),var(--pink2));border-radius:10px;width:0%;transition:width .4s ease"></div>
        </div>
      </div>
      <button onclick="resetAll()" style="flex-shrink:0;padding:8px 16px;background:var(--pinkbg);color:var(--pink);border:1px solid var(--pinkbd);border-radius:8px;font-family:inherit;font-size:12px;font-weight:700;cursor:pointer">إعادة</button>
    </div>

    {{-- Tabs --}}
    <div style="display:flex;gap:8px;margin-bottom:18px;flex-wrap:wrap" id="tabs">
      <button class="ctab active" onclick="showTab('all',this)">الكل</button>
      <button class="ctab" onclick="showTab('docs',this)">📄 وثائق</button>
      <button class="ctab" onclick="showTab('clothes',this)">👗 ملابس</button>
      <button class="ctab" onclick="showTab('baby',this)">👶 للمولود</button>
      <button class="ctab" onclick="showTab('misc',this)">🧴 متفرقات</button>
    </div>

    {{-- Items --}}
    <div id="cl-items" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:12px">

      {{-- DOCS --}}
      <div class="cl-item" data-cat="docs">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">📋</span>
            <div><strong>بطاقة التعريف الوطنية</strong><small>أصل + نسخة مصورة</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="docs">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">🏥</span>
            <div><strong>بطاقة CNAS / CASNOS</strong><small>للاستفادة من التغطية</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="docs">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">📁</span>
            <div><strong>ملف متابعة الحمل</strong><small>جميع نتائج الفحوصات</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="docs">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">🩺</span>
            <div><strong>نتائج التحاليل الأخيرة</strong><small>فصيلة الدم، التحاليل الكاملة</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="docs">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">📸</span>
            <div><strong>صور الإيكوغرافيا</strong><small>آخر 2-3 صور</small></div>
          </div>
        </label>
      </div>

      {{-- CLOTHES --}}
      <div class="cl-item" data-cat="clothes">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">👗</span>
            <div><strong>قميص الولادة</strong><small>فضفاض وسهل الفتح</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="clothes">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">🩱</span>
            <div><strong>ملابس مريحة للإقامة</strong><small>3 بدلات على الأقل</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="clothes">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">🧥</span>
            <div><strong>جلابة أو روب</strong><small>للمشي داخل القسم</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="clothes">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">🩴</span>
            <div><strong>شبشب للمستشفى</strong><small>مريح وسهل الارتداء</small></div>
          </div>
        </label>
      </div>

      {{-- BABY --}}
      <div class="cl-item" data-cat="baby">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">👶</span>
            <div><strong>ملابس المولود</strong><small>3 بدلات صغيرة نظيفة</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="baby">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">🧣</span>
            <div><strong>بطانية المولود</strong><small>ناعمة ودافئة</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="baby">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">🩹</span>
            <div><strong>حفاضات المولود</strong><small>مقاس نيوبورن</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="baby">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">🛁</span>
            <div><strong>مستلزمات العناية</strong><small>قطن، كريم، مناديل</small></div>
          </div>
        </label>
      </div>

      {{-- MISC --}}
      <div class="cl-item" data-cat="misc">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">🧴</span>
            <div><strong>أدوات النظافة الشخصية</strong><small>صابون، شامبو، فرشاة</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="misc">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">📱</span>
            <div><strong>شاحن الهاتف</strong><small>+ بطارية احتياطية</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="misc">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">💊</span>
            <div><strong>الأدوية الموصوفة</strong><small>جميع الأدوية الحالية</small></div>
          </div>
        </label>
      </div>
      <div class="cl-item" data-cat="misc">
        <label class="cl-label">
          <input type="checkbox" class="cl-cb" onchange="updateProgress()">
          <div class="cl-box">
            <span class="cl-ic">💰</span>
            <div><strong>مبلغ مالي احتياطي</strong><small>للمصاريف غير المتوقعة</small></div>
          </div>
        </label>
      </div>

    </div>

    {{-- Done message --}}
    <div id="done-msg" style="display:none;margin-top:22px;background:rgba(5,150,105,.08);border:1px solid rgba(5,150,105,.2);border-radius:var(--r2);padding:18px 22px;text-align:center">
      <div style="font-size:32px;margin-bottom:8px">🎉</div>
      <strong style="color:#059669;font-size:15px">حقيبتك جاهزة 100%!</strong>
      <p style="font-size:12.5px;color:var(--muted);margin-top:4px">كل شيء محضّر — نتمنى لك ولادة آمنة وصحية</p>
    </div>

  </div>
</div>

<style>
.ctab{padding:7px 16px;border-radius:100px;font-family:inherit;font-size:12px;font-weight:700;cursor:pointer;border:1px solid var(--border);background:#fff;color:var(--muted);transition:all .2s}
.ctab:hover{border-color:var(--pinkbd);color:var(--pink)}
.ctab.active{background:linear-gradient(135deg,var(--pink),var(--pink2));color:#fff;border-color:transparent}
.cl-label{cursor:pointer;display:block}
.cl-label input{display:none}
.cl-box{display:flex;align-items:center;gap:12px;background:#fff;border:1.5px solid var(--border);border-radius:var(--r);padding:13px 14px;transition:all .2s}
.cl-box:hover{border-color:var(--pinkbd);box-shadow:var(--sh)}
.cl-label input:checked ~ .cl-box{background:rgba(219,39,119,.04);border-color:var(--pink);position:relative}
.cl-label input:checked ~ .cl-box::after{content:'✓';position:absolute;top:8px;left:10px;width:18px;height:18px;background:linear-gradient(135deg,var(--pink),var(--pink2));color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:900}
.cl-ic{font-size:22px;flex-shrink:0}
.cl-box strong{display:block;font-size:12.5px;font-weight:700;color:var(--text)}
.cl-box small{font-size:11px;color:var(--muted)}
.cl-item{transition:opacity .25s}
.cl-item.hidden{display:none}
</style>

<script>
function updateProgress(){
  const all = document.querySelectorAll('#cl-items .cl-item:not(.hidden) .cl-cb');
  const checked = document.querySelectorAll('#cl-items .cl-item:not(.hidden) .cl-cb:checked');
  const pct = all.length ? Math.round(checked.length/all.length*100) : 0;
  document.getElementById('prog-bar').style.width = pct+'%';
  document.getElementById('prog-txt').textContent = checked.length+' / '+all.length;
  document.getElementById('done-msg').style.display = (pct===100 && all.length>0) ? 'block' : 'none';
}
function showTab(cat,btn){
  document.querySelectorAll('.ctab').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('.cl-item').forEach(item=>{
    item.classList.toggle('hidden', cat!=='all' && item.dataset.cat!==cat);
  });
  updateProgress();
}
function resetAll(){
  document.querySelectorAll('.cl-cb').forEach(cb=>cb.checked=false);
  updateProgress();
}
updateProgress();
</script>

{{-- GALLERY --}}
<div class="sec-alt" id="gallery">
  <div class="sec-in">
    <div class="sec-head">
      <h2>لحظات <em>لا تُنسى</em></h2>
      <p>صور من قسم الأمومة والطفولة</p>
      <div class="sec-line"></div>
    </div>

    <div class="gal-grid">
      <div class="gal-item gal-big">
        <img src="{{ asset('https://i.ibb.co/ymbHBw16/maternite-1.jpg') }}" alt="رعاية الأم والمولود" loading="lazy"
          onerror="this.src='https://placehold.co/800x600/fce7f3/db2777?text=رعاية+الأم'">
        <div class="gal-over"><span>رعاية الأم والمولود</span></div>
      </div>
      <div class="gal-item">
        <img src="{{ asset('https://i.ibb.co/GfQKXPxw/maternite-2.jpg') }}" alt="لحظة الولادة" loading="lazy"
          onerror="this.src='https://placehold.co/600x400/fce7f3/db2777?text=الولادة'">
        <div class="gal-over"><span>لحظة الولادة</span></div>
      </div>
      <div class="gal-item">
        <img src="{{ asset('images/maternite-3.jpg') }}" alt="الرضاعة الطبيعية" loading="lazy"
          onerror="this.src='https://placehold.co/600x400/fce7f3/db2777?text=الرضاعة'">
        <div class="gal-over"><span>الرضاعة الطبيعية</span></div>
      </div>
      <div class="gal-item">
        <img src="{{ asset('https://i.ibb.co/1t4KvN8W/maternite-4.jpg') }}" alt="متابعة الحمل" loading="lazy"
          onerror="this.src='https://placehold.co/600x400/fce7f3/db2777?text=متابعة+الحمل'">
        <div class="gal-over"><span>متابعة الحمل</span></div>
      </div>
      <div class="gal-item">
        <img src="{{ asset('https://i.ibb.co/dXx7Tbq/maternite-5.jpg') }}" alt="الرعاية الطبية" loading="lazy"
          onerror="this.src='https://placehold.co/600x400/fce7f3/db2777?text=الرعاية+الطبية'">
        <div class="gal-over"><span>الرعاية الطبية</span></div>
      </div>
      <div class="gal-item gal-big">
        <img src="{{ asset('https://i.ibb.co/yn7RJSQ1/maternite-6.jpg') }}" alt="لحظات لا تُنسى" loading="lazy"
          onerror="this.src='https://placehold.co/800x600/fce7f3/db2777?text=لحظات+لا+تنسى'">
        <div class="gal-over"><span>لحظات لا تُنسى</span></div>
      </div>
    </div>
  </div>
</div>

<style>
.gal-grid{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  grid-auto-rows:220px;
  gap:14px;
}
.gal-item{
  position:relative;overflow:hidden;
  border-radius:var(--r2);
  box-shadow:var(--sh);
  cursor:pointer;
}
.gal-item.gal-big{grid-row:span 2}
.gal-item img{
  width:100%;height:100%;
  object-fit:cover;
  transition:transform .5s ease;
  display:block;
}
.gal-item:hover img{transform:scale(1.07)}
.gal-over{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(219,39,119,.7),transparent);
  display:flex;align-items:flex-end;padding:16px;
  opacity:0;transition:opacity .3s;
}
.gal-item:hover .gal-over{opacity:1}
.gal-over span{
  color:#fff;font-size:13px;font-weight:700;
}
@media(max-width:700px){
  .gal-grid{grid-template-columns:1fr 1fr;grid-auto-rows:160px}
  .gal-item.gal-big{grid-row:span 1}
}
</style>

{{-- CONTACT --}}
<div class="sec" id="contact">
  <div class="sec-head">
    <h2>تواصلي <em>معنا</em></h2>
    <p>نحن هنا لمساعدتك في أي وقت</p>
    <div class="sec-line"></div>
  </div>
  <div class="contact-grid">
    <div style="display:flex;flex-direction:column;gap:16px">
      <div class="contact-box">
        <h3>📍 معلومات القسم</h3>
        <div class="contact-row">
          <div class="c-icon">
            <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div class="c-txt">
            <strong>الموقع</strong>
            <span>مستشفى عاشور زيان، أولاد جلال — بسكرة</span>
          </div>
        </div>
        <div class="contact-row">
          <div class="c-icon">
            <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div class="c-txt">
            <strong>ساعات الاستقبال</strong>
            <span>الأحد إلى الخميس: 08:00 — 16:00</span>
          </div>
        </div>
        <div class="contact-row">
          <div class="c-icon">
            <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div class="c-txt">
            <strong>البريد الإلكتروني</strong>
            <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dfb2beabbaadb1b6abba9fb7b0afb6abbeb3f2b0aab3babbf2bbb5bab3b3beb3f1bba5">[email&#160;protected]</a></span>
          </div>
        </div>
      </div>
    </div>

    <div class="emer-box">
      <div class="emer-icon">🚨</div>
      <div class="emer-txt">
        <h3>طوارئ الأمومة — 24/7</h3>
        <p>في حالة أي طارئ يتعلق بالحمل أو الولادة، اتصلي فوراً بقسم الطوارئ المتاح على مدار الساعة طوال أيام الأسبوع.</p>
        <div class="emer-num">☎ 043 XX XX XX</div>
      </div>
    </div>
  </div>
</div>

<footer>
  <span>© {{ date('Y') }} <strong>مستشفى عاشور زيان</strong> — قسم الأمومة والطفولة — أولاد جلال، بسكرة</span>
  <span style="display:flex;align-items:center;gap:4px">صُنع بـ <span class="ft-heart">❤</span> لخدمتكم</span>
</footer>

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