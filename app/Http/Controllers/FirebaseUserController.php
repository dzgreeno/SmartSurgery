<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirebaseUserController extends Controller
{
    /**
     * List all users — data loaded via JS from Firebase RTDB on the client side.
     */
    public function index()
    {
        return view('admin.users');
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.users_create');
    }

    /**
     * Store is handled by client-side JS (Firebase Auth REST API + RTDB).
     * This server route is kept for compatibility but not used.
     */
    public function store(Request $request)
    {
        return redirect()->route('users.index')->with('success', 'تم إنشاء الحساب بنجاح.');
    }

    /**
     * Show edit form — UID passed in URL, data loaded via JS.
     */
    public function show($id)
    {
        return view('admin.users_edit');
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        return view('admin.users_edit');
    }

    /**
     * Update is handled by client-side JS (Firebase RTDB).
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('users.index')->with('success', 'تم تعديل بيانات المستخدم بنجاح.');
    }

    /**
     * Delete is handled by client-side JS (Firebase RTDB).
     */
    public function destroy($id)
    {
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح.');
    }
}