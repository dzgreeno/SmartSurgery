<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class FirebaseUserController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        try {
            $db = $this->firebase->getFirestore();
            $usersRef = $db->collection('users')->documents();
            $users = [];
            foreach ($usersRef as $doc) {
                if ($doc->exists()) {
                    $userData = $doc->data();
                    $userData['id'] = $doc->id();
                    $users[] = (object) $userData;
                }
            }
            return view('admin.users', compact('users'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.users_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $auth = $this->firebase->getAuth();
            $db = $this->firebase->getFirestore();

            // Upload Photo to Cloudinary
            $photoUrl = null;
            if ($request->hasFile('photo')) {
                $photoUrl = cloudinary()->upload($request->file('photo')->getRealPath())->getSecurePath();
            }

            // Create user in Firebase Auth
            $createdUser = $auth->createUser([
                'email' => $request->email,
                'password' => $request->password,
                'displayName' => $request->fname . ' ' . $request->lname,
            ]);

            $uid = $createdUser->uid;

            // Save user data in Firestore
            $db->collection('users')->document($uid)->set([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'role' => $request->role,
                'urlphoto' => $photoUrl,
            ]);

            return redirect()->route('users.index')->with('success', 'تم إضافة الدخول بنجاح بالمستخدم والمعلومات المرفقة.');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء الإنشاء: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $db = $this->firebase->getFirestore();
        $doc = $db->collection('users')->document($id)->snapshot();
        if (!$doc->exists()) {
            return redirect()->route('users.index')->with('error', 'المستخدم غير موجود');
        }
        
        $user = (object) array_merge(['id' => $id], $doc->data());
        return view('admin.users_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $db = $this->firebase->getFirestore();
            $updateData = [
                ['path' => 'fname', 'value' => $request->fname],
                ['path' => 'lname', 'value' => $request->lname],
                ['path' => 'role', 'value' => $request->role],
            ];

            if ($request->hasFile('photo')) {
                $photoUrl = cloudinary()->upload($request->file('photo')->getRealPath())->getSecurePath();
                $updateData[] = ['path' => 'urlphoto', 'value' => $photoUrl];
            }

            // Update user in Firestore
            $db->collection('users')->document($id)->update($updateData);

            return redirect()->route('users.index')->with('success', 'تم تعديل بيانات المستخدم بنجاح.');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء التعديل: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $auth = $this->firebase->getAuth();
            $db = $this->firebase->getFirestore();

            // Delete from Firestore
            $db->collection('users')->document($id)->delete();
            // Delete from Firebase Auth
            $auth->deleteUser($id);

            return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح.');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء الحذف: ' . $e->getMessage());
        }
    }
}