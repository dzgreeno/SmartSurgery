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
    <h2 id="form-title">طلب عملية جراحية</h2>
    <div id="success-msg" style="display:none;background:#d4edda;color:#155724;padding:10px;border-radius:6px;margin-bottom:15px;text-align:center;">
        ✅ تم إرسال طلبك بنجاح! سنقوم بمراجعته والرد عليك قريباً.
    </div>
    
    <div id="req-form">
        <label>الاسم الكامل</label>
        <input type="text" id="p-name" required placeholder="محمد علي">

        <label>البريد الإلكتروني (لاستقبال رسالة التأكيد)</label>
        <input type="email" id="p-email" required placeholder="name@example.com">

        <label>رقم الهاتف (اختياري)</label>
        <input type="tel" id="p-phone" placeholder="0555 00 00 00">

        <label>نوع العملية</label>
        <input type="text" id="p-type" required placeholder="مثال: جراحة المرارة">

        <label>وصف الحالة</label>
        <textarea id="p-desc" required placeholder="تفاصيل إضافية..."></textarea>

        <label>التاريخ المفضل</label>
        <input type="date" id="p-date" required>

        <button type="button" id="btn-submit">إرسال الطلب</button>
    </div>
    <div style="text-align:center;margin-top:15px;">
        <a href="/" style="font-size:12px;color:#2c7be5;text-decoration:none;">العودة للرئيسية</a>
    </div>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getDatabase, ref, push, set, serverTimestamp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

const firebaseConfig = {
  apiKey: "AIzaSyC5OtqME0D8t72QsEERdRXrCCKl0bZqEQk",
  authDomain: "test-ae989.firebaseapp.com",
  databaseURL: "https://test-ae989-default-rtdb.europe-west1.firebasedatabase.app",
  projectId: "test-ae989",
  storageBucket: "test-ae989.firebasestorage.app",
  messagingSenderId: "1083766099812",
  appId: "1:1083766099812:web:a6a0170fc323d579aff471"
};

const app = initializeApp(firebaseConfig);
const db = getDatabase(app);

document.getElementById('btn-submit').addEventListener('click', async function() {
    const name = document.getElementById('p-name').value;
    const email = document.getElementById('p-email').value;
    const phone = document.getElementById('p-phone').value;
    const type = document.getElementById('p-type').value;
    const desc = document.getElementById('p-desc').value;
    const date = document.getElementById('p-date').value;

    if(!name || !email || !type || !date) {
        alert('الرجاء ملء جميع الحقول الإلزامية.');
        return;
    }

    const btn = this;
    btn.disabled = true;
    btn.innerText = 'جاري الإرسال...';

    try {
        const newRef = push(ref(db, 'appointments/requests'));
        const parts = name.split(' ');
        const fname = parts[0];
        const lname = parts.slice(1).join(' ') || '—';

        await set(newRef, {
            fname: fname,
            lname: lname,
            email: email,
            phone: phone,
            department: type,
            description: desc,
            date: date,
            status: 'Pending',
            createdAt: serverTimestamp()
        });

        document.getElementById('req-form').style.display = 'none';
        document.getElementById('form-title').style.display = 'none';
        document.getElementById('success-msg').style.display = 'block';
    } catch (e) {
        console.error(e);
        alert('حدث خطأ أثناء الإرسال. يرجى المحاولة لاحقاً.');
    }
    btn.disabled = false;
    btn.innerText = 'إرسال الطلب';
});
</script>

</body>
</html>
