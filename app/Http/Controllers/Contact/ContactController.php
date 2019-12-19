<?php

namespace App\Http\Controllers\Contact;

use App\Mail\Contact\SendContact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Contact\SendContactRequest;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    public function send(SendContactRequest $request)
    {
        Mail::send(new SendContact($request));

        return redirect()->back()->withFlashSuccess(__('Su información ha sido enviada correctamente. Responderemos tan pronto nos sea posible al correo que proporcionó.'));
    }
}
