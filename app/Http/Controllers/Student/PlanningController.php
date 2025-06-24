<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    public function index()
    {
        $plans = auth()->user()->plans()->latest()->get();
        $totalPlans = $plans->count();
        $completedPlans = $plans->where('status', 'completed')->count();
        $inProgressPlans = $plans->where('status', 'in_progress')->count();

        return view('student.planning', compact('plans', 'totalPlans', 'completedPlans', 'inProgressPlans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'target_date' => 'required|date',
            'notes' => 'nullable|string',
            'status' => 'required|in:not_started,in_progress,completed'
        ]);

        auth()->user()->plans()->create($validated);

        return redirect()->route('student.planning')->with('success', 'Plan added successfully!');
    }

    public function edit(Plan $plan)
    {
        $this->authorize('update', $plan);
        return response()->json($plan);
    }

    public function update(Request $request, Plan $plan)
    {
        $this->authorize('update', $plan);

        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'target_date' => 'required|date',
            'notes' => 'nullable|string',
            'status' => 'required|in:not_started,in_progress,completed'
        ]);

        $plan->update($validated);

        return redirect()->route('student.planning')->with('success', 'Plan updated successfully!');
    }

    public function destroy(Plan $plan)
    {
        $this->authorize('delete', $plan);
        
        $plan->delete();

        return redirect()->route('student.planning')->with('success', 'Plan deleted successfully!');
    }
} 