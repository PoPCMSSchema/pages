<?php
namespace PoP\Pages\Config;

use PoP\ComponentModel\Container\ContainerBuilderUtils;
use PoP\Root\Component\PHPServiceConfigurationTrait;

class ServiceConfiguration
{
    use PHPServiceConfigurationTrait;

    protected static function configure()
    {
        // Add RouteModuleProcessors to the Manager
        // Load API and RESTAPI conditional classes
        if (class_exists('\PoP\API\Component') && !\PoP\API\Configuration\Environment::disableAPI()) {
            ContainerBuilderUtils::injectServicesIntoService(
                'route_module_processor_manager',
                'PoP\\Pages\\Conditional\\API\\RouteModuleProcessors',
                'add'
            );
            if (class_exists('\PoP\RESTAPI\Component')) {
                ContainerBuilderUtils::injectServicesIntoService(
                    'route_module_processor_manager',
                    'PoP\\Pages\\Conditional\\RESTAPI\\RouteModuleProcessors',
                    'add'
                );
            }
        }
    }
}
