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

    <form method="POST" action="/login">
      @csrf

      <div class="form-group">
        <label>البريد الإلكتروني</label>
        <input type="email" name="email" placeholder="example@hospital.com" required value="{{ old('email') }}">
      </div>

      <div class="form-group">
        <label>كلمة المرور</label>
        <input type="password" name="password" placeholder="••••••••" required>
      </div>

      <button type="submit" class="btn-login">
        <span>🔐</span> تسجيل الدخول
      </button>
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

</body>
</html>