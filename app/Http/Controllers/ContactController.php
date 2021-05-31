<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index(Contact $contact, Request $request)
    {
        return view('contact.index')->with(['contact'=>$contact->get()]);
    }

    public function confirm(Contact $contact)
    {
        return view('contact.confirm');
    }

    public function process(ContactRequest $request, Contact $contact)
    {
        $action = $request->get('action', 'return');
        $input  = $request->except('action');
        
        if($action === 'submit') {

            // DBにデータを保存
            $contact = new Contact();
            $contact->fill($input);
            $contact->save();

            // メール送信
            Mail::to($input['email'])->send(new ContactMail('mails.contact', 'お問い合わせありがとうございます', $input));

            return redirect()->route('complete');
        } else {
            return redirect()->route('contact')->withInput($input);
        }
    }

    public function complete()
    {
        return view('contact.complete');
    }
}
