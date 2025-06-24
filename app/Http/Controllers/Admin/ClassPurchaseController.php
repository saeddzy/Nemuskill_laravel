<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassPurchase;
use Illuminate\Http\Request;

class ClassPurchaseController extends Controller
{
    public function index()
    {
        $purchases = ClassPurchase::with(['student', 'teachingClass'])->latest()->get();
        return view('admin.class-purchases.index', compact('purchases'));
    }

    public function show(ClassPurchase $class_purchase)
    {
        return view('admin.class-purchases.show', compact('class_purchase'));
    }

    public function update(Request $request, ClassPurchase $class_purchase)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);
        $class_purchase->status = $request->status;
        $class_purchase->save();
        return redirect()->route('admin.class-purchases.show', $class_purchase)->with('success', 'Status pembelian berhasil diupdate!');
    }
} 