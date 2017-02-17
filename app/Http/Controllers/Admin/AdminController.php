<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tenant;

class AdminController extends Controller
{
    public function index()
    {
      $tenants = Tenant::all();
      
      return view('admin.index', ['tenants' => $tenants]);
    }
}