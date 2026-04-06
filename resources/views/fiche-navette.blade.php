<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>نظام إدارة العيادة - جراحة النساء</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#0d1117; --bg2:#161b22; --bg3:#1c2128;
  --border:rgba(255,255,255,.08); --text:#e6edf3; --muted:#7d8590;
  --accent:#2dd4bf; --gold:#f0b429; --r:7px; --t:.18s ease;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
body{font-family:"Cairo",Arial,sans-serif;background:var(--bg);color:var(--text);min-height:100vh;display:flex;flex-direction:column;}

/* --- Topbar & Navigation --- */
.topbar{
  height:55px;background:var(--bg2);border-bottom:1px solid var(--border);
  display:flex;align-items:center;padding:0 16px;gap:15px;
  position:sticky;top:0;z-index:200;flex-shrink:0;
}
.tb-title{font-size:14px;font-weight:800; color:var(--text);}
.tb-sub{font-size:11px;color:var(--muted);}
.sep{width:1px;height:26px;background:var(--border);}

.nav-tabs { display: flex; gap: 5px; flex: 1; }
.tab-btn {
  background: transparent; border: 1px solid transparent; color: var(--muted);
  padding: 6px 12px; border-radius: var(--r); font-family: inherit; font-size: 12px;
  font-weight: 700; cursor: pointer; transition: all var(--t);
}
.tab-btn:hover { background: var(--bg3); color: var(--text); }
.tab-btn.active { background: rgba(45,212,191,.1); border-color: rgba(45,212,191,.25); color: var(--accent); }

.btn-print, .btn-save{
  display:flex;align-items:center;gap:6px;padding:7px 16px;
  border-radius:var(--r);font-size:12px;font-weight:700;font-family:inherit;cursor:pointer;transition:all var(--t);
}
.btn-print{background:var(--bg3);border:1px solid var(--border);color:var(--muted);}
.btn-print:hover{color:var(--text); border-color:#fff;}
.btn-save{
  background:linear-gradient(135deg,var(--gold),#d08000);border:none;color:#0d1117;font-weight:800;
  box-shadow:0 4px 14px rgba(240,180,41,.25);
}
.btn-save:hover{transform:translateY(-1px);box-shadow:0 8px 22px rgba(240,180,41,.35);}

/* --- Work Area --- */
.pw{padding:20px;max-width:1100px;margin:auto;width:100%; display: none;}
.pw.active { display: block; }

/* --- Document Styling (Printable) --- */
.fiche{
  background:#fff;color:#111;font-family:Arial, "Cairo", sans-serif;font-size:12px;
  border:1px solid #555;box-shadow:0 20px 60px rgba(0,0,0,.6); padding: 20px;
  position: relative;
}
.fiche[dir="ltr"] { direction: ltr; text-align: left; }
.header-titles { text-align: center; margin-bottom: 20px; line-height: 1.6; }
.header-titles h1 { font-size: 16px; font-weight: 900; text-transform: uppercase; }
.header-titles h2 { font-size: 14px; font-weight: 700; color: #444; }
.header-titles h3 { font-size: 18px; font-weight: 900; margin-top: 10px; border-bottom: 2px solid #000; display: inline-block; padding-bottom: 5px;}

.meta-info { display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 12px; font-weight: bold; }
.meta-info div { display: flex; align-items: center; gap: 5px; }
.meta-info input { border: none; border-bottom: 1px dashed #000; font-family: inherit; font-size: 13px; font-weight: bold; text-align: center; outline: none; padding: 2px 5px;}

/* --- Tables --- */
table.data-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 11px; text-align: center; }
table.data-table th, table.data-table td { border: 1px solid #000; padding: 4px; }
table.data-table th { background-color: #f0f0f0; font-weight: bold; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
table.data-table td input { width: 100%; border: none; outline: none; text-align: center; font-family: inherit; font-size: 11px; background: transparent;}
table.data-table td input:focus { background-color: #e6f2ff; }

/* Specific Table Adjustments */
.table-pharmacie th:nth-child(1) { width: 10%; }
.table-pharmacie th:nth-child(2) { width: 35%; text-align: right; padding-right: 10px;}
.table-pharmacie td:nth-child(2) input { text-align: right; }

.table-staff th { font-size: 9px; padding: 2px; }
.table-staff td input { font-size: 10px; font-weight: bold;}
.col-name { width: 150px; text-align: right !important;}
.col-rank { width: 80px; }

/* --- Signatures --- */
.sigs { display: flex; justify-content: space-around; margin-top: 30px; }
.sig-box { text-align: center; width: 30%; }
.sig-box strong { display: block; font-size: 13px; margin-bottom: 40px; text-decoration: underline; }

/* --- Toast --- */
.toast{
  position:fixed;bottom:18px;left:50%;transform:translateX(-50%) translateY(16px);
  background:#161b22;border:1px solid rgba(63,185,80,.35);color:#3fb950;
  padding:9px 20px;border-radius:100px;font-size:12px;font-weight:700;
  opacity:0;pointer-events:none;z-index:999;transition:all .3s;display:flex;align-items:center;gap:6px;
}
.toast.error { border-color: rgba(248,81,73,.35); color: #f85149; }
.toast.show{opacity:1;transform:translateX(-50%) translateY(0);}

@media print{
  body,html{background:#fff;}
  .topbar,.toast{display:none!important;}
  .pw{padding:0;max-width:100%; display: none;}
  .pw.active { display: block; }
  .fiche{box-shadow:none; border: none; padding: 0;}
  /* اجعل جدول العمال يطبع بالعرض */
  #tab-staff .fiche { transform: scale(0.95); transform-origin: top center; }
  @page { margin: 1cm; }
}
</style>
</head>
<body>

<!-- الواجهة العلوية والتنقل -->
<div class="topbar">
  <div>
    <div class="tb-title">نظام إدارة المستشفى</div>
    <div class="tb-sub">قسم جراحة النساء والأمومة</div>
  </div>
  <div class="sep"></div>
  
  <div class="nav-tabs">
    <button class="tab-btn active" onclick="switchTab('tab-pharmacie', this)">وصل الصيدلية</button>
    <button class="tab-btn" onclick="switchTab('tab-oncall', this)">جدول المناوبة</button>
    <button class="tab-btn" onclick="switchTab('tab-staff', this)">حركة العمال</button>
  </div>

  <button class="btn-print" onclick="window.print()">
    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
    طباعة
  </button>
  <button class="btn-save" onclick="saveActiveFiche()">
    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
    حفظ البيانات
  </button>
</div>

<!-- ========================================== -->
<!-- 1. نموذج طلبية الصيدلية (بالفرنسية) -->
<!-- ========================================== -->
<div class="pw active" id="tab-pharmacie">
  <div class="fiche form-capture" dir="ltr" data-collection="pharmacy_orders">
    <div class="meta-info">
      <div>WILAYA: <input type="text" value="OULED DJELLAL" data-key="wilaya"></div>
      <div>N°: <input type="text" placeholder="...../....." data-key="order_number"></div>
    </div>
    <div class="meta-info">
      <div>ETABLISSEMENT PUBLIC HOSPITALIER OULED DJELLAL</div>
      <div>DATE: <input type="date" id="pharmaDate" data-key="date"></div>
    </div>
    
    <div class="header-titles">
      <h3>BON DE COMMANDE PHARMACIE</h3>
    </div>
    <div class="meta-info">
      <div>SERVICE: <input type="text" value="Chirurgie Gynécologique" style="width:250px" data-key="service"></div>
    </div>

    <table class="data-table table-pharmacie">
      <thead>
        <tr>
          <th>NUMERO D'ORDRE</th>
          <th>DESIGNATIONS</th>
          <th>QUANTITE EN STOCK</th>
          <th>QUANTITE DEMANDEE</th>
          <th>QUANTITE LIVREE</th>
          <th>PRIX</th>
          <th>OBSERVATIONS</th>
        </tr>
      </thead>
      <tbody id="pharmaTbody">
        <!-- يتم توليد الأسطر عبر الجافاسكربت -->
      </tbody>
    </table>

    <div class="sigs">
      <div class="sig-box"><strong>Responsable du Service</strong></div>
      <div class="sig-box"><strong>Le Médecin</strong></div>
      <div class="sig-box"><strong>Le Responsable de la Pharmacie</strong></div>
    </div>
  </div>
</div>

<!-- ========================================== -->
<!-- 2. نموذج جدول المناوبة للمختصين -->
<!-- ========================================== -->
<div class="pw" id="tab-oncall">
  <div class="fiche form-capture" data-collection="oncall_schedules">
    <div class="header-titles">
      <h1>الجمهورية الجزائرية الديمقراطية الشعبية</h1>
      <h2>وزارة الصحة</h2>
      <div style="text-align: right; margin-top: 10px; font-size: 13px;">
        <div>ولاية أولاد جلال</div>
        <div>مديرية الصحة والسكان لولاية أولاد جلال</div>
        <div>المؤسسة العمومية الإستشفائية أولاد جلال</div>
      </div>
      <h3>برنامج المناوبة الفعلية للممارسين المختصين</h3>
    </div>
    
    <div class="meta-info">
      <div>لشهر: <input type="month" data-key="month_year"></div>
    </div>

    <table class="data-table">
      <thead>
        <tr>
          <th rowspan="2">الأيام</th>
          <th>التخدير والإنعاش</th>
          <th>طب الأطفال</th>
          <th>الأمراض المعدية</th>
          <th>التصوير الطبي</th>
          <th>أمراض القلب</th>
          <th>أمراض الغدد والسكري</th>
          <th rowspan="2" style="width: 25%;">الملاحظات</th>
        </tr>
        <tr>
          <th>اسم الممارس</th>
          <th>اسم الممارس</th>
          <th>اسم الممارس</th>
          <th>اسم الممارس</th>
          <th>اسم الممارس</th>
          <th>اسم الممارس</th>
        </tr>
      </thead>
      <tbody id="oncallTbody">
        <!-- يتم توليد الأسطر عبر الجافاسكربت -->
      </tbody>
    </table>

    <div style="font-size: 11px; margin-top: 10px; line-height: 1.5; font-weight: bold;">
      ملاحظة هامة: الأيام الفارغة في الجدول هي عبارة عن عطلة تعويضية - أو عطلة سنوية أو فحوصات خارجية.<br>
      - يستدعى كل ممارس أخصائي عند الضرورة.
    </div>

    <div class="sigs">
      <div class="sig-box"><strong>المدير الفرعي للمصالح الصحية</strong></div>
      <div class="sig-box"><strong>رئيس المجلس الطبي</strong></div>
      <div class="sig-box"><strong>المدير</strong></div>
    </div>
  </div>
</div>

<!-- ========================================== -->
<!-- 3. نموذج جدول حركة العمال -->
<!-- ========================================== -->
<div class="pw" id="tab-staff">
  <div class="fiche form-capture" data-collection="staff_movements">
    <div class="header-titles">
      <h1>الجمهورية الجزائرية الديمقراطية الشعبية</h1>
      <h2>وزارة الصحة</h2>
      <div style="display: flex; justify-content: space-between; align-items: flex-end;">
        <div style="text-align: right; font-size: 13px; font-weight: bold;">
          مديرية الصحة والسكان لولاية أولاد جلال<br>
          المؤسسة العمومية الإستشفائية أولاد جلال<br>
          مصلحة جراحة النساء
        </div>
        <h3>جدول حركة العمال لشهر: <input type="month" data-key="month_year"></h3>
        <div style="font-size: 16px; font-weight: bold; padding: 10px; border: 1px solid #000;">
          مراقب المصلحة
        </div>
      </div>
    </div>

    <table class="data-table table-staff" style="margin-top: 10px;">
      <thead>
        <tr id="staffTheadDays">
          <!-- يتم توليد الأيام من 1 إلى 31 -->
        </tr>
      </thead>
      <tbody id="staffTbody">
         <!-- يتم توليد الأسطر عبر الجافاسكربت -->
      </tbody>
    </table>
    
    <div class="sigs">
      <div class="sig-box"><strong>مدير الموارد البشرية</strong></div>
    </div>
  </div>
</div>

<!-- رسالة الإشعار -->
<div class="toast" id="toast">
  <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
  <span id="toastMsg">تم الحفظ بنجاح</span>
</div>

<!-- 스كريبت Firebase والوظائف -->
<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-firestore.js";

const firebaseConfig = {
  apiKey: "AIzaSyC5OtqME0D8t72QsEERdRXrCCKl0bZqEQk",
  authDomain: "test-ae989.firebaseapp.com",
  projectId: "test-ae989",
  storageBucket: "test-ae989.firebasestorage.app",
  messagingSenderId: "1083766099812",
  appId: "1:1083766099812:web:a6a0170fc323d579aff471",
  measurementId: "G-6V8P1FMYF6"
};

const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// إعداد التاريخ الافتراضي
document.getElementById('pharmaDate').value = new Date().toISOString().slice(0,10);
document.querySelectorAll('input[type="month"]').forEach(el => {
  const d = new Date();
  el.value = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}`;
});

// وظيفة التنقل بين التبويبات
window.switchTab = function(tabId, btn) {
  document.querySelectorAll('.pw').forEach(el => el.classList.remove('active'));
  document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
  document.getElementById(tabId).classList.add('active');
  btn.classList.add('active');
}

// ---------------------------------------------------------
// توليد الجداول ديناميكياً لتنظيف كود HTML وتسريعه
// ---------------------------------------------------------

// 1. توليد سطور الصيدلية (15 سطر)
const pharmaTbody = document.getElementById('pharmaTbody');
for(let i=1; i<=15; i++) {
  pharmaTbody.innerHTML += `
    <tr>
      <td><input type="text" value="${i}" readonly></td>
      <td><input type="text" data-col="designation"></td>
      <td><input type="text" data-col="stock"></td>
      <td><input type="text" data-col="demandee"></td>
      <td><input type="text" data-col="livree"></td>
      <td><input type="text" data-col="prix"></td>
      <td><input type="text" data-col="obs"></td>
    </tr>
  `;
}

// 2. توليد سطور جدول المناوبة (31 يوم)
const oncallTbody = document.getElementById('oncallTbody');
for(let i=1; i<=31; i++) {
  oncallTbody.innerHTML += `
    <tr>
      <td>${String(i).padStart(2, '0')}</td>
      <td><input type="text" data-col="anesthesie"></td>
      <td><input type="text" data-col="pediatrie"></td>
      <td><input type="text" data-col="infection"></td>
      <td><input type="text" data-col="radio"></td>
      <td><input type="text" data-col="cardio"></td>
      <td><input type="text" data-col="endo"></td>
      ${i === 1 ? `<td rowspan="31"><textarea style="width:100%; height:100%; min-height:500px; border:none; outline:none; resize:none; padding:10px; font-family:inherit;" data-key="notes"></textarea></td>` : ''}
    </tr>
  `;
}

// 3. توليد جدول حركة العمال (رأس الجدول 31 يوم + 15 موظف)
const staffThead = document.getElementById('staffTheadDays');
let thHTML = `<th class="col-name">الإسم واللقب</th><th class="col-rank">الرتبة</th>`;
for(let d=1; d<=31; d++) thHTML += `<th>${d}</th>`;
staffThead.innerHTML = thHTML;

const staffTbody = document.getElementById('staffTbody');
for(let i=1; i<=15; i++) {
  let trHTML = `
    <tr>
      <td><input type="text" class="col-name" data-col="name"></td>
      <td><input type="text" class="col-rank" data-col="rank"></td>`;
  for(let d=1; d<=31; d++) {
    trHTML += `<td><input type="text" maxlength="1" data-day="${d}" style="text-transform:uppercase;"></td>`;
  }
  trHTML += `</tr>`;
  staffTbody.innerHTML += trHTML;
}

// ---------------------------------------------------------
// حفظ البيانات في Firebase بناءً على التبويب النشط
// ---------------------------------------------------------
window.saveActiveFiche = async function() {
  const activeContainer = document.querySelector('.pw.active .form-capture');
  if(!activeContainer) return;

  const collectionName = activeContainer.getAttribute('data-collection');
  const dataPayload = {
    createdAt: new Date().toISOString(),
    documentData: {},
    tableData: []
  };

  // 1. جمع البيانات العامة (Inputs with data-key)
  activeContainer.querySelectorAll('input[data-key], textarea[data-key]').forEach(input => {
    dataPayload.documentData[input.getAttribute('data-key')] = input.value;
  });

  // 2. جمع بيانات الجداول
  const tableRows = activeContainer.querySelectorAll('tbody tr');
  tableRows.forEach(row => {
    let rowObj = {};
    let hasData = false;
    
    // جمع المدخلات العادية في السطر
    row.querySelectorAll('input[data-col]').forEach(input => {
      if(input.value.trim() !== '') hasData = true;
      rowObj[input.getAttribute('data-col')] = input.value;
    });

    // جمع أيام حركة العمال (إن وجدت)
    let daysObj = {};
    row.querySelectorAll('input[data-day]').forEach(input => {
       if(input.value.trim() !== '') hasData = true;
       daysObj[`day_${input.getAttribute('data-day')}`] = input.value;
    });
    if(Object.keys(daysObj).length > 0) rowObj['days'] = daysObj;

    // حفظ السطر فقط إذا تم إدخال بيانات فيه (لتجنب حفظ الأسطر الفارغة)
    if(hasData) {
      dataPayload.tableData.push(rowObj);
    }
  });

  try {
    // إرسال إلى Firebase
    await addDoc(collection(db, collectionName), dataPayload);
    showToast("✅ تم حفظ البيانات بنجاح في قاعدة البيانات");
  } catch (error) {
    console.error("Firebase Error: ", error);
    showToast("❌ حدث خطأ أثناء الحفظ، تحقق من الاتصال", true);
  }
}

// إظهار الإشعار
function showToast(msg, isError = false) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  
  if(isError) t.classList.add('error');
  else t.classList.remove('error');

  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}
</script>
</body>
</html>