<?php

declare(strict_types=1);

namespace PoP\Pages\TypeResolvers;

use PoP\Pages\TypeDataLoaders\PageTypeDataLoader;
use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\CustomPosts\TypeResolvers\AbstractCustomPostTypeResolver;

class PageTypeResolver extends AbstractCustomPostTypeResolver
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

    public function getID($resultItem)
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
