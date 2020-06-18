<?php

declare(strict_types=1);

namespace PoP\Pages\TypeDataLoaders;

use PoP\Pages\Facades\PageTypeAPIFacade;
use PoP\CustomPosts\TypeDataLoaders\CustomPostTypeDataLoader;
use PoP\Pages\ModuleProcessors\PageRelationalFieldDataloadModuleProcessor;

class PageTypeDataLoader extends CustomPostTypeDataLoader
{
    public function getFilterDataloadingModule(): ?array
    {
        // return [
        //     \PoP_Posts_Module_Processor_FieldDataloads::class,
        //     \PoP_Posts_Module_Processor_FieldDataloads::MODULE_DATALOAD_RELATIONALFIELDS_POSTLIST
        // ];
        return [
            PageRelationalFieldDataloadModuleProcessor::class,
            PageRelationalFieldDataloadModuleProcessor::MODULE_DATALOAD_RELATIONALFIELDS_PAGES
        ];
    }

    public function getObjects(array $ids): array
    {
        $pageTypeAPI = PageTypeAPIFacade::getInstance();
        $query = $this->getObjectQuery($ids);
        return $pageTypeAPI->getPages($query);
    }

    public function executeQuery($query, array $options = [])
    {
        $pageTypeAPI = PageTypeAPIFacade::getInstance();
        return $pageTypeAPI->getPages($query, $options);
    }
}
