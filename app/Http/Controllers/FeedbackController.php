<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('my-feedback', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rate' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:500'
        ]);

        Auth::user()->feedbacks()->create($request->only('rate', 'comment'));

        return back()->with('success', 'Merci pour votre feedback !');
    }

    public function destroy(Feedback $feedback)
    {
        if ($feedback->user_id !== Auth::id()) {
            abort(403);
        }

        $feedback->delete();

        return back()->with('success', 'Feedback supprimé');
    }

    public function publicIndex()
    {
        $feedbacks = Feedback::with('user')
            ->whereHas('user') // Exclure les feedbacks sans utilisateur
            ->orderBy('created_at', 'desc')
            ->paginate(12);
    
        return view('all-feedbacks', compact('feedbacks'));
    }
}
