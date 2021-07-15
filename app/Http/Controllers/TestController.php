<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        Page::query()
            ->whereNull(Page::DESCRIPTION)
            ->delete();
    }
}
