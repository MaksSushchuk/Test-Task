<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getData(){
        $data = User::select(['id', 'name', 'email'])->get();
        return response()->json(['data' => $data]);
    }
}
