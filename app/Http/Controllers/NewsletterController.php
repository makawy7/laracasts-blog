<?php

namespace App\Http\Controllers;

use App\Services\Newsteller;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsteller $newsteller)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        try {
            $newsteller->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Email can\'t be added.'
            ]);
        }
        
        return  back()->with('success', 'You\'ve been successfully subscribed to the newsteller.');
    }
}
