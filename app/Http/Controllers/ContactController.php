<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Mail\ContactMessageReceived;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Inertia\Response;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    /**
     * @return Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return Inertia::render('Contact/Show');

        //return view('frontend.contact.show');
    }

    /**
     * @param ContactStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ContactStoreRequest $request)
    {
        foreach (User::admins() as $admin) {
            Mail::to($admin->email)->send(new ContactMessageReceived($request));
        }

        Alert::toast('Your Message has been sent', 'success');

        return redirect()->back();
    }
}
