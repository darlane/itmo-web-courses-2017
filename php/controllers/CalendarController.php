<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers;


class CalendarController
{

    public function index()
    {
        return view('calendar/index');
    }

    public function getEvent($input)
    {
        return file_get_contents(APP_PATH.'/public/files/events/'.$input['date']);
    }
}