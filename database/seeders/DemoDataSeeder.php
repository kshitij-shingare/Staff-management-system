<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::where('email', 'kshitijshingare49@gmail.com')->first();
        if($user) {
            $dept = \App\Models\Department::first();
            $desig = \App\Models\Designation::first();
            $sched = \App\Models\Schedule::first();
            
            if(!$dept) { $dept = \App\Models\Department::create(['title'=>'IT Development', 'status'=>1]); }
            if(!$desig) { $desig = \App\Models\Designation::create(['title'=>'Software Engineer', 'status'=>1]); }
            if(!$sched) { $sched = \App\Models\Schedule::create(['in_time'=>'09:00:00', 'out_time'=>'18:00:00', 'status'=>1]); }
            
            $emp = \App\Models\Employee::firstOrCreate(
                ['email' => $user->email],
                [
                    'department_id' => $dept->id,
                    'designation_id' => $desig->id,
                    'schedule_id' => $sched->id,
                    'firstname' => 'Kshitij',
                    'lastname' => 'Shingare',
                    'unique_id' => 'EMP-12345',
                    'phone' => $user->phone,
                    'dob' => '2001-01-01',
                    'status' => 1
                ]
            );

            for ($i = 1; $i <= 15; $i++) {
                $date = date('Y-m-d', strtotime("-$i days"));
                // Type 1: Check in, Type 0: Check out (just guessing based on standard schema, or maybe just state)
                \App\Models\Attendance::firstOrCreate([
                    'employee_id' => $emp->id,
                    'attendance_date' => $date,
                    'state' => $i % 2 == 0 ? 1 : 0
                ], [
                    'attendance_time' => '08:50:00',
                    'type' => 1,
                    'status' => 1
                ]);
            }

            \App\Models\Leave::firstOrCreate([
                'employee_id' => $emp->id,
                'title' => 'Sick Leave',
                'start_date' => date('Y-m-d', strtotime('-20 days'))
            ], [
                'end_date' => date('Y-m-d', strtotime('-19 days')),
                'leave_type' => 1,
                'leave_reason' => 'Fever',
                'status' => 1
            ]);
            
            echo "Successfully created demo data for User: " . $user->email . "\n";
        } else {
            echo "User not found.\n";
        }
    }
}
