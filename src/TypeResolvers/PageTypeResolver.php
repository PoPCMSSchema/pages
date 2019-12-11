<?php
namespace PoP\Pages\TypeResolvers;

use PoP\ComponentModel\TypeResolvers\AbstractTypeResolver;
use PoP\Pages\TypeDataResolvers\PageTypeDataResolver;

class PageTypeResolver extends AbstractTypeResolver
{
    public const NAME = 'Page';

    public function getTypeName(): string
    {
        return self::NAME;
    }

    public function getId($resultItem)
    {
        $cmspagesresolver = \PoP\Pages\ObjectPropertyResolverFactory::getInstance();
        $page = $resultItem;
        return $cmspagesresolver->getPageId($page);
    }

    public function getTypeDataResolverClass(): string
    {
        return PageTypeDataResolver::class;
    }
}

