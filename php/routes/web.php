<?php
use Framework\Router;

Router::get('/hw/first', 'Controllers\FirstHomeWorkController@index');
Router::get('/calendar', 'Controllers\CalendarController@index');
Router::post('/calendar/get_event', 'Controllers\CalendarController@getEvent');
Router::post('/calendar/add_event', 'Controllers\AdminCalendarController@addEvent');
Router::get('/calendar/admin', 'Controllers\AdminCalendarController@index');