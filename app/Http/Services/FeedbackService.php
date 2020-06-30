<?php

namespace App\Http\Services;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackService
{
    /**
     * @param Request $request
     * @return Feedback
     */
    public function create(Request $request): Feedback
    {
        $feedback = new Feedback();
        $feedback->name = $request->get('name');
        $feedback->question = $request->get('question');
        $feedback->email = $request->get('email');
        $feedback->save();

        return $feedback;
    }
}
