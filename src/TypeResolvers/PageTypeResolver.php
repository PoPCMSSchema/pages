<?php
namespace PoP\Pages\TypeResolvers;

use PoP\Pages\TypeDataLoaders\PageTypeDataLoader;
use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\ComponentModel\TypeResolvers\AbstractTypeResolver;

class PageTypeResolver extends AbstractTypeResolver
{
    public const NAME = 'Page';

    public function getTypeName(): string
    {
        return self::NAME;
    }

    public function getSchemaTypeDescription(): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        return $translationAPI->__('Representation of a page', 'pages');
    }

    public function getId($resultItem)
    {
        $cmspagesresolver = \PoP\Pages\ObjectPropertyResolverFactory::getInstance();
        $page = $resultItem;
        return $cmspagesresolver->getPageId($page);
    }

    public function getTypeDataLoaderClass(): string
    {
        return PageTypeDataLoader::class;
    }
}

