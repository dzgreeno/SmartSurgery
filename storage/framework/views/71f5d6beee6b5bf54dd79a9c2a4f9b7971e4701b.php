<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>جراحة المسالك البولية | مستشفى عاشور زيان</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
<style>
:root {
  --teal-deep:  #0b3c49;
  --teal-mid:   #0f4c5c;
  --teal-light: #1a7a8a;
  --teal-glow:  #2aa6b8;
  --gold:       #ffd166;
  --gold-deep:  #f5a623;
  --text-dark:  #1a2e35;
  --text-muted: #4a6572;
  --card-bg:    #ffffff;
  --body-bg:    #f0f6f8;
  --shadow:     0 8px 32px rgba(11,60,73,0.12);
  --shadow-lg:  0 20px 60px rgba(11,60,73,0.18);
  --radius:     16px;
  --radius-sm:  10px;
  --t:          all 0.35s cubic-bezier(0.4,0,0.2,1);
}
body.dark {
  --card-bg:    #0d3d4a;
  --body-bg:    #071e26;
  --text-dark:  #e8f4f7;
  --text-muted: #8ab8c4;
  --shadow:     0 8px 32px rgba(0,0,0,0.4);
}
*,*::before,*::after { box-sizing:border-box; margin:0; padding:0 }
html { scroll-behavior:smooth }
body { font-family:'Cairo',sans-serif; background:var(--body-bg); color:var(--text-dark); transition:background .4s,color .4s; overflow-x:hidden }
::-webkit-scrollbar { width:6px }
::-webkit-scrollbar-track { background:var(--teal-deep) }
::-webkit-scrollbar-thumb { background:var(--gold); border-radius:3px }

/* TOP BAR & NAVBAR */
.top-bar {
  background:linear-gradient(90deg,#071e26,#0b3c49);
  color:#fff; padding:8px 48px;
  display:flex; justify-content:space-between; align-items:center;
  font-size:12px; border-bottom:2px solid var(--gold);
}
.top-bar strong { color:var(--gold) }
.pulse-dot {
  width:8px; height:8px; background:#ef4444; border-radius:50%;
  animation:pdot 1.5s infinite; display:inline-block; margin-left:7px; vertical-align:middle;
}
@keyframes  pdot {
  0%,100%{transform:scale(1);box-shadow:0 0 0 0 rgba(239,68,68,.7)}
  50%{transform:scale(1.3);box-shadow:0 0 0 6px rgba(239,68,68,0)}
}

.navbar {
  background:rgba(255,255,255,.97); backdrop-filter:blur(20px);
  padding:0 48px; display:flex; align-items:center; justify-content:space-between;
  box-shadow:0 2px 20px rgba(11,60,73,.1);
  position:sticky; top:0; z-index:1000; height:68px;
  border-bottom:1px solid rgba(11,60,73,.08); transition:var(--t);
}
body.dark .navbar { background:rgba(7,30,38,.97); border-bottom:1px solid rgba(255,255,255,.06) }
.logo { display:flex; align-items:center; gap:12px; text-decoration:none }
.logo-icon {
  width:42px; height:42px;
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  border-radius:12px; display:flex; align-items:center; justify-content:center;
  font-size:20px; box-shadow:0 4px 12px rgba(15,76,92,.3);
}
.logo-name { font-size:14px; font-weight:700; color:var(--teal-deep); display:block }
body.dark .logo-name { color:var(--gold) }
.logo-sub { font-size:10px; color:var(--text-muted); display:block }
.nav-links { list-style:none; display:flex; gap:2px; align-items:center }
.nav-links a {
  text-decoration:none; color:var(--text-dark); font-size:12.5px; font-weight:500;
  padding:8px 12px; border-radius:var(--radius-sm); transition:var(--t); display:block; white-space:nowrap;
}
.nav-links a:hover { background:rgba(15,76,92,.08); color:var(--teal-mid) }
body.dark .nav-links a { color:#c8e6ec }
body.dark .nav-links a:hover { background:rgba(42,166,184,.15); color:var(--gold) }
.nav-actions { display:flex; align-items:center; gap:10px }
.dark-toggle {
  width:38px; height:38px; background:var(--gold); border:none; border-radius:10px;
  cursor:pointer; font-size:17px; display:flex; align-items:center; justify-content:center;
  transition:var(--t); box-shadow:0 2px 8px rgba(245,166,35,.3);
}
.dark-toggle:hover { transform:scale(1.1) }
body.dark .dark-toggle { background:var(--teal-mid) }
.nav-login {
  display:inline-flex; align-items:center; gap:7px; padding:9px 18px;
  border-radius:var(--radius-sm);
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  color:#fff; font-size:12.5px; font-weight:700; text-decoration:none;
  transition:var(--t); box-shadow:0 3px 12px rgba(15,76,92,.3);
}
.nav-login:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(15,76,92,.4) }

.dropdown{position:relative}
.dropdown-menu{
  position:absolute;top:calc(100% + 8px);right:0;
  background:var(--card-bg);min-width:220px;
  border-radius:var(--radius);box-shadow:var(--shadow-lg);
  display:none;overflow:hidden;
  border:1px solid rgba(15,76,92,.1);
  animation:dropIn .2s ease;
}
.dropdown-menu.show{display:block}
@keyframes  dropIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:translateY(0)}}
.dropdown-menu a{
  display:flex;align-items:center;gap:10px;
  padding:11px 16px;font-size:12.5px;
  border-bottom:1px solid rgba(15,76,92,.06);
  color:var(--text-dark);transition:var(--t);
}
.dropdown-menu a::before{content:'◈';color:var(--teal-light);font-size:10px}
.dropdown-menu a:hover{background:rgba(15,76,92,.06);color:var(--teal-mid);padding-right:22px}

/* BACK BAR */
.back-bar {
  background:var(--card-bg); border-bottom:1px solid rgba(15,76,92,.08);
  padding:11px 48px; display:flex; align-items:center; gap:16px; transition:var(--t);
}
body.dark .back-bar { border-color:rgba(255,255,255,.06) }
.back-btn {
  display:inline-flex; align-items:center; gap:7px;
  padding:7px 16px;
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  color:#fff; font-family:'Cairo',sans-serif; font-size:13px; font-weight:600;
  border:none; border-radius:var(--radius-sm); cursor:pointer;
  text-decoration:none; transition:var(--t); box-shadow:0 3px 10px rgba(15,76,92,.25);
}
.back-btn:hover { transform:translateX(4px); box-shadow:0 5px 18px rgba(15,76,92,.35) }
.back-btn .arr { transition:var(--t) }
.back-btn:hover .arr { transform:translateX(2px) }
.breadcrumb { display:flex; align-items:center; gap:8px; font-size:12.5px; color:var(--text-muted) }
.breadcrumb a { color:var(--teal-light); text-decoration:none; transition:var(--t) }
.breadcrumb a:hover { color:var(--gold) }
.breadcrumb-cur { color:var(--teal-deep); font-weight:600 }
body.dark .breadcrumb-cur { color:#e8f4f7 }

/* PAGE HERO */
.page-hero {
  position:relative;
  background:linear-gradient(135deg,var(--teal-deep),var(--teal-mid),#145a6a);
  padding:64px 48px; overflow:hidden;
}
.page-hero::before {
  content:''; position:absolute; inset:0;
  background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
  pointer-events:none;
}
.page-hero-bg-icon {
  position:absolute; font-size:300px; opacity:.04;
  left:-20px; top:50%; transform:translateY(-50%); pointer-events:none; line-height:1;
}
.page-hero-inner {
  position:relative; z-index:1; max-width:1200px; margin:auto;
  display:flex; align-items:center; justify-content:space-between; gap:40px;
}
.hero-badge {
  display:inline-flex; align-items:center; gap:8px;
  background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.18);
  color:var(--gold); font-size:11px; font-weight:700; letter-spacing:1px;
  padding:5px 14px; border-radius:20px; margin-bottom:16px;
}
.hero-title {
  font-family:'Amiri',serif; font-size:clamp(28px,4vw,52px);
  font-weight:700; color:#fff; line-height:1.25; margin-bottom:14px;
}
.hero-title span { color:var(--gold) }
.hero-subtitle {
  font-size:14px; color:rgba(255,255,255,.75); line-height:1.9; max-width:500px; margin-bottom:28px;
}
.hero-stats { display:flex; gap:28px; flex-wrap:wrap }
.hstat { text-align:center }
.hstat-num { font-size:30px; font-weight:900; color:var(--gold); line-height:1 }
.hstat-lbl { font-size:11px; color:rgba(255,255,255,.6); margin-top:3px }
.hero-float-card {
  background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.15);
  backdrop-filter:blur(12px); border-radius:var(--radius);
  padding:32px 28px; text-align:center; min-width:210px;
  animation:float 3.5s ease-in-out infinite;
}
@keyframes  float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }
.hero-float-card .big-em { font-size:64px; display:block; margin-bottom:14px }
.hero-float-card h4 { color:var(--gold); font-size:16px; font-weight:700; margin-bottom:6px }
.hero-float-card p { color:rgba(255,255,255,.65); font-size:12px; line-height:1.7 }

/* SHARED */
.sec-header { text-align:center; margin-bottom:50px }
.eyebrow {
  display:inline-block; font-size:11px; font-weight:700;
  letter-spacing:2px; text-transform:uppercase;
  color:var(--teal-light); background:rgba(15,76,92,.08);
  padding:5px 16px; border-radius:20px; margin-bottom:14px;
}
body.dark .eyebrow { color:var(--gold); background:rgba(255,209,102,.1) }
.sec-title {
  font-family:'Amiri',serif; font-size:clamp(24px,3.5vw,38px);
  color:var(--teal-deep); line-height:1.2; margin-bottom:14px;
}
body.dark .sec-title { color:var(--gold) }
.sec-line { width:60px; height:3px; margin:0 auto; background:linear-gradient(90deg,var(--gold),var(--teal-light)); border-radius:2px; }

/* ABOUT */
.about-sec { padding:80px 48px; background:var(--body-bg) }
.about-grid { max-width:1200px; margin:auto; display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:center }
.about-text h3 { font-size:22px; font-weight:700; color:var(--teal-deep); margin-bottom:16px }
body.dark .about-text h3 { color:#e8f4f7 }
.about-text p { font-size:14px; color:var(--text-muted); line-height:1.9; margin-bottom:14px }
.feat-list { margin-top:24px; display:flex; flex-direction:column; gap:12px }
.feat-item {
  display:flex; align-items:flex-start; gap:12px;
  background:var(--card-bg); border-radius:var(--radius-sm); padding:14px 16px;
  box-shadow:var(--shadow); border-right:3px solid var(--teal-light); transition:var(--t);
}
.feat-item:hover { transform:translateX(-4px); border-color:var(--gold) }
.feat-icon { font-size:20px; flex-shrink:0; margin-top:2px }
.feat-text strong { display:block; font-size:13.5px; font-weight:700; color:var(--teal-deep); margin-bottom:3px }
body.dark .feat-text strong { color:#e8f4f7 }
.feat-text span { font-size:12.5px; color:var(--text-muted) }
.about-visual {
  position:relative;
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-deep));
  border-radius:var(--radius); padding:40px 32px;
  display:flex; flex-direction:column; align-items:center; justify-content:center;
  min-height:320px; text-align:center; box-shadow:var(--shadow-lg); overflow:hidden;
}
.about-visual::before {
  content:''; position:absolute; width:260px; height:260px; border-radius:50%;
  background:rgba(255,255,255,.04); top:-80px; left:-80px;
}
.about-visual .av-icon { font-size:72px; margin-bottom:18px; position:relative; z-index:1 }
.about-visual h4 { color:var(--gold); font-size:18px; font-weight:700; margin-bottom:10px; z-index:1; position:relative }
.about-visual p { color:rgba(255,255,255,.7); font-size:13px; line-height:1.7; z-index:1; position:relative }
.av-badge {
  position:absolute; top:-12px; left:-12px;
  background:var(--gold); color:var(--teal-deep);
  font-size:12px; font-weight:700; padding:7px 14px; border-radius:20px;
  box-shadow:0 4px 14px rgba(255,209,102,.4);
}

/* OPERATIONS */
.ops-sec { padding:80px 48px; background:linear-gradient(135deg,#e8f4f7,#d1ecf1) }
body.dark .ops-sec { background:linear-gradient(135deg,#061a21,#071e26) }
.ops-grid { max-width:1200px; margin:auto; display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:22px }
.op-card {
  background:var(--card-bg); border-radius:var(--radius); padding:26px 22px;
  box-shadow:var(--shadow); border:1px solid rgba(15,76,92,.06);
  transition:var(--t); position:relative; overflow:hidden;
}
.op-card::after {
  content:''; position:absolute; bottom:0; left:0; right:0; height:3px;
  background:linear-gradient(90deg,var(--teal-light),var(--gold));
  transform:scaleX(0); transition:var(--t); transform-origin:left;
}
.op-card:hover { transform:translateY(-6px); box-shadow:var(--shadow-lg) }
.op-card:hover::after { transform:scaleX(1) }
.op-icon {
  width:52px; height:52px;
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  border-radius:14px; display:flex; align-items:center; justify-content:center;
  font-size:24px; margin-bottom:16px; box-shadow:0 4px 14px rgba(15,76,92,.22);
}
.op-title { font-size:16px; font-weight:700; color:var(--teal-deep); margin-bottom:10px }
body.dark .op-title { color:#e8f4f7 }
.op-desc { font-size:13px; color:var(--text-muted); line-height:1.7; margin-bottom:14px }
.op-tag { display:inline-block; background:rgba(15,76,92,.07); color:var(--teal-mid); font-size:10.5px; font-weight:700; padding:3px 10px; border-radius:20px }
body.dark .op-tag { background:rgba(255,209,102,.1); color:var(--gold) }

/* WHEN TO VISIT */
.visit-sec { padding:80px 48px; background:var(--body-bg) }
.visit-grid { max-width:1200px; margin:auto; display:grid; grid-template-columns:repeat(auto-fill,minmax(240px,1fr)); gap:22px }
.visit-card {
  background:var(--card-bg); border-radius:var(--radius); padding:28px 22px;
  box-shadow:var(--shadow); border:1px solid rgba(15,76,92,.06); text-align:center; transition:var(--t);
}
.visit-card:hover { transform:translateY(-6px); box-shadow:var(--shadow-lg) }
.visit-icon {
  width:64px; height:64px; margin:0 auto 16px;
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  border-radius:50%; display:flex; align-items:center; justify-content:center;
  font-size:28px; box-shadow:0 6px 20px rgba(15,76,92,.22);
}
.visit-card h4 { font-size:15px; font-weight:700; color:var(--teal-deep); margin-bottom:10px }
body.dark .visit-card h4 { color:#e8f4f7 }
.visit-card p { font-size:13px; color:var(--text-muted); line-height:1.7 }

/* ADVICE */
.advice-sec {
  background:linear-gradient(135deg,var(--teal-deep),var(--teal-mid));
  padding:80px 48px; position:relative; overflow:hidden;
}
.advice-sec::before {
  content:'💡'; position:absolute; font-size:280px; opacity:.04; right:-20px; bottom:-20px; pointer-events:none;
}
.advice-grid { max-width:1200px; margin:auto; display:grid; grid-template-columns:repeat(auto-fill,minmax(260px,1fr)); gap:22px }
.adv-card {
  background:rgba(255,255,255,.07); border-radius:var(--radius); padding:26px 22px;
  border:1px solid rgba(255,255,255,.1); backdrop-filter:blur(10px); transition:var(--t);
}
.adv-card:hover { background:rgba(255,255,255,.12); transform:translateY(-4px) }
.adv-icon { font-size:32px; margin-bottom:14px; display:block }
.adv-title { font-size:16px; font-weight:700; color:var(--gold); margin-bottom:10px }
.adv-text { font-size:13px; color:rgba(255,255,255,.72); line-height:1.8 }

/* APPOINTMENT */
.appt-sec { padding:80px 48px; background:var(--body-bg) }
.appt-wrap { max-width:860px; margin:auto; background:var(--card-bg); border-radius:var(--radius); box-shadow:var(--shadow-lg); overflow:hidden }
.appt-head { background:linear-gradient(135deg,var(--teal-mid),var(--teal-light)); padding:26px 36px; text-align:center }
.appt-head h3 { color:#fff; font-size:20px; font-weight:700; margin-bottom:5px }
.appt-head p { color:rgba(255,255,255,.7); font-size:13px }
.appt-body { padding:36px }
.form-row { display:grid; grid-template-columns:1fr 1fr; gap:16px }
.fg { margin-bottom:18px }
.fg label { display:block; font-size:12px; font-weight:600; color:var(--teal-deep); margin-bottom:6px }
body.dark .fg label { color:#c8e6ec }
.fg input,.fg select,.fg textarea {
  width:100%; padding:11px 14px; background:var(--body-bg);
  border:1.5px solid rgba(15,76,92,.15); border-radius:var(--radius-sm);
  color:var(--text-dark); font-family:'Cairo',sans-serif; font-size:13px; outline:none; transition:var(--t); direction:rtl;
}
.fg input:focus,.fg select:focus,.fg textarea:focus { border-color:var(--teal-light); box-shadow:0 0 0 3px rgba(15,76,92,.08) }
.fg select option { background:var(--card-bg) }
.btn-submit {
  width:100%; background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  color:#fff; font-family:'Cairo',sans-serif; font-size:14px; font-weight:700;
  padding:13px 24px; border:none; border-radius:var(--radius-sm);
  cursor:pointer; transition:var(--t); box-shadow:0 4px 16px rgba(15,76,92,.3);
}
.btn-submit:hover { transform:translateY(-2px); box-shadow:0 8px 24px rgba(15,76,92,.4); background:linear-gradient(135deg,var(--teal-deep),var(--teal-mid)) }

/* CONTACT & FOOTER */
.contact-strip { background:var(--body-bg); padding:50px 48px; border-top:1px solid rgba(15,76,92,.08) }
.contact-inner { max-width:1200px; margin:auto; display:grid; grid-template-columns:repeat(3,1fr); gap:24px }
.contact-card {
  background:var(--card-bg); border-radius:var(--radius); padding:28px 24px;
  box-shadow:var(--shadow); display:flex; align-items:flex-start; gap:16px;
  transition:var(--t); border:1px solid rgba(15,76,92,.06);
}
.contact-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg) }
.cicon { width:50px; height:50px; min-width:50px; background:linear-gradient(135deg,var(--teal-mid),var(--teal-light)); border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:22px; box-shadow:0 4px 12px rgba(15,76,92,.2) }
.cinfo h4 { font-size:14px; font-weight:700; color:var(--teal-deep); margin-bottom:5px }
body.dark .cinfo h4 { color:var(--gold) }
.cinfo p { font-size:13px; color:var(--text-muted); line-height:1.7 }

footer { background:linear-gradient(135deg,#071e26,#0b3c49); padding:50px 48px 0 }
.footer-inner { max-width:1200px; margin:auto; display:grid; grid-template-columns:2fr 1fr 1fr 1fr; gap:40px; padding-bottom:40px; border-bottom:1px solid rgba(255,255,255,.08) }
.footer-brand p { font-size:13.5px; color:rgba(255,255,255,.5); line-height:1.8; margin-top:14px; max-width:280px }
.footer-logo { display:flex; align-items:center; gap:10px; margin-bottom:4px }
.footer-logo-icon { width:40px; height:40px; background:linear-gradient(135deg,var(--teal-light),var(--teal-glow)); border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:18px }
.footer-logo-name { font-size:15px; font-weight:700; color:var(--gold) }
.footer-col h4 { font-size:13px; font-weight:700; color:var(--gold); margin-bottom:18px; padding-bottom:10px; border-bottom:1px solid rgba(255,209,102,.2) }
.footer-links { list-style:none }
.footer-links li { margin-bottom:10px }
.footer-links a { color:rgba(255,255,255,.5); font-size:13px; text-decoration:none; transition:var(--t); display:flex; align-items:center; gap:7px }
.footer-links a::before { content:'›'; color:var(--gold) }
.footer-links a:hover { color:var(--gold); gap:11px }
.fci { display:flex; align-items:flex-start; gap:10px; margin-bottom:12px }
.fci .icon { font-size:14px; margin-top:2px }
.fci p { font-size:12.5px; color:rgba(255,255,255,.5); line-height:1.6 }
.social-links { display:flex; gap:10px; margin-top:16px }
.social-btn { width:38px; height:38px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:18px; text-decoration:none; transition:var(--t); border:1px solid rgba(255,255,255,.1) }
.social-btn:hover { transform:translateY(-3px) scale(1.1); border-color:var(--gold) }
.fb-btn { background:#1877f2 }
.footer-bottom { max-width:1200px; margin:0 auto; padding:18px 0; text-align:center; color:rgba(255,255,255,.35); font-size:12px }
.footer-bottom span { color:var(--gold) }

#backTop {
  position:fixed; bottom:28px; left:28px; z-index:500;
  width:44px; height:44px; background:var(--teal-mid); color:var(--gold);
  border:none; border-radius:12px; font-size:20px; cursor:pointer;
  display:flex; align-items:center; justify-content:center;
  box-shadow:0 4px 18px rgba(11,60,73,.4); opacity:0; transform:translateY(10px); transition:var(--t);
}
#backTop.show { opacity:1; transform:translateY(0) }
#backTop:hover { background:var(--gold); color:var(--teal-deep) }

.reveal { opacity:0; transform:translateY(30px); transition:opacity .7s ease,transform .7s ease }
.reveal.visible { opacity:1; transform:translateY(0) }
.reveal-l { opacity:0; transform:translateX(30px); transition:opacity .7s ease,transform .7s ease }
.reveal-l.visible { opacity:1; transform:translateX(0) }

@media(max-width:900px){
  .navbar,.top-bar,.back-bar { padding-left:20px; padding-right:20px }
  .page-hero { padding:40px 20px }
  .page-hero-inner { flex-direction:column }
  .hero-float-card { display:none }
  .about-grid { grid-template-columns:1fr }
  .contact-inner { grid-template-columns:1fr }
  .footer-inner { grid-template-columns:1fr 1fr }
  .about-sec,.ops-sec,.visit-sec,.advice-sec,.appt-sec,.contact-strip { padding-left:20px; padding-right:20px }
  footer { padding:40px 20px 0 }
  .form-row { grid-template-columns:1fr }
}
@media(max-width:640px){
  .nav-links { display:none }
  .footer-inner { grid-template-columns:1fr }
}
</style>
</head>
<body>

<!-- TOP BAR -->
<div class="top-bar">
  <div style="display:flex;align-items:center;gap:6px">
    <span class="pulse-dot"></span>
    خدمة الطوارئ العاجلة <strong>24/24</strong>
  </div>
  <span>⏰ ساعات الاستقبال: 08:00 — 20:00 &nbsp;|&nbsp; 📍 أولاد جلال، ولاية بسكرة</span>
</div>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <a href="<?php echo e(route('home')); ?>" class="logo">
    <div class="logo-icon">🏥</div>
    <div>
      <span class="logo-name">عاشور زيان</span>
      <span class="logo-sub">المؤسسة الاستشفائية</span>
    </div>
  </a>
  <ul class="nav-links">
    <li><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
    <li class="dropdown">
      <span class="dropdown-toggle" style="cursor:pointer; color:var(--teal-mid); font-weight:700;">قسم الجراحة▾</span>
      <div class="dropdown-menu">
        <a href="<?php echo e(route('surgery.women')); ?>">جراحة النساء والتوليد</a>
        <a href="<?php echo e(route('surgery.men')); ?>">جراحة الرجال</a>
        <a href="<?php echo e(route('orthopedics')); ?>">جراحة العظام والمفاصل</a>
        <a href="<?php echo e(route('urology')); ?>">جراحة المسالك البولية</a>
        <a href="<?php echo e(route('general.surgery')); ?>">الجراحة العامة</a>
      </div>
    </li>
    <li><a href="<?php echo e(route('maternite')); ?>">الأمومة والطفولة</a></li>
    <li><a href="<?php echo e(route('services')); ?>">خدماتنا</a></li>
    <li><a href="<?php echo e(route('about')); ?>">نبذة عنا</a></li>
    <li><a href="<?php echo e(route('contact')); ?>">اتصل بنا</a></li>
  </ul>
  <div class="nav-actions">
    <button class="dark-toggle" id="darkToggle">🌙</button>
    <a href="<?php echo e(route('login')); ?>" class="nav-login">🔐 دخول الطاقم</a>
  </div>
</nav>

<!-- BACK BAR -->
<div class="back-bar">
  <a href="<?php echo e(route('home')); ?>" class="back-btn">
    <span class="arr">◄</span> العودة إلى الرئيسية
  </a>
  <div class="breadcrumb">
    <a href="<?php echo e(route('home')); ?>">🏠 الرئيسية</a>
    <span>›</span>
    <span class="breadcrumb-cur">💧 جراحة المسالك البولية</span>
  </div>
</div>

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="page-hero-bg-icon">💧</div>
  <div class="page-hero-inner">
    <div>
      <div class="hero-badge">🏥 قسم متخصص — عاشور زيان</div>
      <h1 class="hero-title">جراحة <span>المسالك البولية</span></h1>
      <p class="hero-subtitle">رعاية شاملة ومتخصصة لتشخيص وعلاج أمراض الكلى، والمثانة، والبروستاتا، ومختلف مشاكل الجهاز البولي للرجال والنساء بأحدث المناظير والتقنيات.</p>
      <div class="hero-stats">
        <div class="hstat"><div class="hstat-num">+300</div><div class="hstat-lbl">عملية سنوياً</div></div>
        <div class="hstat"><div class="hstat-num">5</div><div class="hstat-lbl">جراحون متخصصون</div></div>
        <div class="hstat"><div class="hstat-num">24/7</div><div class="hstat-lbl">طوارئ المسالك</div></div>
      </div>
    </div>
    <div class="hero-float-card">
      <span class="big-em">💧</span>
      <h4>قسم المسالك البولية</h4>
      <p>دقة فائقة ورعاية متقدمة عبر أحدث تقنيات المنظار</p>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="about-sec">
  <div class="about-grid">
    <div class="about-text reveal">
      <h3>ما هي جراحة المسالك البولية؟</h3>
      <p>يختص هذا القسم الطبي بتشخيص وعلاج أمراض الجهاز البولي والجهاز التناسلي، باستخدام وسائل تكنولوجية متقدمة لضمان دقة التشخيص وسرعة العلاج.</p>
      <p>يمتاز قسم المسالك البولية بتوفر تقنيات الجراحة طفيفة التوغل (المنظار)، وأجهزة تفتيت الحصى، وخبرات طبية تتعامل مع أدق التفاصيل لضمان سلامة الكلى والحالب.</p>
      <div class="feat-list">
        <div class="feat-item"><span class="feat-icon">🔬</span><div class="feat-text"><strong>التنظير والجراحة طفيفة التوغل</strong><span>عمليات دقيقة للمثانة والكلى بأقل مضاعفات</span></div></div>
        <div class="feat-item"><span class="feat-icon">💥</span><div class="feat-text"><strong>تفتيت وعلاج الحصى</strong><span>تقنيات حديثة لتفتيت حصى الكلى والحالب دون ألم</span></div></div>
        <div class="feat-item"><span class="feat-icon">🩺</span><div class="feat-text"><strong>تشخيص مبكر للأورام</strong><span>فحوصات شاملة لاكتشاف أورام المسالك والبروستاتا</span></div></div>
      </div>
    </div>
    <div class="reveal-l">
      <div class="about-visual">
        <div class="av-badge">⭐ قسم متميز</div>
        <div class="av-icon">💧</div>
        <h4>قسم المسالك البولية</h4>
        <p>نهتم بصحة الكليتين والجهاز البولي بأحدث أجهزة التفتيت والمناظير.</p>
      </div>
    </div>
  </div>
</section>

<!-- OPERATIONS -->
<section class="ops-sec">
  <div style="max-width:1200px;margin:auto">
    <div class="sec-header reveal">
      <span class="eyebrow">تخصصاتنا</span>
      <h2 class="sec-title">أهم الإجراءات والعمليات</h2>
      <div class="sec-line"></div>
    </div>
    <div class="ops-grid">
      <div class="op-card reveal"><div class="op-icon">💥</div><div class="op-title">تفتيت الحصى بالليزر</div><p class="op-desc">إجراء دقيق لتفتيت حصى الكلى والحالب باستخدام الليزر دون الحاجة لشق جراحي.</p><span class="op-tag">🔹 تنظير / ليزر</span></div>
      <div class="op-card reveal"><div class="op-icon">👨‍⚕️</div><div class="op-title">جراحة البروستاتا</div><p class="op-desc">علاج تضخم البروستاتا الحميد واستئصال الأورام عبر تقنية التنظير المتقدمة.</p><span class="op-tag">🔹 جراحة دقيقة</span></div>
      <div class="op-card reveal"><div class="op-icon">🩺</div><div class="op-title">تنظير المثانة</div><p class="op-desc">تشخيص وعلاج أورام ومشاكل المثانة باستخدام المناظير المرنة والصلبة.</p><span class="op-tag">🔹 تشخيص وعلاج</span></div>
      <div class="op-card reveal"><div class="op-icon">🫀</div><div class="op-title">أورام الجهاز البولي</div><p class="op-desc">الاستئصال الجراحي للأورام في الكلى أو المثانة أو البروستاتا بخبرات متخصصة.</p><span class="op-tag">🔹 جراحة كبرى</span></div>
      <div class="op-card reveal"><div class="op-icon">👦</div><div class="op-title">جراحة المسالك للأطفال</div><p class="op-desc">تصحيح التشوهات الخلقية في الجهاز البولي لدى الأطفال بمهارة واحترافية.</p><span class="op-tag">🔹 طب الأطفال</span></div>
      <div class="op-card reveal"><div class="op-icon">🩸</div><div class="op-title">علاج السلس البولي</div><p class="op-desc">طرق جراحية وعلاجية حديثة لإنهاء معاناة السلس البولي لدى النساء والرجال.</p><span class="op-tag">🔹 علاج متقدم</span></div>
    </div>
  </div>
</section>

<!-- WHEN TO VISIT -->
<section class="visit-sec">
  <div style="max-width:1200px;margin:auto">
    <div class="sec-header reveal">
      <span class="eyebrow">الأعراض والتشخيص</span>
      <h2 class="sec-title">متى تجب زيارة طبيب المسالك؟</h2>
      <div class="sec-line"></div>
    </div>
    <div class="visit-grid">
      <div class="visit-card reveal"><div class="visit-icon">💢</div><h4>ألم أسفل الظهر أو الجنب</h4><p>آلام حادة قد تمتد أسفل البطن وترافق الحصوات الكلوية.</p></div>
      <div class="visit-card reveal"><div class="visit-icon">🩸</div><h4>تغير لون البول</h4><p>وجود دم في البول (البيلة الدموية) أو تغير لونه يستدعي تشخيصاً عاجلاً.</p></div>
      <div class="visit-card reveal"><div class="visit-icon">🚽</div><h4>صعوبة وألم التبول</h4><p>الحرقة أو كثرة التبول وخاصة ليلاً من علامات مشاكل البروستاتا أو المثانة.</p></div>
      <div class="visit-card reveal"><div class="visit-icon">⚠️</div><h4>سلس البول وتأخره</h4><p>عدم التحكم بالبول أو صعوبة بدء عملية التبول.</p></div>
    </div>
  </div>
</section>

<!-- APPOINTMENT -->
<section class="appt-sec" id="appointment">
  <div style="max-width:1200px;margin:auto">
    <div class="sec-header reveal">
      <span class="eyebrow">حجز المواعيد</span>
      <h2 class="sec-title">احجز موعدك في قسم المسالك</h2>
      <div class="sec-line"></div>
    </div>
    <div class="appt-wrap reveal">
      <div class="appt-head">
        <h3>📋 نموذج حجز الموعد</h3>
        <p>يُرجى ملء جميع الحقول وسيتصل بك فريقنا لتأكيد الموعد</p>
      </div>
      <div class="appt-body">
        <div class="form-row">
          <div class="fg"><label>الاسم</label><input type="text" id="fname" placeholder="محمد"></div>
          <div class="fg"><label>اللقب</label><input type="text" id="lname" placeholder="بن علي"></div>
        </div>
        <div class="form-row">
          <div class="fg"><label>رقم الهاتف</label><input type="tel" id="fphone" placeholder="0555 000 000"></div>
          <div class="fg"><label>العمر</label><input type="number" id="fage" placeholder="45"></div>
        </div>
        <div class="fg">
          <label>نوع الاستشارة</label>
          <select id="ftype">
            <option value="">اختر نوع الاستشارة...</option>
            <option>استشارة أولى — كشف وتشخيص</option>
            <option>مغص كلوي أو حصى</option>
            <option>مشاكل البروستاتا</option>
            <option>متابعة ما بعد العملية</option>
          </select>
        </div>
        <div class="fg"><label>التاريخ المفضل</label><input type="date" id="fdate"></div>
        <div class="fg"><label>ملاحظات (اختياري)</label><textarea id="fnote" rows="3" placeholder="صف حالتك أو أي ملاحظات إضافية..."></textarea></div>
        <button class="btn-submit" onclick="handleBooking()">✅ تأكيد حجز الموعد</button>
      </div>
    </div>
  </div>
</section>

<!-- CONTACT -->
<div class="contact-strip">
  <div class="contact-inner">
    <div class="contact-card reveal"><div class="cicon">📍</div><div class="cinfo"><h4>موقعنا</h4><p>أولاد جلال — ولاية بسكرة<br>الجزائر</p></div></div>
    <div class="contact-card reveal"><div class="cicon">📞</div><div class="cinfo"><h4>اتصل بنا</h4><p>014 25 36 78<br>🚑 طوارئ: متاح 24/24</p></div></div>
    <div class="contact-card reveal"><div class="cicon">🕐</div><div class="cinfo"><h4>ساعات العمل</h4><p>الأحد – الخميس: 08:00 – 20:00<br>الطوارئ: 24/24 — 7/7</p></div></div>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="footer-logo"><div class="footer-logo-icon">🏥</div><span class="footer-logo-name">عاشور زيان</span></div>
      <p>المؤسسة العمومية الاستشفائية عاشور زيان — خدمات طبية متكاملة لسكان أولاد جلال والبلديات المجاورة.</p>
      <div class="social-links"><a href="#" class="social-btn fb-btn">📘</a></div>
    </div>
    <div class="footer-col">
      <h4>روابط سريعة</h4>
      <ul class="footer-links">
        <li><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
        <li><a href="<?php echo e(route('maternite')); ?>">الأمومة والطفولة</a></li>
        <li><a href="<?php echo e(route('about')); ?>">نبذة عن المستشفى</a></li>
        <li><a href="<?php echo e(route('services')); ?>">خدماتنا</a></li>
        <li><a href="<?php echo e(route('contact')); ?>">اتصل بنا</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>الأقسام الطبية</h4>
      <ul class="footer-links">
        <li><a href="<?php echo e(route('general.surgery')); ?>">الجراحة العامة</a></li>
        <li><a href="<?php echo e(route('surgery.women')); ?>">جراحة النساء</a></li>
        <li><a href="<?php echo e(route('orthopedics')); ?>">جراحة العظام</a></li>
        <li><a href="<?php echo e(route('urology')); ?>">جراحة المسالك البولية</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>معلومات الاتصال</h4>
      <div class="fci"><span class="icon">📍</span><p>أولاد جلال — ولاية بسكرة، الجزائر</p></div>
      <div class="fci"><span class="icon">📞</span><p>014 25 36 78</p></div>
      <div class="fci"><span class="icon">🚑</span><p>الطوارئ: متاح 24/24</p></div>
    </div>
  </div>
  <div class="footer-bottom">© <?php echo e(date('Y')); ?> — <span>المؤسسة العمومية الاستشفائية عاشور زيان</span> — جميع الحقوق محفوظة 🇩🇿</div>
</footer>

<button id="backTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">▲</button>

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

document.getElementById('darkToggle').addEventListener('click', function() {
  document.body.classList.toggle('dark');
  this.textContent = document.body.classList.contains('dark') ? '☀️' : '🌙';
});
const bt = document.getElementById('backTop');
window.addEventListener('scroll', () => bt.classList.toggle('show', scrollY > 400));
const nav = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  nav.style.boxShadow = scrollY > 50 ? '0 4px 30px rgba(11,60,73,0.2)' : '0 2px 20px rgba(11,60,73,0.1)';
});
const obs = new IntersectionObserver((entries) => {
  entries.forEach((e, i) => {
    if (e.isIntersecting) { setTimeout(() => e.target.classList.add('visible'), i * 80); obs.unobserve(e.target); }
  });
}, { threshold: 0.12 });
document.querySelectorAll('.reveal, .reveal-l').forEach(el => obs.observe(el));
function handleBooking() {
  const fields = ['fname','lname','fphone','ftype','fdate'].map(id => document.getElementById(id));
  let valid = true;
  fields.forEach(inp => {
    if (!inp.value) { inp.style.borderColor='#ef4444'; inp.style.boxShadow='0 0 0 3px rgba(239,68,68,.1)'; valid=false; }
    else { inp.style.borderColor=''; inp.style.boxShadow=''; }
  });
  if (valid) {
    alert('✅ تم استلام طلب الحجز بنجاح!\nسيتصل بك فريق المسالك البولية قريباً لتأكيد الموعد.');
    fields.forEach(inp => inp.value='');
    document.getElementById('fnote').value='';
  }
}
</script>
</body>
</html>
<?php /**PATH D:\web apps\Github-Project\SmartSurgery\resources\views/urology.blade.php ENDPATH**/ ?>