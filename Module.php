<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2013 Rob Allen (http://19ft.com)
 */

namespace NFDevelopmentMode;

use Zend\Console\Adapter\AdapterInterface as Console;

class Module
{
    public function getConfig()
    {
        return array(
            'controllers' => array(
                'invokables' => array(
                    'NFDevelopmentMode\DevelopmentModeController' => 'NFDevelopmentMode\DevelopmentModeController',
                ),
            ),
            'console' => array(
                'router' => array(
                    'routes' => array(
                        'development-disable' => array(
                            'options' => array(
                                'route' => 'development disable',
                                'defaults' => array(
                                    'controller' => 'NFDevelopmentMode\DevelopmentModeController',
                                    'action'     => 'disable',
                                ),
                            ),
                        ),
                        'development-enable' => array(
                            'options' => array(
                                'route' => 'development enable',
                                'defaults' => array(
                                    'controller' => 'NFDevelopmentMode\DevelopmentModeController',
                                    'action'     => 'enable',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        );
    }
    
    /**
     * Display a console banner, if development mode is active
     * 
     * @return string
     */
    public function getConsoleBanner(Console $console)
    {
        if (file_exists('config/development.config.php')) {
            $string = '';
            
            $text = '* Development mode enabled';
            $spaces = $console->getWidth() - strlen($text) - 1;
            
            $return = str_repeat('*', $console->getWidth());
            $return .= strtoupper($text) . str_repeat(' ', $spaces) . '*';
            $return .= str_repeat('*', $console->getWidth());
            
            return $return;
        }
    }
    
    /**
     * Return the console usage for this module
     *
     * @param Console $console            
     * @return array
     */
    public function getConsoleUsage(Console $console)
    {
        return array(
            'development enable' => 'Enable the development mode (do not use in production)',
            'development disable' => 'Disable the development mode'
        );
    }
}
