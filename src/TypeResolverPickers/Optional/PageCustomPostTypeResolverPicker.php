<?php

declare(strict_types=1);

namespace PoP\Pages\TypeResolverPickers\Optional;

use PoP\CustomPosts\TypeResolvers\CustomPostUnionTypeResolver;
use PoP\Pages\TypeResolverPickers\AbstractPageTypeResolverPicker;

class PageCustomPostTypeResolverPicker extends AbstractPageTypeResolverPicker
{
    public static function getClassesToAttachTo(): array
    {
        return [
            CustomPostUnionTypeResolver::class,
        ];
    }
}
