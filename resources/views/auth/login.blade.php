<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تسجيل الدخول — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root {
  --bg: #0d1117; --bg2: #161b22; --bg3: #1c2128;
  --border: rgba(255,255,255,.08); --text: #e6edf3; --muted: #7d8590;
  --accent: #2dd4bf; --accent2: rgba(45,212,191,.12);
  --gold: #f0b429; --red: #f85149;
  --r: 12px; --t: .25s cubic-bezier(.4,0,.2,1);
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body {
  font-family: 'Cairo', sans-serif; background: var(--bg); color: var(--text);
  min-height: 100vh; display: flex; align-items: center; justify-content: center;
  padding: 20px;
}
.login-container {
  width: 100%; max-width: 420px;
}
.login-header {
  text-align: center; margin-bottom: 32px;
}
.logo-icon {
  width: 64px; height: 64px; margin: 0 auto 16px;
  background: linear-gradient(135deg, var(--accent), #0891b2);
  border-radius: 18px; display: flex; align-items: center; justify-content: center;
  font-size: 30px; box-shadow: 0 8px 32px rgba(45,212,191,.3);
}
.login-header h1 {
  font-size: 24px; font-weight: 800; margin-bottom: 6px;
}
.login-header p {
  font-size: 13px; color: var(--muted);
}
.login-card {
  background: var(--bg2); border: 1px solid var(--border);
  border-radius: var(--r); padding: 32px; overflow: hidden;
  box-shadow: 0 20px 60px rgba(0,0,0,.4);
}
.form-group {
  margin-bottom: 20px;
}
.form-group label {
  display: block; font-size: 12px; font-weight: 700;
  color: var(--muted); margin-bottom: 8px;
}
.form-group input {
  width: 100%; padding: 12px 16px;
  background: var(--bg3); border: 1px solid var(--border);
  border-radius: 8px; color: var(--text); font-family: 'Cairo', sans-serif;
  font-size: 14px; outline: none; transition: all var(--t); direction: ltr;
}
.form-group input:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 3px var(--accent2);
}
.form-group input::placeholder { color: var(--muted); }
.btn-login {
  width: 100%; padding: 14px; border: none;
  background: linear-gradient(135deg, var(--accent), #0891b2);
  color: #0d1117; font-family: 'Cairo', sans-serif;
  font-size: 15px; font-weight: 800; border-radius: 8px;
  cursor: pointer; transition: all var(--t);
  box-shadow: 0 4px 20px rgba(45,212,191,.3);
  display: flex; align-items: center; justify-content: center; gap: 8px;
}
.btn-login:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 30px rgba(45,212,191,.4);
}
.error-msg {
  background: rgba(248,81,73,.1); border: 1px solid rgba(248,81,73,.2);
  color: var(--red); padding: 10px 14px; border-radius: 8px;
  font-size: 13px; margin-bottom: 20px; text-align: center;
}
.success-msg {
  background: rgba(63,185,80,.1); border: 1px solid rgba(63,185,80,.2);
  color: #3fb950; padding: 10px 14px; border-radius: 8px;
  font-size: 13px; margin-bottom: 20px; text-align: center;
}
.back-home {
  display: block; text-align: center; margin-top: 20px;
  color: var(--muted); font-size: 12px; text-decoration: none;
  transition: color var(--t);
}
.back-home:hover { color: var(--accent); }
.role-info {
  margin-top: 24px; padding: 16px; background: var(--bg3);
  border-radius: 8px; border: 1px solid var(--border);
}
.role-info h4 {
  font-size: 11px; color: var(--gold); font-weight: 700;
  margin-bottom: 8px; letter-spacing: 0.5px;
}
.role-info p {
  font-size: 11px; color: var(--muted); line-height: 1.8;
}
</style>
</head>
<body>

<div class="login-container">
  <div class="login-header">
    <div class="logo-icon">🏥</div>
    <h1>SmartSurgery</h1>
    <p>المؤسسة الاستشفائية — عاشور زيان</p>
  </div>

  <div class="login-card">
    @if(session('error'))
      <div class="error-msg">{{ session('error') }}</div>
    @endif

    @if(session('success'))
      <div class="success-msg">{{ session('success') }}</div>
    @endif

    <form id="login-form">
      @csrf

      <div class="form-group">
        <label>البريد الإلكتروني</label>
        <input type="email" id="email" placeholder="example@hospital.com" required value="{{ old('email') }}">
      </div>

      <div class="form-group">
        <label>كلمة المرور</label>
        <input type="password" id="password" placeholder="••••••••" required>
      </div>

      <button type="submit" id="btn-submit" class="btn-login">
        <span id="btn-icon">🔐</span> <span id="btn-text">تسجيل الدخول</span>
      </button>

      <div id="status-msg" class="error-msg" style="display: none; margin-top: 15px;"></div>
    </form>

    <form id="bridge-form" method="POST" action="{{ route('login.bridge') }}" style="display: none;">
      @csrf
      <input type="hidden" name="uid" id="bridge-uid">
      <input type="hidden" name="email" id="bridge-email">
      <input type="hidden" name="fname" id="bridge-fname">
      <input type="hidden" name="lname" id="bridge-lname">
      <input type="hidden" name="role" id="bridge-role">
      <input type="hidden" name="urlphoto" id="bridge-photo">
    </form>

    <div class="role-info">
      <h4>🔑 الأدوار المتاحة</h4>
      <p>
        مدير النظام • رئيس المصلحة • طبيب • ممرض/ة • طاقم طبي
      </p>
    </div>
  </div>

  <a href="{{ route('home') }}" class="back-home">→ العودة إلى الصفحة الرئيسية</a>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";
import { getDatabase, ref, get } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

const firebaseConfig = {
  apiKey: "AIzaSyC5OtqME0D8t72QsEERdRXrCCKl0bZqEQk",
  authDomain: "test-ae989.firebaseapp.com",
  databaseURL: "https://test-ae989-default-rtdb.europe-west1.firebasedatabase.app",
  projectId: "test-ae989",
  storageBucket: "test-ae989.firebasestorage.app",
  messagingSenderId: "1083766099812",
  appId: "1:1083766099812:web:a6a0170fc323d579aff471",
  measurementId: "G-6V8P1FMYF6"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const db = getDatabase(app);

const loginForm = document.getElementById('login-form');
const statusMsg = document.getElementById('status-msg');
const btnSubmit = document.getElementById('btn-submit');
const btnText = document.getElementById('btn-text');
const btnIcon = document.getElementById('btn-icon');

loginForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  
  // UI Loading
  statusMsg.style.display = 'none';
  btnSubmit.disabled = true;
  btnText.textContent = 'جاري التحقق...';
  btnIcon.textContent = '⏳';

  try {
    // 1. Firebase Auth Sign In
    const userCredential = await signInWithEmailAndPassword(auth, email, password);
    const user = userCredential.user;
    
    btnText.textContent = 'تم التحقق، جاري جلب البيانات...';
    
    // 2. Fetch User Role from Realtime Database
    const userRef = ref(db, 'users/' + user.uid);
    const snapshot = await get(userRef);

    if (snapshot.exists()) {
      const userData = snapshot.val();
      
      // 3. Fill Bridge Form and Submit to PHP
      document.getElementById('bridge-uid').value = user.uid;
      document.getElementById('bridge-email').value = user.email;
      document.getElementById('bridge-fname').value = userData.fname || '';
      document.getElementById('bridge-lname').value = userData.lname || '';
      document.getElementById('bridge-role').value = userData.role || 'user';
      document.getElementById('bridge-photo').value = userData.urlphoto || '';
      
      btnText.textContent = '✅ تم النجاح! جاري الدخول...';
      btnIcon.textContent = '🎉';
      document.getElementById('bridge-form').submit();
    } else {
      throw new Error('لم يتم العثور على بيانات المستخدم في قاعدة البيانات. يرجى تشغيل صفحة /seed-js أولاً.');
    }

  } catch (error) {
    console.error(error);
    statusMsg.style.display = 'block';
    
    let message = '❌ ' + error.message;
    if (error.code === 'auth/invalid-credential') message = '❌ البريد الإلكتروني أو كلمة المرور غير صحيحة';
    else if (error.code === 'auth/user-not-found') message = '❌ لم يتم العثور على مستخدم بهذا البريد';
    else if (error.code === 'auth/wrong-password') message = '❌ كلمة المرور خاطئة';
    else if (error.code === 'auth/too-many-requests') message = '❌ تم حظر الحساب مؤقتاً بسبب محاولات كثيرة. حاول لاحقاً.';

    statusMsg.textContent = message;
    btnSubmit.disabled = false;
    btnText.textContent = 'تسجيل الدخول';
    btnIcon.textContent = '🔐';
  }
});
</script>

</body>
</html>