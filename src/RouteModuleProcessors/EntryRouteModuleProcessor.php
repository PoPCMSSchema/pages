<?php
namespace PoP\Pages\RouteModuleProcessors;

use PoP\ModuleRouting\AbstractEntryRouteModuleProcessor;
use PoP\ComponentModel\Server\Utils;
use PoP\ComponentModel\Engine_Vars;
use PoP\Hooks\Facades\HooksAPIFacade;
use PoP\API\Facades\FieldQueryConvertorFacade;
use PoP\Routing\RouteNatures;

class EntryRouteModuleProcessor extends AbstractEntryRouteModuleProcessor
{
    private static $restFieldsQuery;
    private static $restFields;
    public static function getRESTFields(): array
    {
        if (is_null(self::$restFields)) {
            self::$restFields = self::getRESTFieldsQuery();
            if (is_string(self::$restFields)) {
                self::$restFields = FieldQueryConvertorFacade::getInstance()->convertAPIQuery(self::$restFields);
            }
        }
        return self::$restFields;
    }
    public static function getRESTFieldsQuery(): string
    {
        if (is_null(self::$restFieldsQuery)) {
            $restFieldsQuery = 'id|title|url|content';
            self::$restFieldsQuery = (string) HooksAPIFacade::getInstance()->applyFilters(
                'Pages:RESTFields',
                $restFieldsQuery
            );
        }
        return self::$restFieldsQuery;
    }

    public function getModulesVarsPropertiesByNature()
    {
        $ret = array();

        // API
        if (!Utils::disableAPI()) {
            $vars = Engine_Vars::getVars();

            // Page
            $ret[RouteNatures::PAGE][] = [
                'module' => [\PoP_Pages_Module_Processor_FieldDataloads::class, \PoP_Pages_Module_Processor_FieldDataloads::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS],
                'conditions' => [
                    'scheme' => POP_SCHEME_API,
                ],
            ];
            // REST API Page
            $ret[RouteNatures::PAGE][] = [
                'module' => [\PoP_Pages_Module_Processor_FieldDataloads::class, \PoP_Pages_Module_Processor_FieldDataloads::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS, ['fields' => isset($vars['query']) ? $vars['query'] : self::getRESTFields()]],
                'conditions' => [
                    'scheme' => POP_SCHEME_API,
                    'datastructure' => GD_DATALOAD_DATASTRUCTURE_REST,
                ],
            ];
        }

        return $ret;
    }
}
