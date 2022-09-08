<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

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
        $companies = $company->pluck();
        $contacts = $this->getContacts();
        return view('contacts.index', compact('contacts', 'companies'));
    }

    protected function getContacts() 
    {
        return [
            1 => ['id' => 1, 'name' => 'Name 1', 'phone' => '123456789'],
            2 => ['id' => 2, 'name' => 'Name 2', 'phone' => '1456789'],
            3 => ['id' => 3, 'name' => 'Name 3', 'phone' => '12345689']
        ];
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function show($id)
    {
        $contacts = $this->getContacts();
        abort_if(!isset($contacts[$id]), 404);
        $contact = $contacts[$id];
        return view('contacts.show')->with('contact', $contact);
    }
    
}
