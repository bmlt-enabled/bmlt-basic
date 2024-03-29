<?php

/****************************************************************************************/

/**
*   \file   bmlt_basic.class.php                                                            *
*                                                                                           *
*   \brief  This is a standalone implementation of a BMLT satellite client.                 *
*   \version 3.11.0                                                                          *
*                                                                                           *
*   In order to use this class, you need to take this entire directory and its contents,    *
*   and place it at the same level of the file that you wish to use as your implementation. *
*   The "index.php" file in the repository is an example of this. It is important that the  *
*   implementation file be one level above this file (or at the same level as the           *
*   "bmlt-basic" directory).                                                                *
*                                                                                           *
*   This file is part of the Basic Meeting List Toolbox (BMLT).                             *
*                                                                                           *
*   Find out more at: http://bmlt.app                                                       *
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

ob_start();

// define ( '_DEBUG_MODE_', 1 ); //Uncomment for easier JavaScript debugging.

// Include our configuration.
require_once(dirname(__FILE__) . '/../config-bmlt-basic.inc.php');
// Include the satellite driver class.
define('ROOTPATH', __DIR__);
require_once(ROOTPATH . '/vendor/bmlt/bmlt-satellite-base-class/bmlt-cms-satellite-plugin.php');

/****************************************************************************************//**
*   \class bmlt_basic                                                                       *
*                                                                                           *
*   \brief
********************************************************************************************/
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
class bmlt_basic extends BMLTPlugin
{
    // phpcs:enable Squiz.Classes.ValidClassName.NotCamelCaps
    // phpcs:enable PSR1.Classes.ClassDeclaration.MissingNamespace
    public $my_shortcode = null;   ///< This will hold the given shortcode.

    /************************************************************************************//**
    *                                   CLIENT FUNCTIONS                                    *
    ****************************************************************************************/

    /************************************************************************************//**
    *   \brief Outputs the head HTML, CSS and JavaScript.                                   *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function output_head($in_shortcode = '[[bmlt]]')
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        ///< You need to provide a shortcode, if you want something other than the default.
        $this->my_shortcode = $in_shortcode;  // Save this.
        echo $this->standard_head($this->my_shortcode);
    }

    /************************************************************************************//**
    *   \brief Outputs the body HTML and JavaScript.                                        *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function output_body()
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        echo $this->content_filter($this->my_shortcode);
    }

    /************************************************************************************//**
    *                    INTERNAL FUNCTIONS (NOT CALLED BY CLIENT)                          *
    ****************************************************************************************/

    /************************************************************************************//**
    *   \brief Return an HTTP path to the AJAX callback target.                             *
    *                                                                                       *
    *   \returns a string, containing the path.                                             *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function get_ajax_base_uri()
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        // We try to account for SSL and unusual TCP ports.
        $port = null;
        $https = false;
        $from_proxy = array_key_exists("HTTP_X_FORWARDED_PROTO", $_SERVER);
        if ($from_proxy) {
            // If the port is specified in the header, use it. If not, default to 80
            // for http and 443 for https. We can't trust what's in $_SERVER['SERVER_PORT']
            // because something in front of the server is fielding the request.
            $https = $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https';
            if (array_key_exists("HTTP_X_FORWARDED_PORT", $_SERVER)) {
                $port = intval($_SERVER['HTTP_X_FORWARDED_PORT']);
            } elseif ($https) {
                $port = 443;
            } else {
                $port = 80;
            }
        } else {
            $port = $_SERVER['SERVER_PORT'];
            // IIS puts "off" in the HTTPS field, so we need to test for that.
            $https = (!empty($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] !== 'off') || ($port == 443)));
        }
        $server_path = $_SERVER['SERVER_NAME'];
        $my_path = $_SERVER['PHP_SELF'];
        $server_path .= trim((($https && ($port != 443)) || (!$https && ($port != 80))) ? ':' . $port : '', '/');
        $server_path = 'http' . ($https ? 's' : '') . '://' . $server_path . $my_path;
        return $server_path;
    }

    /************************************************************************************//**
    *   \brief Return an HTTP path to the plugin directory.                                 *
    *                                                                                       *
    *   \returns a string, containing the path.                                             *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function get_plugin_path()
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        $ret = isset($this->my_http_vars['base_url']) ? $this->my_http_vars['base_url'] : dirname($this->get_ajax_base_uri()) . '/bmlt-basic/vendor/bmlt/bmlt-satellite-base-class/';

        return $ret;
    }

    /************************************************************************************//**
    *   \brief This uses the CMS text processor (t) to process the given string.            *
    *                                                                                       *
    *   This allows easier translation of displayed strings. All strings displayed by the   *
    *   plugin should go through this function.                                             *
    *                                                                                       *
    *   \returns a string, processed by WP.                                                 *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function process_text($in_string)
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        $in_string = htmlspecialchars($in_string);

        return $in_string;
    }

    /************************************************************************************//**
    *   \brief This gets the default admin options from the object (not the DB).            *
    *                                                                                       *
    *   \returns an associative array, with the default option settings.                    *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function geDefaultBMLTOptions()
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        global $bmlt_basic_configuration;
        // These are the defaults. If the saved option has a different value, it replaces the ones in here.
        return $bmlt_basic_configuration[0];
    }

    /************************************************************************************//**
    *   \brief This gets the admin options from the config file.                            *
    *                                                                                       *
    *   \returns an associative array, with the option settings.                            *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function cms_get_option($in_option_key)
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        global $bmlt_basic_configuration;
        global $bmlt_basic_configuration_index;

        $ret = null;

        if ($in_option_key != self::$admin2OptionsName) {
            $index = intval(max($bmlt_basic_configuration_index - 1, intval(str_replace(self::$adminOptionsName . '_', '', $in_option_key))));

            $ret = $bmlt_basic_configuration[$index];
        } else {
            $ret = array ( 'num_servers' => $bmlt_basic_configuration_index );
        }

        return $ret;
    }

    /************************************************************************************//**
    *   \brief This function fetches the settings ID for a page (if there is one).          *
    *                                                                                       *
    *   If $in_check_mobile is set to true, then ONLY a check for mobile support will be    *
    *   made, and no other shortcodes will be checked.                                      *
    *                                                                                       *
    *   \returns a mixed type, with the settings ID.                                        *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function cms_get_page_settings_id(
        $in_text,                  ///< Required (for the base version) content to check.
        $in_check_mobile = false   ///< True if this includes a check for mobile. Default is false.
    ) {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        $my_option_id = 0;

        if (!$in_check_mobile && isset($this->my_http_vars['bmlt_settings_id']) && is_array($this->getBMLTOptions($this->my_http_vars['bmlt_settings_id']))) {
            $my_option_id = $this->my_http_vars['bmlt_settings_id'];
        } else {
            $support_mobile = self::get_shortcode($in_text, 'bmlt_mobile');

            if ($support_mobile === true) {
                $options = $this->getBMLTOptions(1);
                $support_mobile = strval($options['id']);
            }

            if ($in_check_mobile && $support_mobile && !isset($this->my_http_vars['BMLTPlugin_mobile']) && (self::mobile_sniff_ua($this->my_http_vars) != 'xhtml')) {
                $my_option_id = $support_mobile;
            } elseif (!$in_check_mobile) {
                if (isset($this->my_http_vars['bmlt_settings_id']) && intval($this->my_http_vars['bmlt_settings_id'])) {
                    $my_option_id = intval($this->my_http_vars['bmlt_settings_id']);
                } elseif ($in_text) {
                    $my_option_id_content = parent::cms_get_page_settings_id($in_text, $in_check_mobile);

                    $my_option_id = $my_option_id_content ? $my_option_id_content : $my_option_id;
                }

                if (!$my_option_id) {   // If nothing else gives, we go for the default (first) settings.
                    $options = $this->getBMLTOptions(1);
                    $my_option_id = $options['id'];
                }
            }
        }

        return $my_option_id;
    }

    /************************************************************************************//**
    *   \brief returns any necessary head content.                                          *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function standard_head($in_text = null)
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        ///< This is the page content text.
        $this->ajax_router();
        $load_head = false;   // This is a throwback. It prevents the GM JS from being loaded if there is no directly specified settings ID.
        $head_content = "<!-- Added by the BMLT plugin 3.X. -->\n<meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE7\" /><meta http-equiv=\"Content-Style-Type\" content=\"text/css\" /><meta http-equiv=\"Content-Script-Type\" content=\"text/javascript\" />";

        $support_mobile = $this->cms_get_page_settings_id($in_text, true);

        if ($support_mobile) {
            $mobile_options = $this->getBMLTOptions_by_id($support_mobile);
        } else {
            $support_mobile = null;
        }

        $options = $this->getBMLTOptions_by_id($this->cms_get_page_settings_id($in_text));

        if ($support_mobile && is_array($mobile_options) && count($mobile_options)) {
            $mobile_url = $_SERVER['PHP_SELF'] . '?BMLTPlugin_mobile&bmlt_settings_id=' . $support_mobile;

            if (isset($this->my_http_vars['WML'])) {
                $mobile_url .= '&WML=' . intval($this->my_http_vars['WML']);
            }
            if (isset($this->my_http_vars['simulate_smartphone'])) {
                $mobile_url .= '&simulate_smartphone';
            }

            if (ob_get_contents()) {
                ob_end_clean();
            }

            header("location: $mobile_url");
            die();
        }

        $load_server_header = $this->get_shortcode($in_text, 'bmlt');

        $this->my_http_vars['start_view'] = $options['bmlt_initial_view'];

        $this->load_params();

        $root_server_root = $options['root_server'];

        $head_content .= '<meta name="BMLT-Root-URI" content="' . htmlspecialchars($root_server_root) . '" />';

        $head_content .= "\n" . '<style type="text/css">' . "\n";
        $temp = self::stripFile("styles.css", $options['theme']);
        if ($temp) {
            $image_dir_path = $this->get_plugin_path() . '/themes/' . $options['theme'] . '/images/';
            $temp = str_replace('##-IMAGEDIR-##', $image_dir_path, $temp);
            $head_content .= "\t$temp\n";
        }
        $temp = self::stripFile("nouveau_map_styles.css", $options['theme']);
        if ($temp) {
            $image_dir_path = $this->get_plugin_path() . '/themes/' . $options['theme'] . '/images/';
            $temp = str_replace('##-IMAGEDIR-##', $image_dir_path, $temp);
            $head_content .= "\t$temp\n";
        }

        $head_content .= self::stripFile('table_styles.css') . "\n";
        $head_content .= self::stripFile('quicksearch.css') . "\n";

        $dirname = ROOTPATH . '/vendor/bmlt/bmlt-satellite-base-class/themes';
        $dir = new DirectoryIterator($dirname);

        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $fName = $fileinfo->getFilename();
                $temp = self::stripFile("table_styles.css", $fName);
                if ($temp) {
                    $image_dir_path = $this->get_plugin_path() . '/themes/' . $fName . '/images/';
                    $temp = str_replace('##-IMAGEDIR-##', $image_dir_path, $temp);
                    $head_content .= "\t$temp\n";
                }
                $temp = self::stripFile("quicksearch.css", $fName);
                if ($temp) {
                    $head_content .= "\t$temp\n";
                }
            }
        }
        $head_content .= self::stripFile('responsiveness.css') . "\n";
        $head_content .= "\n</style>\n";
        $head_content .= '<script type="text/javascript">';

        $head_content .= self::stripFile('javascript.js');

        if ($this->get_shortcode($in_text, 'bmlt_quicksearch')) {
            $head_content .= self::stripFile('quicksearch.js') . (defined('_DEBUG_MODE_') ? "\n" : '');
        }

        if ($this->get_shortcode($in_text, 'bmlt_map')) {
            $head_content .= self::stripFile('map_search.js');
        }

        if ($this->get_shortcode($in_text, 'bmlt_mobile')) {
            $head_content .= self::stripFile('fast_mobile_lookup.js');
        }

        $head_content .= '</script>';

        return $head_content;
    }

    /************************************************************************************//**
    *                   THESE ARE ALL DISABLED IN THE BASIC SATELLITE                       *
    ****************************************************************************************/
    /************************************************************************************//**
    *   \brief We don't do admin in this variant, so this makes that clear.                 *
    *                                                                                       *
    *   \returns null                                                                       *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function get_admin_ajax_base_uri()
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        return null;
    }

    /************************************************************************************//**
    *   \brief We don't do admin in this variant, so this makes that clear.                 *
    *                                                                                       *
    *   \returns null                                                                       *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function get_admin_form_uri()
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        return null;
    }

    /************************************************************************************//**
    *   \brief You cannot set options in this implementation.                               *
    *                                                                                       *
    *   \returns false                                                                      *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function cms_set_option(
        $in_option_key,   ///< The name of the option
        $in_option_value  ///< the values to be set (associative array)
    ) {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        return false;
    }

    /************************************************************************************//**
    *   \brief You cannot delete options in this implementation.                            *
    *                                                                                       *
    *   \returns false                                                                      *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function cms_delete_option($in_option_key)
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        return false;
    }

    /************************************************************************************//**
    *   \brief This is declared to make it clear that we don't do post meta.                *
    *                                                                                       *
    *   \returns null                                                                       *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function cms_get_post_meta(
        $in_page_id,    ///< The ID of the page/post
        $in_settings_id ///< The ID of the meta tag to fetch
    ) {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        return null;
    }

    /************************************************************************************//**
    *   \brief No admin in this implementation.                                             *
    *                                                                                       *
    *   \returns null                                                                       *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function admin_head()
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
        return null;
    }

    /************************************************************************************//**
    *   \brief Prevents the admin page from being shown.                                    *
    ****************************************************************************************/
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function admin_page()
    {
        // phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    }
}

/****************************************************************************************//**
*                                      MAIN EXECUTION                                       *
********************************************************************************************/

static $basic_bmlt_object;

if (!isset($basic_bmlt_object) && class_exists("bmlt_basic")) {
    $basic_bmlt_object = new bmlt_basic();
}

if ($basic_bmlt_object) {
    $basic_bmlt_object->ajax_router();
} else {
    echo 'UNABLE TO INITIALIZE THE BMLT SUBSYSTEM';
}

ob_end_flush();
