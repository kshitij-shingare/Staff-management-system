<?php

$user = App\Models\User::where('email', 'kshitijshingare49@gmail.com')->first();
if($user) {
    $dept = App\Models\Department::first();
    $desig = App\Models\Designation::first();
    $sched = App\Models\Schedule::first();
    
    // Seed generic ones if not present
    if(!$dept) { $dept = App\Models\Department::create(['title'=>'IT Development', 'status'=>1]); }
    if(!$desig) { $desig = App\Models\Designation::create(['title'=>'Software Engineer', 'status'=>1]); }
    if(!$sched) { $sched = App\Models\Schedule::create(['in_time'=>'09:00:00', 'out_time'=>'18:00:00', 'status'=>1]); }
    
    $emp = App\Models\Employee::firstOrCreate(
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

    // Add 15 attendance records
    for ($i = 1; $i <= 15; $i++) {
        $date = date('Y-m-d', strtotime("-$i days"));
        App\Models\Attendance::firstOrCreate([
            'employee_id' => $emp->id,
            'date' => $date
        ], [
            'in_time' => '08:50:00',
            'out_time' => '18:05:00',
            'status' => 1
        ]);
    }

    // Add 2 leaves
    App\Models\Leave::firstOrCreate([
        'employee_id' => $emp->id,
        'leave_type' => 'Sick Leave',
        'leave_from' => date('Y-m-d', strtotime('-20 days'))
    ], [
        'leave_to' => date('Y-m-d', strtotime('-19 days')),
        'status' => 1,
        'leave_days' => 2,
        'reason' => 'Fever'
    ]);
    
    echo "Successfully created demo data for User: " . $user->email . "\n";
} else {
    echo "User not found.\n";
}
