DESCRIPTION
-----------

The Basic Meeting List Toolbox (BMLT) is a powerful, database-driven system for tracking NA meetings.
It is NOT an official product of NA ( http://na.org ). Rather, it is a project designed and implemented by
NA members, and meant to be used by official NA Service bodies.

This project implements a "standalone satellite." It does not have to be integrated into a content management
system.

REQUIREMENTS
------------

The project requires a functioning BMLT root server ( http://bmlt.magshare.net/root-server ).
It does not implement a root server, but connects to an existing one.
It requires a Web server capable of executing PHP 5.0 or above.

This class uses the BMLT Satellite Base Class, which is available on GitHub, here:

    https://github.com/MAGSHARE/BMLT-Satellite-Base-Class
    

INSTALLATION
------------

You need to move the "bmlt-basic" directory, and all its contents, into a PHP-executable directory
that is the same level as the file that will include it.

You need to have the config-bmlt-basic.inc.php in the same directory. This is the file that will
be modified to establish the settings.

i.e.:

    <html>---
            |
            V
            <bmlt-basic>-----------------
            |                           |
            |                           V
            V                           bmlt_basic.class.php
            config-bmlt-basic.inc.php           *
            |                                   *
            |                                  etc.
            V
            index.php
            
            
Below, is a super-simple implementation of the BMLT:

<?php require_once ( dirname ( __FILE__ ).'/bmlt-basic/bmlt_basic.class.php' ); ?>
<head><?php $basic_bmlt_object->output_head(); ?></head>
<body><?php $basic_bmlt_object->output_body(); ?></body>


CHANGELIST
----------
= 3.2.3 =
* March 30, 2016
* Got rid of an undeclared variable warning.
* Fixed a bug that caused rendering issues with the new table shortcode on Internet Exploder.
* Fixed a minor style issue, where the selection triangle would flow below the text in large text situations.
* Changed the styling for the selected header triangle to make the table display a bit more responsive.
* Added samples for the new [[bmlt_table]] shortcode.

= 3.2.2 =
* March 29, 2016
* Fixed a JavaScript bug introduced in 3.2.2 (This should do it; I promise).

= 3.2.1 =
* March 29, 2016
* Fixed a JavaScript bug introduced in 3.2.0.

= 3.2.0 =
* March 29, 2016
* Significant addition of the new [[bmlt_table]] shortcode.

= 3.1.0 =
* March 8, 2016
* Added support for HTTPS (SSL).
* Added Italian localization.

= 3.0.29 =
* January 10, 2016
* Added support for a runtime language selector as a cookie. If you set a cookie named "bmlt_lang_selector," and set its simple string value to an ISO 639-1 or ISO 639-2 **SUPPORTED** language, that will select the client language.

= 3.0.28 =
* August 15, 2015
* Added Portuguese Translation.

= 3.0.27 =
* February 9, 2015
* The BMLT_MOBILE shortcode didn't work. This was fixed with a combination of adding some code to the class, and also changing the way that it is used.

= 3.0.26 =
* January 31, 2015
* Fixed an issue with the extra fields display in the regular shortcode display details.
* Fixed an issue where the arbitrary fields were actually creating too many results.
* Now hide the distance_in_km/miles parameters in the meeting details (these are internal parameters).

= 3.0.25 =
* November 22, 2014
* Fixed a CSS issue with the admin display map. Some themes (especially responsive ones) declare a global max-width for images. This hoses Google Maps, and has to be compensated for.
* Added full support for arbitrary fields. This was an important capability that was left out after Version 3.X

= 3.0.24 =
* July 31, 2014
* Adds a cURL user-agent, as some servers filter cURL requests.

= 3.0.23 =
* July 17, 2014
* Added Danish localization, and fixed a minor admin bug.

= 3.0.22 =
* June 25, 2014
* Removed some warning-generating messages.
* Added Danish localization.
* Fixed a bug introduced in the last release.

= 3.0.21 =
* February 23, 2014
* This adds fixes for servers that run on non-standard TCP ports.

= 3.0.20 =
* December 31, 2013
* Fixed a character set issue that affected Internet Exploder.

= 3.0.19 =
* December 7, 2013
* Added French localization

= 3.0.18 =
* September 7, 2013
* Some German localization corrections.
* Fixed some JavaScript issues with the [[bmlt_mobile]] shortcode.

= 3.0.17 =
* July 1, 2013
* Corrected German localization.
* Added the ability to specify which day weeks begin (in Europe, it is common for weeks to begin on Monday).

= 3.0.16 =
* May 22, 2013
* Added German localization.

= 3.0.15 =
* May 19, 2013
* Included the latest base class (does not address any issue with this project).

= 3.0.14 =
* May 18, 2013
* Fixed an issue, where the AJAX URI could have invalid characters.

= 3.0.12 =
* May 16, 2013
* Added the Military time field to the example config file.
* Updated the base class to remove some warnings and whatnot.

= 3.0.11 =
* May 13, 2013
* Reduced the number of times that the marker redraw is called in the standard [[bmlt]] shortcode handler.
* Fixed an issue with CSS that caused displayed maps to get funky.

= 3.0.10 =
* May 5, 2013
* Fixed a bug where search results could occasionally show "too many reds."

= 3.0.8 =
* April 28, 2013
* Added support for display of military time.

= 3.0.3 =
* April 15, 2013
* Fixed a Swedish localization bug.

= 3.0 =
* January 26, 2013
* First release (version is to sync with the other satellite clients).