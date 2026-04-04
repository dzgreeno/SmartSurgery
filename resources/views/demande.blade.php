<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>طلب عملية جراحية</title>

<style>
body{
font-family: Arial;
background:#f5f7fa;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.form-box{
background:white;
padding:30px;
border-radius:10px;
width:400px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h2{
text-align:center;
margin-bottom:20px;
}

input,textarea{
width:100%;
padding:10px;
margin-top:8px;
margin-bottom:15px;
border:1px solid #ccc;
border-radius:6px;
}

button{
width:100%;
padding:12px;
background:#2c7be5;
color:white;
border:none;
border-radius:6px;
font-size:16px;
cursor:pointer;
}

button:hover{
background:#1a5dc9;
}
</style>

</head>
<body>

<div class="form-box">

<h2>طلب عملية جراحية</h2>

@if(session('success'))
<div style="background:#d4edda;color:#155724;padding:10px;border-radius:6px;margin-bottom:15px;text-align:center;">
{{ session('success') }}
</div>
@endif

<form action="/demands" method="POST">

@csrf

<label>الاسم الكامل</label>
<input type="text" name="name" required>

<label>نوع العملية</label>
<input type="text" name="type" required>

<label>وصف الحالة</label>
<textarea name="description" required></textarea>

<label>التاريخ</label>
<input type="date" name="date" required>

<button type="submit">إرسال الطلب</button>

</form>

</div>

</body>
</html>
