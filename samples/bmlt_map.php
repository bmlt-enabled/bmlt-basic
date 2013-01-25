<?php
/********************************************************************************************
********************************************************************************************/

require_once ( dirname ( __FILE__ ).'/bmlt-basic/bmlt_basic.class.php' );
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Demonstration of Standalone BMLT Satellite, Running the Basic Map</title>
        <?php $basic_bmlt_object->output_head('[[BMLT_MAP]]'); ?>
    </head>
    <body>
        <?php $basic_bmlt_object->output_body(); ?>
    </body>
</html>
