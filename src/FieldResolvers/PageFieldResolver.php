<?php
namespace PoP\Pages\FieldResolvers;

use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\ComponentModel\Schema\SchemaDefinition;
use PoP\ComponentModel\FieldResolvers\AbstractDBDataFieldResolver;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoP\Pages\TypeResolvers\PageTypeResolver;

class PageFieldResolver extends AbstractDBDataFieldResolver
{
    public static function getClassesToAttachTo(): array
    {
        return array(PageTypeResolver::class);
    }

    public static function getFieldNamesToResolve(): array
    {
        return [
			'title',
            'content',
            'url',
        ];
    }

    public function getSchemaFieldType(TypeResolverInterface $typeResolver, string $fieldName): ?string
    {
        $types = [
			'title' => SchemaDefinition::TYPE_STRING,
            'content' => SchemaDefinition::TYPE_STRING,
            'url' => SchemaDefinition::TYPE_URL,
        ];
        return $types[$fieldName] ?? parent::getSchemaFieldType($typeResolver, $fieldName);
    }

    public function getSchemaFieldDescription(TypeResolverInterface $typeResolver, string $fieldName): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $descriptions = [
			'title' => $translationAPI->__('Page\'s title', 'pop-pages'),
            'content' => $translationAPI->__('Page\'s content', 'pop-pages'),
            'url' => $translationAPI->__('Page\'s URL', 'pop-pages'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($typeResolver, $fieldName);
    }

    public function resolveValue(TypeResolverInterface $typeResolver, $resultItem, string $fieldName, array $fieldArgs = [], ?array $variables = null, ?array $expressions = null, array $options = [])
    {
        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
        $page = $resultItem;
        switch ($fieldName) {
            case 'title':
                return $cmspagesapi->getTitle($typeResolver->getId($page));

            case 'content':
                return $cmspagesapi->getContent($typeResolver->getId($page));

            case 'url':
                return $cmspagesapi->getPageURL($typeResolver->getId($page));
        }

        return parent::resolveValue($typeResolver, $resultItem, $fieldName, $fieldArgs, $variables, $expressions, $options);
    }
}
