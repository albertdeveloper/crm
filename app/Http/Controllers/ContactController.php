<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.leads.contacts.index');
    }

    public  function process($id = false)
    {
        return view('admin.leads.contacts.process');
    }

}
