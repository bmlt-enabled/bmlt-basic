<?php

/********************************************************************************************
*           EXAMPLE OF THE MOST BASIC IMPLEMENTATION OF THE BASIC BMLT SATELLITE            *
*                                                                                           *
*                       Find out more at: http://bmlt.magshare.org                          *
*   \version 3.11.1                                                                         *
*                                                                                           *
* This file demonstrates how to integrate the default interactive search into any PHP file. *
* You do not need a content management system (like WordPress or Joomla). You just need to  *
* include the 'bmlt-basic' directory, and all its contents, into the same directory as      *
* this file. You will edit the 'config-bmlt-basic.inc.php' file to establish the settings.  *
* The 'config-bmlt-basic.inc.php' file must be in the same directory as this file.          *
*                                                                                           *
* REQUIREMENTS:                                                                             *
*   This needs to run on a server that supports PHP 5.0 or greater.                         *
*   You do NOT need MySQL or PDO. Just a PHP 5 server is sufficient.                        *
*   This file needs to be a PHP file (not an HTML file).                                    *
*                                                                                           *
* First, you need to edit the config-bmlt-basic.inc.php to set up the environment.          *
* Once that is done, then proceed with the 3 steps below.                                   *
********************************************************************************************/

/********************************************************************************************
*                           STEP ONE: INCLUDE THE CLASS FILE.                               *
*                                                                                           *
* You should do "require_once" or "include_once", just as a standard practice (It is not    *
* actually necessary in this case, but you should get in the habit).                        *
* This needs to be done first up; BEFORE the start of HTML. Notice that this is all in a    *
* PHP section. This will create a variable, called "$basic_bmlt_object", which will hold    *
* an instance of our class.                                                                 *
********************************************************************************************/
require_once(dirname(__FILE__) . '/bmlt-basic/bmlt_basic.class.php');

/********************************************************************************************
* If you want to support mobile devices with the simple BMLT mobile handler, then you will  *
* need to add this line here (It must be before the start of HTML). It will intercept       *
* mobile devices and redirect them. Don't put this line here if you don't want to have your *
* mobile clients redirected. However, due to the limitations imposed by the BMLT Base class,*
* you will need to have a "mobile-only" page. You should not have anything else in the file.*
********************************************************************************************/
// $basic_bmlt_object->output_head('[[BMLT_MOBILE]]');

/********************************************************************************************
* Now, you can start the standard HTML. PHP is mixed in with classic HTML. You declare PHP  *
* sections by using <?php...?> blocks. These cause the Webserver to execute the PHP at that *
* point. You will never see the PHP in your actual page output.                             *
********************************************************************************************/
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Demonstration of Standalone BMLT Satellite</title>
        
<!-- ***********************************************************************************
     *                       STEP TWO: GENERATE THE HEAD CONTENT                       *
     *                                                                                 *
     * You should decide what shortcode you will use (our example uses the standard    *
     * '[[BMLT]]' default interactive search. You can see what other choices you have  *
     * by visiting this page: http://bmlt.magshare.net/shortcodes/                     *
     * Call the $basic_bmlt_object->output_head() function, with your shortcode as     *
     * the parameter.                                                                  *
     *********************************************************************************** -->
    <?php $basic_bmlt_object->output_head('[[BMLT]]'); ?>
<!-- *********************************************************************************** -->

    </head>
    <body>
    
<!-- ***********************************************************************************
     *                      STEP THREE: GENERATE THE BODY CONTENT                      *
     *                                                                                 *
     * This is almost exactly like STEP ONE, except that you are now calling the       *
     * $basic_bmlt_object->output_body() function. It does not need the shortcode.     *
     *                                                                                 *
     *********************************************************************************** -->
    <?php $basic_bmlt_object->output_body(); ?>
<!-- *********************************************************************************** -->

    </body>
</html>
