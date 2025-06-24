<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends ApiController
{
    public function index()
    {
        $reviews = Review::with('user')
            ->latest()
            ->get()
            ->map(function($review) {
                return [
                    'id' => $review->id,
                    'rating' => $review->rating,
                    'review' => $review->review,
                    'user' => $review->user ? [
                        'id' => $review->user->id,
                        'name' => $review->user->name
                    ] : null,
                    'created_at' => $review->created_at,
                    'updated_at' => $review->updated_at
                ];
            });

        return $this->successResponse($reviews);
    }

    public function store(Request $request)
    {
        // Pastikan user adalah student
        if (auth()->user()->role_id !== 1) {
            return $this->forbiddenResponse('Only students can create reviews');
        }

        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000'
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        $review = Review::create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'review' => $request->review
        ]);

        return $this->createdResponse([
            'id' => $review->id,
            'rating' => $review->rating,
            'review' => $review->review,
            'user' => [
                'id' => $review->user->id,
                'name' => $review->user->name
            ],
            'created_at' => $review->created_at
        ], 'Review created successfully');
    }

    public function show($id)
    {
        $review = Review::with('user')->find($id);
        
        if (!$review) {
            return $this->notFoundResponse('Review not found');
        }

        return $this->successResponse([
            'id' => $review->id,
            'rating' => $review->rating,
            'review' => $review->review,
            'user' => $review->user ? [
                'id' => $review->user->id,
                'name' => $review->user->name
            ] : null,
            'created_at' => $review->created_at,
            'updated_at' => $review->updated_at
        ]);
    }

    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        
        if (!$review) {
            return $this->notFoundResponse('Review not found');
        }

        // Check if user owns the review and is a student
        if ($review->user_id !== auth()->id() || auth()->user()->role_id !== 1) {
            return $this->forbiddenResponse('You can only update your own reviews');
        }

        $validator = Validator::make($request->all(), [
            'rating' => 'integer|min:1|max:5',
            'review' => 'string|max:1000'
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        $review->update($request->only(['rating', 'review']));

        return $this->successResponse([
            'id' => $review->id,
            'rating' => $review->rating,
            'review' => $review->review,
            'user' => [
                'id' => $review->user->id,
                'name' => $review->user->name
            ],
            'updated_at' => $review->updated_at
        ], 'Review updated successfully');
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        
        if (!$review) {
            return $this->notFoundResponse('Review not found');
        }

        // Check if user owns the review and is a student
        if ($review->user_id !== auth()->id() || auth()->user()->role_id !== 1) {
            return $this->forbiddenResponse('You can only delete your own reviews');
        }

        $review->delete();

        return $this->successResponse(null, 'Review deleted successfully');
    }
} 