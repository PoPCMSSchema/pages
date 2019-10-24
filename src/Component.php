<?php
namespace PoP\Pages;

use PoP\Root\Component\AbstractComponent;
use PoP\Pages\Config\ServiceConfiguration;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    // const VERSION = '0.1.0';

    /**
     * Initialize services
     */
    public static function init()
    {
        parent::init();
        ServiceConfiguration::init();
    }
}
