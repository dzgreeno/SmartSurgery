<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">
<title>متابعة الحمل</title>

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body{
font-family:"Cairo",sans-serif;
margin:0;
background:#f4f7f9;
}

/* NAVBAR */

.navbar{
background:#0f4c5c;
padding:15px 40px;
display:flex;
gap:20px;
}

.navbar a{
color:white;
text-decoration:none;
font-size:14px;
}

.navbar a:hover{
color:#ffd166;
}

/* ARTICLE */

.container{
max-width:900px;
margin:auto;
padding:50px 20px;
}

.title{
font-size:32px;
color:#0f4c5c;
margin-bottom:20px;
text-align:center;
}

.image img{
width:100%;
border-radius:10px;
margin-bottom:25px;
}

.text{
font-size:17px;
line-height:1.9;
color:#333;
}

ul{
line-height:1.9;
}

.back{
display:inline-block;
margin-top:25px;
padding:10px 18px;
background:#0f4c5c;
color:white;
text-decoration:none;
border-radius:6px;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<div class="navbar">

<a href="{{ route('home') }}">الرئيسية</a>

<a href="{{ route('maternite') }}">الأمومة</a>

<a href="{{ route('about') }}">نبذة عن المستشفى</a>

<a href="{{ route('contact') }}">اتصل بنا</a>

</div>


<div class="container">

<div class="title">
متابعة الحمل في مستشفى عاشور زيان
</div>

<div class="image">

<img src="https://plus.unsplash.com/premium_photo-1702598807552-2415ffe37b87">

</div>

<div class="text">

<p>

يوفر قسم الأمومة بمستشفى عاشور زيان خدمات متابعة الحمل
للنساء الحوامل من خلال فحوصات طبية دورية يشرف عليها
أطباء مختصون وقابلات.

</p>

<p>

تهدف هذه المتابعة إلى ضمان صحة الأم والجنين
والكشف المبكر عن أي مضاعفات محتملة أثناء الحمل.

</p>

<h3>الخدمات المقدمة:</h3>

<ul>

<li>الفحص الطبي الدوري للحامل</li>

<li>متابعة نمو الجنين</li>

<li>إجراء التحاليل الطبية اللازمة</li>

<li>فحص الجنين بالموجات فوق الصوتية</li>

<li>تقديم النصائح الصحية للأم</li>

</ul>

<p>

يسعى المستشفى إلى توفير أفضل رعاية صحية
للأم والمولود وفق المعايير الطبية الحديثة.

</p>

<a href="{{ route('maternite') }}" class="back">

العودة إلى صفحة الأمومة

</a>

</div>

</div>

</body>

</html>