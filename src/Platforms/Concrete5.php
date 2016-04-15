<?php
/**
 * Jaeger
 *
 * @copyright	Copyright (c) 2015-2016, mithra62
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./Platforms/Prestashop.php
 */
namespace JaegerApp\Platforms;

use JaegerApp\Platforms\AbstractPlatform;

/**
 * Jaeger - Concrete5 Platform Object
 *
 * The bridge between mithra62 code and Concrete5 specific logic
 *
 * @package Platforms\Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
class Concrete5 extends AbstractPlatform
{
    public function getDbCredentials()
    {
        $database_config = \Config::get('database');
        $database_config = $database_config['connections'][$database_config['default-connection']];
        
        return array(
            'user' => $database_config['username'],
            'password' => $database_config['password'],
            'database' => $database_config['database'],
            'host' => $database_config['server'],
            'prefix' => '',
            'settings_table_name' => 'backup_pro_settings'
        );
    }
    
    public function getEmailConfig()
    {
        if(!\Config::get('concrete.email.enabled')) {
            throw new Exception('Concrete5 email is disabled... you have to enable that for email to function');
        }
        
        $email = \Config::get('concrete.mail');
        $this->email_config = array();
        $this->email_config['type'] = $email['method'];
        $this->email_config['port'] = $email['methods']['smtp']['port'];
        if ($email['method'] == 'smtp') {
            $this->email_config['smtp_options']['host'] = $email['methods']['smtp']['server'];
            $this->email_config['smtp_options']['connection_config']['username'] = $email['methods']['smtp']['username'];
            $this->email_config['smtp_options']['connection_config']['password'] = $email['methods']['smtp']['password'];
            $this->email_config['smtp_options']['port'] = $email['methods']['smtp']['port'];
        }
        
        $this->email_config['sender_name'] = $this->getSiteName();
        $this->email_config['from_email'] = \Config::get('concrete.email.default.address');
        return $this->email_config;        
    }
    
    public function getCurrentUrl()
    {
        return $_SERVER["REQUEST_URI"];
    }
    
    public function getSiteName()
    {
        return \Config::get('concrete.site');
    }
    
    public function getTimezone()
    {
        return \Config::get('app.timezone');
    }
    
    public function getSiteUrl()
    {
        return SITE_URL;
    }
    
    public function getEncryptionKey()
    {
        return \Config::get('concrete.security.token.encryption');
    }
    
    public function getConfigOverrides()
    {
        return array();
    }
    
    public function redirect($url)
    {
        return \Concrete\Core\Routing\Redirect::url($url);
    }
    
    /**
     * (non-PHPdoc)
     * 
     * @see \mithra62\Platforms\AbstractPlatform::getPost()
     */
    public function getPost($key, $default = false)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        } elseif (isset($_GET[$key])) {
            return $_GET[$key];
        }
        
        return $default;
    }
    
}