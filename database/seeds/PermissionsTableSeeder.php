<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->delete();

        //Role
        $role = new \App\Permission([
            'name'          => 'view-role',
            'display_name'  => 'View Role',
            'description'   => 'View Role Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-role',
            'display_name'  => 'Create Role',
            'description'   => 'Create Role'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-role',
            'display_name'  => 'Edit Role',
            'description'   => 'Edit Role'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-role',
            'display_name'  => 'Delete Role',
            'description'   => 'Delete Role'
        ]);
        $role->save();
        //end role

        //Shop
        $role = new \App\Permission([
            'name'          => 'view-shop',
            'display_name'  => 'View Shop',
            'description'   => 'View Shop Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-shop',
            'display_name'  => 'Create Shop',
            'description'   => 'Create Shop'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-shop',
            'display_name'  => 'Edit Shop',
            'description'   => 'Edit Shop'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-shop',
            'display_name'  => 'Delete Shop',
            'description'   => 'Delete Shop'
        ]);
        $role->save();
        //end shop

        //Staff
        $role = new \App\Permission([
            'name'          => 'view-staff',
            'display_name'  => 'View Staff',
            'description'   => 'View Staff Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-staff',
            'display_name'  => 'Create Staff',
            'description'   => 'Create Staff'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-staff',
            'display_name'  => 'Edit Staff',
            'description'   => 'Edit Staff'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-staff',
            'display_name'  => 'Delete Staff',
            'description'   => 'Delete Staff'
        ]);
        $role->save();
        //end staff

        //Payroll
        $role = new \App\Permission([
            'name'          => 'view-payroll',
            'display_name'  => 'View Payroll',
            'description'   => 'View Payroll Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-payroll',
            'display_name'  => 'Create Payroll',
            'description'   => 'Create Payroll'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-payroll',
            'display_name'  => 'Edit Payroll',
            'description'   => 'Edit Payroll'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-payroll',
            'display_name'  => 'Delete Payroll',
            'description'   => 'Delete Payroll'
        ]);
        $role->save();
        //end Payroll

        //Customer
        $role = new \App\Permission([
            'name'          => 'view-customer',
            'display_name'  => 'View Customer',
            'description'   => 'View Customer Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-customer',
            'display_name'  => 'Create Customer',
            'description'   => 'Create Customer'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-customer',
            'display_name'  => 'Edit Customer',
            'description'   => 'Edit Customer'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-customer',
            'display_name'  => 'Delete Customer',
            'description'   => 'Delete Customer'
        ]);
        $role->save();
        //end Customer

        //Schedule-Shift
        $role = new \App\Permission([
            'name'          => 'view-schedule-shift',
            'display_name'  => 'View Schedule Shift',
            'description'   => 'View Schedule Shift Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-schedule-shift',
            'display_name'  => 'Create Schedule Shift',
            'description'   => 'Create Schedule Shift'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-schedule-shift',
            'display_name'  => 'Edit Schedule Shift',
            'description'   => 'Edit Schedule Shift'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-schedule-shift',
            'display_name'  => 'Delete Schedule Shift',
            'description'   => 'Delete Schedule Shift'
        ]);
        $role->save();
        //end schedule-shift

        //Packages
        $role = new \App\Permission([
            'name'          => 'view-packages',
            'display_name'  => 'View Packages',
            'description'   => 'View Packages Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-packages',
            'display_name'  => 'Create Packages',
            'description'   => 'Create Packages'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-packages',
            'display_name'  => 'Edit Packages',
            'description'   => 'Edit Packages'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-packages',
            'display_name'  => 'Delete Packages',
            'description'   => 'Delete Packages'
        ]);
        $role->save();
        //end Packages

        //Payment
        $role = new \App\Permission([
            'name'          => 'view-payment',
            'display_name'  => 'View Payment',
            'description'   => 'View Payment Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-payment',
            'display_name'  => 'Create Payment',
            'description'   => 'Create Payment'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-payment',
            'display_name'  => 'Edit Payment',
            'description'   => 'Edit Payment'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-payment',
            'display_name'  => 'Delete Payment',
            'description'   => 'Delete Payment'
        ]);
        $role->save();
        //end Payment

        //Invoice
        $role = new \App\Permission([
            'name'          => 'view-invoice',
            'display_name'  => 'View Invoice',
            'description'   => 'View Invoice Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-invoice',
            'display_name'  => 'Create Invoice',
            'description'   => 'Create Invoice'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-invoice',
            'display_name'  => 'Edit Invoice',
            'description'   => 'Edit Invoice'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-invoice',
            'display_name'  => 'Delete Invoice',
            'description'   => 'Delete Invoice'
        ]);
        $role->save();
        //end Invoice

        //Salary
        $role = new \App\Permission([
            'name'          => 'view-salary',
            'display_name'  => 'View Salary',
            'description'   => 'View Salary Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-salary',
            'display_name'  => 'Create Salary',
            'description'   => 'Create Salary'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-salary',
            'display_name'  => 'Edit Salary',
            'description'   => 'Edit Salary'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-salary',
            'display_name'  => 'Delete Salary',
            'description'   => 'Delete Salary'
        ]);
        $role->save();
        //end Salary

        //Promotion
        $role = new \App\Permission([
            'name'          => 'view-promotion',
            'display_name'  => 'View Promotion',
            'description'   => 'View Promotion Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-promotion',
            'display_name'  => 'Create Promotion',
            'description'   => 'Create Promotion'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-promotion',
            'display_name'  => 'Edit Promotion',
            'description'   => 'Edit Promotion'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-promotion',
            'display_name'  => 'Delete Promotion',
            'description'   => 'Delete Promotion'
        ]);
        $role->save();
        //end Promotion

        //Configuration
        $role = new \App\Permission([
            'name'          => 'view-configuration',
            'display_name'  => 'View Configuration',
            'description'   => 'View Configuration Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-configuration',
            'display_name'  => 'Create Configuration',
            'description'   => 'Create Configuration'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-configuration',
            'display_name'  => 'Edit Configuration',
            'description'   => 'Edit Configuration'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-configuration',
            'display_name'  => 'Delete Configuration',
            'description'   => 'Delete Configuration'
        ]);
        $role->save();
        //end Configuration

        //Massage
        $role = new \App\Permission([
            'name'          => 'view-massage',
            'display_name'  => 'View Massage',
            'description'   => 'View Massage Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-massage',
            'display_name'  => 'Create Massage',
            'description'   => 'Create Massage'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-massage',
            'display_name'  => 'Edit Massage',
            'description'   => 'Edit Massage'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-massage',
            'display_name'  => 'Delete Massage',
            'description'   => 'Delete Massage'
        ]);
        $role->save();
        //end Massage

        //Message
        $role = new \App\Permission([
            'name'          => 'view-message',
            'display_name'  => 'View Message',
            'description'   => 'View Message Page'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'create-message',
            'display_name'  => 'Create Message',
            'description'   => 'Create Message'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'edit-message',
            'display_name'  => 'Edit Message',
            'description'   => 'Edit Message'
        ]);
        $role->save();

        $role = new \App\Permission([
            'name'          => 'delete-message',
            'display_name'  => 'Delete Message',
            'description'   => 'Delete Message'
        ]);
        $role->save();
        //end Message
    }
}
