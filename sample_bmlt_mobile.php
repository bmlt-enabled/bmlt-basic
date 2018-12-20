<?php
/********************************************************************************************
* Append '?simulate_smartphone=1' to the URI to see the smartphone version show up.         *
* Append '?WML=1' to see how this responds to a 'dumb' phone.                               *
* Append '?WML=2' to see how this responds to a 'smartish' phone.                           *
*                                                                                           *
* Or...you could just test it by using a mobile device.                                     *
********************************************************************************************/

require_once(dirname(__FILE__).'/bmlt-basic/bmlt_basic.class.php');
$basic_bmlt_object->output_head('<!-- bmlt_mobile -->');    // You need to put this here for the mobile version.
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Demonstration of Standalone BMLT Satellite, Running the Mobile Variant</title>
    </head>
    <body>
        <h1>THIS IS A MOBILE-ONLY PAGE</h1>
    </body>
</html>
