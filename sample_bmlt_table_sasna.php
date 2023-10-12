<?php

/****************************************************************************************************
* This is a demonstration of using the '[[bmlt_table()]]' shortcode, with parameters that           *
* ask the root server to return all closed meetings on Thursdays, in the borough of Brooklyn, NY.   *
* This one asks that the results be arranged in a <table> element.                                  *
*                                                                                                   *
* Here is a breakdown of the parameters:                                                            *
*   switcher=GetSearchResults               This asks the server to return a list of meetings.      *
*   formats[]=4                             This asks to look for closed meetings (Closed ID is 17).*
*   sort_key=time                           This says to sort by weekday, then start time.          *
*   meeting_key=location_city_subsection    This says that we will filter for boroughs.             *
*   meeting_key_value=Brooklyn              This is the value for the borough field that we want.   *
*   weekdays[]=5                            This tells it to filter for Thursdays.                  *
*                                                                                                   *
* A detailed discussion of these formats can be found on this Web page:                             *
*               http://bmlt.magshare.net/export-calling-syntax                                      *
****************************************************************************************************/

require_once(dirname(__FILE__) . '/bmlt-basic/bmlt_basic.class.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>All Suffolk ASC Meetings As An Interactive Table</title>
        <?php $basic_bmlt_object->output_head('[[BMLT_TABLE(services=1001)]]'); ?>
    </head>
    <body>
        <?php $basic_bmlt_object->output_body(); ?>
    </body>
</html>
