<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
  
    public function __construct(protected CompanyRepository $company)
    {
      
    }
    

    public function index(CompanyRepository $company, Request $request)
    {
        // $companies = [
        //     1 => ['name' => 'Company One', 'contacts' => 3],
        //     2 => ['name' => 'Company Two', 'contacts' => 5],
        // ];
        $companies = $this->company->pluck();
        $contacts = Contact::latest()->get();
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function show($id)
    {
        
        $contact = Contact::findOrFail($id);
        return view('contacts.show')->with('contact', $contact);
    }
    
}
