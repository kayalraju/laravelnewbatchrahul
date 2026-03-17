<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class OneToManyController extends Controller
{
    public function createCompany(){
        $company=Company::create([
            'name'=>'TCS',
            'location'=>'Delhi'
        ],);
        return $company;
    }

     public function createEmployee()
    {
        //insert data
        $employee=Employee::create([
            'name'=>'rittik',
            'email'=>'rittik@example.com',
            'phone'=>'9999874512',
            'address'=>'kilkata',
             'company_id'=>1
            
        ],);
        return $employee;
    }


    public function companyWithEmployee(){
        // $company=Company::with('employees')->get();
        // return $company;

        // $company=Company::with('employees')->find(1);
        // return $company;
        // $company = Company::find(2);

        $company = Company::find(1);

                $Employees = $company->employees;

                foreach ($Employees as $company) {
                    echo $company->name . '<br/>';
                    echo $company->email . '<br/>';
                }

        
    }

    public function employeeWithCompany()
    {
        // $employee=Employee::find(5);
        // return $employee->company;

        // $employee=Employee::with('company')->find(5);
        // return $employee;

        $employee=Employee::with('company')->get();
        return $employee;
    }
}
