<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>خدمات المستشفى | عاشور زيان</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
<style>

:root {
  --teal-deep: #0b3c49;
  --teal-mid: #0f4c5c;
  --teal-light: #1a7a8a;
  --teal-glow: #2aa6b8;
  --gold: #ffd166;
  --text-dark: #1a2e35;
  --text-muted: #4a6572;
  --card-bg: #ffffff;
  --body-bg: #f0f6f8;
  --shadow: 0 8px 32px rgba(11,60,73,0.12);
  --shadow-lg: 0 20px 60px rgba(11,60,73,0.2);
  --radius: 18px;
  --radius-sm: 10px;
  --transition: all 0.35s cubic-bezier(0.4,0,0.2,1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }

body {
  font-family: 'Cairo', sans-serif;
  background: var(--body-bg);
  color: var(--text-dark);
  overflow-x: hidden;
}

::-webkit-scrollbar { width: 5px; }
::-webkit-scrollbar-track { background: var(--teal-deep); }
::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 3px; }

/* ===== TOP BAR ===== */
.top-bar {
  background: linear-gradient(90deg, #071e26, #0b3c49);
  padding: 7px 48px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 11.5px;
  color: rgba(255,255,255,0.7);
  border-bottom: 2px solid var(--gold);
}
.top-bar strong { color: var(--gold); }
.pulse-wrap { display: flex; align-items: center; gap: 7px; }
.pulse-dot {
  width: 7px; height: 7px; background: #ef4444;
  border-radius: 50%; animation: pulse 1.5s infinite;
}
@keyframes  pulse {
  0%,100% { box-shadow: 0 0 0 0 rgba(239,68,68,0.6); }
  50% { box-shadow: 0 0 0 5px rgba(239,68,68,0); }
}

/* ===== NAVBAR ===== */
.navbar {
  background: rgba(255,255,255,0.97);
  backdrop-filter: blur(16px);
  padding: 0 48px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 66px;
  position: sticky;
  top: 0;
  z-index: 999;
  box-shadow: 0 2px 18px rgba(11,60,73,0.1);
  border-bottom: 1px solid rgba(11,60,73,0.07);
}
.nav-logo {
  display: flex; align-items: center; gap: 10px;
  text-decoration: none;
}
.nav-logo-icon {
  width: 40px; height: 40px;
  background: linear-gradient(135deg, var(--teal-mid), var(--teal-light));
  border-radius: 11px;
  display: flex; align-items: center; justify-content: center;
  font-size: 19px;
  box-shadow: 0 3px 10px rgba(15,76,92,0.25);
}
.nav-logo-name {
  font-size: 13.5px; font-weight: 700; color: var(--teal-deep);
}
.nav-logo-sub {
  font-size: 10px; color: var(--text-muted); display: block;
}
.nav-links {
  list-style: none; display: flex; gap: 2px; align-items: center;
}
.nav-links a {
  text-decoration: none; color: var(--text-dark);
  font-size: 12.5px; font-weight: 500;
  padding: 7px 11px; border-radius: var(--radius-sm);
  transition: var(--transition); white-space: nowrap;
}
.nav-links a:hover { background: rgba(15,76,92,0.07); color: var(--teal-mid); }
.nav-links a.active {
  background: var(--teal-mid); color: #fff;
  box-shadow: 0 3px 10px rgba(15,76,92,0.25);
}

/* ===== HERO ===== */
.hero {
  position: relative;
  height: 420px;
  overflow: hidden;
  display: flex; align-items: center; justify-content: flex-end;
}
.hero-bg {
  position: absolute; inset: 0;
  background-image: url("https://images.unsplash.com/photo-1581595219315-a187dd40c322?w=1600&q=80");
  background-size: cover; background-position: center;
  transform: scale(1.04);
  animation: zoomOut 8s ease forwards;
}
@keyframes  zoomOut {
  from { transform: scale(1.04); }
  to { transform: scale(1); }
}
.hero-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(7,30,38,0.88) 0%, rgba(11,60,73,0.65) 55%, rgba(15,76,92,0.25) 100%);
}
.hero-content {
  position: relative; z-index: 2;
  padding: 0 80px; text-align: right;
  max-width: 620px;
}
.hero-badge {
  display: inline-flex; align-items: center; gap: 7px;
  background: var(--gold); color: var(--teal-deep);
  font-size: 11px; font-weight: 700; letter-spacing: 1px;
  padding: 5px 14px; border-radius: 20px;
  margin-bottom: 18px;
  animation: fadeDown 0.7s ease both;
}
.hero-title {
  font-family: 'Amiri', serif;
  font-size: clamp(32px, 4.5vw, 54px);
  font-weight: 700; color: #fff;
  line-height: 1.25; margin-bottom: 14px;
  animation: fadeRight 0.9s ease 0.15s both;
}
.hero-title span { color: var(--gold); }
.hero-sub {
  font-size: 15px; color: rgba(255,255,255,0.75);
  line-height: 1.8; margin-bottom: 28px;
  animation: fadeRight 0.9s ease 0.3s both;
}
.hero-pills {
  display: flex; gap: 10px; flex-wrap: wrap;
  animation: fadeUp 0.9s ease 0.45s both;
}
.hero-pill {
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.2);
  color: #fff; font-size: 12px;
  padding: 6px 14px; border-radius: 20px;
  backdrop-filter: blur(6px);
  display: flex; align-items: center; gap: 6px;
}

/* Breadcrumb */
.breadcrumb-bar {
  background: var(--teal-deep);
  padding: 12px 48px;
  display: flex; align-items: center; gap: 8px;
  font-size: 12px; color: rgba(255,255,255,0.5);
}
.breadcrumb-bar a { color: var(--gold); text-decoration: none; transition: var(--transition); }
.breadcrumb-bar a:hover { color: #fff; }
.breadcrumb-bar span { color: rgba(255,255,255,0.3); }

/* ===== STATS ===== */
.stats-band {
  background: linear-gradient(90deg, var(--teal-mid), var(--teal-deep));
}
.stats-inner {
  max-width: 1100px; margin: auto;
  display: grid; grid-template-columns: repeat(4,1fr);
}
.stat-box {
  padding: 26px 16px; text-align: center;
  border-left: 1px solid rgba(255,255,255,0.08);
  transition: var(--transition);
}
.stat-box:last-child { border-left: none; }
.stat-box:hover { background: rgba(255,255,255,0.04); }
.stat-num {
  font-size: 34px; font-weight: 900;
  color: var(--gold); line-height: 1;
  margin-bottom: 4px;
}
.stat-lbl { font-size: 11.5px; color: rgba(255,255,255,0.6); }

/* ===== SECTION HEADER ===== */
.sec-header { text-align: center; margin-bottom: 52px; }
.sec-eyebrow {
  display: inline-block;
  font-size: 11px; font-weight: 700; letter-spacing: 2px;
  text-transform: uppercase; color: var(--teal-light);
  background: rgba(15,76,92,0.08);
  padding: 5px 16px; border-radius: 20px; margin-bottom: 13px;
}
.sec-title {
  font-family: 'Amiri', serif;
  font-size: clamp(24px, 3.5vw, 38px);
  color: var(--teal-deep); line-height: 1.25; margin-bottom: 12px;
}
.sec-desc { font-size: 14px; color: var(--text-muted); max-width: 520px; margin: 0 auto; line-height: 1.8; }
.sec-line {
  width: 56px; height: 3px; margin: 14px auto 0;
  background: linear-gradient(90deg, var(--gold), var(--teal-light));
  border-radius: 2px;
}

/* ===== MAIN SERVICES ===== */
.services-section { padding: 80px 48px; }
.services-inner { max-width: 1100px; margin: auto; }
.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px,1fr));
  gap: 26px;
}

.service-card {
  background: var(--card-bg);
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--shadow);
  border: 1px solid rgba(15,76,92,0.06);
  transition: var(--transition);
  position: relative;
  cursor: pointer;
}
.service-card::after {
  content: '';
  position: absolute; top: 0; right: 0; left: 0; height: 4px;
  background: linear-gradient(90deg, var(--teal-light), var(--gold));
  transform: scaleX(0); transform-origin: right;
  transition: var(--transition);
}
.service-card:hover::after { transform: scaleX(1); }
.service-card:hover {
  transform: translateY(-7px);
  box-shadow: var(--shadow-lg);
}

.card-img-wrap {
  position: relative; height: 210px; overflow: hidden;
}
.card-img-wrap img {
  width: 100%; height: 100%; object-fit: cover;
  transition: transform 0.6s ease;
}
.service-card:hover .card-img-wrap img { transform: scale(1.07); }
.card-img-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(0deg, rgba(7,30,38,0.55) 0%, transparent 55%);
}
.card-badge {
  position: absolute; top: 14px; right: 14px;
  background: rgba(7,30,38,0.75);
  backdrop-filter: blur(8px);
  color: var(--gold); font-size: 10px; font-weight: 700;
  letter-spacing: 0.8px; text-transform: uppercase;
  padding: 4px 11px; border-radius: 20px;
  border: 1px solid rgba(255,209,102,0.3);
}

.card-body { padding: 20px 22px 16px; }
.card-icon-row {
  display: flex; align-items: center; gap: 12px; margin-bottom: 12px;
}
.card-icon {
  width: 46px; height: 46px; min-width: 46px;
  background: linear-gradient(135deg, var(--teal-mid), var(--teal-light));
  border-radius: 13px;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
  box-shadow: 0 4px 14px rgba(15,76,92,0.22);
}
.card-title {
  font-size: 17px; font-weight: 700; color: var(--teal-deep);
}
.card-text {
  font-size: 13px; color: var(--text-muted); line-height: 1.75;
  margin-bottom: 16px;
}
.card-features {
  display: flex; flex-direction: column; gap: 6px;
  margin-bottom: 18px;
}
.card-feat {
  display: flex; align-items: center; gap: 8px;
  font-size: 12px; color: var(--text-muted);
}
.card-feat::before {
  content: '✓';
  width: 18px; height: 18px; min-width: 18px;
  background: rgba(15,76,92,0.08);
  color: var(--teal-light);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 10px; font-weight: 700;
}
.card-footer {
  padding: 12px 22px;
  border-top: 1px solid rgba(15,76,92,0.06);
  display: flex; align-items: center; justify-content: space-between;
}
.card-link {
  font-size: 12.5px; font-weight: 600; color: var(--teal-light);
  text-decoration: none; display: flex; align-items: center; gap: 6px;
  transition: var(--transition);
}
.card-link:hover { color: var(--gold); gap: 10px; }
.card-avail {
  font-size: 11px; color: #22c55e; font-weight: 600;
  display: flex; align-items: center; gap: 5px;
}
.card-avail::before {
  content: '';
  width: 7px; height: 7px; background: #22c55e;
  border-radius: 50%; display: block;
}

/* ===== FEATURED ROW (wide card) ===== */
.featured-section { padding: 0 48px 80px; }
.featured-inner { max-width: 1100px; margin: auto; }
.featured-card {
  background: linear-gradient(135deg, var(--teal-deep), var(--teal-mid));
  border-radius: var(--radius);
  overflow: hidden;
  display: grid; grid-template-columns: 1fr 1fr;
  box-shadow: var(--shadow-lg);
  position: relative;
}
.featured-card::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(circle at 30% 50%, rgba(255,209,102,0.06), transparent 60%);
  pointer-events: none;
}
.featured-text { padding: 52px 48px; position: relative; z-index: 1; }
.featured-eyebrow {
  display: inline-block; font-size: 10.5px; font-weight: 700;
  letter-spacing: 1.5px; text-transform: uppercase;
  color: var(--gold); background: rgba(255,209,102,0.1);
  padding: 4px 14px; border-radius: 20px; margin-bottom: 18px;
}
.featured-title {
  font-family: 'Amiri', serif;
  font-size: clamp(24px, 3vw, 36px);
  color: #fff; line-height: 1.3; margin-bottom: 14px;
}
.featured-title span { color: var(--gold); }
.featured-desc {
  font-size: 14px; color: rgba(255,255,255,0.7);
  line-height: 1.85; margin-bottom: 28px;
}
.featured-list {
  list-style: none; display: flex; flex-direction: column; gap: 10px;
  margin-bottom: 32px;
}
.featured-list li {
  display: flex; align-items: center; gap: 10px;
  font-size: 13px; color: rgba(255,255,255,0.8);
}
.featured-list li::before {
  content: '●';
  color: var(--gold); font-size: 8px;
}
.btn-gold {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--gold); color: var(--teal-deep);
  font-family: 'Cairo', sans-serif;
  font-size: 13px; font-weight: 700;
  padding: 12px 26px; border-radius: var(--radius-sm);
  text-decoration: none; transition: var(--transition);
  box-shadow: 0 4px 16px rgba(255,209,102,0.35);
}
.btn-gold:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(255,209,102,0.5); }
.featured-img {
  position: relative; overflow: hidden;
}
.featured-img img {
  width: 100%; height: 100%; object-fit: cover;
  opacity: 0.7; transition: transform 0.6s ease;
}
.featured-card:hover .featured-img img { transform: scale(1.04); }

/* ===== WHY US ===== */
.why-section {
  background: linear-gradient(135deg, #e4f0f4, #d4eaf0);
  padding: 80px 48px;
}
.why-inner { max-width: 1100px; margin: auto; }
.why-grid {
  display: grid; grid-template-columns: repeat(auto-fill, minmax(240px,1fr));
  gap: 22px;
}
.why-card {
  background: rgba(255,255,255,0.85);
  border-radius: var(--radius);
  padding: 30px 24px; text-align: center;
  box-shadow: var(--shadow);
  border: 1px solid rgba(255,255,255,0.7);
  transition: var(--transition);
}
.why-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
.why-icon {
  width: 64px; height: 64px; margin: 0 auto 16px;
  background: linear-gradient(135deg, var(--teal-mid), var(--teal-light));
  border-radius: 18px;
  display: flex; align-items: center; justify-content: center;
  font-size: 28px;
  box-shadow: 0 6px 20px rgba(15,76,92,0.22);
}
.why-title { font-size: 15px; font-weight: 700; color: var(--teal-deep); margin-bottom: 8px; }
.why-text { font-size: 12.5px; color: var(--text-muted); line-height: 1.7; }

/* ===== CTA ===== */
.cta-section {
  background: var(--body-bg);
  padding: 80px 48px;
}
.cta-inner {
  max-width: 700px; margin: auto; text-align: center;
}
.cta-title {
  font-family: 'Amiri', serif;
  font-size: clamp(26px, 3.5vw, 40px);
  color: var(--teal-deep); margin-bottom: 14px;
}
.cta-sub { font-size: 14px; color: var(--text-muted); line-height: 1.8; margin-bottom: 32px; }
.cta-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
.btn-teal {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--teal-mid); color: #fff;
  font-family: 'Cairo', sans-serif; font-size: 13px; font-weight: 700;
  padding: 13px 28px; border-radius: var(--radius-sm);
  text-decoration: none; transition: var(--transition);
  box-shadow: 0 4px 16px rgba(15,76,92,0.25);
}
.btn-teal:hover { transform: translateY(-2px); background: var(--teal-deep); }
.btn-outline-teal {
  display: inline-flex; align-items: center; gap: 8px;
  border: 2px solid var(--teal-mid); color: var(--teal-mid);
  font-family: 'Cairo', sans-serif; font-size: 13px; font-weight: 700;
  padding: 11px 26px; border-radius: var(--radius-sm);
  text-decoration: none; transition: var(--transition);
  background: transparent;
}
.btn-outline-teal:hover { background: var(--teal-mid); color: #fff; }

/* ===== FOOTER ===== */
footer {
  background: linear-gradient(135deg, #071e26, #0b3c49);
  padding: 50px 48px 0;
}
.footer-inner {
  max-width: 1100px; margin: auto;
  display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 40px;
  padding-bottom: 36px;
  border-bottom: 1px solid rgba(255,255,255,0.07);
}
.footer-brand-name { font-size: 15px; font-weight: 700; color: var(--gold); margin-bottom: 10px; }
.footer-brand p { font-size: 13px; color: rgba(255,255,255,0.45); line-height: 1.8; }
.footer-col h4 {
  font-size: 12.5px; font-weight: 700; color: var(--gold);
  margin-bottom: 16px; padding-bottom: 9px;
  border-bottom: 1px solid rgba(255,209,102,0.2);
}
.footer-links { list-style: none; }
.footer-links li { margin-bottom: 9px; }
.footer-links a {
  color: rgba(255,255,255,0.45); font-size: 12.5px;
  text-decoration: none; transition: var(--transition);
  display: flex; align-items: center; gap: 7px;
}
.footer-links a::before { content: '›'; color: var(--gold); }
.footer-links a:hover { color: var(--gold); padding-right: 4px; }
.footer-contact p {
  display: flex; align-items: flex-start; gap: 8px;
  font-size: 12.5px; color: rgba(255,255,255,0.45);
  margin-bottom: 10px; line-height: 1.6;
}
.footer-bottom {
  max-width: 1100px; margin: 0 auto;
  padding: 16px 0; font-size: 11.5px;
  color: rgba(255,255,255,0.3);
  display: flex; justify-content: space-between; align-items: center;
}
.footer-bottom span { color: var(--gold); }

/* ===== BACK TOP ===== */
#backTop {
  position: fixed; bottom: 26px; left: 26px; z-index: 500;
  width: 42px; height: 42px;
  background: var(--teal-mid); color: var(--gold);
  border: none; border-radius: 11px; font-size: 18px; cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  box-shadow: 0 4px 16px rgba(11,60,73,0.35);
  opacity: 0; transform: translateY(8px); transition: var(--transition);
}
#backTop.show { opacity: 1; transform: translateY(0); }
#backTop:hover { background: var(--gold); color: var(--teal-deep); }

/* ===== ANIMATIONS ===== */
.reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.65s ease, transform 0.65s ease; }
.reveal.visible { opacity: 1; transform: translateY(0); }
@keyframes  fadeDown { from { opacity:0; transform:translateY(-16px); } to { opacity:1; transform:translateY(0); } }
@keyframes  fadeRight { from { opacity:0; transform:translateX(24px); } to { opacity:1; transform:translateX(0); } }
@keyframes  fadeUp { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }

/* ===== RESPONSIVE ===== */
@media(max-width:900px) {
  .navbar, .top-bar, .breadcrumb-bar,
  .services-section, .featured-section, .why-section, .cta-section { padding-left: 20px; padding-right: 20px; }
  .hero-content { padding: 0 24px; }
  .featured-card { grid-template-columns: 1fr; }
  .featured-img { height: 220px; }
  .stats-inner { grid-template-columns: repeat(2,1fr); }
  .footer-inner { grid-template-columns: 1fr; }
  footer { padding: 36px 20px 0; }
}

</style>
</head>
<body>

<!-- TOP BAR -->
<div class="top-bar">
  <div class="pulse-wrap">
    <div class="pulse-dot"></div>
    <span>خدمة الطوارئ متاحة <strong>24/24</strong></span>
  </div>
  <span>📞 <strong>014 25 36 78</strong> &nbsp;|&nbsp; 📍 أولاد جلال، الجزائر</span>
</div>

<!-- NAVBAR -->
<nav class="navbar">
  <a href="<?php echo e(route('home')); ?>" class="nav-logo">
    <div class="nav-logo-icon">🏥</div>
    <div>
      <span class="nav-logo-name">عاشور زيان</span>
      <span class="nav-logo-sub">المؤسسة العمومية الاستشفائية</span>
    </div>
  </a>
  <ul class="nav-links">
    <li><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
    <li><a href="<?php echo e(route('services')); ?>" class="active">الخدمات</a></li>
    <li><a href="<?php echo e(route('maternite')); ?>">الأمومة</a></li>
    <li><a href="<?php echo e(route('about')); ?>">نبذة عنا</a></li>
    <li><a href="<?php echo e(route('contact')); ?>">اتصل بنا</a></li>
  </ul>
</nav>

<!-- BREADCRUMB -->
<div class="breadcrumb-bar">
  <a href="<?php echo e(route('home')); ?>">🏠 الرئيسية</a>
  <span>›</span>
  <span style="color:var(--gold)">الخدمات الطبية</span>
</div>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <div class="hero-badge">🏅 خدمات طبية معتمدة</div>
    <h1 class="hero-title">خدماتنا الطبية<br><span>المتكاملة والمتخصصة</span></h1>
    <p class="hero-sub">نقدم باقة شاملة من الخدمات الصحية بأيدٍ طبية متخصصة وتجهيزات حديثة لضمان أفضل رعاية لكم.</p>
    <div class="hero-pills">
      <div class="hero-pill">🚑 طوارئ 24/24</div>
      <div class="hero-pill">🔬 تحاليل متطورة</div>
      <div class="hero-pill">👶 رعاية الأمومة</div>
      <div class="hero-pill">🦴 جراحة العظام</div>
    </div>
  </div>
</section>

<!-- STATS -->
<div class="stats-band">
  <div class="stats-inner">
    <div class="stat-box reveal">
      <div class="stat-num" data-target="8">0</div>
      <div class="stat-lbl">خدمات طبية رئيسية</div>
    </div>
    <div class="stat-box reveal">
      <div class="stat-num" data-target="45">0</div>
      <div class="stat-lbl">طبيب متخصص</div>
    </div>
    <div class="stat-box reveal">
      <div class="stat-num" data-target="15000">0</div>
      <div class="stat-lbl">مريض استفاد</div>
    </div>
    <div class="stat-box reveal">
      <div class="stat-num" data-target="24">0</div>
      <div class="stat-lbl">ساعة خدمة متواصلة</div>
    </div>
  </div>
</div>

<!-- SERVICES GRID -->
<section class="services-section">
  <div class="services-inner">
    <div class="sec-header reveal">
      <span class="sec-eyebrow">ما نقدمه</span>
      <h2 class="sec-title">الخدمات الطبية المتوفرة</h2>
      <p class="sec-desc">نوفر مجموعة واسعة من التخصصات الطبية تحت سقف واحد لراحتكم وصحتكم.</p>
      <div class="sec-line"></div>
    </div>

    <div class="services-grid">

      <!-- بطاقة 1 -->
      <div class="service-card reveal">
        <div class="card-img-wrap">
          <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&q=80" alt="الأمومة">
          <div class="card-img-overlay"></div>
          <span class="card-badge">🕐 متاح يومياً</span>
        </div>
        <div class="card-body">
          <div class="card-icon-row">
            <div class="card-icon">👶</div>
            <div class="card-title">قسم الأمومة والولادة</div>
          </div>
          <p class="card-text">رعاية طبية متكاملة للمرأة الحامل قبل وأثناء وبعد الولادة بأيدٍ نسائية متخصصة.</p>
          <div class="card-features">
            <span class="card-feat">متابعة الحمل الكاملة</span>
            <span class="card-feat">غرف ولادة مجهزة</span>
            <span class="card-feat">رعاية ما بعد الولادة</span>
          </div>
        </div>
        <div class="card-footer">
          <a href="<?php echo e(route('maternite')); ?>" class="card-link">اكتشف القسم ◄</a>
          <span class="card-avail">متاح الآن</span>
        </div>
      </div>

      <!-- بطاقة 2 -->
      <div class="service-card reveal">
        <div class="card-img-wrap">
          <img src="https://images.unsplash.com/photo-1581595219315-a187dd40c322?w=600&q=80" alt="الأطفال">
          <div class="card-img-overlay"></div>
          <span class="card-badge">👨‍⚕️ متخصص</span>
        </div>
        <div class="card-body">
          <div class="card-icon-row">
            <div class="card-icon">🧒</div>
            <div class="card-title">طب الأطفال</div>
          </div>
          <p class="card-text">متابعة صحة الأطفال وتشخيص الأمراض وتقديم الرعاية الصحية اللازمة بلطف واحترافية.</p>
          <div class="card-features">
            <span class="card-feat">فحص دوري شامل</span>
            <span class="card-feat">تطعيمات واللقاحات</span>
            <span class="card-feat">متابعة النمو والتطور</span>
          </div>
        </div>
        <div class="card-footer">
          <a href="#" class="card-link">اكتشف القسم ◄</a>
          <span class="card-avail">متاح الآن</span>
        </div>
      </div>

      <!-- بطاقة 3 -->
      <div class="service-card reveal">
        <div class="card-img-wrap">
          <img src="<?php echo e(asset('images/482027355_9703889418.jpg')); ?>" alt="الطوارئ">
          <div class="card-img-overlay"></div>
          <span class="card-badge">🚨 24/24</span>
        </div>
        <div class="card-body">
          <div class="card-icon-row">
            <div class="card-icon">🚑</div>
            <div class="card-title">قسم الطوارئ</div>
          </div>
          <p class="card-text">استقبال الحالات المستعجلة والطارئة على مدار 24 ساعة بفريق طبي جاهز للتدخل الفوري.</p>
          <div class="card-features">
            <span class="card-feat">تدخل سريع وفوري</span>
            <span class="card-feat">أجهزة إنعاش حديثة</span>
            <span class="card-feat">مراقبة مستمرة</span>
          </div>
        </div>
        <div class="card-footer">
          <a href="#" class="card-link">اكتشف القسم ◄</a>
          <span class="card-avail">متاح 24/24</span>
        </div>
      </div>

      <!-- بطاقة 4 -->
      <div class="service-card reveal">
        <div class="card-img-wrap">
          <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=600&q=80" alt="التحاليل">
          <div class="card-img-overlay"></div>
          <span class="card-badge">🔬 دقيق وسريع</span>
        </div>
        <div class="card-body">
          <div class="card-icon-row">
            <div class="card-icon">🧪</div>
            <div class="card-title">التحاليل الطبية</div>
          </div>
          <p class="card-text">إجراء مختلف التحاليل المخبرية الدقيقة لتشخيص الأمراض واتخاذ القرار العلاجي الصحيح.</p>
          <div class="card-features">
            <span class="card-feat">تحاليل دم شاملة</span>
            <span class="card-feat">تحاليل بولية وجرثومية</span>
            <span class="card-feat">نتائج سريعة ودقيقة</span>
          </div>
        </div>
        <div class="card-footer">
          <a href="#" class="card-link">اكتشف القسم ◄</a>
          <span class="card-avail">متاح الآن</span>
        </div>
      </div>

      <!-- بطاقة 5 -->
      <div class="service-card reveal">
        <div class="card-img-wrap">
          <img src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?w=600&q=80" alt="جراحة">
          <div class="card-img-overlay"></div>
          <span class="card-badge">⚕️ جراحة</span>
        </div>
        <div class="card-body">
          <div class="card-icon-row">
            <div class="card-icon">🔪</div>
            <div class="card-title">الجراحة العامة</div>
          </div>
          <p class="card-text">عمليات جراحية متطورة بأحدث التقنيات الطبية وفريق جراحي خبير في مختلف التخصصات.</p>
          <div class="card-features">
            <span class="card-feat">غرف عمليات معقمة</span>
            <span class="card-feat">تخدير متخصص</span>
            <span class="card-feat">متابعة ما بعد العملية</span>
          </div>
        </div>
        <div class="card-footer">
          <a href="<?php echo e(route('surgery.women')); ?>" class="card-link">اكتشف القسم ◄</a>
          <span class="card-avail">متاح الآن</span>
        </div>
      </div>

      <!-- بطاقة 6 -->
      <div class="service-card reveal">
        <div class="card-img-wrap">
          <img src="https://images.unsplash.com/photo-1530026405186-ed1f139313f8?w=600&q=80" alt="أشعة">
          <div class="card-img-overlay"></div>
          <span class="card-badge">☢ تشخيص</span>
        </div>
        <div class="card-body">
          <div class="card-icon-row">
            <div class="card-icon">🩻</div>
            <div class="card-title">الأشعة والتصوير الطبي</div>
          </div>
          <p class="card-text">خدمات تصوير طبي متكاملة بأجهزة حديثة لتشخيص دقيق وسريع لمختلف الحالات الطبية.</p>
          <div class="card-features">
            <span class="card-feat">أشعة سينية رقمية</span>
            <span class="card-feat">سكنر وصدى</span>
            <span class="card-feat">نتائج فورية</span>
          </div>
        </div>
        <div class="card-footer">
          <a href="#" class="card-link">اكتشف القسم ◄</a>
          <span class="card-avail">متاح الآن</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- FEATURED - طوارئ كارد كبير -->
<section class="featured-section">
  <div class="featured-inner reveal">
    <div class="featured-card">
      <div class="featured-text">
        <span class="featured-eyebrow">🚨 خدمة مميزة</span>
        <h2 class="featured-title">قسم الطوارئ<br><span>جاهز على مدار الساعة</span></h2>
        <p class="featured-desc">فريق طبي متكامل يعمل 24/24 لاستقبال جميع الحالات الطارئة والمستعجلة. نضمن التدخل الفوري وتقديم الإسعافات اللازمة بأسرع وقت ممكن.</p>
        <ul class="featured-list">
          <li>طاقم طبي وتمريضي متخصص</li>
          <li>أجهزة إنعاش وعناية مركزة حديثة</li>
          <li>غرف عزل وعلاج متخصصة</li>
          <li>استقبال مباشر دون موعد مسبق</li>
        </ul>
        <a href="tel:014253678" class="btn-gold">📞 اتصل الآن: 014 25 36 78</a>
      </div>
      <div class="featured-img">
        <img src="https://images.unsplash.com/photo-1551190822-a9333d879b1f?w=800&q=80" alt="طوارئ">
      </div>
    </div>
  </div>
</section>

<!-- WHY US -->
<section class="why-section">
  <div class="why-inner">
    <div class="sec-header reveal">
      <span class="sec-eyebrow">لماذا نحن</span>
      <h2 class="sec-title">مزايا خدماتنا</h2>
      <div class="sec-line"></div>
    </div>
    <div class="why-grid">
      <div class="why-card reveal">
        <div class="why-icon">🏆</div>
        <div class="why-title">جودة معتمدة</div>
        <p class="why-text">نلتزم بأعلى معايير الجودة الطبية لضمان سلامة وراحة كل مريض.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-icon">👨‍⚕️</div>
        <div class="why-title">أطباء متخصصون</div>
        <p class="why-text">كادر طبي ذو خبرة عالية ومتخصص في مختلف المجالات الطبية.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-icon">⚡</div>
        <div class="why-title">استجابة فورية</div>
        <p class="why-text">تدخل سريع وفعال في جميع الحالات الطارئة على مدار الساعة.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-icon">🔬</div>
        <div class="why-title">تجهيزات حديثة</div>
        <p class="why-text">أحدث الأجهزة والمعدات الطبية لتشخيص وعلاج دقيق وفعال.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="cta-inner reveal">
    <h2 class="cta-title">هل تحتاج إلى موعد طبي؟</h2>
    <p class="cta-sub">تواصل معنا الآن لحجز موعدك مع أحد أطبائنا المتخصصين. فريقنا جاهز لخدمتكم.</p>
    <div class="cta-btns">
      <a href="<?php echo e(route('contact')); ?>" class="btn-teal">📅 احجز موعدك الآن</a>
      <a href="tel:014253678" class="btn-outline-teal">📞 اتصل بنا مباشرة</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="footer-brand-name">🏥 عاشور زيان</div>
      <p>المؤسسة العمومية الاستشفائية عاشور زيان — رعاية صحية متكاملة لسكان أولاد جلال والمناطق المجاورة.</p>
    </div>
    <div class="footer-col">
      <h4>روابط سريعة</h4>
      <ul class="footer-links">
        <li><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
        <li><a href="<?php echo e(route('services')); ?>">الخدمات</a></li>
        <li><a href="<?php echo e(route('maternite')); ?>">الأمومة</a></li>
        <li><a href="<?php echo e(route('about')); ?>">نبذة عنا</a></li>
        <li><a href="<?php echo e(route('contact')); ?>">اتصل بنا</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>تواصل معنا</h4>
      <div class="footer-contact">
        <p>📍 أولاد جلال، ولاية بسكرة</p>
        <p>📞 014 25 36 78</p>
        <p>🚑 طوارئ: 24/24</p>
        <p>⏰ 08:00 – 20:00</p>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 <span>عاشور زيان</span> — جميع الحقوق محفوظة</span>
    <span>صُمم بـ ❤️ لصحة مجتمعنا</span>
  </div>
</footer>

<button id="backTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">▲</button>

<script>
// REVEAL ON SCROLL
const revEls = document.querySelectorAll('.reveal');
const revObs = new IntersectionObserver(entries => {
  entries.forEach((e, i) => {
    if (e.isIntersecting) {
      setTimeout(() => e.target.classList.add('visible'), i * 70);
      revObs.unobserve(e.target);
    }
  });
}, { threshold: 0.1 });
revEls.forEach(el => revObs.observe(el));

// COUNT UP
const counters = document.querySelectorAll('.stat-num[data-target]');
const cntObs = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (!e.isIntersecting) return;
    const target = +e.target.dataset.target;
    let cur = 0;
    const step = target / 55;
    const t = setInterval(() => {
      cur = Math.min(cur + step, target);
      e.target.textContent = Math.floor(cur).toLocaleString('ar-DZ');
      if (cur >= target) {
        e.target.textContent = target.toLocaleString('ar-DZ') + (target >= 1000 ? '+' : '');
        clearInterval(t);
      }
    }, 22);
    cntObs.unobserve(e.target);
  });
}, { threshold: 0.5 });
counters.forEach(c => cntObs.observe(c));

// BACK TO TOP
const bt = document.getElementById('backTop');
window.addEventListener('scroll', () => bt.classList.toggle('show', scrollY > 400));

// NAVBAR SHADOW
const nav = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
  nav.style.boxShadow = scrollY > 50 ? '0 4px 28px rgba(11,60,73,0.18)' : '0 2px 18px rgba(11,60,73,0.1)';
});
</script>

</body>
</html><?php /**PATH D:\web apps\Github-Project\SmartSurgery\resources\views/services.blade.php ENDPATH**/ ?>