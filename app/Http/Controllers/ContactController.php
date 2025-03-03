<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

        // Εμφάνιση της φόρμας επαφής
        public function showForm()
        {
            return view('contact');  // Εδώ προσδιορίζεις το view που θα φορτωθεί
        }
    public function submitForm(Request $request)
    {
        // Επικύρωση των δεδομένων
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Αποθήκευση στη βάση δεδομένων
        $contactMessage = ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

 

        // Επιστροφή με μήνυμα επιτυχίας
        return redirect('/contact')->with('success', 'Your message has been sent!');
    }
}
