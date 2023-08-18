<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function show($id){
        return Inertia::render('Student', [
            'student' => DB::table('users')
                ->find($id)
        ]);
    }
}
