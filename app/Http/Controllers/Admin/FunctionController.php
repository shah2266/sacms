<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Hero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class FunctionController extends Controller
{
    public function contact()
    {
        $contact = new Contact();
        $banner = Hero::where('type', 'banner')->where('page_id', 2)->first();
        return view('web.template.contact', compact('banner', 'contact'));
    }

    public function submitForm(Request $request): RedirectResponse
    {

        $request->validate([
            'contact_type' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());
        //return view('web.contact');
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function showMessages() {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function showHelp() {
        return view('admin.help.index');
    }

    public function clearCache(): RedirectResponse
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return redirect()->route('help')->with('success', 'Cache cleared!');
    }
}
