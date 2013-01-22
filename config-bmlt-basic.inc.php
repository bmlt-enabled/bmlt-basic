<?php
/****************************************************************************************//**
*   \file   config-bmlt-basic.inc.php                                                       *
*                                                                                           *
*   \brief  This file contains the basic configuration directives for the standalone client.*
*   \version 3.0                                                                            *
*                                                                                           *
*   This file is part of the Basic Meeting List Toolbox (BMLT).                             *
*                                                                                           *
*   Find out more at: http://bmlt.magshare.org                                              *
*                                                                                           *
*   BMLT is free software: you can redistribute it and/or modify                            *
*   it under the terms of the GNU General Public License as published by                    *
*   the Free Software Foundation, either version 3 of the License, or                       *
*   (at your option) any later version.                                                     *
*                                                                                           *
*   BMLT is distributed in the hope that it will be useful,                                 *
*   but WITHOUT ANY WARRANTY; without even the implied warranty of                          *
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                           *
*   GNU General Public License for more details.                                            *
*                                                                                           *
*   You should have received a copy of the GNU General Public License                       *
*   along with this code.  If not, see <http://www.gnu.org/licenses/>.                      *
********************************************************************************************/

global $bmlt_basic_configuration;
global $bmlt_basic_configuration_index;

$bmlt_basic_configuration = array();    ///< The configuration will be held in an array of associative arrays.
$bmlt_basic_configuration_index = 0;

/********************************************************************************************
*                                          SETTINGS                                         *
********************************************************************************************/
$bmlt_basic_configuration[$bmlt_basic_configuration_index] =
array (

/*************************************************************************************************************************************************************
*   SETTING NAME (Don't Change)     SETTING VALUE (You should change these)                                                                                  *
*************************************************************************************************************************************************************/
    /* This is the root server URL. The root server must be a minimum version 1.10.3 in order for this client to work.                                      */
    'root_server'                   => 'http://bmlt.newyorkna.org/main_server', 
    
    'map_center_latitude'           => 40.780281,   /* The longitude, latitude and Google Map zoom of the initial search map.                               */
    'map_center_longitude'          => -73.965497,
    'map_zoom'                      => 12,
    
    'bmlt_initial_view'             => 'map',       /* Can be 'map', 'text', 'advanced_map' or 'advanced_text'                                              */
    
    'bmlt_location_checked'         => 0,           /* Set this to 1 if you want the "This is a Location or Postcode" box to be checked on by default.      */
    'bmlt_location_services'        => 0,           /* Set this to 1 if you want the location ("Find Near Me") services only available for mobile devices.  */
    
    'theme'                         => 'default',   /* Can be 'default', 'BlueAndRed', 'BlueAndWhite', 'GNYR', 'GreenAndGold' or 'GreyAndMaroon'.           */
    'distance_units'                => 'mi',        /* Can be 'mi' or 'km'.                                                                                 */
    'grace_period'                  => 15,          /* How many minutes are allowed to go by before a meeting is considered "too late."                     */
    'time_offset'                   => 0,           /* Generally left at 0 hours. If the server has a different time offset from this, indicate it here.    */

/*************************************************************************************************************************************************************
*************************************************************************************************************************************************************/

    'id'                            => $bmlt_basic_configuration_index + 1  /* Don't mess with this one. */
);

$bmlt_basic_configuration_index++;

?>