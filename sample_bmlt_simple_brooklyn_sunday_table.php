<?php
/****************************************************************************************************
* This is a demonstration of using the '[[bmlt_simple()]]' shortcode, with parameters that          *
* ask the root server to return all meetings on Sundays, in the borough of Brooklyn, NY. This one   *
* asks that the results be arranged in a <table> element.                                           *
*                                                                                                   *
* Here is a breakdown of the parameters:                                                            *
*   switcher=GetSearchResults               This asks the server to return a list of meetings.      *
*   sort_key=time                           This says to sort by weekday, then start time.          *
*   meeting_key=location_city_subsection    This says that we will filter for boroughs.             *
*   meeting_key_value=Brooklyn              This is the value for the borough field that we want.   *
*   weekdays[]=1                            This tells it to filter for Sundays.                    *
*                                                                                                   *
* A detailed discussion of these formats can be found on this Web page:                             *
*               http://bmlt.magshare.net/export-calling-syntax                                      *
****************************************************************************************************/

require_once ( dirname ( __FILE__ ).'/bmlt-basic/bmlt_basic.class.php' );
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>All Meetings In Brooklyn, NY, on Sunday, Displayed in a &lt;table&gt;</title>
        <?php $basic_bmlt_object->output_head('[[BMLT_SIMPLE(switcher=GetSearchResults&sort_key=time&meeting_key=location_city_subsection&meeting_key_value=Brooklyn&weekdays[]=1)]]'); ?>
    </head>
    <body>
        <?php $basic_bmlt_object->output_body(); ?>
    </body>
</html>
