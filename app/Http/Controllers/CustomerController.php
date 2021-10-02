<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(CustomerRequest $request){
        $name = $request->validated();
        Customer::create($name);
        return 1;
    }

    public function index(){
        return Customer::latest()->get();
    }
}
