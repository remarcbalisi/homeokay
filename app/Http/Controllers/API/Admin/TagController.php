<?php

namespace App\Http\Controllers\API\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function list() {
        return response()->json([
            'data' => Tag::get(),
            'status' => 200
        ]);
    }
}
