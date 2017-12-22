<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers;


class AdminCalendarController
{

    public function index()
    {
        return view('calendar/admin');
    }

    public function addEvent($input)
    {
        $date  = date('d.m.Y', strtotime($input['date']));
        $image = $input['files']['image'];
        $type  = null;
        if ($image['type'] === 'image/png') {
            $type = 'png';
        }
        if ($image['type'] === 'image/jpeg') {
            $type = 'jpg';
        }
        $imgFileName = '/public/img/'.$date.'.'.$type;
        move_uploaded_file($image['tmp_name'], APP_PATH.$imgFileName);
        $data = [
            'date'    => $date,
            'header'  => $input['title'],
            'img_url' => $imgFileName,
            'desc'    => $input['desc']
        ];
        file_put_contents(APP_PATH.'/public/files/events/'.$date, json_encode($data));
        return redirect('/calendar/admin');
    }
}