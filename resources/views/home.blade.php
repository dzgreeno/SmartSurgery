<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>مستشفى عاشور زيان | أولاد جلال</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
<style>
:root {
  --teal-deep:  #0b3c49;
  --teal-mid:   #0f4c5c;
  --teal-light: #1a7a8a;
  --teal-glow:  #2aa6b8;
  --gold:       #ffd166;
  --gold-deep:  #f5a623;
  --white:      #ffffff;
  --glass:      rgba(255,255,255,0.07);
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
  --card-bg:   #0d3d4a;
  --body-bg:   #071e26;
  --text-dark: #e8f4f7;
  --text-muted:#8ab8c4;
  --shadow:    0 8px 32px rgba(0,0,0,0.4);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Cairo',sans-serif;background:var(--body-bg);color:var(--text-dark);transition:background .4s,color .4s;overflow-x:hidden}
::-webkit-scrollbar{width:6px}
::-webkit-scrollbar-track{background:var(--teal-deep)}
::-webkit-scrollbar-thumb{background:var(--gold);border-radius:3px}

/* TOP BAR */
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
  transition:var(--t);
}
body.dark .navbar{background:rgba(7,30,38,.97);border-bottom:1px solid rgba(255,255,255,.06)}
.logo{display:flex;align-items:center;gap:12px;text-decoration:none}
.logo-icon{
  width:42px;height:42px;
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  border-radius:12px;display:flex;align-items:center;justify-content:center;
  font-size:20px;box-shadow:0 4px 12px rgba(15,76,92,.3);
}
.logo-name{font-size:14px;font-weight:700;color:var(--teal-deep);display:block}
body.dark .logo-name{color:var(--gold)}
.logo-sub{font-size:10px;color:var(--text-muted);display:block}
.nav-links{list-style:none;display:flex;gap:2px;align-items:center}
.nav-links a,.nav-links > li > span{
  text-decoration:none;color:var(--text-dark);
  font-size:12.5px;font-weight:500;
  padding:8px 12px;border-radius:var(--radius-sm);
  cursor:pointer;transition:var(--t);display:block;white-space:nowrap;
}
.nav-links a:hover,.nav-links > li > span:hover{background:rgba(15,76,92,.08);color:var(--teal-mid)}
body.dark .nav-links a,body.dark .nav-links > li > span{color:#c8e6ec}
body.dark .nav-links a:hover{background:rgba(42,166,184,.15);color:var(--gold)}
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
@keyframes dropIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:translateY(0)}}
.dropdown-menu a{
  display:flex;align-items:center;gap:10px;
  padding:11px 16px;font-size:12.5px;
  border-bottom:1px solid rgba(15,76,92,.06);
  color:var(--text-dark);transition:var(--t);
}
.dropdown-menu a::before{content:'◈';color:var(--teal-light);font-size:10px}
.dropdown-menu a:hover{background:rgba(15,76,92,.06);color:var(--teal-mid);padding-right:22px}
.nav-actions{display:flex;align-items:center;gap:10px}
.dark-toggle{
  width:38px;height:38px;background:var(--gold);
  border:none;border-radius:10px;cursor:pointer;font-size:17px;
  display:flex;align-items:center;justify-content:center;
  transition:var(--t);box-shadow:0 2px 8px rgba(245,166,35,.3);
}
.dark-toggle:hover{transform:scale(1.1)}
body.dark .dark-toggle{background:var(--teal-mid)}
.search-wrap{position:relative;display:flex;align-items:center}
.search-wrap input{
  padding:8px 14px 8px 36px;
  border:1.5px solid rgba(15,76,92,.15);
  border-radius:20px;font-family:'Cairo',sans-serif;font-size:12px;
  background:var(--body-bg);color:var(--text-dark);
  width:160px;transition:var(--t);outline:none;
}
.search-wrap input:focus{border-color:var(--teal-light);width:200px;box-shadow:0 0 0 3px rgba(15,76,92,.08)}
.search-wrap::before{content:'🔍';position:absolute;left:10px;font-size:13px;pointer-events:none}
.nav-login{
  display:inline-flex;align-items:center;gap:7px;
  padding:9px 18px;border-radius:var(--radius-sm);
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  color:#fff;font-size:12.5px;font-weight:700;
  text-decoration:none;transition:var(--t);
  box-shadow:0 3px 12px rgba(15,76,92,.3);
}
.nav-login:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(15,76,92,.4)}

/* HERO */
.hero{height:92vh;position:relative;overflow:hidden}
.hero-slide{
  position:absolute;inset:0;
  background-size:cover;background-position:center;
  opacity:0;transition:opacity 1.2s ease;
}
.hero-slide.active{opacity:1}
.hero-overlay{
  position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(7,30,38,.85) 0%,rgba(11,60,73,.6) 50%,rgba(15,76,92,.3) 100%);
  z-index:1;
}
.hero-content{
  position:absolute;inset:0;z-index:2;
  display:flex;flex-direction:column;
  justify-content:center;align-items:flex-end;
  padding:0 80px;text-align:right;
}
.hero-badge{
  background:var(--gold);color:var(--teal-deep);
  font-size:11px;font-weight:700;
  padding:5px 14px;border-radius:20px;
  margin-bottom:18px;letter-spacing:1px;
  animation:fadeDown .8s ease both;
}
.hero-title{
  font-family:'Amiri',serif;
  font-size:clamp(36px,5vw,62px);
  font-weight:700;color:#fff;line-height:1.2;
  margin-bottom:16px;max-width:600px;
  animation:fadeRight 1s ease .2s both;
}
.hero-title span{color:var(--gold)}
.hero-subtitle{
  font-size:16px;color:rgba(255,255,255,.8);
  margin-bottom:32px;max-width:480px;line-height:1.8;
  animation:fadeRight 1s ease .4s both;
}
.hero-btns{display:flex;gap:14px;animation:fadeUp 1s ease .6s both}
.btn-primary{
  background:var(--gold);color:var(--teal-deep);
  font-family:'Cairo',sans-serif;font-size:13px;font-weight:700;
  padding:13px 28px;border:none;border-radius:10px;
  cursor:pointer;transition:var(--t);
  box-shadow:0 4px 18px rgba(255,209,102,.4);
  text-decoration:none;display:inline-flex;align-items:center;gap:8px;
}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(255,209,102,.5)}
.btn-outline{
  background:transparent;color:#fff;
  border:2px solid rgba(255,255,255,.5);
  font-family:'Cairo',sans-serif;font-size:13px;font-weight:600;
  padding:11px 26px;border-radius:10px;
  cursor:pointer;transition:var(--t);
  text-decoration:none;display:inline-flex;align-items:center;gap:8px;
}
.btn-outline:hover{border-color:var(--gold);color:var(--gold)}
.slider-dots{
  position:absolute;bottom:28px;left:50%;
  transform:translateX(-50%);z-index:3;
  display:flex;gap:8px;
}
.dot{
  width:8px;height:8px;border-radius:4px;
  background:rgba(255,255,255,.4);cursor:pointer;transition:var(--t);
}
.dot.active{width:28px;background:var(--gold)}
.slide-counter{
  position:absolute;bottom:28px;right:48px;z-index:3;
  color:rgba(255,255,255,.5);font-size:13px;
}
.slide-counter strong{color:var(--gold);font-weight:700;font-size:18px}
.hero-emergency{
  position:absolute;bottom:0;left:0;right:0;z-index:3;
  background:linear-gradient(90deg,rgba(185,28,28,.92),rgba(239,68,68,.88));
  padding:10px 48px;
  display:flex;align-items:center;gap:20px;
}
.emg-icon{font-size:20px;animation:shake 1s infinite}
@keyframes shake{0%,100%{transform:rotate(0)}25%{transform:rotate(-10deg)}75%{transform:rotate(10deg)}}
.emg-txt{color:#fff;font-size:13px;font-weight:600;flex:1;display:flex;align-items:center;gap:12px}
.emg-num{color:var(--gold);font-size:18px;font-weight:900;letter-spacing:2px}
@keyframes fadeDown{from{opacity:0;transform:translateY(-20px)}to{opacity:1;transform:translateY(0)}}
@keyframes fadeRight{from{opacity:0;transform:translateX(30px)}to{opacity:1;transform:translateX(0)}}
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}

/* STATS */
.stats-strip{background:linear-gradient(135deg,var(--teal-deep),var(--teal-mid));overflow:hidden}
.stats-inner{max-width:1200px;margin:auto;display:grid;grid-template-columns:repeat(4,1fr)}
.stat-item{
  padding:28px 20px;text-align:center;
  border-left:1px solid rgba(255,255,255,.1);
  transition:var(--t);cursor:default;
}
.stat-item:last-child{border-left:none}
.stat-item:hover{background:rgba(255,255,255,.05)}
.stat-number{font-size:36px;font-weight:900;color:var(--gold);line-height:1;margin-bottom:4px}
.stat-label{font-size:12px;color:rgba(255,255,255,.7)}

/* SECTIONS */
.section-header{text-align:center;margin-bottom:50px}
.eyebrow{
  display:inline-block;font-size:11px;font-weight:700;
  letter-spacing:2px;text-transform:uppercase;
  color:var(--teal-light);background:rgba(15,76,92,.08);
  padding:5px 16px;border-radius:20px;margin-bottom:14px;
}
body.dark .eyebrow{color:var(--gold);background:rgba(255,209,102,.1)}
.section-title{
  font-family:'Amiri',serif;
  font-size:clamp(26px,4vw,40px);
  color:var(--teal-deep);line-height:1.2;margin-bottom:14px;
}
body.dark .section-title{color:var(--gold)}
.section-line{
  width:60px;height:3px;margin:0 auto;
  background:linear-gradient(90deg,var(--gold),var(--teal-light));
  border-radius:2px;
}

/* DEPARTMENTS */
.departments{padding:80px 48px;background:var(--body-bg)}
.dept-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:22px}
.dept-card{
  background:var(--card-bg);border-radius:var(--radius);
  overflow:hidden;box-shadow:var(--shadow);
  border:1px solid rgba(15,76,92,.06);
  transition:var(--t);cursor:pointer;position:relative;
}
.dept-card::before{
  content:'';position:absolute;top:0;right:0;left:0;height:3px;
  background:linear-gradient(90deg,var(--teal-light),var(--gold));
  transform:scaleX(0);transition:var(--t);transform-origin:right;
}
.dept-card:hover::before{transform:scaleX(1)}
.dept-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-lg);border-color:rgba(15,76,92,.15)}
.dept-img-wrap{position:relative;overflow:hidden;height:190px}
.dept-img-wrap img{width:100%;height:100%;object-fit:cover;transition:transform .6s ease}
.dept-card:hover .dept-img-wrap img{transform:scale(1.06)}
.dept-overlay{position:absolute;inset:0;background:linear-gradient(0deg,rgba(7,30,38,.5) 0%,transparent 60%)}
.dept-body{padding:18px 20px}
.dept-icon{
  width:44px;height:44px;
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  border-radius:12px;display:flex;align-items:center;justify-content:center;
  font-size:20px;margin-bottom:12px;
  box-shadow:0 4px 12px rgba(15,76,92,.2);
}
.dept-name{font-size:17px;font-weight:700;color:var(--teal-deep);margin-bottom:8px}
body.dark .dept-name{color:#e8f4f7}
.dept-desc{font-size:13px;color:var(--text-muted);line-height:1.7;margin-bottom:14px}
.dept-link{
  font-size:12.5px;font-weight:600;color:var(--teal-light);
  text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:var(--t);
}
.dept-link:hover{color:var(--gold);gap:10px}

/* INFO CARDS */
.info-section{padding:0 48px 80px}
.info-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:24px}
.info-card{
  background:var(--card-bg);border-radius:var(--radius);
  box-shadow:var(--shadow);overflow:hidden;
  transition:var(--t);border:1px solid rgba(15,76,92,.06);
}
.info-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-lg)}
.info-card-img{width:100%;height:200px;object-fit:cover;display:block;transition:transform .5s ease}
.info-card:hover .info-card-img{transform:scale(1.04)}
.info-card-body{padding:20px 22px}
.info-card-tag{
  display:inline-block;background:rgba(15,76,92,.08);color:var(--teal-mid);
  font-size:10.5px;font-weight:700;letter-spacing:1px;text-transform:uppercase;
  padding:3px 10px;border-radius:20px;margin-bottom:10px;
}
body.dark .info-card-tag{background:rgba(255,209,102,.1);color:var(--gold)}
.info-card-title{font-size:17px;font-weight:700;color:var(--teal-deep);margin-bottom:8px}
body.dark .info-card-title{color:#e8f4f7}
.info-card-text{font-size:13px;color:var(--text-muted);line-height:1.7}
.info-card-footer{
  padding:12px 22px;border-top:1px solid rgba(15,76,92,.06);
  display:flex;align-items:center;justify-content:space-between;
}
.read-more{
  font-size:12.5px;font-weight:600;color:var(--teal-light);
  text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:var(--t);
}
.read-more:hover{color:var(--gold)}

/* DOCTORS */
.doctors-section{
  background:linear-gradient(135deg,#e8f4f7,#d1ecf1);
  padding:80px 48px;
}
body.dark .doctors-section{background:linear-gradient(135deg,#061a21,#071e26)}
.doctors-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:22px}
.doctor-card{
  background:var(--card-bg);border-radius:var(--radius);
  padding:28px 20px;text-align:center;
  box-shadow:var(--shadow);transition:var(--t);
  border:1px solid rgba(15,76,92,.06);
}
.doctor-card:hover{transform:translateY(-8px);box-shadow:var(--shadow-lg)}
.doctor-avatar{
  width:80px;height:80px;border-radius:50%;
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-glow));
  margin:0 auto 14px;display:flex;align-items:center;justify-content:center;
  font-size:36px;box-shadow:0 6px 20px rgba(15,76,92,.25);
  position:relative;
}
.doctor-avatar::after{
  content:'';position:absolute;
  width:18px;height:18px;background:#22c55e;
  border-radius:50%;bottom:2px;left:2px;
  border:2.5px solid var(--card-bg);
}
.doctor-name{font-size:15px;font-weight:700;color:var(--teal-deep);margin-bottom:4px}
body.dark .doctor-name{color:#e8f4f7}
.doctor-spec{font-size:12px;color:var(--teal-light);margin-bottom:12px}
.doctor-stars{color:var(--gold);font-size:14px;margin-bottom:8px}
.doctor-exp{
  font-size:11px;color:var(--text-muted);
  background:rgba(15,76,92,.06);padding:3px 10px;border-radius:20px;
}

/* VIDEOS */
.videos-section{padding:80px 48px;background:var(--body-bg)}
.videos-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:24px}
.video-card{
  background:var(--card-bg);border-radius:var(--radius);
  overflow:hidden;box-shadow:var(--shadow);
  transition:var(--t);border:1px solid rgba(15,76,92,.06);
}
.video-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-lg);border-color:var(--teal-light)}
.video-wrap{position:relative;padding-top:56.25%}
.video-wrap iframe{position:absolute;top:0;left:0;width:100%;height:100%;border:none}
.video-card-body{padding:16px 18px}
.video-tag{
  display:inline-flex;align-items:center;gap:5px;
  background:rgba(15,76,92,.07);color:var(--teal-mid);
  font-size:10.5px;font-weight:700;letter-spacing:.8px;
  padding:3px 10px;border-radius:20px;margin-bottom:10px;
}
body.dark .video-tag{background:rgba(255,209,102,.08);color:var(--gold)}
.video-title{font-size:15px;font-weight:700;color:var(--teal-deep);margin-bottom:6px}
body.dark .video-title{color:#e8f4f7}
.video-desc{font-size:12.5px;color:var(--text-muted);line-height:1.6}
.video-footer{
  padding:10px 18px;border-top:1px solid rgba(15,76,92,.06);
  display:flex;align-items:center;justify-content:space-between;
}
.yt-link{
  display:inline-flex;align-items:center;gap:6px;
  font-size:12px;font-weight:600;color:#ef4444;
  text-decoration:none;transition:var(--t);
}
.yt-link:hover{color:#dc2626;gap:10px}

/* APPOINTMENT */
.appt-section{
  background:linear-gradient(135deg,var(--teal-deep),var(--teal-mid));
  padding:80px 48px;position:relative;overflow:hidden;
}
.appt-section::before{
  content:'🏥';position:absolute;font-size:300px;opacity:.03;
  right:-40px;top:50%;transform:translateY(-50%);pointer-events:none;
}
.appt-inner{
  max-width:1200px;margin:auto;
  display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;
}
.appt-text .eyebrow{background:rgba(255,255,255,.1);color:var(--gold)}
.appt-text .section-title{color:#fff;text-align:right}
.appt-text p{color:rgba(255,255,255,.7);font-size:14px;line-height:1.9;text-align:right;margin-top:14px}
.appt-steps{margin-top:28px;display:flex;flex-direction:column;gap:12px}
.appt-step{display:flex;align-items:center;gap:12px;color:rgba(255,255,255,.8);font-size:13px}
.step-num{
  width:28px;height:28px;
  background:var(--gold);border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  color:var(--teal-deep);font-weight:700;font-size:12px;flex-shrink:0;
}
.appt-form{
  background:rgba(255,255,255,.07);border-radius:var(--radius);
  padding:32px;border:1px solid rgba(255,255,255,.1);
  backdrop-filter:blur(10px);
}
.appt-form h3{color:#fff;font-size:17px;font-weight:700;margin-bottom:20px;text-align:right}
.fg{margin-bottom:16px}
.fg label{display:block;font-size:12px;font-weight:600;color:rgba(255,255,255,.8);margin-bottom:6px}
.fg input,.fg select{
  width:100%;padding:11px 14px;
  background:rgba(255,255,255,.1);
  border:1px solid rgba(255,255,255,.15);
  border-radius:var(--radius-sm);
  color:#fff;font-family:'Cairo',sans-serif;font-size:13px;
  outline:none;transition:var(--t);direction:rtl;
}
.fg input::placeholder{color:rgba(255,255,255,.4)}
.fg input:focus,.fg select:focus{
  border-color:var(--gold);background:rgba(255,255,255,.13);
  box-shadow:0 0 0 3px rgba(255,209,102,.15);
}
.fg select option{background:var(--teal-deep);color:#fff}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.btn-submit{
  width:100%;background:var(--gold);color:var(--teal-deep);
  font-family:'Cairo',sans-serif;font-size:14px;font-weight:700;
  padding:13px 24px;border:none;border-radius:var(--radius-sm);
  cursor:pointer;transition:var(--t);margin-top:4px;
  box-shadow:0 4px 16px rgba(255,209,102,.3);
}
.btn-submit:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(255,209,102,.4)}

/* CONTACT */
.contact-strip{background:var(--body-bg);padding:60px 48px;border-top:1px solid rgba(15,76,92,.08)}
.contact-inner{max-width:1200px;margin:auto;display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.contact-card{
  background:var(--card-bg);border-radius:var(--radius);
  padding:28px 24px;box-shadow:var(--shadow);
  display:flex;align-items:flex-start;gap:16px;
  transition:var(--t);border:1px solid rgba(15,76,92,.06);
}
.contact-card:hover{transform:translateY(-4px);box-shadow:var(--shadow-lg)}
.contact-icon{
  width:50px;height:50px;min-width:50px;
  background:linear-gradient(135deg,var(--teal-mid),var(--teal-light));
  border-radius:12px;display:flex;align-items:center;justify-content:center;
  font-size:22px;box-shadow:0 4px 12px rgba(15,76,92,.2);
}
.contact-info h4{font-size:14px;font-weight:700;color:var(--teal-deep);margin-bottom:5px}
body.dark .contact-info h4{color:var(--gold)}
.contact-info p{font-size:13px;color:var(--text-muted);line-height:1.7}

/* FOOTER */
footer{background:linear-gradient(135deg,#071e26,#0b3c49);padding:60px 48px 0}
.footer-inner{
  max-width:1200px;margin:auto;
  display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:40px;
  padding-bottom:40px;border-bottom:1px solid rgba(255,255,255,.08);
}
.footer-brand p{font-size:13.5px;color:rgba(255,255,255,.5);line-height:1.8;margin-top:14px;max-width:280px}
.footer-logo{display:flex;align-items:center;gap:10px;margin-bottom:4px}
.footer-logo-icon{
  width:40px;height:40px;
  background:linear-gradient(135deg,var(--teal-light),var(--teal-glow));
  border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;
}
.footer-logo-name{font-size:15px;font-weight:700;color:var(--gold)}
.footer-col h4{
  font-size:13px;font-weight:700;color:var(--gold);
  margin-bottom:18px;padding-bottom:10px;
  border-bottom:1px solid rgba(255,209,102,.2);
}
.footer-links{list-style:none}
.footer-links li{margin-bottom:10px}
.footer-links a{
  color:rgba(255,255,255,.5);font-size:13px;text-decoration:none;
  transition:var(--t);display:flex;align-items:center;gap:7px;
}
.footer-links a::before{content:'›';color:var(--gold)}
.footer-links a:hover{color:var(--gold);gap:11px}
.footer-contact-item{display:flex;align-items:flex-start;gap:10px;margin-bottom:12px}
.footer-contact-item .icon{font-size:14px;margin-top:2px}
.footer-contact-item p{font-size:12.5px;color:rgba(255,255,255,.5);line-height:1.6}
.social-links{display:flex;gap:10px;margin-top:16px}
.social-btn{
  width:38px;height:38px;border-radius:10px;
  display:flex;align-items:center;justify-content:center;
  font-size:18px;text-decoration:none;transition:var(--t);
  border:1px solid rgba(255,255,255,.1);
}
.social-btn:hover{transform:translateY(-3px) scale(1.1);border-color:var(--gold)}
.fb-btn{background:#1877f2}
.footer-bottom{
  max-width:1200px;margin:0 auto;padding:18px 0;
  text-align:center;color:rgba(255,255,255,.35);font-size:12px;
}
.footer-bottom span{color:var(--gold)}

/* BACK TO TOP */
#backTop{
  position:fixed;bottom:28px;left:28px;z-index:500;
  width:44px;height:44px;background:var(--teal-mid);
  color:var(--gold);border:none;border-radius:12px;
  font-size:20px;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  box-shadow:0 4px 18px rgba(11,60,73,.4);
  opacity:0;transform:translateY(10px);transition:var(--t);
}
#backTop.show{opacity:1;transform:translateY(0)}
#backTop:hover{background:var(--gold);color:var(--teal-deep)}

/* REVEAL */
.reveal{opacity:0;transform:translateY(30px);transition:opacity .7s ease,transform .7s ease}
.reveal.visible{opacity:1;transform:translateY(0)}
.reveal-l{opacity:0;transform:translateX(30px);transition:opacity .7s ease,transform .7s ease}
.reveal-l.visible{opacity:1;transform:translateX(0)}

/* RESPONSIVE */
@media(max-width:900px){
  .navbar,.top-bar{padding-left:20px;padding-right:20px}
  .hero-content{padding:0 24px;align-items:flex-start}
  .stats-inner{grid-template-columns:repeat(2,1fr)}
  .appt-inner{grid-template-columns:1fr;gap:30px}
  .footer-inner{grid-template-columns:1fr 1fr}
  .contact-inner{grid-template-columns:1fr}
  .departments,.info-section,.videos-section,
  .doctors-section,.appt-section,.contact-strip{padding-left:20px;padding-right:20px}
  footer{padding:40px 20px 0}
}
@media(max-width:640px){
  .nav-links,.nav-actions .search-wrap{display:none}
  .stats-inner{grid-template-columns:1fr 1fr}
  .footer-inner{grid-template-columns:1fr}
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
      <span class="dropdown-toggle" style="cursor:pointer">انواع الجراحة▾</span>
      <div class="dropdown-menu">
        @if(session('firebase_user'))
          <a href="{{ route('surgery.women') }}">جراحة النساء والتوليد</a>
          <a href="{{ route('surgery.men') }}">جراحة الرجال</a>
        @endif
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
    @if(session('firebase_user'))
      <a href="{{ route('dashboard') }}" class="nav-login" style="background: var(--teal-mid);">📊 لوحة التحكم</a>
      <a href="{{ route('logout') }}" class="nav-login" style="background: #ef4444; margin-right: 5px;">🚪 خروج</a>
    @else
      <a href="{{ route('login') }}" class="nav-login">🔐 دخول الطاقم</a>
    @endif
  </div>
</nav>

<!-- HERO -->
<header class="hero" id="hero">
  <div class="hero-slider">
    <div class="hero-slide active" style="background-image:url('{{ asset('https://i.ibb.co/S4NQNFzB/hospital.jpg') }}')"></div>
    <div class="hero-slide" style="background-image:url('{{ asset('images/Captur.jpg') }}')"></div>
    <div class="hero-slide" style="background-image:url('{{ asset('images/Capt9.jpg') }}')"></div>
    <div class="hero-slide" style="background-image:url('{{ asset('https://i.ibb.co/Mxv75WR0/mm.jpg') }}')"></div>
  </div>
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <div class="hero-badge">🏅 أولاد جلال</div>
    <h1 class="hero-title">
      رعاية صحية متكاملة<br>
      بأيدٍ <span>متخصصة وأمينة</span>
    </h1>
    <p class="hero-subtitle">
      نقدم خدمات طبية متنوعة وعالية الجودة مع طاقم طبي متخصص يضمن راحتكم وسلامتكم على مدار الساعة لسكان أكثر من 6 بلديات.
    </p>
    <div class="hero-btns">
      <a href="#appointment" class="btn-primary">📅 احجز موعدك الآن</a>
      <a href="#departments" class="btn-outline">🏥 أقسامنا الطبية</a>
    </div>
  </div>
  <div class="slider-dots" id="sliderDots">
    <div class="dot active"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
  </div>
  <div class="slide-counter"><strong id="slideNum">01</strong> / 04</div>
  <div class="hero-emergency">
    <div class="emg-icon">🚑</div>
    <div class="emg-txt">
      <span>خط الطوارئ على مدار الساعة —</span>
      <span class="emg-num">014253678</span>
      <span>— الرد مجاني</span>
    </div>
  </div>
</header>

<!-- STATS -->
<div class="stats-strip">
  <div class="stats-inner">
    <div class="stat-item reveal"><div class="stat-number" data-target="526">0</div><div class="stat-label">كادر طبي وإداري</div></div>
    <div class="stat-item reveal"><div class="stat-number" data-target="6">0</div><div class="stat-label">بلديات تغطيها المؤسسة</div></div>
    <div class="stat-item reveal"><div class="stat-number" data-target="12">0</div><div class="stat-label">قسم طبي متخصص</div></div>
    <div class="stat-item reveal"><div class="stat-number" data-target="24">0</div><div class="stat-label">ساعة خدمة طوارئ</div></div>
  </div>
</div>

<!-- DEPARTMENTS -->
<section class="departments" id="departments">
  <div style="max-width:1200px;margin:auto">
    <div class="section-header reveal">
      <span class="eyebrow">أقسامنا الطبية</span>
      <h2 class="section-title">التخصصات الطبية الكاملة</h2>
      <div class="section-line"></div>
    </div>
    <div class="dept-grid">
      <div class="dept-card reveal">
        <div class="dept-img-wrap">
          <img src="https://i.ibb.co/0zmMtPx/project-image-14.jpg" alt="جراحة النساء والتوليد" onerror="this.style.background='#0f4c5c';this.style.minHeight='190px'">
          <div class="dept-overlay"></div>
        </div>
        <div class="dept-body">
          <div class="dept-icon">🩺</div>
          <div class="dept-name">جراحة النساء والتوليد</div>
          <p class="dept-desc">رعاية متخصصة للمرأة قبل وبعد الولادة بأحدث الأجهزة وأيدٍ خبيرة.</p>
          <a href="{{ route('surgery.women') }}" class="dept-link">اكتشف القسم ◄</a>
        </div>
      </div>
      <div class="dept-card reveal">
        <div class="dept-img-wrap">
          <img src="https://i.ibb.co/B5QkVZGW/project-image-5.jpg" alt="الأمومة والطفولة" onerror="this.style.background='#0f4c5c';this.style.minHeight='190px'">
          <div class="dept-overlay"></div>
        </div>
        <div class="dept-body">
          <div class="dept-icon">👶</div>
          <div class="dept-name">الأمومة والطفولة</div>
          <p class="dept-desc">متابعة شاملة للحمل ورعاية الطفل من الولادة بأيدٍ أمينة ومتخصصة.</p>
          <a href="{{ route('maternite') }}" class="dept-link">اكتشف القسم ◄</a>
        </div>
      </div>
      <div class="dept-card reveal">
        <div class="dept-img-wrap">
          <img src="https://i.ibb.co/jYHR66W/project-image-3.jpg" alt="قسم الطوارئ" onerror="this.style.background='#0f4c5c';this.style.minHeight='190px'">
          <div class="dept-overlay"></div>
        </div>
        <div class="dept-body">
          <div class="dept-icon">🚨</div>
          <div class="dept-name">قسم الطوارئ</div>
          <p class="dept-desc">استقبال فوري للحالات الحرجة على مدار الساعة بتدخل طبي سريع وفعال.</p>
          <a href="{{ route('services') }}" class="dept-link">اكتشف القسم ◄</a>
        </div>
      </div>
      <div class="dept-card reveal">
        <div class="dept-img-wrap">
          <img src="https://i.ibb.co/Z64Vbq3D/project-image-9.jpg" alt="التشخيص والمخبر" onerror="this.style.background='#0f4c5c';this.style.minHeight='190px'">
          <div class="dept-overlay"></div>
        </div>
        <div class="dept-body">
          <div class="dept-icon">🔬</div>
          <div class="dept-name">التشخيص والمخبر</div>
          <p class="dept-desc">تحاليل طبية وأشعة وإيكوغرافيا بأجهزة حديثة ونتائج دقيقة وسريعة.</p>
          <a href="{{ route('services') }}" class="dept-link">اكتشف القسم ◄</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- INFO CARDS -->
<section class="info-section">
  <div style="max-width:1200px;margin:auto">
    <div class="section-header reveal">
      <span class="eyebrow">معلومات مفيدة</span>
      <h2 class="section-title">كل ما تحتاجه</h2>
      <div class="section-line"></div>
    </div>
    <div class="info-grid">
      <div class="info-card reveal">
        <img src="https://i.ibb.co/gMMXQtz7/project-image-8.jpg" alt="حقوق المريض" class="info-card-img" onerror="this.style.display='none'">
        <div class="info-card-body">
          <span class="info-card-tag">⚖️ حقوق</span>
          <div class="info-card-title">حقوق المريض</div>
          <p class="info-card-text">نضمن احترام حقوق جميع المرضى مع ضمان جودة العلاج والمشاركة الكاملة في القرارات العلاجية.</p>
        </div>
        <div class="info-card-footer"><a href="{{ route('about') }}" class="read-more">اقرأ المزيد ◄</a></div>
      </div>
      <div class="info-card reveal">
        <img src="https://i.ibb.co/zTcXMXcT/project-image-1.jpg" alt="شركاء الصحة" class="info-card-img" onerror="this.style.display='none'">
        <div class="info-card-body">
          <span class="info-card-tag">🤝 شراكات</span>
          <div class="info-card-title">شركاء الصحة — CNAS</div>
          <p class="info-card-text">تعاون مع CNAS وCASNOS وخدمات الصحة المهنية لتقديم أفضل رعاية للمرضى المؤمنين.</p>
        </div>
        <div class="info-card-footer"><a href="{{ route('about') }}" class="read-more">اقرأ المزيد ◄</a></div>
      </div>
      <div class="info-card reveal">
        <img src="https://i.ibb.co/2DTnBqB/project-image-7.jpg" alt="رعاية المرضى" class="info-card-img" onerror="this.style.display='none'">
        <div class="info-card-body">
          <span class="info-card-tag">💊 رعاية</span>
          <div class="info-card-title">رعاية شاملة ومعتمدة</div>
          <p class="info-card-text">رعاية صحية شاملة ومعتمدة لجميع المرضى المؤمنين مع التغطية الكاملة لمراكز التأمين.</p>
        </div>
        <div class="info-card-footer"><a href="{{ route('services') }}" class="read-more">اقرأ المزيد ◄</a></div>
      </div>
    </div>
  </div>
</section>

<!-- DOCTORS -->
<section class="doctors-section">
  <div style="max-width:1200px;margin:auto">
    <div class="section-header reveal">
      <span class="eyebrow">كادرنا الطبي</span>
      <h2 class="section-title">أطباؤنا المتخصصون</h2>
      <div class="section-line"></div>
    </div>
    <div class="doctors-grid">
      <div class="doctor-card reveal"><div class="doctor-avatar">👩‍⚕️</div><div class="doctor-name">د. سارة خليل</div><div class="doctor-spec">جراحة النساء والتوليد</div><div class="doctor-stars">★★★★★</div><span class="doctor-exp">15 سنة خبرة</span></div>
      <div class="doctor-card reveal"><div class="doctor-avatar">👩‍⚕️</div><div class="doctor-name">د. ليلى بوسلطان</div><div class="doctor-spec">أمراض النساء والتوليد</div><div class="doctor-stars">★★★★★</div><span class="doctor-exp">12 سنة خبرة</span></div>
      <div class="doctor-card reveal"><div class="doctor-avatar">👨‍⚕️</div><div class="doctor-name">د. أحمد بن عمر</div><div class="doctor-spec">جراحة عامة</div><div class="doctor-stars">★★★★★</div><span class="doctor-exp">18 سنة خبرة</span></div>
      <div class="doctor-card reveal"><div class="doctor-avatar">👩‍⚕️</div><div class="doctor-name">د. نسرين حمدان</div><div class="doctor-spec">طب الطوارئ والإنعاش</div><div class="doctor-stars">★★★★★</div><span class="doctor-exp">8 سنوات خبرة</span></div>
    </div>
  </div>
</section>

<!-- VIDEOS -->
<section class="videos-section">
  <div style="max-width:1200px;margin:auto">
    <div class="section-header reveal">
      <span class="eyebrow">محتوى تعليمي</span>
      <h2 class="section-title">فيديوهات طبية تعليمية</h2>
      <div class="section-line"></div>
    </div>
    <div class="videos-grid">
      <div class="video-card reveal">
        <div class="video-wrap"><iframe src="https://www.youtube.com/embed/Su5MDS9J_v8?mute=1" allow="autoplay;encrypted-media" allowfullscreen loading="lazy"></iframe></div>
        <div class="video-card-body"><span class="video-tag">🖥 تقنية</span><div class="video-title">جهاز الإيكوغرافيا الحديث</div><p class="video-desc">عرض شامل لكيفية استخدام جهاز الإيكو في الكشف والتشخيص.</p></div>
        <div class="video-footer"><a href="https://youtu.be/Su5MDS9J_v8" target="_blank" class="yt-link">▶ شاهد على YouTube</a></div>
      </div>
      <div class="video-card reveal">
        <div class="video-wrap"><iframe src="https://www.youtube.com/embed/1fVAr0A9fJs?mute=1" allow="autoplay;encrypted-media" allowfullscreen loading="lazy"></iframe></div>
        <div class="video-card-body"><span class="video-tag">💓 قلب وأوعية</span><div class="video-title">جهاز قياس ضغط الدم</div><p class="video-desc">عرض تفصيلي لأجهزة قياس ضغط الدم الطبية واستخداماتها.</p></div>
        <div class="video-footer"><a href="https://youtu.be/1fVAr0A9fJs" target="_blank" class="yt-link">▶ شاهد على YouTube</a></div>
      </div>
      <div class="video-card reveal">
        <div class="video-wrap"><iframe src="https://www.youtube.com/embed/n9cYMobt09s?mute=1" allow="autoplay;encrypted-media" allowfullscreen loading="lazy"></iframe></div>
        <div class="video-card-body"><span class="video-tag">🫀 إنعاش</span><div class="video-title">الإنعاش القلبي الرئوي</div><p class="video-desc">دليل تعليمي لإجراءات الإنعاش القلبي الرئوي في حالات الطوارئ.</p></div>
        <div class="video-footer"><a href="https://youtu.be/n9cYMobt09s" target="_blank" class="yt-link">▶ شاهد على YouTube</a></div>
      </div>
      <div class="video-card reveal">
        <div class="video-wrap"><iframe src="https://www.youtube.com/embed/7AKgWDf0T5Y?mute=1" allow="autoplay;encrypted-media" allowfullscreen loading="lazy"></iframe></div>
        <div class="video-card-body"><span class="video-tag">☢ أشعة</span><div class="video-title">جهاز الأشعة التشخيصية</div><p class="video-desc">شرح تفصيلي لجهاز الأشعة وأهميته في التشخيص الطبي الحديث.</p></div>
        <div class="video-footer"><a href="https://youtu.be/7AKgWDf0T5Y" target="_blank" class="yt-link">▶ شاهد على YouTube</a></div>
      </div>
    </div>
  </div>
</section>

<!-- APPOINTMENT -->
<section class="appt-section" id="appointment">
  <div class="appt-inner">
    <div class="appt-text reveal-l">
      <div class="section-header" style="text-align:right">
        <span class="eyebrow" style="background:rgba(255,255,255,.1);color:var(--gold)">حجز المواعيد</span>
        <h2 class="section-title" style="color:#fff;text-align:right">احجز موعدك الطبي الآن</h2>
        <div class="section-line" style="margin:0"></div>
      </div>
      <p>فريقنا الطبي جاهز لاستقبالكم وتقديم أفضل رعاية صحية. احجز موعدك بخطوات بسيطة وسريعة.</p>
      <div class="appt-steps">
        <div class="appt-step"><span class="step-num">1</span> اختر التخصص المناسب لحالتك</div>
        <div class="appt-step"><span class="step-num">2</span> أدخل بياناتك الشخصية</div>
        <div class="appt-step"><span class="step-num">3</span> انتظر تأكيد الموعد من فريقنا</div>
      </div>
    </div>
    <div class="appt-form reveal">
      <h3>📋 نموذج حجز الموعد</h3>
      <div class="form-row">
        <div class="fg"><label>الاسم</label><input type="text" id="fname" placeholder="محمد"></div>
        <div class="fg"><label>اللقب</label><input type="text" id="lname" placeholder="بن علي"></div>
      </div>
      <div class="fg"><label>رقم الهاتف</label><input type="tel" id="fphone" placeholder="0555 000 000"></div>
      <div class="fg">
        <label>التخصص المطلوب</label>
        <select id="fspec">
          <option value="">اختر التخصص...</option>
          <option>جراحة النساء والتوليد</option>
          <option>الأمومة والطفولة</option>
          <option>الجراحة العامة</option>
          <option>جراحة العظام</option>
          <option>المسالك البولية</option>
          <option>طب الطوارئ</option>
        </select>
      </div>
      <div class="fg"><label>التاريخ المفضل</label><input type="date" id="fdate"></div>
      <button class="btn-submit" onclick="handleBooking()">✅ تأكيد الحجز</button>
    </div>
  </div>
</section>

<!-- CONTACT -->
<div class="contact-strip">
  <div class="contact-inner">
    <div class="contact-card reveal">
      <div class="contact-icon">📍</div>
      <div class="contact-info"><h4>موقعنا</h4><p>أولاد جلال — ولاية أولاد جلال<br>الجزائر</p></div>
    </div>
    <div class="contact-card reveal">
      <div class="contact-icon">📞</div>
      <div class="contact-info"><h4>اتصل بنا</h4><p>014253678<br>🚑 طوارئ: متاح 24/24</p></div>
    </div>
    <div class="contact-card reveal">
      <div class="contact-icon">🕐</div>
      <div class="contact-info"><h4>ساعات العمل</h4><p>الأحد – الخميس: 08:00 – 20:00<br>الطوارئ: 24/24 — 7/7</p></div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="footer-logo">
        <div class="footer-logo-icon">🏥</div>
        <span class="footer-logo-name">عاشور زيان</span>
      </div>
      <p>المؤسسة العمومية الاستشفائية عاشور زيان — تقديم خدمات طبية متكاملة لسكان أولاد جلال والبلديات المجاورة بطاقم طبي خبير.</p>
      <div class="social-links">
        <a href="https://www.facebook.com/p/%D8%A7%D9%84%D9%85%D8%A4%D8%B3%D8%B3%D8%A9-%D8%A7%D9%84%D8%B9%D9%85%D9%88%D9%85%D9%8A%D8%A9-%D8%A7%D9%84%D8%A5%D8%B3%D8%AA%D8%B4%D9%81%D8%A7%D8%A6%D9%8A%D8%A9-%D8%B9%D8%A7%D8%B4%D9%88%D8%B1-%D8%B2%D9%8A%D8%A7%D9%86-%D8%A3%D9%88%D9%84%D8%A7%D8%AF-%D8%AC%D9%84%D8%A7%D9%84-100064615485049/" target="_blank" class="social-btn fb-btn">📘</a>
      </div>
    </div>
    <div class="footer-col">
      <h4>روابط سريعة</h4>
      <ul class="footer-links">
        <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a href="{{ route('maternite') }}">الأمومة والطفولة</a></li>
        <li><a href="{{ route('about') }}">نبذة عن المستشفى</a></li>
        <li><a href="{{ route('services') }}">خدماتنا</a></li>
        <li><a href="{{ route('contact') }}">اتصل بنا</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>الأقسام الطبية</h4>
      <ul class="footer-links">
        <li><a href="#">الجراحة العامة</a></li>
        <li><a href="{{ route('surgery.women') }}">جراحة النساء</a></li>
        <li><a href="{{ route('surgery.men') }}">جراحة الرجال</a></li>
        <li><a href="#">جراحة العظام</a></li>
        <li><a href="#">الطوارئ</a></li>
        <li><a href="#">المسالك البولية</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>معلومات الاتصال</h4>
      <div class="footer-contact-item"><span class="icon">📍</span><p>أولاد جلال — ولاية أولاد جلال، الجزائر</p></div>
      <div class="footer-contact-item"><span class="icon">📞</span><p>014253678</p></div>
      <div class="footer-contact-item"><span class="icon">🚑</span><p>الطوارئ: متاح 24/24</p></div>
      <div class="footer-contact-item"><span class="icon">📧</span><p>contact@hopital-achour-ziane.dz</p></div>
    </div>
  </div>
  <div class="footer-bottom">
    © {{ date('Y') }} — <span>المؤسسة العمومية الاستشفائية عاشور زيان</span> — جميع الحقوق محفوظة 🇩🇿
  </div>
</footer>

<button id="backTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">▲</button>

<script>
// Hero Slider
const slides = document.querySelectorAll('.hero-slide');
const dots   = document.querySelectorAll('.dot');
const numEl  = document.getElementById('slideNum');
let cur = 0;
function goTo(n) {
  slides[cur].classList.remove('active');
  dots[cur].classList.remove('active');
  cur = (n + slides.length) % slides.length;
  slides[cur].classList.add('active');
  dots[cur].classList.add('active');
  numEl.textContent = String(cur + 1).padStart(2, '0');
}
const iv = setInterval(() => goTo(cur + 1), 5000);
dots.forEach((d, i) => d.addEventListener('click', () => { clearInterval(iv); goTo(i); }));

// Dark Mode
document.getElementById('darkToggle').addEventListener('click', function() {
  document.body.classList.toggle('dark');
  this.textContent = document.body.classList.contains('dark') ? '☀️' : '🌙';
});

// Back to Top
const bt = document.getElementById('backTop');
window.addEventListener('scroll', () => bt.classList.toggle('show', scrollY > 400));

// Scroll Reveal
const obs = new IntersectionObserver((entries) => {
  entries.forEach((e, i) => {
    if (e.isIntersecting) {
      setTimeout(() => e.target.classList.add('visible'), i * 80);
      obs.unobserve(e.target);
    }
  });
}, { threshold: 0.12 });
document.querySelectorAll('.reveal, .reveal-l').forEach(el => obs.observe(el));

// Count Up
const cObs = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (!e.isIntersecting) return;
    const t = +e.target.dataset.target;
    let c = 0;
    const step = t / 60;
    const tm = setInterval(() => {
      c = Math.min(c + step, t);
      e.target.textContent = Math.floor(c).toLocaleString('ar-DZ');
      if (c >= t) {
        e.target.textContent = t.toLocaleString('ar-DZ') + (t === 24 ? '/7' : '');
        clearInterval(tm);
      }
    }, 25);
    cObs.unobserve(e.target);
  });
}, { threshold: 0.5 });
document.querySelectorAll('.stat-number[data-target]').forEach(el => cObs.observe(el));

// Navbar shadow
const nav = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  nav.style.boxShadow = scrollY > 50
    ? '0 4px 30px rgba(11,60,73,0.2)'
    : '0 2px 20px rgba(11,60,73,0.1)';
});

// Booking Form
function handleBooking() {
  const fields = [
    document.getElementById('fname'),
    document.getElementById('lname'),
    document.getElementById('fphone'),
    document.getElementById('fspec'),
    document.getElementById('fdate'),
  ];
  let valid = true;
  fields.forEach(inp => {
    if (!inp.value) {
      inp.style.borderColor = '#ef4444';
      valid = false;
    } else {
      inp.style.borderColor = '';
    }
  });
  if (valid) {
    alert('✅ تم استلام طلب الحجز بنجاح!\nسيتصل بك فريقنا قريباً لتأكيد الموعد.');
    fields.forEach(inp => inp.value = '');
  }
}

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
</script>
</body>
</html>
