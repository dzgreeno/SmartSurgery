<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Fiche Navette</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#0d1117;--bg2:#161b22;--bg3:#1c2128;
  --border:rgba(255,255,255,.08);--text:#e6edf3;--muted:#7d8590;
  --accent:#2dd4bf;--gold:#f0b429;--r:7px;--t:.18s ease;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
body{font-family:"Cairo",Arial,sans-serif;background:var(--bg);color:var(--text);min-height:100vh;display:flex;flex-direction:column;}

.topbar{
  height:48px;background:var(--bg2);border-bottom:1px solid var(--border);
  display:flex;align-items:center;padding:0 16px;gap:10px;
  position:sticky;top:0;z-index:200;flex-shrink:0;
}
.back-btn{
  display:flex;align-items:center;gap:6px;padding:6px 13px;
  border-radius:var(--r);background:rgba(45,212,191,.1);
  border:1px solid rgba(45,212,191,.25);color:var(--accent);
  font-size:12px;font-weight:700;font-family:inherit;cursor:pointer;text-decoration:none;transition:all var(--t);
}
.back-btn:hover{background:rgba(45,212,191,.2);}
.sep{width:1px;height:26px;background:var(--border);}
.tb-title{font-size:13px;font-weight:800;}
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

.pw{padding:20px;max-width:900px;margin:auto;width:100%;}

.fiche{
  background:#fff;color:#111;font-family:Arial,sans-serif;font-size:12px;
  border:1px solid #555;box-shadow:0 20px 60px rgba(0,0,0,.6);
}
.page-lbl{text-align:right;font-size:9px;color:#666;padding:3px 10px 0;}
.fiche-title{
  text-align:center;font-size:21px;font-weight:900;letter-spacing:2px;
  padding:8px 0 6px;border-bottom:2px solid #000;
}
.fiche-hdr{
  display:flex;align-items:flex-start;justify-content:space-between;
  padding:8px 12px;border-bottom:1.5px solid #ccc;gap:10px;
}
.cachet-wrap{display:flex;flex-direction:column;align-items:flex-start;gap:2px;flex-shrink:0;}
.cachet-lbl{font-size:8.5px;color:#888;font-weight:700;text-transform:uppercase;letter-spacing:.4px;}
.cachet-box{
  width:130px;height:74px;border:1.5px dashed #aaa;border-radius:4px;
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;position:relative;overflow:hidden;background:#fafafa;transition:border-color .2s;
}
.cachet-box:hover{border-color:#555;border-style:solid;}
.cachet-box input[type=file]{position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%;}
.cachet-ph{font-size:9px;color:#ccc;text-align:center;line-height:1.5;pointer-events:none;}
.cachet-img{width:100%;height:100%;object-fit:contain;display:none;pointer-events:none;}
.rep{text-align:center;flex:1;line-height:1.7;font-size:10px;color:#333;}
.rep b{display:block;color:#000;}
.rep .hosp{font-size:12px;font-weight:900;color:#000;margin-top:2px;}
.fiche-meta{display:flex;flex-direction:column;gap:5px;align-items:flex-end;min-width:115px;flex-shrink:0;}
.meta-row{display:flex;align-items:center;gap:4px;font-size:10px;}
.meta-row label{font-size:9px;font-weight:700;color:#777;white-space:nowrap;}
.meta-row input{
  border:none;border-bottom:1px solid #bbb;font-size:11px;
  font-family:Arial;text-align:center;width:95px;outline:none;
  background:transparent;padding:1px 3px;
}
.meta-row input:focus{border-bottom-color:#111;}

.st{
  background:#1a1a2e;color:#fff;font-size:10.5px;font-weight:900;
  letter-spacing:.7px;text-transform:uppercase;
  padding:4px 10px;border-top:1px solid #000;border-bottom:1px solid #000;
  -webkit-print-color-adjust:exact;print-color-adjust:exact;
}
.sb{padding:6px 10px 5px;}
.r{display:flex;flex-wrap:wrap;gap:0;margin-bottom:4px;}
.r:last-child{margin-bottom:0;}
.f{flex:1;min-width:90px;padding:2px 5px;}
.f.w2{flex:2;}
.f.w3{flex:3;}
.f.full{flex:1 0 100%;}
.f label{display:block;font-size:8.5px;font-weight:700;color:#666;letter-spacing:.2px;margin-bottom:2px;white-space:nowrap;}
.f input,.f select,.f textarea{
  width:100%;padding:3px 5px;border:1px solid #bbb;border-radius:3px;
  font-size:11.5px;font-family:Arial;color:#111;background:#fff;outline:none;transition:border-color .12s;
}
.f input:focus,.f select:focus,.f textarea:focus{border-color:#1a1a2e;box-shadow:0 0 0 2px rgba(26,26,46,.07);}
.f select{cursor:pointer;background:#fff;}

.mv{width:100%;border-collapse:collapse;font-size:11px;margin-top:2px;}
.mv th{
  background:#1a1a2e;color:#fff;padding:4px 7px;
  text-align:center;font-size:9.5px;font-weight:700;border:1px solid #1a1a2e;
  -webkit-print-color-adjust:exact;print-color-adjust:exact;
}
.mv td{border:1px solid #bbb;padding:0;}
.mv td input{
  border:none;width:100%;font-size:11px;padding:4px 5px;
  background:transparent;outline:none;font-family:Arial;display:block;
}
.mv td input:focus{background:#f0f7ff;}
.mv tr:nth-child(even) td{background:#f9f9f9;}

.sigs{display:flex;border-top:2px solid #000;}
.sig{flex:1;text-align:center;padding:6px 8px;border-left:1px solid #ccc;}
.sig:last-child{border-left:none;}
.sig-line{height:1px;background:#aaa;margin:22px 12px 4px;}
.sig strong{display:block;font-size:10px;}
.sig span{font-size:9px;color:#666;}

.fiche-foot{
  background:#f0f0f0;border-top:1px solid #ccc;
  display:flex;justify-content:space-between;
  padding:3px 12px;font-size:8.5px;color:#999;font-style:italic;
}

.toast{
  position:fixed;bottom:18px;left:50%;transform:translateX(-50%) translateY(16px);
  background:#161b22;border:1px solid rgba(63,185,80,.35);color:#3fb950;
  padding:9px 20px;border-radius:100px;font-size:12px;font-weight:700;
  font-family:"Cairo",sans-serif;opacity:0;pointer-events:none;
  z-index:999;transition:all .3s;display:flex;align-items:center;gap:6px;
}
.toast.show{opacity:1;transform:translateX(-50%) translateY(0);}

@media  print{
  body,html{background:#fff;}
  .topbar,.toast{display:none!important;}
  .pw{padding:0;max-width:100%;}
  .fiche{box-shadow:none;}
  .st,.mv th{-webkit-print-color-adjust:exact;print-color-adjust:exact;}
}
</style>
</head>
<body>

<div class="topbar">
  <a href="/surgery/women" class="back-btn">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
    جراحة النساء
  </a>
  <div class="sep"></div>
  <div>
    <div class="tb-title">Fiche Navette</div>
    <div class="tb-sub">قسم جراحة النساء — مستشفى عاشور زيان</div>
  </div>
  <div class="sp"></div>
  <button class="btn-print" onclick="window.print()">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
    طباعة
  </button>
  <button class="btn-save" onclick="saveFiche()">
    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
    حفظ
  </button>
</div>

<div class="pw">
<div class="fiche" id="ficheMain">

  <div class="page-lbl">PAGE 1</div>
  <div class="fiche-title">FICHE NAVETTE</div>

  <div class="fiche-hdr">
    <div class="cachet-wrap">
      <div class="cachet-lbl">Cachet de l'établissement</div>
      <div class="cachet-box">
        <input type="file" accept="image/*" onchange="loadCachet(this)">
        <div class="cachet-ph" id="cachetPh">
          <svg width="20" height="20" fill="none" stroke="#ccc" stroke-width="1.5" viewBox="0 0 24 24" style="display:block;margin:0 auto 3px"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          انقر لتحميل الطابع
        </div>
        <img id="cachetImg" class="cachet-img" alt="cachet">
      </div>
    </div>

    <div class="rep">
      <b>République Algérienne Démocratique et Populaire</b>
      Ministère de la Santé, de la Population et de la Réforme Hospitalière
      <div class="hosp">Hôpital Achour Ziane — Sidi Bel Abbès</div>
      Service de Chirurgie Gynécologique
    </div>

    <div class="fiche-meta">
      <div class="meta-row"><label>N° Fiche :</label><input type="text" id="ficheNum" placeholder="FN-0001"></div>
      <div class="meta-row"><label>Date :</label><input type="date" id="ficheDate"></div>
    </div>
  </div>

  <div class="st">IDENTIFICATION DU PATIENT</div>
  <div class="sb">
    <div class="r">
      <div class="f"><label>1. N° D'ADMISSION</label><input type="text"></div>
      <div class="f"><label>2. DATE DE NAISSANCE</label><input type="date"></div>
      <div class="f"><label>3. GROUPE SANGUIN</label><input type="text" placeholder="A+  B+  O+  AB+"></div>
    </div>
    <div class="r">
      <div class="f"><label>4. NOM</label><input type="text"></div>
      <div class="f"><label>5. NOM DE JEUNE FILLE</label><input type="text"></div>
      <div class="f"><label>6. PRÉNOM</label><input type="text"></div>
    </div>
    <div class="r">
      <div class="f full"><label>7. ADRESSE</label><input type="text"></div>
    </div>
  </div>

  <div class="st">IDENTIFICATION DE L'ASSURÉ</div>
  <div class="sb">
    <div class="r">
      <div class="f"><label>8. CAISSE</label><input type="text"></div>
      <div class="f w2"><label>9. MATRICULE ASSURÉ</label><input type="text"></div>
    </div>
    <div class="r">
      <div class="f w2"><label>10. NOM, PRÉNOM</label><input type="text"></div>
      <div class="f"><label>11. DATE DE NAISSANCE</label><input type="date"></div>
    </div>
    <div class="r">
      <div class="f"><label>12. QUALITÉ DU MALADE</label><input type="text"></div>
      <div class="f"><label>13. NOM</label><input type="text"></div>
      <div class="f"><label>14. PRÉNOM</label><input type="text"></div>
    </div>
    <div class="r">
      <div class="f w2"><label>15. N° PRISE EN CHARGE</label><input type="text"></div>
      <div class="f"><label>16. DATE</label><input type="date"></div>
    </div>
  </div>

  <div class="st">SERVICE D'HOSPITALISATION</div>
  <div class="sb">
    <div class="r">
      <div class="f"><label>17. SERVICE</label><input type="text" value="C.H.A"></div>
      <div class="f w2"><label>18. NOM ET QUALITÉ DU CHEF DE SERVICE</label><input type="text"></div>
    </div>
    <div class="r">
      <div class="f"><label>19. DATE D'ENTRÉE</label><input type="date"></div>
      <div class="f"><label>20. HEURE D'ENTRÉE</label><input type="time"></div>
    </div>
    <div class="r">
      <div class="f"><label>21. N° DE SALLE</label><input type="text"></div>
      <div class="f"><label>22. N° DE LIT</label><input type="text"></div>
    </div>
    <div class="r">
      <div class="f w3"><label>23. NOM PRÉNOM ET QUALITÉ DU MÉDECIN TRAITANT</label><input type="text"></div>
    </div>
    <div class="r">
      <div class="f w2"><label>24. MODE D'ENTRÉE</label>
        <select>
          <option value=""></option>
          <option>Urgences</option>
          <option>Mutation interne</option>
          <option>Programmé</option>
          <option>Transfert</option>
          <option>Consultation externe</option>
        </select>
      </div>
      <div class="f"><label>25. CODE D'ENTRÉE</label><input type="text"></div>
    </div>
  </div>

  <div class="st">HOSPITALISATION DANS UN AUTRE SERVICE (MOUVEMENT DU MALADE)</div>
  <div class="sb">
    <table class="mv">
      <thead>
        <tr>
          <th style="width:25%">26. Service</th>
          <th style="width:15%">27. Date</th>
          <th style="width:12%">28. Heure</th>
          <th style="width:22%">29. Nom de salle / N° Lit</th>
          <th style="width:26%">30. Médecin traitant</th>
        </tr>
      </thead>
      <tbody>
        <tr><td><input type="text"></td><td><input type="date"></td><td><input type="time"></td><td><input type="text"></td><td><input type="text"></td></tr>
        <tr><td><input type="text"></td><td><input type="date"></td><td><input type="time"></td><td><input type="text"></td><td><input type="text"></td></tr>
        <tr><td><input type="text"></td><td><input type="date"></td><td><input type="time"></td><td><input type="text"></td><td><input type="text"></td></tr>
        <tr><td><input type="text"></td><td><input type="date"></td><td><input type="time"></td><td><input type="text"></td><td><input type="text"></td></tr>
      </tbody>
    </table>
  </div>

  <div class="sigs">
    <div class="sig">
      <div class="sig-line"></div>
      <strong>Médecin traitant</strong>
      <span>Nom &amp; Cachet</span>
    </div>
    <div class="sig">
      <div class="sig-line"></div>
      <strong>Chef de service</strong>
      <span>Nom, Qualité &amp; Cachet</span>
    </div>
    <div class="sig">
      <div class="sig-line"></div>
      <strong>Infirmière responsable</strong>
      <span>Nom &amp; Signature</span>
    </div>
  </div>

  <div class="fiche-foot">
    <span>Form. 03157</span><span>Form. 03166</span><span>Form. 012713</span><span>Form. 032044</span>
  </div>

</div>
</div>

<div class="toast" id="toast">
  <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
  <span id="toastMsg">تم الحفظ بنجاح</span>
</div>
<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-firestore.js";

const firebaseConfig = {
  apiKey: "AIzaSyDdOfK6TB7zf5p_jN__8Iucu8lusQYn7nE",
  authDomain: "smartsurgery.firebaseapp.com",
  projectId: "smartsurgery",
  storageBucket: "smartsurgery.firebasestorage.app",
  messagingSenderId: "181325973586",
  appId: "1:181325973586:web:634f40341f3846e4c7f78b"
};

const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

/* تاريخ اليوم تلقائي */
document.getElementById('ficheDate').value =
  new Date().toISOString().slice(0,10);

/* تحميل الطابع */
window.loadCachet = function(inp){
  const file = inp.files[0];
  if(!file) return;

  const r = new FileReader();

  r.onload = e=>{
    document.getElementById('cachetImg').src = e.target.result;
    document.getElementById('cachetImg').style.display="block";
    document.getElementById('cachetPh').style.display="none";
  };

  r.readAsDataURL(file);
}

/* حفظ fiche في Firebase */
window.saveFiche = async function(){

  const data = {};

  document.querySelectorAll('#ficheMain input:not([type=file]), #ficheMain select')
  .forEach(el=>{

    const label = el.parentElement.querySelector("label");

    if(label){
      data[label.innerText] = el.value;
    }

  });

  const ficheNumber =
    document.getElementById("ficheNum").value ||
    ("FN-"+Date.now());

  try{

    await addDoc(collection(db,"patients"),{

      ficheNumber: ficheNumber,
      ficheData: data,
      createdAt: new Date()

    });

    showToast("✅ تم حفظ fiche في قاعدة البيانات");

  }catch(e){

    showToast("❌ خطأ في الحفظ");

    console.error(e);

  }

}

/* toast */
function showToast(msg){

  const t = document.getElementById('toast');

  document.getElementById('toastMsg').textContent = msg;

  t.classList.add('show');

  setTimeout(()=>t.classList.remove('show'),3000);

}

</script>
</body>
</html><?php /**PATH D:\web apps\Github-Project\SmartSurgery\resources\views/fiche-navette.blade.php ENDPATH**/ ?>