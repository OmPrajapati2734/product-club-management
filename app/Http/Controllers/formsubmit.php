<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\products;

class formsubmit extends Controller
{
    public function submitForm(Request $request)
    {
        $data = products::all();
        return response()->json($data);
    }
}
