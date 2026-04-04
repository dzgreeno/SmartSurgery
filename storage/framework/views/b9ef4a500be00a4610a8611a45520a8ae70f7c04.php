```html
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>الحركات اليومية للمرضى</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>

/* ══ TOPBAR ══ */
:root{
  --bg2:#161b22;--bg3:#1c2128;
  --border:rgba(255,255,255,.08);--text:#e6edf3;--muted:#7d8590;
  --accent:#2dd4bf;--gold:#f0b429;--r:7px;--t:.18s ease;
}
.topbar{
  height:48px;background:var(--bg2);border-bottom:1px solid var(--border);
  display:flex;align-items:center;padding:0 16px;gap:10px;
  position:sticky;top:0;z-index:200;font-family:"Cairo",sans-serif;
}
.back-btn{
  display:flex;align-items:center;gap:6px;padding:6px 13px;
  border-radius:var(--r);background:rgba(45,212,191,.1);
  border:1px solid rgba(45,212,191,.25);color:var(--accent);
  font-size:12px;font-weight:700;font-family:inherit;cursor:pointer;
  text-decoration:none;transition:all var(--t);
}
.back-btn:hover{background:rgba(45,212,191,.2);}
.sep{width:1px;height:26px;background:var(--border);flex-shrink:0;}
.tb-title{font-size:13px;font-weight:800;color:var(--text);}
.tb-sub{font-size:11px;color:var(--muted);}
.sp{flex:1;}
.btn-print{
  display:flex;align-items:center;gap:6px;padding:7px 13px;
  border-radius:var(--r);background:var(--bg3);border:1px solid var(--border);
  color:var(--muted);font-size:12px;font-weight:700;font-family:inherit;cursor:pointer;transition:all var(--t);
}
.btn-print:hover{color:var(--text);}
.btn-save{
  display:flex;align-items:center;gap:6px;padding:7px 16px;
  border-radius:var(--r);background:linear-gradient(135deg,var(--gold),#d08000);
  border:none;color:#0d1117;font-size:12px;font-weight:800;font-family:inherit;
  cursor:pointer;transition:all var(--t);box-shadow:0 4px 14px rgba(240,180,41,.25);
}
.btn-save:hover{transform:translateY(-1px);box-shadow:0 8px 22px rgba(240,180,41,.35);}

/* ══ FICHE ══ */
body{
  font-family: Arial, sans-serif;
  background: #f5f5f5;
  margin:0;padding:0;
}
.page-wrap{padding:24px;}

.page{
  width:900px;
  margin:auto;
  background:white;
  padding:30px;
  border:1px solid #ccc;
  box-shadow:0 4px 20px rgba(0,0,0,.15);
}

.header{
  text-align:center;
  margin-bottom:20px;
}
.header h2{ margin:3px; font-size:16px; }
.header h3{ margin:3px; font-size:14px; }

.info{
  display:flex;
  justify-content:space-between;
  margin-bottom:10px;
  font-size:13px;
}
.info input{
  border:none;
  border-bottom:1px solid #555;
  outline:none;
  font-size:13px;
  font-family:Arial;
  width:140px;
  background:transparent;
}
.info input:focus{border-bottom-color:#000;}

table{
  width:100%;
  border-collapse:collapse;
}
th,td{
  border:1px solid black;
  padding:6px;
  text-align:center;
  height:35px;
}
th{ background:#f2f2f2; font-size:13px; }
td input{
  border:none;width:100%;
  font-size:12px;font-family:Arial;
  text-align:center;outline:none;
  background:transparent;height:100%;
}
td input:focus{background:#fffbe6;}

.sign-row{
  display:flex;
  justify-content:space-between;
  margin-top:14px;
  font-size:13px;
}
.sign-row input{
  border:none;border-bottom:1px solid #555;
  outline:none;font-size:13px;font-family:Arial;
  width:160px;background:transparent;
}

/* مربعات الأسفل */
.bottom{
  margin-top:20px;
  display:flex;
  justify-content:flex-start;
  gap:20px;
}
.box{
  border:1px solid black;
  width:150px;height:40px;
  display:flex;align-items:center;justify-content:space-between;
  padding:5px 10px;font-weight:bold;font-size:13px;
}
.box input{
  border:none;border-bottom:1px solid #555;
  width:50px;text-align:center;
  font-size:13px;font-family:Arial;font-weight:bold;
  outline:none;background:transparent;
}

/* Toast */
.toast{
  position:fixed;bottom:18px;left:50%;transform:translateX(-50%) translateY(16px);
  background:#161b22;border:1px solid rgba(63,185,80,.35);color:#3fb950;
  padding:9px 20px;border-radius:100px;font-size:12px;font-weight:700;
  font-family:"Cairo",sans-serif;opacity:0;pointer-events:none;
  z-index:999;transition:all .3s;display:flex;align-items:center;gap:6px;
}
.toast.show{opacity:1;transform:translateX(-50%) translateY(0);}

/* Print */
@media  print{
  body{background:#fff;}
  .topbar,.toast{display:none!important;}
  .page-wrap{padding:0;}
  .page{width:100%;box-shadow:none;border:none;}
  td input,th{font-size:11px;}
}
</style>
</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
  <a href="/surgery/women" class="back-btn">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
    جراحة النساء
  </a>
  <div class="sep"></div>
  <div>
    <div class="tb-title">الحركات اليومية للمرضى</div>
    <div class="tb-sub">قسم جراحة النساء — مستشفى عاشور زيان</div>
  </div>
  <div class="sp"></div>
  <button class="btn-print" onclick="window.print()">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
    طباعة
  </button>
  <button class="btn-save" onclick="saveDoc()">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
    حفظ
  </button>
</div>

<!-- FICHE -->
<div class="page-wrap">
<div class="page" id="docMain">

  <div class="header">
    <h2>الجمهورية الجزائرية الديمقراطية الشعبية</h2>
    <h3>المؤسسة العمومية الاستشفائية عاشور زيان — أولاد جلال</h3>
    <h3>الحركات اليومية للمرضى – جراحة النساء</h3>
  </div>

  <div class="info">
    <div>التاريخ : <input type="date" id="docDate"></div>
    <div>المصلحة : جراحة النساء</div>
  </div>

  <table>
    <thead>
      <tr>
        <th>الرقم</th>
        <th>اسم ولقب المريضة</th>
        <th>العمر</th>
        <th>رقم السرير</th>
        <th>الدخول</th>
        <th>الخروج</th>
        <th>الملاحظات</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>1</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>2</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>3</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>4</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>5</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>6</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>7</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>8</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>9</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>10</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>11</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
      <tr><td>12</td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td></tr>
    </tbody>
  </table>

  <br>

  <div class="sign-row">
    <div>الممرض/ة : <input type="text" placeholder="الاسم"></div>
    <div>الإمضاء : <input type="text"></div>
  </div>

  <div class="bottom">
    <div class="box">
      <span>الباقون</span>
      <input type="text" placeholder="00">
    </div>
    <div class="box">
      <span>الداخلون</span>
      <input type="text" placeholder="00">
    </div>
  </div>

</div>
</div>

<div class="toast" id="toast">
  <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
  <span id="toastMsg">تم الحفظ بنجاح</span>
</div>

<script>
(function(){
  document.getElementById('docDate').value = new Date().toISOString().slice(0,10);
  try{
    const saved = localStorage.getItem('pm_data');
    if(saved){
      const d = JSON.parse(saved);
      document.querySelectorAll('#docMain input').forEach((el,i)=>{
        if(d['f'+i] !== undefined) el.value = d['f'+i];
      });
    }
  }catch{}
})();

function saveDoc(){
  const data = {};
  document.querySelectorAll('#docMain input').forEach((el,i)=>{
    data['f'+i] = el.value;
  });
  const date = document.getElementById('docDate').value || new Date().toISOString().slice(0,10);
  try{
    localStorage.setItem('pm_data', JSON.stringify(data));
    showToast('✅  محفوظة — ' + date);
  }catch{
    showToast('⚠️  خطأ في الحفظ');
  }
}

function showToast(msg){
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.classList.add('show');
  setTimeout(()=>t.classList.remove('show'), 3000);
}
</script>
</body>
</html>
<?php /**PATH D:\web apps\Github-Project\SmartSurgery\resources\views/patient-movements.blade.php ENDPATH**/ ?>