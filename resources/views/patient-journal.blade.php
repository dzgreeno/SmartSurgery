<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>سجل قسم الجراحة</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f7f9;
    padding:20px;
}
.page{
    width:900px;
    margin:auto;
    background:#fff;
    padding:30px;
    border:1px solid #000;
}
h1{
    text-align:center;
    margin-bottom:15px;
}
.section-title{
    font-weight:bold;
    margin-top:25px;
    border-bottom:2px solid #000;
    padding-bottom:5px;
}
.row{
    display:flex;
    gap:10px;
    margin-top:10px;
}
.field{
    flex:1;
}
label{
    font-size:13px;
    font-weight:bold;
}
input, textarea{
    width:100%;
    padding:6px;
    border:1px solid #000;
    font-size:13px;
}
table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}
table th, table td{
    border:1px solid #000;
    padding:6px;
    font-size:13px;
    text-align:center;
}
button{
    margin-top:10px;
    padding:8px 15px;
    background:#0b3c5d;
    color:#fff;
    border:none;
    cursor:pointer;
}
@media print{
    body{background:#fff;}
}
</style>
</head>

<body>

<div class="page">

<h1>🩺 سجل متابعة مرضى الجراحة</h1>

<!-- معلومات المريض -->
<div class="section-title">معلومات المريض</div>

<div class="row">
    <div class="field">
        <label>رقم الملف</label>
        <input type="text">
    </div>
    <div class="field">
        <label>الاسم</label>
        <input type="text">
    </div>
    <div class="field">
        <label>العمر</label>
        <input type="number">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>الغرفة</label>
        <input type="text">
    </div>
    <div class="field">
        <label>السرير</label>
        <input type="text">
    </div>
</div>

<!-- العملية -->
<div class="section-title">معلومات العملية</div>

<div class="row">
    <div class="field">
        <label>نوع العملية</label>
        <input type="text">
    </div>
    <div class="field">
        <label>تاريخ العملية</label>
        <input type="date">
    </div>
</div>

<div class="row">
    <div class="field">
        <label>الطبيب الجراح</label>
        <input type="text">
    </div>
    <div class="field">
        <label>مدة العملية</label>
        <input type="text">
    </div>
</div>

<!-- المتابعة -->
<div class="section-title">المتابعة بعد الجراحة</div>

<textarea rows="4" placeholder="الحالة العامة، الألم، الحرارة..."></textarea>

<!-- الأدوية -->
<div class="section-title">الأدوية اليومية</div>

<table id="medTable">
<tr>
    <th>الدواء</th>
    <th>الجرعة</th>
    <th>عدد المرات</th>
    <th>ملاحظات</th>
</tr>

<tr>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
</tr>

</table>

<button onclick="addMed()">➕ إضافة دواء</button>

<!-- المراقبة -->
<div class="section-title">المراقبة اليومية</div>

<table id="monitorTable">
<tr>
    <th>التاريخ</th>
    <th>الحرارة</th>
    <th>الضغط</th>
    <th>ملاحظات</th>
</tr>

<tr>
    <td><input type="date"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
</tr>

</table>

<button onclick="addMonitor()">➕ إضافة متابعة</button>

</div>

<script>
function addMed(){
    let table = document.getElementById("medTable");
    let row = table.insertRow();
    row.innerHTML = `
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
    `;
}

function addMonitor(){
    let table = document.getElementById("monitorTable");
    let row = table.insertRow();
    row.innerHTML = `
        <td><input type="date"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
    `;
}
</script>

</body>
</html>