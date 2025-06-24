<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PlanningApiController extends Controller
{
    public function index()
    {
        $plans = Plan::where('user_id', Auth::id())
                        ->orderBy('target_date', 'asc')
                        ->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $plans
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|string|max:255',
            'target_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $plan = Plan::create([
            'user_id' => Auth::id(),
            'class_name' => $request->class_name,
            'target_date' => $request->target_date,
            'notes' => $request->notes,
            'status' => 'in_progress', // Default status
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Plan created successfully',
            'data' => $plan
        ], 201);
    }

    public function show(Plan $plan)
    {
        if ($plan->user_id !== Auth::id()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 403);
        }

        return response()->json([
            'status' => 'success',
            'data' => $plan
        ]);
    }

    public function update(Request $request, Plan $plan)
    {
        if ($plan->user_id !== Auth::id()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'class_name' => 'sometimes|required|string|max:255',
            'target_date' => 'sometimes|required|date',
            'notes' => 'nullable|string',
            'status' => 'sometimes|required|in:in_progress,completed,cancelled',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $plan->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Plan updated successfully',
            'data' => $plan
        ]);
    }

    public function destroy(Plan $plan)
    {
        if ($plan->user_id !== Auth::id()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 403);
        }

        $plan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Plan deleted successfully',
        ], 200);
    }
} 