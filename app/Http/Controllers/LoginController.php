<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class LoginController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function showLogin()
    {
        // إذا كان مسجل الدخول فعلاً، أعد توجيهه
        if (session('firebase_user')) {
            return $this->redirectByRole(session('firebase_role'));
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            // Sign in with Firebase Auth
            $signInResult = $this->firebase->getAuth()->signInWithEmailAndPassword($request->email, $request->password);
            $uid = $signInResult->firebaseUserId();

            // Fetch user info from Firestore
            $db = $this->firebase->getFirestore();
            $userDoc = $db->collection('users')->document($uid)->snapshot();

            if (!$userDoc->exists()) {
                return back()->with('error', 'بيانات المستخدم غير موجودة في قاعدة البيانات (Firestore).');
            }

            $userData = $userDoc->data();

            // Store user session data
            session([
                'firebase_uid' => $uid,
                'firebase_user' => [
                    'email' => $request->email,
                    'fname' => $userData['fname'] ?? '',
                    'lname' => $userData['lname'] ?? '',
                    'urlphoto' => $userData['urlphoto'] ?? '',
                ],
                'firebase_role' => $userData['role'] ?? 'user',
            ]);

            $role = $userData['role'] ?? 'user';

            return $this->redirectByRole($role);

        } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
            return back()->with('error', '❌ كلمة المرور خاطئة');
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            return back()->with('error', '❌ لم يتم العثور على مستخدم بهذا البريد الإلكتروني');
        } catch (\Exception $e) {
            return back()->with('error', '❌ حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * تسجيل الدخول عبر الجلسة القادمة من الجافا سكريبت (لتجاوز مشاكل السيرفر)
     */
    public function loginViaToken(Request $request)
    {
        $request->validate([
            'uid' => 'required',
            'email' => 'required|email',
            'fname' => 'required',
            'lname' => 'required',
            'role' => 'required'
        ]);

        session([
            'firebase_uid' => $request->uid,
            'firebase_user' => [
                'email' => $request->email,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'urlphoto' => $request->urlphoto ?? null,
            ],
            'firebase_role' => $request->role,
        ]);

        return $this->redirectByRole($request->role);
    }

    /**
     * توجيه المستخدم حسب دوره
     */
    protected function redirectByRole($role)
    {
        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');

            case 'head_women':
            case 'staff_women':
                return redirect()->route('surgery.women');

            case 'head_men':
            case 'staff_men':
                return redirect()->route('surgery.men');

            case 'head_orthopedics':
                return redirect()->route('orthopedics');

            case 'head_maternity':
                return redirect()->route('maternite');

            case 'doctor':
                return redirect()->route('doctor');

            case 'nurse':
                return redirect()->route('daily-meds');

            default:
                return redirect()->route('home');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['firebase_uid', 'firebase_user', 'firebase_role']);
        $request->session()->flush();
        return redirect('/login');
    }
}