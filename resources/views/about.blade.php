<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>مستشفى عاشور زيان - أولاد جلال</title>
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
:root {
  --deep: #0a1628;
  --navy: #0f2d4a;
  --teal: #0e6b7c;
  --teal-light: #14889c;
  --gold: #c9a84c;
  --gold-light: #e2c97e;
  --cream: #f8f4ed;
  --text: #1a2332;
  --muted: #6b7a8d;
  --white: #ffffff;
}
* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: "Cairo", sans-serif; background: var(--cream); color: var(--text); overflow-x: hidden; }
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: var(--deep); }
::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 3px; }

/* TOP BAR & NAVBAR (Standardized) */
.top-bar{
  background:linear-gradient(90deg,#071e26,#0b3c49);
  color:#fff;padding:8px 48px;
  display:flex;justify-content:space-between;align-items:center;
  font-size:12px;letter-spacing:.3px;
  border-bottom:2px solid var(--gold);
}
.top-bar strong{color:var(--gold)}
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
.logo{display:flex;align-items:center;gap:12px;text-decoration:none}
.logo-icon{
  width:42px;height:42px;
  background:linear-gradient(135deg,#0f4c5c,#1a7a8a);
  border-radius:12px;display:flex;align-items:center;justify-content:center;
  font-size:20px;box-shadow:0 4px 12px rgba(15,76,92,.3);color:#fff;
}
.logo-name{font-size:14px;font-weight:700;color:#0b3c49;display:block}
body.dark .logo-name{color:var(--gold)}
.logo-sub{font-size:10px;color:var(--muted);display:block}
.nav-links{list-style:none;display:flex;gap:2px;align-items:center}
.nav-links a,.nav-links > li > span{
  text-decoration:none;color:var(--text);
  font-size:12.5px;font-weight:600;
  padding:8px 12px;border-radius:8px;
  cursor:pointer;transition:background 0.2s, color 0.2s;display:block;white-space:nowrap;
}
.nav-links a:hover,.nav-links > li > span:hover{background:rgba(15,76,92,.08);color:#0f4c5c}
body.dark .nav-links a,body.dark .nav-links > li > span{color:#c8e6ec}
body.dark .nav-links a:hover{background:rgba(42,166,184,.15);color:var(--gold)}
.dropdown{position:relative}
.dropdown-menu{
  position:absolute;top:calc(100% + 8px);right:0;
  background:var(--white);min-width:220px;
  border-radius:12px;box-shadow:0 12px 40px rgba(11,60,73,.15);
  display:none;overflow:hidden;
  border:1px solid rgba(15,76,92,.1);
  animation:dropIn .2s ease;
}
.dropdown-menu.show{display:block}
@keyframes dropIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:translateY(0)}}
.dropdown-menu a{
  display:flex;align-items:center;gap:10px;
  padding:11px 16px;font-size:12.5px;
  border-bottom:1px solid rgba(15,76,92,.06);
  color:var(--text);transition:background 0.2s, color 0.2s;
  font-weight:500;
}
.dropdown-menu a:hover{background:rgba(15,76,92,.06);color:#0f4c5c;padding-right:22px}
.nav-actions{display:flex;align-items:center;gap:10px}
.dark-toggle{
  width:38px;height:38px;background:var(--gold);
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

.hero { position: relative; height: 88vh; min-height: 560px; overflow: hidden; background: var(--deep); }
.hero-bg { position: absolute; inset: 0; background: radial-gradient(ellipse at 30% 50%, rgba(14,107,124,0.35) 0%, transparent 60%), radial-gradient(ellipse at 80% 20%, rgba(201,168,76,0.12) 0%, transparent 50%), linear-gradient(160deg, #0a1628 0%, #0f2d4a 50%, #0a1628 100%); }
.hero-geo { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
.geo-circle { position: absolute; border-radius: 50%; border: 1px solid rgba(201,168,76,0.12); }
.geo-circle:nth-child(1) { width: 500px; height: 500px; top: -120px; left: -120px; }
.geo-circle:nth-child(2) { width: 700px; height: 700px; top: -220px; left: -220px; }
.geo-circle:nth-child(3) { width: 300px; height: 300px; bottom: -50px; right: 10%; border-color: rgba(14,107,124,0.2); }
.geo-line { position: absolute; background: linear-gradient(90deg, transparent, rgba(201,168,76,0.15), transparent); height: 1px; width: 60%; top: 50%; right: 0; }
.hero-content { position: relative; z-index: 2; height: 100%; display: flex; align-items: center; padding: 0 80px; gap: 60px; }
.hero-text { flex: 1; }
.hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(201,168,76,0.12); border: 1px solid rgba(201,168,76,0.3); color: var(--gold-light); padding: 6px 14px; border-radius: 30px; font-size: 11.5px; letter-spacing: 1px; margin-bottom: 22px; animation: fadeUp 0.6s ease both; }
.hero-badge::before { content: ""; width: 6px; height: 6px; background: var(--gold); border-radius: 50%; animation: pulse 2s infinite; }
@keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.5;transform:scale(0.8)} }
.hero-title { font-family: "Amiri", serif; font-size: 52px; line-height: 1.25; color: var(--white); margin-bottom: 18px; animation: fadeUp 0.6s ease 0.1s both; }
.hero-title span { color: var(--gold); display: block; }
.hero-subtitle { font-size: 15px; color: rgba(255,255,255,0.65); line-height: 1.8; max-width: 480px; margin-bottom: 36px; animation: fadeUp 0.6s ease 0.2s both; }
.hero-actions { display: flex; gap: 14px; animation: fadeUp 0.6s ease 0.3s both; }
.btn-primary { background: linear-gradient(135deg, var(--gold) 0%, #b8922f 100%); color: var(--deep); padding: 13px 28px; border-radius: 10px; font-size: 13.5px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: transform 0.2s, box-shadow 0.2s; box-shadow: 0 4px 20px rgba(201,168,76,0.35); font-family: "Cairo", sans-serif; border: none; cursor: pointer; }
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(201,168,76,0.4); }
.hero-stats { flex-shrink: 0; display: flex; flex-direction: column; gap: 16px; animation: fadeLeft 0.7s ease 0.3s both; }
@keyframes fadeLeft { from{opacity:0;transform:translateX(30px)} to{opacity:1;transform:translateX(0)} }
.stat-card { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 14px; padding: 20px 24px; text-align: center; min-width: 150px; transition: all 0.3s; }
.stat-card:hover { background: rgba(255,255,255,0.1); border-color: rgba(201,168,76,0.3); transform: translateY(-3px); }
.stat-card .num { font-family: "Amiri", serif; font-size: 38px; color: var(--gold); line-height: 1; margin-bottom: 4px; }
.stat-card .label { font-size: 11.5px; color: rgba(255,255,255,0.55); }

.section { padding: 80px 50px; max-width: 1100px; margin: 0 auto; }
.section-header { text-align: center; margin-bottom: 56px; }
.section-tag { display: inline-block; font-size: 11px; letter-spacing: 2.5px; text-transform: uppercase; color: var(--teal); font-weight: 700; margin-bottom: 10px; }
.section-title { font-family: "Amiri", serif; font-size: 34px; color: var(--navy); margin-bottom: 14px; }
.section-divider { width: 60px; height: 3px; background: linear-gradient(90deg, var(--gold), transparent); margin: 0 auto; }

.about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
.about-image-wrap { position: relative; }
.about-image-wrap img { width: 100%; height: 400px; object-fit: cover; border-radius: 18px; display: block; }
.about-image-wrap::before { content: ""; position: absolute; inset: -10px -10px 10px 10px; border: 2px solid var(--gold); border-radius: 22px; opacity: 0.3; pointer-events: none; }
.about-badge-img { position: absolute; bottom: 24px; right: -20px; background: var(--white); border-radius: 12px; padding: 14px 18px; box-shadow: 0 8px 30px rgba(0,0,0,0.14); text-align: center; }
.about-badge-img .big { font-family: "Amiri", serif; font-size: 28px; color: var(--teal); font-weight: 700; }
.about-badge-img .small { font-size: 10.5px; color: var(--muted); }
.about-content p { font-size: 14px; line-height: 2; color: #3d4f63; margin-bottom: 18px; text-align: justify; }
.about-list { list-style: none; display: flex; flex-direction: column; gap: 10px; margin-top: 24px; }
.about-list li { display: flex; align-items: flex-start; gap: 10px; font-size: 13.5px; color: var(--text); }
.about-list li::before { content: "◆"; color: var(--gold); font-size: 9px; margin-top: 5px; flex-shrink: 0; }

.martyr-section { background: var(--navy); padding: 80px 0; position: relative; overflow: hidden; }
.martyr-section::before { content: ""; position: absolute; inset: 0; background: radial-gradient(ellipse at 20% 50%, rgba(14,107,124,0.2) 0%, transparent 60%); }
.martyr-inner { max-width: 1100px; margin: 0 auto; padding: 0 50px; display: grid; grid-template-columns: 300px 1fr; gap: 60px; align-items: center; position: relative; z-index: 1; }
.martyr-portrait { position: relative; }
.martyr-portrait img { width: 100%; height: 360px; object-fit: cover; border-radius: 16px; filter: grayscale(20%); }
.martyr-portrait::after { content: ""; position: absolute; inset: 0; border-radius: 16px; background: linear-gradient(to top, rgba(10,22,40,0.5) 0%, transparent 50%); }
.martyr-portrait .portrait-label { position: absolute; bottom: 16px; right: 16px; left: 16px; z-index: 1; text-align: center; }
.martyr-portrait .portrait-label .dates { font-size: 12px; color: var(--gold-light); letter-spacing: 1.5px; }
.martyr-content .section-tag { color: var(--gold-light); }
.martyr-content .section-title { color: var(--white); text-align: right; }
.martyr-content p { font-size: 14px; line-height: 2; color: rgba(255,255,255,0.7); margin-bottom: 16px; text-align: justify; }
.martyr-quote { border-right: 3px solid var(--gold); padding-right: 18px; margin: 28px 0; font-family: "Amiri", serif; font-size: 17px; color: var(--gold-light); font-style: italic; line-height: 1.8; }

.timeline { position: relative; padding: 10px 0; }
.timeline::before { content: ""; position: absolute; right: 22px; top: 0; bottom: 0; width: 2px; background: linear-gradient(to bottom, var(--teal), var(--gold), var(--teal)); }
.tl-item { display: flex; gap: 40px; margin-bottom: 40px; padding-right: 60px; position: relative; }
.tl-dot { position: absolute; right: 12px; top: 6px; width: 22px; height: 22px; border-radius: 50%; background: var(--teal); border: 3px solid var(--white); box-shadow: 0 0 0 3px rgba(14,107,124,0.2); z-index: 1; }
.tl-item:nth-child(2) .tl-dot { background: var(--gold); box-shadow: 0 0 0 3px rgba(201,168,76,0.2); }
.tl-item:nth-child(3) .tl-dot { background: var(--navy); box-shadow: 0 0 0 3px rgba(15,45,74,0.2); }
.tl-year { font-family: "Amiri", serif; font-size: 36px; font-weight: 700; color: var(--teal); line-height: 1; min-width: 90px; }
.tl-item:nth-child(2) .tl-year { color: var(--gold); }
.tl-body h3 { font-size: 15px; font-weight: 700; color: var(--navy); margin-bottom: 6px; }
.tl-body p { font-size: 13.5px; color: var(--muted); line-height: 1.8; }

.services-bg { background: #f0f4f7; padding: 80px 0; }
.services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.service-card { background: var(--white); border-radius: 16px; overflow: hidden; box-shadow: 0 2px 16px rgba(0,0,0,0.06); transition: transform 0.3s, box-shadow 0.3s; }
.service-card:hover { transform: translateY(-6px); box-shadow: 0 12px 40px rgba(0,0,0,0.12); }
.service-card:hover .sc-icon { background: var(--teal); }
.service-card:hover .sc-icon svg { stroke: white; }
.sc-img { height: 180px; overflow: hidden; position: relative; }
.sc-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
.service-card:hover .sc-img img { transform: scale(1.06); }
.sc-img::after { content: ""; position: absolute; inset: 0; background: linear-gradient(to top, rgba(10,22,40,0.35) 0%, transparent 60%); }
.sc-body { padding: 22px 20px; }
.sc-icon { width: 44px; height: 44px; border-radius: 10px; background: var(--cream); display: flex; align-items: center; justify-content: center; margin-bottom: 12px; transition: background 0.3s; }
.sc-icon svg { width: 22px; height: 22px; stroke: var(--teal); fill: none; stroke-width: 2; }
.sc-body h3 { font-size: 15px; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
.sc-body p { font-size: 13px; color: var(--muted); line-height: 1.75; }

.coverage { background: linear-gradient(135deg, var(--teal) 0%, var(--navy) 100%); padding: 60px 50px; position: relative; overflow: hidden; }
.coverage::before { content: ""; position: absolute; inset: 0; background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); }
.coverage-inner { max-width: 1100px; margin: 0 auto; position: relative; z-index: 1; }
.coverage-title { font-family: "Amiri", serif; font-size: 28px; color: var(--white); margin-bottom: 12px; text-align: center; }
.coverage-title span { color: var(--gold-light); }
.coverage-subtitle { text-align:center; color:rgba(255,255,255,0.5); font-size:12.5px; margin-bottom:30px; }
.coverage-grid { display: grid; grid-template-columns: repeat(6, 1fr); gap: 14px; }
.coverage-item { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.15); border-radius: 10px; padding: 16px 10px; text-align: center; color: var(--white); font-size: 13px; transition: all 0.2s; cursor: pointer; }
.coverage-item:hover { background: rgba(201,168,76,0.25); border-color: var(--gold); color: var(--gold-light); transform: translateY(-3px); }
.coverage-item .icon { font-size: 18px; margin-bottom: 6px; }
.ci-arrow { font-size: 11px; margin-top: 5px; opacity: 0; transition: opacity 0.2s; color: var(--gold); }
.coverage-item:hover .ci-arrow { opacity: 1; }

/* ===== MODAL ===== */
.modal-overlay { display: none; position: fixed; inset: 0; background: rgba(10,22,40,0.78); backdrop-filter: blur(6px); z-index: 999; align-items: center; justify-content: center; padding: 20px; }
.modal-overlay.open { display: flex; animation: mfadeIn 0.25s ease; }
@keyframes mfadeIn { from{opacity:0} to{opacity:1} }
.modal-box { background: var(--white); border-radius: 20px; width: 100%; max-width: 680px; max-height: 90vh; overflow-y: auto; position: relative; animation: mslideUp 0.3s ease; box-shadow: 0 30px 80px rgba(0,0,0,0.4); }
@keyframes mslideUp { from{transform:translateY(30px);opacity:0} to{transform:translateY(0);opacity:1} }
.modal-close { position: absolute; top: 16px; left: 16px; width: 34px; height: 34px; border-radius: 50%; border: none; background: rgba(255,255,255,0.18); cursor: pointer; font-size: 15px; color: white; display: flex; align-items: center; justify-content: center; transition: background 0.2s; z-index: 2; }
.modal-close:hover { background: rgba(255,255,255,0.28); }
.modal-header { background: linear-gradient(135deg, var(--navy) 0%, var(--teal) 100%); padding: 32px 28px 24px; border-radius: 20px 20px 0 0; display: flex; align-items: center; gap: 18px; }
.modal-icon { width: 60px; height: 60px; border-radius: 14px; background: rgba(255,255,255,0.12); display: flex; align-items: center; justify-content: center; font-size: 30px; flex-shrink: 0; }
.modal-tag { font-size: 11px; color: rgba(255,255,255,0.5); letter-spacing: 1.5px; margin-bottom: 4px; }
.modal-title { font-family: "Amiri", serif; font-size: 28px; color: var(--white); }
.modal-body { padding: 24px 28px 28px; }
.modal-section { margin-bottom: 24px; }
.ms-title { font-size: 13.5px; font-weight: 700; color: var(--navy); margin-bottom: 12px; padding-bottom: 8px; border-bottom: 2px solid var(--cream); }
.modal-section > p { font-size: 13.5px; line-height: 2; color: #3d4f63; text-align: justify; }
.vaccines-grid { display: grid; grid-template-columns: repeat(2,1fr); gap: 10px; }
.vaccine-tag { background: #edf7f9; border: 1px solid #b2dde4; border-radius: 8px; padding: 10px 14px; font-size: 12.5px; color: var(--teal); font-weight: 600; display: flex; align-items: center; gap: 8px; }
.vaccine-tag::before { content: "✓"; font-weight: 800; }
.services-list { display: flex; flex-direction: column; gap: 8px; }
.service-tag { background: var(--cream); border-radius: 8px; padding: 10px 14px; font-size: 13px; color: var(--text); display: flex; align-items: center; gap: 10px; }
.service-tag .st-icon { font-size: 16px; }
.modal-footer-info { background: var(--navy); border-radius: 12px; padding: 16px 20px; display: flex; gap: 40px; margin-top: 8px; }
.mfi-item { display: flex; flex-direction: column; gap: 3px; }
.mfi-label { font-size: 11px; color: rgba(255,255,255,0.45); letter-spacing: 0.5px; }
.mfi-val { font-size: 14px; font-weight: 700; color: var(--gold-light); }

footer { background: var(--deep); padding: 50px 50px 24px; }
.footer-inner { max-width: 1100px; margin: 0 auto; display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 50px; padding-bottom: 36px; border-bottom: 1px solid rgba(255,255,255,0.08); margin-bottom: 24px; }
.footer-brand .logo-wrap { margin-bottom: 16px; }
.logo-icon.small { width: 36px; height: 36px; font-size: 17px; }
.footer-brand p { font-size: 13px; color: rgba(255,255,255,0.5); line-height: 1.8; max-width: 280px; }
.footer-col h4 { font-size: 13px; font-weight: 700; color: var(--gold-light); margin-bottom: 16px; }
.footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 9px; }
.footer-col a { text-decoration: none; font-size: 13px; color: rgba(255,255,255,0.5); transition: color 0.2s; }
.footer-col a:hover { color: var(--white); }
.footer-bottom { max-width: 1100px; margin: 0 auto; display: flex; justify-content: space-between; font-size: 12px; color: rgba(255,255,255,0.35); }

@keyframes fadeUp { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }
.reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: translateY(0); }
</style>
</head>
<body>

<!-- TOP BAR -->
<div class="top-bar">
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

<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-geo">
    <div class="geo-circle"></div>
    <div class="geo-circle"></div>
    <div class="geo-circle"></div>
    <div class="geo-line"></div>
  </div>
  <div class="hero-content">
    <div class="hero-text">
      <div class="hero-badge">مؤسسة صحية عمومية • منذ 1985</div>
      <h1 class="hero-title">مستشفى<span>عاشور زيان</span></h1>
      <p class="hero-subtitle">مؤسسة صحية رائدة تخدم مواطني أولاد جلال وما يحيط بها، مستمدةً اسمها من الشهيد الذي أضاء درب الجزائر بتضحياته الجسيمة.</p>
      <div class="hero-actions">
        <a href="#" class="btn-primary">اكتشف خدماتنا</a>
      </div>
    </div>
    <div class="hero-stats">
      <div class="stat-card"><div class="num">526</div><div class="label">عامل متخصص</div></div>
      <div class="stat-card"><div class="num">6</div><div class="label">بلديات مخدومة</div></div>
      <div class="stat-card"><div class="num">40+</div><div class="label">سنة من الخدمة</div></div>
    </div>
  </div>
</section>

<div class="section reveal">
  <div class="section-header">
    <div class="section-tag">من نحن</div>
    <h2 class="section-title">المؤسسة العمومية الاستشفائية</h2>
    <div class="section-divider"></div>
  </div>
  <div class="about-grid">
    <div class="about-image-wrap">
      <img src="https://i.ibb.co/S4NQNFzB/hospital.jpg" alt="مستشفى عاشور زيان">
      <div class="about-badge-img">
        <div class="big">1985</div>
        <div class="small">سنة التأسيس</div>
      </div>
    </div>
    <div class="about-content">
      <p>تُعدّ المؤسسة العمومية الاستشفائية عاشور زيان بأولاد جلال ركيزةً أساسيةً في المنظومة الصحية الوطنية، إذ تتمتع بالشخصية المعنوية والاستقلال المالي، وتقدم خدمات الاستشفاء والوقاية لمئات الآلاف من المواطنين.</p>
      <p>تضم المؤسسة طاقماً بشرياً يتجاوز <strong>526 عاملاً</strong>، من بينهم أطباء مختصون وطاقم شبه طبي مؤهل ومتخصص في شتى المجالات الطبية.</p>
      <ul class="about-list">
        <li>مساحة إجمالية تبلغ <strong>28800 م²</strong></li>
        <li>تغطية صحية لـ <strong>دائرتين وست بلديات</strong></li>
        <li>101 عامل مؤقت ضمن الطاقم الوظيفي</li>
        <li>تجهيزات طبية حديثة ومتطورة</li>
      </ul>
    </div>
  </div>
</div>

<section class="martyr-section">
  <div class="martyr-inner">
    <div class="martyr-portrait">
      <img src="images/Captur.jpg" alt="الشهيد عاشور زيان">
      <div class="portrait-label"><div class="dates">1919 — 1956</div></div>
    </div>
    <div class="martyr-content reveal">
      <div class="section-tag">صاحب الاسم</div>
      <h2 class="section-title" style="text-align:right">الشهيد زيان عاشور</h2>
      <div class="section-divider" style="margin-right:0;margin-left:auto;background:linear-gradient(90deg,transparent,var(--gold));"></div><br>
      <p>الشهيد زيان عاشور من أبرز قادة الثورة التحريرية الجزائرية، وأحد مؤسسي جيش الصحراء. نشأ في أسرة محافظة وتعلّم القرآن في الزوايا، ثم انخرط في صفوف الحركة الوطنية منذ سنوات مبكرة.</p>
      <p>عُيّن مسؤولاً عن المنطقة الصحراوية وأدى دوراً محورياً في تنظيم المقاومة بالجنوب الجزائري، حتى استشهد يوم 7 نوفمبر 1956 في معركة واد خلفون.</p>
      <blockquote class="martyr-quote">"رمزٌ للتضحية والفداء في الجنوب الجزائري، خلّد اسمه بأحرف من نور."</blockquote>
    </div>
  </div>
</section>

<div class="section reveal">
  <div class="section-header">
    <div class="section-tag">التاريخ</div>
    <h2 class="section-title">محطات التأسيس</h2>
    <div class="section-divider"></div>
  </div>
  <div class="timeline">
    <div class="tl-item">
      <div class="tl-dot"></div>
      <div class="tl-year">1978</div>
      <div class="tl-body"><h3>اختيار الموقع</h3><p>تم اختيار الموقع الاستراتيجي للمستشفى في قلب أولاد جلال، على مساحة إجمالية قدرها 28800 م².</p></div>
    </div>
    <div class="tl-item">
      <div class="tl-dot"></div>
      <div class="tl-year">1980</div>
      <div class="tl-body"><h3>انطلاق أشغال الإنجاز</h3><p>بدأت أشغال البناء والتشييد على يد الشركة البلجيكية GEBA المتخصصة في الإنشاءات الكبرى.</p></div>
    </div>
    <div class="tl-item">
      <div class="tl-dot"></div>
      <div class="tl-year">1985</div>
      <div class="tl-body"><h3>الافتتاح الرسمي</h3><p>دُشِّن المستشفى رسمياً بتاريخ 02 جانفي 1985، ليفتح أبوابه أمام مئات الآلاف من المواطنين.</p></div>
    </div>
  </div>
</div>

<div class="services-bg">
  <div class="section" style="padding-top:0;padding-bottom:0">
    <div class="section-header">
      <div class="section-tag">خدماتنا</div>
      <h2 class="section-title">الخدمات الطبية المقدمة</h2>
      <div class="section-divider"></div>
    </div>
    <div class="services-grid reveal">
      <div class="service-card">
        <div class="sc-img"><img src="images/Capt9.jpg" alt="تجهيزات طبية"></div>
        <div class="sc-body">
          <div class="sc-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M12 8v8M8 12h8"/></svg></div>
          <h3>التجهيزات الطبية</h3>
          <p>اعتماد أحدث التجهيزات الطبية لدعم عمليات التشخيص الدقيق والعلاج الفعّال.</p>
        </div>
      </div>
      <div class="service-card">
        <div class="sc-img"><img src="https://i.ibb.co/yFhvVF8J/Capture-9.png" alt="الطاقم الطبي"></div>
        <div class="sc-body">
          <div class="sc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/></svg></div>
          <h3>الطاقم الطبي</h3>
          <p>أطباء مختصون وطاقم شبه طبي مؤهل يعمل على مدار الساعة لخدمة المرضى.</p>
        </div>
      </div>
      <div class="service-card">
        <div class="sc-img" style="background:linear-gradient(135deg,var(--teal),var(--navy));display:flex;align-items:center;justify-content:center;">
          <svg style="width:64px;height:64px;stroke:rgba(255,255,255,0.3);fill:none;stroke-width:1.5" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <div class="sc-body">
          <div class="sc-icon"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
          <h3>الطوارئ 24/24</h3>
          <p>قسم طوارئ يعمل على مدار الساعة طيلة أيام الأسبوع، مجهز لاستقبال جميع الحالات.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="coverage">
  <div class="coverage-inner">
    <h2 class="coverage-title">التغطية الصحية — <span>6 بلديات</span></h2>
    <p class="coverage-subtitle">اضغط على أي بلدية لعرض التفاصيل</p>
    <div class="coverage-grid">
      <div class="coverage-item" onclick="openCity('ouled-jalal')"><div class="icon">🏙️</div>أولاد جلال<div class="ci-arrow">←</div></div>
      <div class="coverage-item" onclick="openCity('sidi-khaled')"><div class="icon">🕌</div>سيدي خالد<div class="ci-arrow">←</div></div>
      <div class="coverage-item" onclick="openCity('doucen')"><div class="icon">🌿</div>الدوسن<div class="ci-arrow">←</div></div>
      <div class="coverage-item" onclick="openCity('chaiba')"><div class="icon">🌾</div>الشعيبة<div class="ci-arrow">←</div></div>
      <div class="coverage-item" onclick="openCity('basbas')"><div class="icon">🌴</div>البسباس<div class="ci-arrow">←</div></div>
      <div class="coverage-item" onclick="openCity('ras-miaad')"><div class="icon">🌅</div>رأس الميعاد<div class="ci-arrow">←</div></div>
    </div>
  </div>
</section>

<!-- CITY MODAL -->
<div id="cityModal" class="modal-overlay" onclick="closeModal(event)">
  <div class="modal-box">
    <button class="modal-close" onclick="closeCity()">✕</button>
    <div class="modal-header">
      <div class="modal-icon" id="modalIcon"></div>
      <div>
        <div class="modal-tag">بلدية — ولاية بسكرة</div>
        <h2 class="modal-title" id="modalTitle"></h2>
      </div>
    </div>
    <div class="modal-body">
      <div class="modal-section">
        <h3 class="ms-title">📍 نبذة عن البلدية</h3>
        <p id="modalDesc"></p>
      </div>
      <div class="modal-section">
        <h3 class="ms-title">💉 التلقيحات المتوفرة في مستشفى عاشور زيان</h3>
        <div class="vaccines-grid" id="modalVaccines"></div>
      </div>
      <div class="modal-section">
        <h3 class="ms-title">🏥 خدمات المستشفى لهذه البلدية</h3>
        <div class="services-list" id="modalServices"></div>
      </div>
      <div class="modal-footer-info">
        <div class="mfi-item">
          <span class="mfi-label">المسافة عن المستشفى</span>
          <span class="mfi-val" id="modalDist"></span>
        </div>
        <div class="mfi-item">
          <span class="mfi-label">طوارئ 24/24</span>
          <span class="mfi-val">014 25 36 78</span>
        </div>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="logo-wrap">
        <div class="logo-icon small">ع</div>
        <div class="logo-text">
          <div class="name" style="color:white">مستشفى عاشور زيان</div>
          <div class="sub">المؤسسة العمومية الاستشفائية</div>
        </div>
      </div>
      <p>مؤسسة صحية عمومية تخدم مواطني أولاد جلال وما يحيط بها منذ عام 1985.</p>
    </div>
    <div class="footer-col">
      <h4>روابط سريعة</h4>
      <ul>
         <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a href="#">الأقسام الطبية</a></li>
        <li><a href="{{ route('services') }}">الخدمات</a></li>
        <li><a href="{{ route('about') }}">نبذة عن المستشفى</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>تواصل معنا</h4>
      <ul>
        <li><a href="#">📞 014 25 36 78</a></li>
        <li><a href="#">📍 أولاد جلال، بسكرة</a></li>
        <li><a href="#">⏰ 08:00 – 20:00</a></li>
        <li><a href="#">🚑 طوارئ 24/24</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span>جميع الحقوق محفوظة © 2025 — مستشفى عاشور زيان</span>
    <span>أولاد جلال، ولاية بسكرة، الجزائر</span>
  </div>
</footer>

<script>
const revealEls = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.12 });
revealEls.forEach(el => observer.observe(el));

const cities = {
  'ouled-jalal': {
    name: 'أولاد جلال', icon: '🏙️', dist: 'المقر الرئيسي',
    desc: 'أولاد جلال مدينة جزائرية تقع في الجهة الشمالية الغربية من ولاية بسكرة، وتُعدّ مركزاً حضرياً وتجارياً مهماً في منطقة الزيبان. تشتهر بإنتاج التمور عالية الجودة، ولا سيما تمر دقلة نور، وتستضيف مستشفى عاشور زيان الذي يُعدّ المرفق الصحي الرئيسي للمنطقة.',
    vaccines: ['تلقيح الحصبة والنكاف والحصبة الألمانية (MMR)', 'تلقيح شلل الأطفال (OPV/IPV)', 'تلقيح التيتانوس والدفتيريا (Td)', 'تلقيح التهاب الكبد B', 'تلقيح السل (BCG)', 'تلقيح الميننجيت (MenC)', 'تلقيح الكزاز للحوامل', 'تلقيح الإنفلونزا الموسمية'],
    services: [
      { icon: '🚑', text: 'طوارئ متكاملة على مدار الساعة' },
      { icon: '🔬', text: 'مختبر للتحليلات الطبية الشاملة' },
      { icon: '📷', text: 'قسم الأشعة والتصوير الطبي' },
      { icon: '🏥', text: 'جناح الاستشفاء والعمليات الجراحية' },
      { icon: '👶', text: 'قسم طب الأطفال وحديثي الولادة' }
    ]
  },
  'sidi-khaled': {
    name: 'سيدي خالد', icon: '🕌', dist: '~35 كلم عن المستشفى',
    desc: 'سيدي خالد بلدية أثرية تقع في ولاية بسكرة، تشتهر بموقعها الاستراتيجي على الطريق الرابط بين الشمال والجنوب. تتميز بطابعها الديني والتراثي، حيث تضم ضريح الولي سيدي خالد، ويعتمد سكانها اعتماداً كبيراً على الخدمات الصحية المقدمة في مستشفى عاشور زيان.',
    vaccines: ['تلقيح شلل الأطفال (OPV/IPV)', 'تلقيح الحصبة والنكاف والحصبة الألمانية (MMR)', 'تلقيح التهاب الكبد B', 'تلقيح التيتانوس للأطفال والبالغين', 'تلقيح السل (BCG)', 'تلقيح الكزاز للحوامل'],
    services: [
      { icon: '🚑', text: 'نقل المرضى في حالات الطوارئ' },
      { icon: '💊', text: 'توفير الأدوية والمستلزمات الطبية' },
      { icon: '🔬', text: 'التحليلات الطبية والمخبرية' },
      { icon: '👁️', text: 'استشارات الطب العام والتخصصي' }
    ]
  },
  'doucen': {
    name: 'الدوسن', icon: '🌿', dist: '~28 كلم عن المستشفى',
    desc: 'الدوسن بلدية هادئة تقع في ولاية بسكرة، تتميز بطابعها الريفي وبساتين النخيل الممتدة. يعتمد سكانها في الغالب على الزراعة ورعي الأغنام، ويتلقون خدماتهم الصحية المتخصصة في مستشفى عاشور زيان بأولاد جلال.',
    vaccines: ['تلقيح الحصبة والنكاف (MMR)', 'تلقيح شلل الأطفال', 'تلقيح التهاب الكبد B', 'تلقيح التيتانوس والدفتيريا', 'تلقيح السل (BCG)', 'تلقيح الكزاز للأمهات'],
    services: [
      { icon: '🚑', text: 'خدمة الإسعاف والطوارئ' },
      { icon: '👶', text: 'رعاية الأمومة والطفولة' },
      { icon: '🔬', text: 'التحليلات المخبرية الأساسية' },
      { icon: '💉', text: 'حملات التلقيح الدورية' }
    ]
  },
  'chaiba': {
    name: 'الشعيبة', icon: '🌾', dist: '~42 كلم عن المستشفى',
    desc: 'الشعيبة بلدية صغيرة تقع في الجنوب الغربي من ولاية بسكرة، تتميز بمناخها الجاف وطبيعتها الصحراوية الرائعة. يرتكز اقتصاد سكانها على تربية الإبل والأغنام وزراعة النخيل، ويعتمدون على مستشفى عاشور زيان كمرفق صحي رئيسي.',
    vaccines: ['تلقيح شلل الأطفال', 'تلقيح الحصبة والنكاف (MMR)', 'تلقيح السل (BCG)', 'تلقيح التهاب الكبد B', 'تلقيح التيتانوس للحوامل'],
    services: [
      { icon: '🚑', text: 'إسعاف ونقل المرضى' },
      { icon: '💊', text: 'الاستشارات الطبية العامة' },
      { icon: '💉', text: 'برامج التلقيح الوطنية' },
      { icon: '👶', text: 'متابعة صحة الأم والطفل' }
    ]
  },
  'basbas': {
    name: 'البسباس', icon: '🌴', dist: '~50 كلم عن المستشفى',
    desc: 'البسباس بلدية تقع في أقصى الجنوب من دائرة أولاد جلال، تحاذي الأراضي الرملية الكبرى. تعتمد على الزراعة الواحية وإنتاج التمور، ويقصد سكانها مستشفى عاشور زيان للحصول على الرعاية الصحية المتخصصة.',
    vaccines: ['تلقيح الحصبة والنكاف (MMR)', 'تلقيح شلل الأطفال (OPV)', 'تلقيح السل (BCG)', 'تلقيح التهاب الكبد B', 'تلقيح التيتانوس'],
    services: [
      { icon: '🚑', text: 'طوارئ وإسعاف متنقل' },
      { icon: '💉', text: 'حملات التلقيح الميدانية' },
      { icon: '👩‍⚕️', text: 'استشارات طبية متخصصة' },
      { icon: '🔬', text: 'خدمات المختبر والتحليل' }
    ]
  },
  'ras-miaad': {
    name: 'رأس الميعاد', icon: '🌅', dist: '~60 كلم عن المستشفى',
    desc: 'رأس الميعاد بلدية تقع في أقاصي الجنوب الشرقي من ولاية بسكرة، تتميز بمشاهد صحراوية خلابة وتضاريس متنوعة. تعتمد على الرعي والزراعة التقليدية، ويُمثّل مستشفى عاشور زيان الملجأ الصحي الأساسي لسكانها في الحالات المستعصية.',
    vaccines: ['تلقيح شلل الأطفال', 'تلقيح الحصبة (MMR)', 'تلقيح السل (BCG)', 'تلقيح التهاب الكبد B', 'تلقيح الكزاز للحوامل'],
    services: [
      { icon: '🚑', text: 'تدخل طوارئ ونقل مستعجل' },
      { icon: '💉', text: 'برامج التلقيح والوقاية' },
      { icon: '👶', text: 'رعاية الأمومة والطفولة' },
      { icon: '💊', text: 'توفير الأدوية الأساسية' }
    ]
  }
};

function openCity(id) {
  const c = cities[id];
  if (!c) return;
  document.getElementById('modalIcon').textContent = c.icon;
  document.getElementById('modalTitle').textContent = c.name;
  document.getElementById('modalDist').textContent = c.dist;
  document.getElementById('modalDesc').textContent = c.desc;
  document.getElementById('modalVaccines').innerHTML = c.vaccines.map(v => `<div class="vaccine-tag">${v}</div>`).join('');
  document.getElementById('modalServices').innerHTML = c.services.map(s => `<div class="service-tag"><span class="st-icon">${s.icon}</span>${s.text}</div>`).join('');
  document.getElementById('cityModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeCity() {
  document.getElementById('cityModal').classList.remove('open');
  document.body.style.overflow = '';
}

function closeModal(e) {
  if (e.target === document.getElementById('cityModal')) closeCity();
}

document.addEventListener('keydown', e => { if (e.key === 'Escape') closeCity(); });

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

// Dark mode logic (Optional for about page, simply toggles dark class if someone wants it)
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