<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SurgeryController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\FirebaseUserController;
use App\Http\Controllers\DoctorController;
use App\Models\Surgery;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;
use App\Models\Medication;
use App\Models\Demand;

/*
|--------------------------------------------------------------------------
| Public Pages — لا تحتاج تسجيل دخول
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'))->name('home');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/services', fn() => view('services'))->name('services');
Route::get('/orthopedics', fn() => view('orthopedics'))->name('orthopedics');
Route::get('/urology', fn() => view('urology'))->name('urology');
Route::get('/general-surgery', fn() => view('general-surgery'))->name('general.surgery');
Route::get('/maternite', fn() => view('maternite'))->name('maternite');
Route::get('/pregnancy', fn() => view('pregnancy'))->name('pregnancy');

// رابط سحري جافا سكريبت: تهيئة البيانات من المتصفح (لتجنب مشاكل السيرفر)
Route::get('/seed-js', fn() => view('seed-js'))->name('seed-js');

// رابط سحري لتهيئة قاعدة البيانات بالحسابات التجريبية (للتطوير فقط)
Route::get('/system-seed-db', function (App\Services\FirebaseService $firebase) {
    $auth = $firebase->getAuth();
    $db = $firebase->getFirestore();

    $users = [
        [
            'email' => 'admin@surgery.com',
            'password' => 'admin123',
            'fname' => 'مدير',
            'lname' => 'النظام',
            'role' => 'admin',
        ],
        [
            'email' => 'doctor@surgery.com',
            'password' => 'doctor123',
            'fname' => 'دكتور',
            'lname' => 'علي',
            'role' => 'doctor',
        ],
        [
            'email' => 'head@surgery.com',
            'password' => 'head123',
            'fname' => 'رئيسة',
            'lname' => 'المصلحة',
            'role' => 'head_women',
        ],
        [
            'email' => 'nurse@surgery.com',
            'password' => 'nurse123',
            'fname' => 'ممرضة',
            'lname' => 'سارة',
            'role' => 'nurse',
        ],
    ];

    $results = [];
    foreach ($users as $u) {
        try {
            // إنشاء في Firebase Auth
            $createdUser = $auth->createUser([
                'email' => $u['email'],
                'password' => $u['password'],
                'displayName' => $u['fname'] . ' ' . $u['lname'],
            ]);
            $uid = $createdUser->uid;

            // حفظ البيانات في Firestore
            $db->collection('users')->document($uid)->set([
                'fname' => $u['fname'],
                'lname' => $u['lname'],
                'role' => $u['role'],
                'urlphoto' => null,
            ]);
            $results[] = "✅ تم إنشاء: " . $u['email'];
        } catch (\Exception $e) {
            $results[] = "❌ فشل إنشاء " . $u['email'] . " (قد يكون موجوداً بالفعل أو هناك خطأ: " . $e->getMessage() . ")";
        }
    }

    return implode('<br>', $results) . "<br><br><b>الموقع جاهز الآن التجربة! اذهب لـ <a href='/login'>تسجيل الدخول</a></b>";
});

// طلبات العمليات (متاح للعامة)
Route::view('/demande', 'demande')->name('demande');
Route::post('/demands', [DemandController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Auth — Firebase Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/login/session-bridge', [LoginController::class, 'loginViaToken'])->name('login.bridge');
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| 🔒 Protected — تحتاج تسجيل دخول Firebase
|--------------------------------------------------------------------------
*/

Route::middleware(['firebase'])->group(function () {

    /*
    |----------------------------------------------------------------------
    | Dashboard — يتم توجيه المستخدم حسب دوره
    |----------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        $role = session('firebase_role', 'user');
        switch ($role) {
            case 'admin': return redirect()->route('admin.dashboard');
            case 'head_women': case 'staff_women': return redirect()->route('surgery.women');
            case 'head_men': case 'staff_men': return redirect()->route('surgery.men');
            case 'doctor': return redirect()->route('doctor');
            default: return redirect()->route('home');
        }
    })->name('dashboard');

    /*
    |----------------------------------------------------------------------
    | 👑 Admin — مدير النظام فقط
    |----------------------------------------------------------------------
    */
    Route::middleware(['firebase:admin'])->group(function () {

        // لوحة التحكم الرئيسية
        Route::get('/admin', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // إدارة المستخدمين (CRUD — البيانات تُدار عبر JS + Firebase RTDB)
        Route::resource('admin/users', FirebaseUserController::class);

        // أرشيف الوثائق
        Route::get('/admin/archives', function () {
            return view('admin.archives');
        })->name('admin.archives');

        // العمليات الجراحية
        Route::get('/admin/system-surgeries', function () {
            return view('admin.surgeries');
        })->name('admin.surgeries');

        // طلبات العمليات
        Route::get('/admin/demands', function () {
            try {
                $demands = \App\Models\Demand::orderBy('created_at', 'desc')->get();
            } catch (\Exception $e) {
                $demands = collect([]);
            }
            return view('admin.demands', compact('demands'));
        })->name('admin.demands');

        Route::post('/admin/demands/{id}/status', [DemandController::class, 'updateStatus'])->name('admin.demands.status');

        // جدول المناوبة الطبية للمختصين (يديرها المدير فقط)
        Route::get('/planning-garde', fn() => view('planning-garde'))->name('planning-garde');
    });

    /*
    |----------------------------------------------------------------------
    | 🏥 جراحة النساء — admin + head_women + staff_women + doctor
    |----------------------------------------------------------------------
    */
    Route::middleware(['firebase:admin,head_women,staff_women,doctor'])->group(function () {
        Route::get('/surgery/women', fn() => view('surgery-women'))->name('surgery.women');
        Route::get('/fiche-navette', fn() => view('fiche-navette'))->name('fiche-navette');
        Route::get('/patient-movements', fn() => view('patient-movements'))->name('patient-movements');
        Route::get('/patient-journal', fn() => view('patient-journal'))->name('patient-journal');
        Route::get('/bon-commande-pharmacie', fn() => view('bon-commande-pharmacie'))->name('bon-commande-pharmacie');
    });

    /*
    |----------------------------------------------------------------------
    | 🏥 جراحة الرجال — admin + head_men + staff_men + doctor
    |----------------------------------------------------------------------
    */
    Route::middleware(['firebase:admin,head_men,staff_men,doctor'])->group(function () {
        Route::get('/surgery/men', fn() => view('surgery_men'))->name('surgery.men');
        Route::get('/fiche-navette-men', fn() => view('fiche-navette-men'))->name('fiche-navette-men');
    });

    /*
    |----------------------------------------------------------------------
    | 💊 سجل الأدوية — admin + heads + nurses
    |----------------------------------------------------------------------
    */
    Route::middleware(['firebase:admin,head_women,head_men,head_orthopedics,head_maternity,nurse'])->group(function () {
        Route::get('/daily-meds', fn() => view('daily-meds'))->name('daily-meds');
    });

    /*
    |----------------------------------------------------------------------
    | 👨‍⚕️ الطبيب — admin + doctor
    |----------------------------------------------------------------------
    */
    Route::middleware(['firebase:admin,doctor'])->group(function () {
        Route::get('/doctor', fn() => view('doctor'))->name('doctor');
    });

    /*
    |----------------------------------------------------------------------
    | 👩‍⚕️ رئيسة مصلحة جراحة النساء
    |----------------------------------------------------------------------
    */
    Route::middleware(['firebase:admin,head_women'])->group(function () {
        Route::get('/surgery/women/head', function () {
            return view('surgery-women');
        })->name('surgery.head_women');

        // جدول حركة العمال (تديره رئيسة مصلحة جراحة النساء)
        Route::get('/mouvement-personnel', fn() => view('mouvement-personnel'))->name('mouvement-personnel');
    });

    Route::middleware(['firebase:admin,head_men'])->group(function () {
        Route::get('/surgery/men/head', function () {
            return view('surgery_men');
        })->name('surgery.head_men');
    });

    /*
    |----------------------------------------------------------------------
    | CRUD العمليات — admin + heads
    |----------------------------------------------------------------------
    */
    Route::middleware(['firebase:admin,head_women,head_men,head_orthopedics'])->group(function () {
        Route::resource('surgeries', SurgeryController::class);
    });
});