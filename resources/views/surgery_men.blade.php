<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>قسم جراحة الرجال — مستشفى عاشور زيان</title>

<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>

:root {

  --bg:       #0d1117;

  --bg2:      #161b22;

  --bg3:      #1c2128;

  --border:   rgba(255,255,255,.08);

  --border2:  rgba(255,255,255,.12);

  --text:     #e6edf3;

  --muted:    #7d8590;

  --muted2:   #9198a1;

  --accent:   #2dd4bf;

  --accent2:  rgba(45,212,191,.12);

  --accent3:  rgba(45,212,191,.06);

  --gold:     #f0b429;

  --gold2:    rgba(240,180,41,.15);

  --green:    #3fb950;

  --green2:   rgba(63,185,80,.12);

  --red:      #f85149;

  --red2:     rgba(248,81,73,.12);

  --orange:   #d29922;

  --orange2:  rgba(210,153,34,.12);

  --blue:     #58a6ff;

  --blue2:    rgba(88,166,255,.12);

  --sidebar:  200px;

  --topbar:   52px;

  --r:        8px;

  --r2:       12px;

  --t:        .18s cubic-bezier(.4,0,.2,1);

}



*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { scroll-behavior: smooth; }

body {

  font-family: "Cairo", sans-serif;

  background: var(--bg);

  color: var(--text);

  min-height: 100vh;

  display: flex;

  flex-direction: column;

  -webkit-font-smoothing: antialiased;

}



/* ═══════════════ TOPBAR ═══════════════ */

.topbar {

  height: var(--topbar);

  background: var(--bg2);

  border-bottom: 1px solid var(--border);

  display: flex;

  align-items: center;

  padding: 0 20px;

  gap: 12px;

  position: sticky;

  top: 0;

  z-index: 400;

  flex-shrink: 0;

}



.logo {

  display: flex;

  align-items: center;

  gap: 10px;

  text-decoration: none;

  flex-shrink: 0;

}

.logo-mark {

  width: 34px; height: 34px;

  background: linear-gradient(135deg, var(--accent), #0891b2);

  border-radius: 9px;

  display: flex; align-items: center; justify-content: center;

  box-shadow: 0 0 16px rgba(45,212,191,.3);

}

.logo-text { line-height: 1.2; }

.logo-text strong { display: block; font-size: 13px; font-weight: 800; color: var(--text); }

.logo-text span { font-size: 10px; color: var(--muted); }



.topbar-sep { width: 1px; height: 28px; background: var(--border); flex-shrink: 0; }



/* Date/time pill */

.dt-pill {

  display: flex; align-items: center; gap: 6px;

  background: var(--bg3); border: 1px solid var(--border);

  border-radius: 100px; padding: 4px 12px;

  font-size: 11.5px; color: var(--muted2);

  flex-shrink: 0;

}

.dt-pill .live-dot {

  width: 6px; height: 6px; border-radius: 50%;

  background: var(--green);

  animation: blink 2s infinite;

  flex-shrink: 0;

}

@keyframes blink { 0%,100%{opacity:1} 50%{opacity:.3} }



.topbar-space { flex: 1; }



/* Head button — special golden */

.head-btn {

  display: flex; align-items: center; gap: 7px;

  padding: 7px 16px;

  background: var(--gold2);

  border: 1px solid rgba(240,180,41,.3);

  border-radius: var(--r);

  color: var(--gold);

  font-size: 12.5px; font-weight: 700;

  font-family: inherit;

  cursor: pointer;

  transition: all var(--t);

  text-decoration: none;

  flex-shrink: 0;

}

.head-btn:hover {

  background: rgba(240,180,41,.22);

  box-shadow: 0 0 20px rgba(240,180,41,.2);

  transform: translateY(-1px);

}



/* User */

.topbar-user {

  display: flex; align-items: center; gap: 9px;

  padding: 5px 12px 5px 5px;

  background: var(--bg3); border: 1px solid var(--border);

  border-radius: 100px;

  flex-shrink: 0;

}

.user-av {

  width: 28px; height: 28px; border-radius: 50%;

  background: linear-gradient(135deg, var(--accent), #0891b2);

  display: flex; align-items: center; justify-content: center;

  font-size: 11px; font-weight: 800; color: #0d1117;

  flex-shrink: 0;

}

.user-name { font-size: 12px; color: var(--muted2); font-weight: 600; }



.logout-btn {

  padding: 5px 10px;

  background: var(--red2); color: var(--red);

  border: 1px solid rgba(248,81,73,.2);

  border-radius: 6px;

  font-size: 11px; font-weight: 700; font-family: inherit;

  cursor: pointer; transition: all var(--t);

}

.logout-btn:hover { background: rgba(248,81,73,.2); }



/* ═══════════════ BODY LAYOUT ═══════════════ */

.body-wrap {

  display: flex;

  flex: 1;

  min-height: 0;

}



/* ═══════════════ SIDEBAR ═══════════════ */

.sidebar {

  width: var(--sidebar);

  background: var(--bg2);

  border-left: 1px solid var(--border);

  display: flex;

  flex-direction: column;

  flex-shrink: 0;

  position: sticky;

  top: var(--topbar);

  height: calc(100vh - var(--topbar));

  overflow-y: auto;

}

.sidebar::-webkit-scrollbar { display: none; }



.sidebar-section { padding: 14px 10px 6px; }

.sidebar-label {

  font-size: 9.5px; font-weight: 800;

  color: var(--muted); letter-spacing: 1.2px;

  text-transform: uppercase; padding: 0 6px 6px;

}



.nav-btn {

  display: flex; align-items: center; gap: 9px;

  padding: 8px 10px;

  border-radius: var(--r);

  color: var(--muted2);

  font-size: 12.5px; font-weight: 500;

  text-decoration: none; cursor: pointer;

  background: none; border: none; font-family: inherit;

  width: 100%; transition: all var(--t);

  white-space: nowrap;

}

.nav-btn:hover { background: var(--bg3); color: var(--text); }

.nav-btn.active {

  background: var(--accent2);

  color: var(--accent);

  font-weight: 700;

}

.nav-btn .nav-icon {

  width: 28px; height: 28px; border-radius: 7px;

  display: flex; align-items: center; justify-content: center;

  flex-shrink: 0;

  background: var(--bg3);

  transition: background var(--t);

}

.nav-btn.active .nav-icon { background: rgba(45,212,191,.15); }

.nav-btn:hover .nav-icon { background: rgba(255,255,255,.06); }



.nav-badge {

  margin-right: auto;

  background: var(--accent);

  color: #0d1117;

  font-size: 9px; font-weight: 800;

  padding: 1px 6px; border-radius: 100px;

  min-width: 18px; text-align: center;

}



.sidebar-divider { height: 1px; background: var(--border); margin: 8px 16px; }



/* ═══════════════ MAIN + CHAT ═══════════════ */

.main-area {

  flex: 1;

  display: flex;

  min-width: 0;

  gap: 0;

}



.content {

  flex: 1;

  padding: 20px;

  overflow-y: auto;

  min-width: 0;

}

.content::-webkit-scrollbar { width: 4px; }

.content::-webkit-scrollbar-thumb { background: var(--border2); border-radius: 10px; }



/* ═══════════════ PANELS ═══════════════ */

.panel { display: none; animation: fadeUp .25s ease both; }

.panel.active { display: block; }

@keyframes fadeUp { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:none; } }



/* ═══════════════ CARDS ═══════════════ */

.card {

  background: var(--bg2);

  border: 1px solid var(--border);

  border-radius: var(--r2);

  overflow: hidden;

  margin-bottom: 16px;

}

.card-head {

  padding: 14px 18px;

  border-bottom: 1px solid var(--border);

  display: flex; align-items: center; justify-content: space-between;

  flex-wrap: wrap; gap: 8px;

}

.card-title {

  font-size: 13.5px; font-weight: 800; color: var(--text);

  display: flex; align-items: center; gap: 8px;

}

.card-title-dot {

  width: 3px; height: 16px;

  background: linear-gradient(to bottom, var(--accent), #0891b2);

  border-radius: 4px; flex-shrink: 0;

}



/* ═══════════════ TABLE ═══════════════ */

.tbl-wrap { overflow-x: auto; }

table { width: 100%; border-collapse: collapse; }

thead th {

  background: var(--bg3);

  padding: 9px 14px;

  font-size: 11px; font-weight: 700;

  color: var(--muted); text-align: right;

  border-bottom: 1px solid var(--border);

  white-space: nowrap;

}

tbody td {

  padding: 11px 14px;

  font-size: 12.5px;

  border-bottom: 1px solid var(--border);

  color: var(--text);

}

tbody tr:last-child td { border-bottom: none; }

tbody tr:hover td { background: var(--bg3); }



/* ═══════════════ BADGES ═══════════════ */

.badge {

  display: inline-flex; align-items: center; gap: 4px;

  padding: 3px 9px; border-radius: 100px;

  font-size: 11px; font-weight: 700; white-space: nowrap;

}

.badge-green  { background: var(--green2);  color: var(--green); }

.badge-blue   { background: var(--blue2);   color: var(--blue);  }

.badge-orange { background: var(--orange2); color: var(--orange);}

.badge-red    { background: var(--red2);    color: var(--red);   }

.badge-muted  { background: rgba(255,255,255,.06); color: var(--muted2); }



/* ═══════════════ SCHEDULE ═══════════════ */

.sch-grid {

  display: grid;

  grid-template-columns: 130px repeat(7, 1fr);

  font-size: 11.5px;

}

.sch-head {

  background: var(--bg3);

  color: var(--muted);

  font-size: 10.5px; font-weight: 700;

  padding: 9px 6px; text-align: center;

  border-left: 1px solid var(--border);

  border-bottom: 1px solid var(--border);

}

.sch-head:first-child { text-align: right; padding-right: 12px; }

.sch-name {

  font-size: 11px; font-weight: 600; color: var(--muted2);

  padding: 9px 12px;

  border-bottom: 1px solid var(--border);

  border-left: 1px solid var(--border);

  display: flex; align-items: center; gap: 7px;

}

.sch-av {

  width: 22px; height: 22px; border-radius: 50%;

  background: linear-gradient(135deg, var(--accent), #0891b2);

  display: flex; align-items: center; justify-content: center;

  font-size: 9px; font-weight: 800; color: #0d1117;

  flex-shrink: 0;

}

.sch-cell {

  border-bottom: 1px solid var(--border);

  border-left: 1px solid var(--border);

  padding: 5px; min-height: 44px;

}

.sch-chip {

  padding: 4px 6px; border-radius: 5px;

  font-size: 10px; font-weight: 700;

  width: 100%; text-align: center;

  line-height: 1.4;

}

.sc-shift  { background: var(--accent2);  color: var(--accent); }

.sc-op     { background: var(--blue2);    color: var(--blue);   }

.sc-off    { background: rgba(255,255,255,.04); color: var(--muted); }

.sc-leave  { background: var(--orange2);  color: var(--orange); }



/* Filter chips */

.chips { display: flex; gap: 6px; flex-wrap: wrap; }

.chip {

  padding: 5px 12px; border-radius: 100px;

  font-size: 11px; font-weight: 600;

  cursor: pointer; border: 1px solid var(--border);

  background: transparent; color: var(--muted2);

  font-family: inherit; transition: all var(--t);

}

.chip.active, .chip:hover {

  background: var(--accent2); color: var(--accent);

  border-color: rgba(45,212,191,.3);

}



/* ═══════════════ CHAT ═══════════════ */

.chat-panel {

  width: 300px;

  border-right: 1px solid var(--border);

  display: flex; flex-direction: column;

  position: sticky;

  top: var(--topbar);

  height: calc(100vh - var(--topbar));

  flex-shrink: 0;

  background: var(--bg2);

}



.chat-header {

  padding: 14px 14px 10px;

  border-bottom: 1px solid var(--border);

  background: var(--bg3);

}

.chat-header-top {

  display: flex; align-items: center; justify-content: space-between;

  margin-bottom: 8px;

}

.chat-title {

  font-size: 13px; font-weight: 800; color: var(--text);

  display: flex; align-items: center; gap: 7px;

}

.online-pill {

  display: inline-flex; align-items: center; gap: 4px;

  background: var(--green2); color: var(--green);

  font-size: 10px; font-weight: 700;

  padding: 2px 8px; border-radius: 100px;

}

.online-pill::before {

  content: '';

  width: 5px; height: 5px;

  background: var(--green); border-radius: 50%;

  animation: blink 2s infinite;

}



.chat-members {

  display: flex; gap: 4px; flex-wrap: wrap;

}

.member-tag {

  display: flex; align-items: center; gap: 4px;

  background: var(--bg2); border: 1px solid var(--border);

  border-radius: 100px; padding: 2px 8px;

  font-size: 10px; color: var(--muted2);

}

.member-tag-dot {

  width: 5px; height: 5px; border-radius: 50%;

  background: var(--green); flex-shrink: 0;

}



.chat-msgs {

  flex: 1; overflow-y: auto;

  padding: 12px;

  display: flex; flex-direction: column; gap: 10px;

  background: var(--bg);

}

.chat-msgs::-webkit-scrollbar { width: 3px; }

.chat-msgs::-webkit-scrollbar-thumb { background: var(--border2); border-radius: 10px; }



.chat-date { text-align: center; font-size: 10px; color: var(--muted); position: relative; margin: 4px 0; }

.chat-date::before, .chat-date::after { content: ''; position: absolute; top: 50%; height: 1px; background: var(--border); width: 28%; }

.chat-date::before { right: 0; } .chat-date::after { left: 0; }



.msg-wrap { display: flex; gap: 7px; max-width: 92%; }

.msg-wrap.me { margin-right: auto; flex-direction: row-reverse; }

.msg-wrap.them { margin-left: auto; }



.msg-av {

  width: 26px; height: 26px; border-radius: 50%;

  background: linear-gradient(135deg, #0891b2, var(--accent));

  display: flex; align-items: center; justify-content: center;

  font-size: 9.5px; font-weight: 800; color: #0d1117;

  flex-shrink: 0; align-self: flex-end;

}



.msg-body { display: flex; flex-direction: column; gap: 2px; }

.msg-name { font-size: 9.5px; color: var(--muted); font-weight: 600; }

.msg-wrap.me .msg-name { text-align: right; color: var(--accent); }



.msg-bubble {

  padding: 8px 12px; border-radius: 12px;

  font-size: 12.5px; line-height: 1.6;

  word-break: break-word;

}

.msg-wrap.me .msg-bubble {

  background: linear-gradient(135deg, var(--accent), #0891b2);

  color: #0d1117; font-weight: 600;

  border-bottom-right-radius: 3px;

}

.msg-wrap.them .msg-bubble {

  background: var(--bg3); color: var(--text);

  border: 1px solid var(--border);

  border-bottom-left-radius: 3px;

}

.msg-time { font-size: 9px; color: var(--muted); }

.msg-wrap.me .msg-time { text-align: right; }



.chat-footer {

  padding: 10px 12px;

  border-top: 1px solid var(--border);

  background: var(--bg2);

  display: flex; gap: 8px; align-items: flex-end;

}

.chat-input-wrap {

  flex: 1;

  background: var(--bg3);

  border: 1px solid var(--border);

  border-radius: 20px;

  padding: 7px 13px;

  transition: border-color var(--t);

}

.chat-input-wrap:focus-within { border-color: rgba(45,212,191,.4); }

.chat-input {

  width: 100%; border: none; background: transparent;

  font-size: 12.5px; font-family: inherit; color: var(--text);

  outline: none; resize: none; max-height: 70px; line-height: 1.5;

}

.chat-input::placeholder { color: var(--muted); }

.send-btn {

  width: 34px; height: 34px; border-radius: 50%;

  background: linear-gradient(135deg, var(--accent), #0891b2);

  color: #0d1117; border: none; cursor: pointer;

  display: flex; align-items: center; justify-content: center;

  flex-shrink: 0; transition: all var(--t);

  box-shadow: 0 0 12px rgba(45,212,191,.3);

}

.send-btn:hover { transform: scale(1.08); box-shadow: 0 0 20px rgba(45,212,191,.4); }



/* ═══════════════ HEAD MODAL ═══════════════ */

.modal-overlay {

  position: fixed; inset: 0;

  background: rgba(0,0,0,.7);

  backdrop-filter: blur(8px);

  z-index: 600;

  display: none; align-items: center; justify-content: center;

  padding: 16px;

}

.modal-overlay.open { display: flex; }



.modal-box {

  background: var(--bg2);

  border: 1px solid var(--border2);

  border-radius: 20px;

  padding: 32px;

  width: 100%; max-width: 400px;

  box-shadow: 0 32px 80px rgba(0,0,0,.5), 0 0 60px rgba(45,212,191,.05);

  animation: modalIn .28s cubic-bezier(.22,1,.36,1);

  position: relative; overflow: hidden;

}

.modal-box::before {

  content: '';

  position: absolute; top: 0; left: 0; right: 0; height: 3px;

  background: linear-gradient(to right, var(--gold), var(--accent));

}

@keyframes modalIn {

  from { opacity:0; transform:scale(.9) translateY(20px); }

  to   { opacity:1; transform:none; }

}



.modal-close {

  position: absolute; top: 14px; left: 14px;

  width: 28px; height: 28px; border-radius: 50%;

  background: var(--bg3); border: 1px solid var(--border);

  color: var(--muted2); cursor: pointer;

  display: flex; align-items: center; justify-content: center;

  transition: all var(--t);

}

.modal-close:hover { background: var(--red2); color: var(--red); border-color: rgba(248,81,73,.3); }



.modal-icon {

  width: 58px; height: 58px; border-radius: 16px;

  background: var(--gold2);

  border: 1px solid rgba(240,180,41,.25);

  display: flex; align-items: center; justify-content: center;

  margin: 0 auto 18px;

  box-shadow: 0 0 30px rgba(240,180,41,.15);

}



.modal-title { font-size: 18px; font-weight: 900; color: var(--text); text-align: center; margin-bottom: 4px; }

.modal-sub { font-size: 12px; color: var(--muted); text-align: center; margin-bottom: 24px; line-height: 1.6; }



.form-group { margin-bottom: 14px; }

.form-label { display: block; font-size: 11.5px; font-weight: 700; color: var(--muted2); margin-bottom: 6px; letter-spacing: .3px; }



.input-wrap { position: relative; display: flex; align-items: center; }

.form-input {

  width: 100%; padding: 10px 40px 10px 40px;

  background: var(--bg3);

  border: 1px solid var(--border);

  border-radius: var(--r);

  font-size: 13px; font-family: inherit; color: var(--text);

  outline: none; transition: all var(--t);

  direction: ltr; text-align: right;

}

.form-input::placeholder { color: var(--muted); }

.form-input:focus { border-color: rgba(45,212,191,.4); box-shadow: 0 0 0 3px rgba(45,212,191,.07); }

.form-input.error { border-color: rgba(248,81,73,.5); }



.input-icon { position: absolute; right: 12px; color: var(--muted); pointer-events: none; }

.pw-toggle { position: absolute; left: 11px; background: none; border: none; color: var(--muted); cursor: pointer; transition: color var(--t); padding: 2px; }

.pw-toggle:hover { color: var(--text); }



.form-error-msg {

  display: none; align-items: center; gap: 6px;

  background: var(--red2); border: 1px solid rgba(248,81,73,.2);

  border-radius: var(--r); padding: 10px 12px;

  font-size: 12px; color: var(--red); margin-bottom: 14px;

}

.form-error-msg.show { display: flex; }



.modal-submit {

  width: 100%; padding: 12px;

  background: linear-gradient(135deg, var(--gold), #e09200);

  color: #0d1117; border: none; border-radius: var(--r);

  font-size: 13.5px; font-weight: 800; font-family: inherit;

  cursor: pointer; transition: all var(--t);

  display: flex; align-items: center; justify-content: center; gap: 8px;

  box-shadow: 0 4px 20px rgba(240,180,41,.25);

  position: relative; overflow: hidden; margin-top: 8px;

}

.modal-submit:hover { transform: translateY(-1px); box-shadow: 0 8px 28px rgba(240,180,41,.35); }

.modal-submit.loading { pointer-events: none; opacity: .7; }

.modal-submit.loading .sub-text { opacity: 0; }

.modal-submit.loading .sub-spin { display: block; }

.sub-spin {

  display: none; position: absolute;

  width: 18px; height: 18px;

  border: 2.5px solid rgba(0,0,0,.2);

  border-top-color: #0d1117; border-radius: 50%;

  animation: spin .7s linear infinite;

}

@keyframes spin { to { transform: rotate(360deg); } }



.modal-note { text-align: center; font-size: 10.5px; color: var(--muted); margin-top: 12px; }



/* ═══════════════ UTILS ═══════════════ */

.btn {

  display: inline-flex; align-items: center; gap: 5px;

  padding: 6px 13px; border-radius: var(--r);

  font-size: 12px; font-weight: 600; font-family: inherit;

  cursor: pointer; border: 1px solid var(--border);

  transition: all var(--t); text-decoration: none;

  background: var(--bg3); color: var(--muted2);

}

.btn:hover { border-color: var(--border2); color: var(--text); background: rgba(255,255,255,.06); }

.btn-sm { padding: 4px 10px; font-size: 11px; }

.btn-accent { background: var(--accent2); color: var(--accent); border-color: rgba(45,212,191,.25); }

.btn-accent:hover { background: rgba(45,212,191,.2); box-shadow: 0 0 14px rgba(45,212,191,.15); }



.empty { text-align: center; padding: 36px; color: var(--muted); font-size: 13px; }



/* Scrollbar */

::-webkit-scrollbar { width: 4px; height: 4px; }

::-webkit-scrollbar-track { background: transparent; }

::-webkit-scrollbar-thumb { background: var(--border2); border-radius: 10px; }



@media(max-width:1100px) {

  :root { --sidebar: 56px; }

  .nav-btn span, .sidebar-label, .nav-badge { display: none; }

  .nav-btn { justify-content: center; padding: 8px 0; }

  .nav-btn .nav-icon { margin: 0; }

}

@media(max-width:860px) {

  .chat-panel { display: none; }

}

@media(max-width:640px) {

  .content { padding: 12px; }

  .topbar { padding: 0 12px; }

  .logo-text, .dt-pill, .user-name { display: none; }

}

</style>

</head>

<body>



{{-- ══════════ TOPBAR ══════════ --}}

<div class="topbar">

  @if(session('firebase_role') === 'admin')
  <a href="/admin" style="display:flex;align-items:center;gap:6px;padding:6px 13px;border-radius:7px;background:rgba(45,212,191,.1);border:1px solid rgba(45,212,191,.25);color:#2dd4bf;font-size:12px;font-weight:700;text-decoration:none;flex-shrink:0;transition:all .18s ease;">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
    لوحة التحكم
  </a>
  <div class="topbar-sep"></div>
  @endif

  <a href="/" class="logo">

    <div class="logo-mark">

      <svg width="17" height="17" fill="none" stroke="white" stroke-width="2.3" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>

    </div>

    <div class="logo-text">

      <strong>جراحة الرجال</strong>

      <span>مستشفى عاشور زيان</span>

    </div>

  </a>



  <div class="topbar-sep"></div>



  <div class="dt-pill">

    <div class="live-dot"></div>

    <span id="liveClock"></span>

  </div>



  <div class="topbar-space"></div>



  {{{-- زر رئيسة المصلحة --}}
@if(in_array(session('firebase_role', 'guest'), ['admin','head_men']))
    <a href="{{ route('surgery.head_men') }}" class="head-btn">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>
        لوحة رئيسة المصلحة
    </a>
@else
    <button class="head-btn" onclick="openHeadModal()">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>
        رئيسة المصلحة
    </button>
@endif

<div class="topbar-sep"></div>

<div class="topbar-user">
    <div class="user-av">{{ mb_substr(trim(session('firebase_user.fname', 'زائر') . ' ' . session('firebase_user.lname', '')), 0, 1) }}</div>
    <span class="user-name">{{ trim(session('firebase_user.fname', 'زائر') . ' ' . session('firebase_user.lname', '')) }}</span>
    <form method="POST" action="{{ route('logout') }}" style="margin:0">
        @csrf
        <button type="submit" class="logout-btn">خروج</button>
    </form>
</div>

  </div>

</div>



{{-- ══════════ BODY ══════════ --}}

<div class="body-wrap">



  {{-- SIDEBAR --}}

  <aside class="sidebar">

    <div class="sidebar-section">

      <div class="sidebar-label">القسم</div>

      <button class="nav-btn active" onclick="showPanel('schedule', this)" id="nav-schedule">

        <div class="nav-icon">

          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="16" y1="2" x2="16" y2="6"/></svg>

        </div>

        <span>جدول العمل</span>

      </button>

      <button class="nav-btn" onclick="showPanel('operations', this)">

        <div class="nav-icon">

          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>

        </div>

        <span>العمليات</span>

      </button>

    </div>



    <div class="sidebar-divider"></div>



    <div class="sidebar-section">

      <div class="sidebar-label">السجلات</div>

      <a href="{{ route('daily-meds') }}" class="nav-btn">

        <div class="nav-icon">

          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="11" x2="12" y2="17"/><line x1="9" y1="14" x2="15" y2="14"/></svg>

        </div>

        <span>سجل الأدوية</span>

      </a>

      <a href="{{ route('fiche-navette') }}" class="nav-btn">

        <div class="nav-icon">

          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>

        </div>

        <span>فيش نافيت</span>

      </a>

      <a href="{{ route('patient-movements') }}" class="nav-btn">

        <div class="nav-icon">

          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>

        </div>

        <span>تحركات المرضى</span>

      </a>

    </div>

  </aside>



  {{-- MAIN + CHAT --}}

  <div class="main-area">



    <div class="content">



      {{-- ── SCHEDULE PANEL ── --}}

      <div class="panel active" id="panel-schedule">

        <div class="card">

          <div class="card-head">

            <div class="card-title">

              <div class="card-title-dot"></div>

              جدول عمل الأطباء — الأسبوع الحالي

            </div>

            <span style="font-size:11.5px;color:var(--muted)" id="weekLabel"></span>

          </div>

          <div style="padding:14px;overflow-x:auto">

            <div class="sch-grid" id="schedGrid"></div>

          </div>

          <div style="padding:10px 18px;border-top:1px solid var(--border);display:flex;gap:14px;flex-wrap:wrap">

            <span style="font-size:11px;color:var(--muted);display:flex;align-items:center;gap:5px">

              <i style="width:8px;height:8px;background:var(--accent);border-radius:2px;opacity:.7;flex-shrink:0;display:inline-block"></i> مناوبة

            </span>

            <span style="font-size:11px;color:var(--muted);display:flex;align-items:center;gap:5px">

              <i style="width:8px;height:8px;background:var(--blue);border-radius:2px;opacity:.6;flex-shrink:0;display:inline-block"></i> عمليات

            </span>

            <span style="font-size:11px;color:var(--muted);display:flex;align-items:center;gap:5px">

              <i style="width:8px;height:8px;background:var(--orange);border-radius:2px;opacity:.6;flex-shrink:0;display:inline-block"></i> إجازة

            </span>

            <span style="font-size:11px;color:var(--muted);display:flex;align-items:center;gap:5px">

              <i style="width:8px;height:8px;background:rgba(255,255,255,.1);border-radius:2px;flex-shrink:0;display:inline-block"></i> راحة

            </span>

          </div>

        </div>

      </div>



      {{-- ── OPERATIONS PANEL ── --}}

      <div class="panel" id="panel-operations">

        <div class="card">

          <div class="card-head">

            <div class="card-title">

              <div class="card-title-dot"></div>

              جدول العمليات

            </div>

            <div class="chips">

              <button class="chip active" onclick="filterOps('all',this)">الكل</button>

              <button class="chip" onclick="filterOps('مجدولة',this)">مجدولة</button>

              <button class="chip" onclick="filterOps('جارية',this)">جارية</button>

              <button class="chip" onclick="filterOps('مكتملة',this)">مكتملة</button>

            </div>

          </div>

          <div class="tbl-wrap">

            <table>

              <thead>

                <tr>

                  <th>#</th>

                  <th>المريضة</th>

                  <th>نوع العملية</th>

                  <th>الجراح</th>

                  <th>الغرفة</th>

                  <th>التاريخ والوقت</th>

                  <th>الحالة</th>

                </tr>

              </thead>

              <tbody id="opsTbody"></tbody>

            </table>

          </div>

        </div>

      </div>



    </div>{{-- end .content --}}



    {{-- ══ CHAT PANEL ══ --}}

    <div class="chat-panel">

      <div class="chat-header">

        <div class="chat-header-top">

          <div class="chat-title">

            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>

            دردشة الطاقم

          </div>

          <span class="online-pill">متصل</span>

        </div>

        <div class="chat-members" id="chatMembers">

          <div class="member-tag">

            <div class="member-tag-dot"></div>

            {{ trim(session('firebase_user.fname', 'زائر') . ' ' . session('firebase_user.lname', '')) }}

          </div>

        </div>

      </div>



      <div class="chat-msgs" id="chatMsgs">

        <div class="chat-date">اليوم</div>

      </div>



      <div class="chat-footer">

        <div class="chat-input-wrap">

          <textarea

            class="chat-input"

            id="chatInput"

            rows="1"

            placeholder="اكتب رسالتك..."

            onkeydown="onChatKey(event)"

          ></textarea>

        </div>

        <button class="send-btn" onclick="sendMessage()">

          <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>

        </button>

      </div>

    </div>



  </div>{{-- end .main-area --}}

</div>{{-- end .body-wrap --}}



{{-- ══════════ HEAD MODAL ══════════ --}}

<div class="modal-overlay" id="headModal">

  <div class="modal-box">

    <button class="modal-close" onclick="closeHeadModal()">

      <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>

    </button>



    <div class="modal-icon">

      <svg width="26" height="26" fill="none" stroke="#f0b429" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>

    </div>



    <div class="modal-title">دخول رئيسة المصلحة</div>

    <div class="modal-sub">أدخلي بياناتك الخاصة للوصول<br>إلى لوحة التحكم الكاملة</div>



    @if($errors->any() || session('error'))

    <div class="form-error-msg show">

      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>

      {{ $errors->first() ?: session('error') }}

    </div>

    @endif



    <form method="POST" action="{{ route('login') }}" id="headForm" novalidate>

      @csrf

      <input type="hidden" name="redirect_to" value="{{ route('surgery.men') }}">



      <div class="form-group">

        <label class="form-label">البريد الإلكتروني</label>

        <div class="input-wrap">

          <input

            type="email" name="email"

            class="form-input @error('email') error @enderror"

            placeholder="head@hospital.dz"

            value="{{ old('email') }}"

            autocomplete="email" required

          >

          <span class="input-icon">

            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>

          </span>

        </div>

      </div>



      <div class="form-group">

        <label class="form-label">كلمة المرور</label>

        <div class="input-wrap">

          <input

            type="password" name="password" id="headPw"

            class="form-input @error('password') error @enderror"

            placeholder="••••••••"

            autocomplete="current-password" required

          >

          <span class="input-icon">

            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>

          </span>

          <button type="button" class="pw-toggle" onclick="togglePw()">

            <svg id="eyeIcon" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>

          </button>

        </div>

      </div>



      <button type="submit" class="modal-submit" id="headSubmit">

        <span class="sub-text" style="display:flex;align-items:center;gap:7px">

          <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.3" viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>

          دخول لوحة التحكم

        </span>

        <div class="sub-spin"></div>

      </button>

    </form>



    <div class="modal-note">🔒 مخصص لرئيسة المصلحة فقط</div>

  </div>

</div>



<script>

// ════════ DATA ════════

const ME = {

  name: "{{ trim(session('firebase_user.fname', 'زائر') . ' ' . session('firebase_user.lname', '')) }}",

  init: "{{ mb_substr(trim(session('firebase_user.fname', 'زائر') . ' ' . session('firebase_user.lname', '')), 0, 1) }}",

  id:   {{ session('firebase_uid', 'null') }},

};



const DOCTORS = [

  'د. سارة خليل','د. ليلى بوسلطان','د. رانية حمودة',

  'د. نسرين أيت علي','د. ياسمين كريمي','د. إيمان بلحوت'

];

const DAYS = ['الأحد','الاثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'];

const SCHED = [

  ['مناوبة','مناوبة','عمليات','راحة','مناوبة','إجازة','راحة'],

  ['عمليات','راحة','مناوبة','مناوبة','راحة','راحة','مناوبة'],

  ['راحة','عمليات','راحة','مناوبة','مناوبة','مناوبة','إجازة'],

  ['مناوبة','مناوبة','راحة','عمليات','مناوبة','راحة','مناوبة'],

  ['إجازة','مناوبة','مناوبة','راحة','عمليات','مناوبة','مناوبة'],

  ['مناوبة','راحة','مناوبة','مناوبة','راحة','عمليات','مناوبة'],

];

const OPS = [

  {patient:'فاطمة بن عمر',    type:'استئصال كيس مبيض', doctor:'د. سارة خليل',    room:'غرفة 1', dt:'2026-03-10T09:00', status:'مكتملة'},

  {patient:'نور الهدى مسعود', type:'عملية قيصرية',      doctor:'د. ليلى بوسلطان', room:'غرفة 2', dt:'2026-03-10T11:30', status:'جارية'},

  {patient:'حفيظة زروق',      type:'تدخل تنظيري',       doctor:'د. رانية حمودة',  room:'غرفة 1', dt:'2026-03-10T14:00', status:'مجدولة'},

  {patient:'أمال بركات',      type:'استئصال رحم',        doctor:'د. سارة خليل',    room:'غرفة 3', dt:'2026-03-11T08:30', status:'مجدولة'},

  {patient:'زهرة مولاي',      type:'عملية قيصرية',      doctor:'د. إيمان بلحوت',  room:'غرفة 2', dt:'2026-03-11T10:00', status:'مجدولة'},

];



// ════════ CLOCK ════════

function updateClock(){

  const d = new Date();

  document.getElementById('liveClock').textContent =

    d.toLocaleDateString('ar-DZ') + ' · ' +

    d.toLocaleTimeString('ar-DZ',{hour:'2-digit',minute:'2-digit'});

}

setInterval(updateClock, 1000);

updateClock();



// ════════ PANELS ════════

function showPanel(id, el){

  document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));

  document.getElementById('panel-' + id).classList.add('active');

  document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));

  if(el) el.classList.add('active');

}



// ════════ SCHEDULE ════════

function renderSchedule(){

  const cls = {مناوبة:'sc-shift', عمليات:'sc-op', راحة:'sc-off', إجازة:'sc-leave'};

  document.getElementById('weekLabel').textContent = new Date().toLocaleDateString('ar-DZ',{year:'numeric',month:'long'});

  let h = `<div class="sch-head">الطبيب</div>` + DAYS.map(d=>`<div class="sch-head">${d}</div>`).join('');

  DOCTORS.forEach((doc,i)=>{

    h += `<div class="sch-name"><div class="sch-av">${doc[3]||doc[0]}</div>${doc}</div>`;

    DAYS.forEach((_,j)=>{

      const e = SCHED[i]?.[j]||'راحة';

      h += `<div class="sch-cell"><div class="sch-chip ${cls[e]||'sc-off'}">${e}</div></div>`;

    });

  });

  document.getElementById('schedGrid').innerHTML = h;

}



// ════════ OPERATIONS ════════

const STATUS_CLS = {مجدولة:'badge-orange', جارية:'badge-blue', مكتملة:'badge-green', ملغاة:'badge-red'};

function renderOps(list){

  const data = list || OPS;

  const tb = document.getElementById('opsTbody');

  if(!data.length){ tb.innerHTML = `<tr><td colspan="7" class="empty">لا توجد عمليات</td></tr>`; return; }

  tb.innerHTML = data.map((o,i)=>`

    <tr>

      <td style="color:var(--muted);font-size:11px">${String(i+1).padStart(2,'0')}</td>

      <td><strong>${o.patient}</strong></td>

      <td style="color:var(--muted2)">${o.type}</td>

      <td>${o.doctor}</td>

      <td style="color:var(--muted2)">${o.room}</td>

      <td style="font-size:11.5px;color:var(--muted)">${fmtDT(o.dt)}</td>

      <td><span class="badge ${STATUS_CLS[o.status]||'badge-muted'}">${o.status}</span></td>

    </tr>`).join('');

}

function filterOps(s,el){

  document.querySelectorAll('#panel-operations .chip').forEach(c=>c.classList.remove('active'));

  el.classList.add('active');

  renderOps(s==='all' ? OPS : OPS.filter(o=>o.status===s));

}

function fmtDT(dt){

  if(!dt) return '—';

  const d = new Date(dt);

  return d.toLocaleDateString('ar-DZ') + ' ' + d.toLocaleTimeString('ar-DZ',{hour:'2-digit',minute:'2-digit'});

}



// ════════ CHAT ════════

const CHAT_KEY = 'wms_chat_v1';

let chatMsgs = [];



function loadChat(){ try{ chatMsgs = JSON.parse(localStorage.getItem(CHAT_KEY))||[]; }catch{ chatMsgs=[]; } }

function saveChat(){ try{ localStorage.setItem(CHAT_KEY, JSON.stringify(chatMsgs.slice(-200))); }catch{} }

function esc(s){ return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); }



function renderChat(){

  const wrap = document.getElementById('chatMsgs');

  const list = chatMsgs.slice(-60);

  let h = `<div class="chat-date">اليوم</div>`;

  list.forEach(m => {

    const mine = (m.uid === ME.id || m.uname === ME.name);

    h += `

      <div class="msg-wrap ${mine?'me':'them'}">

        ${!mine ? `<div class="msg-av">${m.init||'؟'}</div>` : ''}

        <div class="msg-body">

          ${!mine ? `<div class="msg-name">${m.uname}</div>` : ''}

          <div class="msg-bubble">${esc(m.text)}</div>

          <div class="msg-time">${m.time}</div>

        </div>

      </div>`;

  });

  wrap.innerHTML = h;

  wrap.scrollTop = wrap.scrollHeight;

}



function sendMessage(){

  const inp = document.getElementById('chatInput');

  const txt = inp.value.trim();

  if(!txt) return;

  const now = new Date();

  chatMsgs.push({

    uid: ME.id, uname: ME.name, init: ME.init, text: txt,

    time: now.toLocaleTimeString('ar-DZ',{hour:'2-digit',minute:'2-digit'}),

    ts: now.getTime()

  });

  saveChat(); renderChat();

  inp.value = ''; inp.style.height = 'auto';

}



function onChatKey(e){

  if(e.key === 'Enter' && !e.shiftKey){ e.preventDefault(); sendMessage(); }

  const t = document.getElementById('chatInput');

  t.style.height = 'auto';

  t.style.height = Math.min(t.scrollHeight, 70) + 'px';

}



// Poll every 3s

setInterval(()=>{ const p=chatMsgs.length; loadChat(); if(chatMsgs.length!==p) renderChat(); }, 3000);



// ════════ HEAD MODAL ════════

function openHeadModal(){ document.getElementById('headModal').classList.add('open'); }

function closeHeadModal(){ document.getElementById('headModal').classList.remove('open'); }

document.getElementById('headModal').addEventListener('click', e=>{ if(e.target===e.currentTarget) closeHeadModal(); });

document.getElementById('headForm').addEventListener('submit', ()=>{ document.getElementById('headSubmit').classList.add('loading'); });



function togglePw(){

  const pw = document.getElementById('headPw');

  const eye = document.getElementById('eyeIcon');

  if(pw.type==='password'){

    pw.type='text';

    eye.innerHTML='<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';

  } else {

    pw.type='password';

    eye.innerHTML='<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';

  }

}



// ════════ INIT ════════

renderSchedule();

renderOps();

loadChat();

renderChat();



@if($errors->any() || session('error'))

  openHeadModal();

@endif

</script>



</body>

</html>
