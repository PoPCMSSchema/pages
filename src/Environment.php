<?php

declare(strict_types=1);

namespace PoP\Pages;

class Environment
{
    public const PAGE_LIST_DEFAULT_LIMIT = 'PAGE_LIST_DEFAULT_LIMIT';
    public const PAGE_LIST_MAX_LIMIT = 'PAGE_LIST_MAX_LIMIT';

    public static function addPageTypeToCustomPostUnionTypes(): bool
    {
        return isset($_ENV['ADD_PAGE_TYPE_TO_CUSTOMPOST_UNION_TYPES']) ? strtolower($_ENV['ADD_PAGE_TYPE_TO_CUSTOMPOST_UNION_TYPES']) == "true" : false;
    }
}
