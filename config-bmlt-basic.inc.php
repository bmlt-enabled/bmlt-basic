<?php
/****************************************************************************************//**
*   \file   config-bmlt-basic.inc.php                                                       *
*                                                                                           *
*   \brief  This file contains the basic configuration directives for the standalone client.*
*   \version 3.0                                                                            *
*                                                                                           *
*   This file is part of the Basic Meeting List Toolbox (BMLT).                             *
*                                                                                           *
*   Find out more at: http://magshare.org/bmlt                                              *
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

/****************************************************************************************//**
*                                          SETTINGS                                         *
********************************************************************************************/
$bmlt_basic_configuration[$bmlt_basic_configuration_index] = array ('root_server'               => 'http://bmlt.newyorkna.org/main_server',
                                                                    'map_center_latitude'       => 40.780281,
                                                                    'map_center_longitude'      => -73.965497,
                                                                    'map_zoom'                  => 12,
                                                                    'bmlt_new_search_url'       => '',
                                                                    'bmlt_initial_view'         => 'map',
                                                                    'additional_css'            => '',
                                                                    'id'                        => $bmlt_basic_configuration_index + 1,
                                                                    'setting_name'              => 'GNYR Server',
                                                                    'bmlt_location_checked'     => 0,
                                                                    'bmlt_location_services'    => 0,
                                                                    'theme'                     => 'default',
                                                                    'distance_units'            => 'mi',
                                                                    'grace_period'              => 15,
                                                                    'time_offset'               => 0
                                                                    );

$bmlt_basic_configuration_index++;

?>