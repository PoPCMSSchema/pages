<?php
namespace PoP\Pages\Conditional\API\RouteModuleProcessors;

use PoP\ModuleRouting\AbstractEntryRouteModuleProcessor;
use PoP\Pages\Routing\RouteNatures;

class EntryRouteModuleProcessor extends AbstractEntryRouteModuleProcessor
{
    public function getModulesVarsPropertiesByNature()
    {
        $ret = array();

        $ret[RouteNatures::PAGE][] = [
            'module' => [\PoP_Pages_Module_Processor_FieldDataloads::class, \PoP_Pages_Module_Processor_FieldDataloads::MODULE_DATALOAD_RELATIONALFIELDS_PAGE],
            'conditions' => [
                'scheme' => POP_SCHEME_API,
            ],
        ];

        return $ret;
    }
}
