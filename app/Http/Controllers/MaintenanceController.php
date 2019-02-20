<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Log;

class MaintenanceController extends Controller
{
    // This controller does two things: first, it directs users to a maintenace page
    // when the website is in maintenance mode. Second, it will give the admin the
    // ability to change the website settings for the maintenance.


    // Shows the maintenance page view
    public function index()
    {
        return view('maintenance');
    }

    // Redirects users to the settings page
    public function admin()
    {
        return view('admin/settings', [
            'user' => Auth::user()
        ]);
    }

    // Changes the maintenance database record
    public function toggleMaintenance()
    {
        //Silly mistake, need a first()
        $command = DB::table('configurations')->select('value')->where('name','=','maintenance')->first();

        info('This is some useful information.');
        info($command->value);

        //Update the DB based on the given command
        if($command->value == "off") {
            DB::table('configurations')->where('name','=','maintenance')->update(['value' => 'on']);
        }
        else if($command->value == "on") {
            DB::table('configurations')->where('name','=','maintenance')->update(['value' => 'off']);
        }
        else {
            info("Configurations table record is not the values on or off");
        }

        $command = DB::table('configurations')->select('value')->where('name','=','maintenance')->first();
        info('Value has been updated');
        info($command->value);

        return view('admin.settings');
    }
}
