<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fixRequest extends Controller
{
    public function handle(Request $request)
    {
        // Xử lý request ở đây
        // Ví dụ:
        $data = $request->all();
        return response()->json($data);
    }
}
