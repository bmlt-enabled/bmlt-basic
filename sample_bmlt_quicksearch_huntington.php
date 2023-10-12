<?php

/****************************************************************************************************
* This is a demonstration of using the '[[bmlt_quicksearch]]' shortcode.                            *
*                                                                                                   *
* This example will show the popup listing just the towns in the Huntington Township (Long Island). *
****************************************************************************************************/

require_once(dirname(__FILE__) . '/bmlt-basic/bmlt_basic.class.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>All New York Database Meetings As A Fast, Simple Search, with the Popup Listing the Township of Huntington, Long Island, NY</title>
        <?php $basic_bmlt_object->output_head('[[BMLT_QUICKSEARCH(location_municipality=HuNtInGtoN,greenlawn,DIX HILLS,Melville,Huntington Station,south HUNTINGTON,Ellwood,Northport,east northport)]]'); ?>
    </head>
    <body>
        <?php $basic_bmlt_object->output_body(); ?>
    </body>
</html>
