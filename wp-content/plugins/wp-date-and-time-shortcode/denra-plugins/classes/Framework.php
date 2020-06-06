<?php

/**
 * Framework
 *
 * The Denra Plugins Framework class.
 *
 * @author     Denra.com aka SoftShop Ltd <support@denra.com>
 * @copyright  2019 Denra.com aka SoftShop Ltd
 * @license    GPLv2 or later
 * @version    1.2.1
 * @link       https://www.denra.com/
 */

namespace Denra\Plugins;

/**
 * Description of Framework
 *
 * @author Ivaylo Tinchev
 */
class Framework extends BasicExtra {
    
    // The version here and above in the comments MUST MATCH !!!
    public static $version = '1.2.1';
    
    public $url_website = 'https://denra.com/';
    public $url_support_page = 'https://denra.com/';
    public $url_donation = 'https://www.paypal.me/itinchev';
    public $email_support = 'support@denra.com';
    
    public function __construct($id, $data = []) {
        
        global $denra_plugins;
        
        (isset($data['framework_plugin_id']) && $data['framework_plugin_id']) || die('<p>Framework plugin ID needed for '.get_class($this).'.</p>');
        
        // Check framework version correctness
        if (FrameworkLoader::$framework_version != self::$version) {
            die('<p>Error: FrameworkLoader framework version (' . FrameworkLoader::$framework_version . ') and Framework real version (' . self::$version . ') do not match.</p>');
        }
        
        // Set text_domain for the framework
        $this->text_domain = $id;
        
        // Set framework dir and url
        $plugin_data = $denra_plugins['data'][$data['framework_plugin_id']];
        $data['file'] .= $plugin_data['file'];
        $data['dir'] .= $plugin_data['dir'] . $id . '/';
        $data['url'] .= $plugin_data['url'] . $id . '/';
        unset($plugin_data);
        
        parent::__construct($id, $data);
        unset($data);
        
        // Load all plugins
        foreach($denra_plugins['data'] as $plugin_id => $plugin_data) {
            
            // Create the plugin object
            $dir_plugin_classes = $plugin_data['dir'] . 'plugin/classes/';
            require_once  $dir_plugin_classes . $plugin_data['class'] . '.php';
            $full_class_plugin = '\Denra\Plugins\\' . $plugin_data['class'];
            $denra_plugins['data'][$plugin_id]['object'] = new $full_class_plugin ($plugin_id, $plugin_data);
            
            // Create reference for faster use
            $plugin_obj = &$denra_plugins['data'][$plugin_id]['object'];
            
            // Do some housecleaning immediately after activation
            // e.f. fix plugin settings to comply with the ones in
            // the new versions if the plugin has been just activated
            $just_activated_id_u = $plugin_obj->id_u . '_just_activated';
            $just_activated = get_option($just_activated_id_u);
            if (intval($just_activated)) {
                // The real housekeeping
                self::deleteOldSettingsData($plugin_obj->settings, $plugin_obj->settings_default);
                self::addNewSettingsData($plugin_obj->settings, $plugin_obj->settings_default);
                self::sortArrayKeysRecursively($plugin_obj->settings);
                update_option($plugin_obj->settings_id_u, $plugin_obj->settings, FALSE);
                update_option($just_activated_id_u, 0, FALSE);
            }
            
            // Load all text domains in case of Framework admin Home page
            if (filter_input(INPUT_GET, 'page') == $this->id && $plugin_obj->text_domain && $plugin_id != $data['framework_plugin_id']) {
                if ($plugin_obj->text_domain) {
                    $mofile = $plugin_obj->dir . 'i18n/' .  $plugin_obj->text_domain . '-' . get_locale() . '.mo';
                    if (file_exists($mofile)) {
                        load_textdomain($plugin_obj->text_domain, $mofile);
                    }
                }
            }
        }
        
        // Add the admin menus for the Framework
        if (current_user_can('manage_options')) {
            add_action('admin_menu', [&$this, 'addAdminMenus'], 1);
        }
        
    }
    
    // Delete all keys that are missing in the new plugin version
    public static function deleteOldSettingsData(&$settings, &$settings_default) {
        
        foreach (array_keys($settings) as $key) {
            if (!isset($settings_default[$key])) {
                unset($settings[$key]); // delete settings key if missing
            }
            elseif (is_array($settings[$key])) { // check subkeys recursively
                self::deleteOldSettingsData($settings[$key], $settings_default[$key]);
            }
        }        
    }
    
    public static function addNewSettingsData(&$settings, &$settings_default) {
        
        // Add all keys that are newly created in the new plugin version
        foreach (array_keys($settings_default) as $key) {
            if (isset($settings[$key])) {
                if (is_array($settings[$key]) && is_array($settings_default[$key])) {
                    self::addNewSettingsData($settings[$key], $settings_default[$key]);
                    continue;                    
                }
            }
            else {
                $settings[$key] = $settings_default[$key];
            }
        }
        
    }
    
    public function addAdminMenus() {
        
        add_menu_page(
            'Denra Plugins',
            'Denra Plugins',
            'manage_options',
            $this->id,
            [&$this, 'settings'],
            'dashicons-admin-generic',
            NULL
        );
        add_submenu_page(
            $this->id,
            __('Home', 'denra-plugins'),
            __('Home', 'denra-plugins'),
            'manage_options',
            $this->id);
        
    }
    
    public function settings() {
        
        global $denra_plugins;
        
        echo '<div class="denra-plugins">';
        
        echo '<h1>'.__('Denra Plugins', 'denra-plugins') . ' ' . self::$version . '</h1><hr>';
        echo '<h2>' . __('Installed and active plugins', 'denra-plugins') . '</h2>';

        foreach ($denra_plugins['data'] as $plugin_id => $plugin_data) {
            echo '<h3>' . $plugin_data['object']->data['Name'] . ' ' . $plugin_data['object']->data['Version'] . '</h3>';
            echo preg_replace('/(\<cite\>)(.*)(\<\/cite\>)/i', '$1$3', $plugin_data['object']->data['Description']) . '<br>[ <a href="admin.php?page=' . $plugin_id . '">' . __('Settings', 'denra-plugins') . '</a> ]';
        }
        
        echo '<p><hr></p><h2>' . __('Contact us', 'denra-plugins') . '</h2>';
        echo '<p>' . __('E-mail support:', 'denra-plugins') . ' <a href="mailto:' . $denra_plugins['framework']->email_support . '">' . $denra_plugins['framework']->email_support . '</a>';
        echo '<br>' . __('Website:', 'denra-plugins') . ' <a href="' . $denra_plugins['framework']->url_website . '" target="_blank">' . $denra_plugins['framework']->url_website . '</a></p>';
        
        echo '<p><hr></p><h2>' . __('Donations', 'denra-plugins') . '</h2>';
        echo '<p><a href="' . $denra_plugins['framework']->url_donation . '" target="_blank">' . __('Please donate', 'denra-plugins') . '</a>' . __(' if you like our plugins and they are helpful to you.', 'denra-plugins') . '</p>';
        
        echo '</div>';
        
    }
    
    public static function sortArrayKeysRecursively (&$a) {
        if (is_array($a)) {
            ksort($a);
            foreach (array_keys($a) as $k) {
               self::sortArrayKeysRecursively($a[$k]);
            }
        }
    }

}
