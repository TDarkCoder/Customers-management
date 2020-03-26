<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewUserEvent;
use App\Policies\CustomerFactory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{

    public function __construct(){

        return $this->middleware('auth');

    }

    public function index(){

        $customers = Customer::with('company')->paginate();

        return view('customers.index', compact('customers'));

    }

    public function create(){

        $this->authorize('create', Customer::class);

        $customer = new Customer();
        $companies = Company::all();

        return view('customers.create', compact('companies', 'customer'));

    }

    public function store(){


        $customer = Customer::create($this->validateRequest());
        $this->storeImage($customer);

        event(new NewUserEvent($customer));

        return redirect('/customers');

    }

    public function show(Customer $customer){

        $this->authorize('view', $customer);

        return view('customers.show', compact('customer'));

    }

    public function edit(Customer $customer){

        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));

    }

    public function update(Customer $customer){

        $customer->update($this->validateRequest());
        $this->storeImage($customer);

        return redirect('customers/'.$customer->id);

    }

    public function destroy(Customer $customer){

        $this->authorize('delete', $customer);

        $customer->delete();

        return redirect('customers');

    }

    private function validateRequest(){

        return request()->validate([

            'name' => 'required|min:2',
            'email' => 'required|email',
            'company_id' => 'required',
            'active' => 'required',
            'image' => 'sometimes|file|image|max:5000'

        ]);
    }

    private function storeImage($customer){

        if(request()->has('image')){

            $customer->update([
                'image'  => request()->image->store('uploads', 'public')
            ]);

            $image = Image::make(public_path('storage/'.$customer->image))->fit(300,300);
            $image->save();

        }

    }

}
