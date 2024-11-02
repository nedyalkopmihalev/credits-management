<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function clientInsert()
    {
        return view('clients.client_insert', [

        ]);
    }
}
