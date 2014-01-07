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
