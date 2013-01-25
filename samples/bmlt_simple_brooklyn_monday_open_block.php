<?php
/********************************************************************************************
********************************************************************************************/

require_once ( dirname ( __FILE__ ).'/bmlt-basic/bmlt_basic.class.php' );
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
