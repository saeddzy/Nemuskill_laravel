<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PlanningController extends Controller
{
    public function index()
    {
        $planning = Auth::user()->plans;
        return response()->json(['message' => 'Success', 'data' => $planning]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|string|max:255',
            'target_date' => 'required|date',
            'notes' => 'nullable|string',
            'status' => 'required|in:not_started,in_progress,completed',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'errors' => $validator->errors()], 400);
        }

        $planning = Auth::user()->plans()->create($request->all());

        return response()->json(['message' => 'Planning created successfully', 'data' => $planning], 201);
    }

    public function show(Plan $plan)
    {
        if ($plan->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return response()->json(['message' => 'Success', 'data' => $plan]);
    }

    public function update(Request $request, Plan $plan)
    {
        if ($plan->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validator = Validator::make($request->all(), [
            'class_name' => 'required|string|max:255',
            'target_date' => 'required|date',
            'notes' => 'nullable|string',
            'status' => 'required|in:not_started,in_progress,completed',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'errors' => $validator->errors()], 400);
        }

        $plan->update($request->all());

        return response()->json(['message' => 'Planning updated successfully', 'data' => $plan]);
    }

    public function destroy(Plan $plan)
    {
        if ($plan->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $plan->delete();

        return response()->json(['message' => 'Planning deleted successfully'], 200);
    }
} 