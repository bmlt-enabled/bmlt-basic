<?php
/********************************************************************************************
*           EXAMPLE OF THE MOST BASIC IMPLEMENTATION OF THE BASIC BMLT SATELLITE            *
*                                                                                           *
********************************************************************************************/

/********************************************************************************************
*                           STEP ONE: INCLUDE THE CLASS FILE.                               *
*                                                                                           *
********************************************************************************************/
require_once ( 'bmlt_satellite/bmlt_basic.class.php' );

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Demonstration of Standalone BMLT Satellite</title>
        
<!-- ***********************************************************************************
     *                       STEP TWO: GENERATE THE HEAD CONTENT                       *
     *                                                                                 *
     *********************************************************************************** -->
    <?php echo $basic_bmlt_object->standard_head ( '[[bmlt]]' ); ?>
<!-- *********************************************************************************** -->

    </head>
    <body>
    
<!-- ***********************************************************************************
     *                      STEP THREE: GENERATE THE BODY CONTENT                      *
     *                                                                                 *
     *********************************************************************************** -->
    <?php echo $basic_bmlt_object->content_filter ( '[[bmlt]]' ); ?>
<!-- *********************************************************************************** -->

    </body>
</html>
