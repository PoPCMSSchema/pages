<?php

declare(strict_types=1);

namespace PoP\Pages\ModuleProcessors;

use PoP\Pages\TypeResolvers\PageTypeResolver;
use PoP\Pages\ModuleProcessors\PageFilterInnerModuleProcessor;
use PoP\API\ModuleProcessors\AbstractRelationalFieldDataloadModuleProcessor;
use PoP\ComponentModel\QueryInputOutputHandlers\ListQueryInputOutputHandler;

class PageRelationalFieldDataloadModuleProcessor extends AbstractRelationalFieldDataloadModuleProcessor
{
    public const MODULE_DATALOAD_RELATIONALFIELDS_PAGES = 'dataload-relationalfields-pages';

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_DATALOAD_RELATIONALFIELDS_PAGES],
        );
    }

    public function getTypeResolverClass(array $module): ?string
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_RELATIONALFIELDS_PAGES:
                return PageTypeResolver::class;
        }

        return parent::getTypeResolverClass($module);
    }

    public function getQueryInputOutputHandlerClass(array $module): ?string
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_RELATIONALFIELDS_PAGES:
                return ListQueryInputOutputHandler::class;
        }

        return parent::getQueryInputOutputHandlerClass($module);
    }

    public function getFilterSubmodule(array $module): ?array
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_RELATIONALFIELDS_PAGES:
                return [PageFilterInnerModuleProcessor::class, PageFilterInnerModuleProcessor::MODULE_FILTERINNER_PAGES];
        }

        return parent::getFilterSubmodule($module);
    }
}
