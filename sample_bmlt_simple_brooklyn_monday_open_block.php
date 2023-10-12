<?php

/****************************************************************************************************
* This is a demonstration of using the '[[bmlt_simple()]]' shortcode, with parameters that          *
* ask the root server to return all the meetings in the borough of Brooklyn, NY. This one asks that *
* the results be arranged in <div> elements.                                                        *
*                                                                                                   *
* Here is a breakdown of the parameters:                                                            *
*   switcher=GetSearchResults               This asks the server to return a list of meetings.      *
*   formats[]=17                            This asks to look for open meetings (Open ID is 17).    *
*   block_mode=1                            This asks the meetings to be in <div> elements.         *
*   sort_key=time                           This says to sort by weekday, then start time.          *
*   meeting_key=location_city_subsection    This says that we will filter for boroughs.             *
*   meeting_key_value=Brooklyn              This is the value for the borough field that we want.   *
*   weekdays[]=2                            This tells it to filter for Mondays (only).             *
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
        <title>All Open Meetings In Brooklyn, NY, on Monday, Displayed in &lt;div&gt; Elements</title>
        <?php $basic_bmlt_object->output_head('[[BMLT_SIMPLE(switcher=GetSearchResults&formats[]=17&block_mode=1&sort_key=time&meeting_key=location_city_subsection&meeting_key_value=Brooklyn&weekdays[]=2)]]'); ?>
    </head>
    <body>
        <?php $basic_bmlt_object->output_body(); ?>
    </body>
</html>
