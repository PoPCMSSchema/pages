<?php
namespace PoP\Pages\Facades;

use PoP\Pages\TypeAPIs\PageTypeAPIInterface;
use PoP\Root\Container\ContainerBuilderFactory;

class PageTypeAPIFacade
{
    public static function getInstance(): PageTypeAPIInterface
    {
        return ContainerBuilderFactory::getInstance()->get('page_type_api');
    }
}
