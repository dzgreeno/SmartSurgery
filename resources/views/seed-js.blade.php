<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSurgery | Database Seeder</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center text-white p-6">
    <div class="max-w-2xl w-full bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-3xl p-8 shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">🚀 محرك بيانات المستشفى الذكي</h1>
            <p class="text-slate-400">سيقوم هذا المحرك بإنشاء الحسابات التجريبية مباشرة من المتصفح لتجنب مشاكل الأمان في السيرفر.</p>
        </div>

        <div id="status-container" class="space-y-3 mb-8 h-48 overflow-y-auto bg-slate-900/50 rounded-xl p-4 border border-slate-700 text-sm font-mono">
            <div class="text-slate-500 italic">انتظار بدء العملية...</div>
        </div>

        <button id="start-btn" class="w-full bg-emerald-500 hover:bg-emerald-600 active:scale-95 transition-all text-white font-bold py-4 rounded-2xl shadow-lg shadow-emerald-500/20 text-lg">
            ابدأ عملية الإنشاء الآن ✨
        </button>

        <div id="success-link" class="hidden mt-8 text-center animate-bounce">
            <a href="/login" class="inline-flex items-center gap-2 text-emerald-400 hover:text-emerald-300 font-semibold border-b border-dashed border-emerald-400 pb-1">
                تم الانتهاء! اذهب لتسجيل الدخول 🏥 →
            </a>
        </div>
    </div>

    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
        import { getAuth, createUserWithEmailAndPassword, signOut } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";
        import { getFirestore, doc, setDoc } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-firestore.js";

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
        const auth = getAuth(app);
        const db = getFirestore(app);

        const statusContainer = document.getElementById('status-container');
        const startBtn = document.getElementById('start-btn');
        const successLink = document.getElementById('success-link');

        const log = (msg, type = 'info') => {
            const div = document.createElement('div');
            const color = type === 'success' ? 'text-emerald-400' : (type === 'error' ? 'text-rose-400' : 'text-slate-300');
            div.className = color;
            div.textContent = `> ${msg}`;
            statusContainer.appendChild(div);
            statusContainer.scrollTop = statusContainer.scrollHeight;
        };

        const testUsers = [
            { email: 'admin@surgery.com', pass: 'admin123', fname: 'مدير', lname: 'النظام', role: 'admin' },
            { email: 'doctor@surgery.com', pass: 'doctor123', fname: 'دكتور', lname: 'علي', role: 'doctor' },
            { email: 'head@surgery.com', pass: 'head123', fname: 'رئيسة', lname: 'المصلحة', role: 'head_women' },
            { email: 'nurse@surgery.com', pass: 'nurse123', fname: 'ممرضة', lname: 'سارة', role: 'nurse' }
        ];

        startBtn.onclick = async () => {
            startBtn.disabled = true;
            startBtn.textContent = 'جاري العمل... ⏳';
            statusContainer.innerHTML = '';
            log('بدء الاتصال بـ Firebase...');

            for (const user of testUsers) {
                try {
                    log(`محاولة إنشاء مستخدم: ${user.email}...`);
                    
                    // 1. Create Auth Account
                    const userCredential = await createUserWithEmailAndPassword(auth, user.email, user.pass);
                    const uid = userCredential.user.uid;
                    log(`تم إنشاء حساب الـ Auth: ${uid}`, 'success');

                    // 2. Create Firestore Doc
                    log(`حفظ البيانات في Firestore...`);
                    await setDoc(doc(db, "users", uid), {
                        fname: user.fname,
                        lname: user.lname,
                        role: user.role,
                        urlphoto: null
                    });
                    log(`تم حفظ بيانات المستخدم بنجاح!`, 'success');

                    // Sign out immediately so we can create the next one (Frontend limitation)
                    await signOut(auth);
                    log(`-----------------------------`);

                } catch (error) {
                    if (error.code === 'auth/email-already-in-use') {
                        log(`المستخدم ${user.email} موجود بالفعل، تخطي...`, 'info');
                    } else {
                        log(`خطأ في ${user.email}: ${error.message}`, 'error');
                    }
                }
            }

            log('✅ تم الانتهاء من جميع العمليات!', 'success');
            startBtn.classList.add('hidden');
            successLink.classList.remove('hidden');
        };
    </script>
</body>
</html>
