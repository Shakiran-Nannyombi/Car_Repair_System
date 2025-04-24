<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class RoleSelectionController extends Controller
{
    public function show()
    {
        return view('auth.role-selection');
    }
}
