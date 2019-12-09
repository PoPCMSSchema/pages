<?php
namespace PoP\Pages\TypeResolvers;

use PoP\ComponentModel\TypeResolvers\AbstractTypeResolver;
use PoP\Pages\TypeDataResolvers\PageTypeDataResolver;

class PageTypeResolver extends AbstractTypeResolver
{
    public const TYPE_COLLECTION_NAME = 'pages';

    public function getTypeCollectionName(): string
    {
        return self::TYPE_COLLECTION_NAME;
    }

    public function getId($resultItem)
    {
        $cmspagesresolver = \PoP\Pages\ObjectPropertyResolverFactory::getInstance();
        $page = $resultItem;
        return $cmspagesresolver->getPageId($page);
    }

    public function getIdFieldTypeDataResolverClass(): string
    {
        return PageTypeDataResolver::class;
    }
}

