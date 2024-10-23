<?php

namespace App\Http\Controllers\Auth;

use App\Models\Newsletter;
use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use App\Models\NewsletterContact;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\NewsletterRequest;

class NewsletterController extends Controller
{
    public function index(): View
    {
        $newsletters = Newsletter::orderByDesc("id")->get();
        $recipients = NewsletterContact::orderBy("email")->get();
        $page = "newsletters";
        return view('pages.auth.newsletter.index', compact('newsletters', 'recipients', 'page'));
    }

    public function store(NewsletterRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $recipients = NewsletterContact::select('email')->get();

        $recipients = $recipients->map(function ($recipient) {
            return $recipient->email;
        })->toArray();

        Newsletter::create($fields);

        $data = [
            "object" => $fields["object"],
            "message" => $fields["message"]
        ];

        foreach($recipients as $recipient) {
            Mail::to($recipient)->send(new NewsletterMail($data));
        }

        return redirect()->back()->with("success", "Le message a été envoyé aux mails avec succès");
    }
}
