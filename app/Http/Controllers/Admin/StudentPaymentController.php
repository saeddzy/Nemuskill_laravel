<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassPurchase;
use Illuminate\Http\Request;

class StudentPaymentController extends Controller
{
    public function index()
    {
        $purchases = ClassPurchase::with(['student', 'teachingClass'])
            ->latest()
            ->paginate(10);

        return view('admin.student-payments.index', compact('purchases'));
    }

    public function show(ClassPurchase $purchase)
    {
        $purchase->load(['student', 'teachingClass']);
        return view('admin.student-payments.show', compact('purchase'));
    }

    public function approve(ClassPurchase $purchase)
    {
        $purchase->update(['status' => 'approved']);
        return redirect()->route('admin.student-payments.index')
            ->with('success', 'Pembayaran berhasil diverifikasi');
    }

    public function reject(ClassPurchase $purchase)
    {
        $purchase->update(['status' => 'rejected']);
        return redirect()->route('admin.student-payments.index')
            ->with('success', 'Pembayaran ditolak');
    }
} 