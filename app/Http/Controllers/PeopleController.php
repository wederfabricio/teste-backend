<?php

namespace App\Http\Controllers;

use App\Services\PeopleService;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function get(Request $request) {
        $filter = $request->input('filter');
        $order = $request->input('order');
        $sort = $request->input('sort');
        
        $data = PeopleService::get($filter, $order, $sort);
        return $this->response($request, $data, 'people');
    }
}
