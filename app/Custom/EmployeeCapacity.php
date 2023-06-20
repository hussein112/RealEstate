<?php


namespace App\Custom;

use App\Models\Advertise;
use App\Models\Assign;
use App\Models\Employee;
use App\Models\Enquiry;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

trait EmployeeCapacity{

    public static function getEmployeeCapacity(){
        $capacity_ = Storage::get('website/settings.txt');
        $settings = explode(',', $capacity_);
        foreach ($settings as $setting){
            if(! strstr($setting, 'ec') == false){
                $temp = explode("-", $setting);
                return (int)end($temp);
            }
        }
    }

    public function getEmployee(){
        $available_employees = $this->getAllAvailableEmployees();
        if(sizeof($available_employees) > 0){
            return Arr::Random($available_employees);
        }
        return null;
    }


    public function getAllAvailableEmployees()
    {
        $employees_capacity = [
//            'id' => 'nb_of_tasks'
        ];

        $employees = Employee::all();

        foreach($employees as $employee){
            // Employee Capacity
                // 1. Valuation
                // 2. Enquiries
                // 3. Advertise
            $_capacity = 0;
            $valuations = Assign::where("employee_id", $employee->id)->count();
            $enquiries = Enquiry::where("employee_id", $employee->id)->count();
            $advertise = Advertise::where("employee_id", $employee->id)->count();
            $_capacity = $valuations + $enquiries + $advertise;
            $employees_capacity[$employee->id] = $_capacity;
        }


        $available_employees = [];
        foreach($employees_capacity as $id => $capacity){
            if($capacity < $this->getEmployeeCapacity()){
                array_push($available_employees, $id);
            }
        }

        return $available_employees;
    }
}
