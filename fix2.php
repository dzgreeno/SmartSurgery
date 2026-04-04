<?php
$c = file_get_contents('resources/views/daily-meds.blade.php');

$newContent = <<<HTML
<div class="content">
      <div class="panel active" id="panel-meds">
        <div class="card">
          <div class="card-head">
            <div class="card-title">
              <div class="card-title-dot"></div>
              سجل استهلاك يومي للأدوية
            </div>
            <div class="chips">
              <button class="chip active" onclick="filterMeds('all',this)">الكل</button>
              <button class="chip" onclick="filterMeds('مضادات حيوية',this)">مضادات حيوية</button>
              <button class="chip" onclick="filterMeds('مسكنات',this)">مسكنات</button>
              <button class="chip" onclick="filterMeds('مضادات التخثر',this)">مضادات التخثر</button>
            </div>
          </div>
          <div class="tbl-wrap">
            <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم المريض / الغرفة</th>
                  <th>الدواء / الحقنة</th>
                  <th>الجرعة (Dose)</th>
                  <th>وقت الإعطاء</th>
                  <th>الممرض المسؤول</th>
                  <th>التصنيف</th>
                </tr>
              </thead>
              <tbody id="medsTbody"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>{{-- end .content --}}
HTML;

$c = preg_replace('/<div class="content">.*?<\/div>\{\{-- end \.content --\}\}/s', $newContent, $c);

$newJs = <<<JS
const MEDS = [
  {id: 'MD-101', patient:'فاطمة بن عمر (غرفة 1)', med:'Paracetamol 1g', dose:'1 قارورة وريدية', time:'08:00 صباحاً', nurse:'سارة خليل', type:'مسكنات', cls:'badge-orange'},
  {id: 'MD-102', patient:'نور الهدى (غرفة 2)', med:'Amoxicillin 500mg', dose:'2 حبة', time:'10:30 صباحاً', nurse:'ليلى بوسلطان', type:'مضادات حيوية', cls:'badge-blue'},
  {id: 'MD-103', patient:'حفيظة زروق (غرفة 1)', med:'Tramadol 50mg', dose:'1 أمبولة', time:'12:15 ظهراً', nurse:'نسرين أيت علي', type:'مسكنات', cls:'badge-orange'},
  {id: 'MD-104', patient:'أمال بركات (غرفة 3)', med:'Ceftriaxone 1g', dose:'1 حقنة (IV)', time:'16:00 مساءً', nurse:'إيمان بلحوت', type:'مضادات حيوية', cls:'badge-blue'},
  {id: 'MD-105', patient:'زهرة مولاي (غرفة 2)', med:'Enoxaparin 4000', dose:'1 حقنة تحت الجلد', time:'18:00 مساءً', nurse:'سارة خليل', type:'مضادات التخثر', cls:'badge-red'},
  {id: 'MD-106', patient:'خديجة محمد (غرفة 4)', med:'Diclofenac 75mg', dose:'1 أمبولة (IM)', time:'20:00 ليلاً', nurse:'ليلى بوسلطان', type:'مسكنات', cls:'badge-orange'},
];

function renderMeds(list){
  const data = list || MEDS;
  const tb = document.getElementById('medsTbody');
  if(!data.length){ tb.innerHTML = `<tr><td colspan="7" class="empty" style="text-align:center;padding:20px;color:var(--muted)">لا يوجد سجل أدوية لهذا التصنيف</td></tr>`; return; }
  tb.innerHTML = data.map((o,i)=>`
    <tr>
      <td style="color:var(--muted);font-size:11px">\${o.id}</td>
      <td><strong>\${o.patient}</strong></td>
      <td style="color:var(--accent)">\${o.med}</td>
      <td style="color:var(--muted2)">\${o.dose}</td>
      <td style="color:var(--text)">\${o.time}</td>
      <td style="font-size:11.5px;color:var(--muted)">\${o.nurse}</td>
      <td><span class="badge \${o.cls}">\${o.type}</span></td>
    </tr>`).join('');
}

function filterMeds(s,el){
  document.querySelectorAll('#panel-meds .chip').forEach(c=>c.classList.remove('active'));
  el.classList.add('active');
  renderMeds(s==='all' ? MEDS : MEDS.filter(o=>o.type===s));
}

renderMeds();
loadChat();
renderChat();
JS;

$c = preg_replace('/const DOCTORS = \[.*?renderChat\(\);/s', $newJs, $c);

// Also fix the active state of navigation
$c = str_replace('<button class="nav-btn active" onclick="showPanel(\'schedule\', this)" id="nav-schedule">', '<button class="nav-btn" onclick="location.href=\'/surgery/women\'">', $c);
$c = preg_replace('/<a href="\{\{ route\(\'daily-meds\'\) \}\}" class="nav-btn">/', '<a href="{{ route(\'daily-meds\') }}" class="nav-btn active">', $c);

$c = str_replace('قسم جراحة النساء —', 'سجل الأدوية —', $c);

file_put_contents('resources/views/daily-meds.blade.php', $c);
echo "daily-meds updated!\n";

