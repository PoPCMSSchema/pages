<?php
namespace PoP\Pages\TypeDataLoaders;
use PoP\LooseContracts\Facades\NameResolverFacade;
use PoP\ComponentModel\TypeDataLoaders\AbstractTypeQueryableDataResolver;

class PageTypeDataLoader extends AbstractTypeQueryableDataResolver
{
    public function getDataquery()
    {
        return GD_DATAQUERY_PAGE;
    }

    public function getObjects(array $ids): array
    {
        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
        $query = array(
            'include' => $ids,
        );
        return $cmspagesapi->getPages($query);
    }

    public function getDataFromIdsQuery(array $ids): array
    {
        $query = array();
        $query['include'] = $ids;
        $query['page-status'] = [
            POP_PAGESTATUS_PUBLISHED,
            POP_PAGESTATUS_DRAFT,
            POP_PAGESTATUS_PENDING,
        ]; // Status can also be 'pending', so don't limit it here, just select by ID
        return $query;
    }

    public function executeQuery($query, array $options = [])
    {
        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
        return $cmspagesapi->getPages($query, $options);
    }

    protected function getOrderbyDefault()
    {
        return NameResolverFacade::getInstance()->getName('popcms:dbcolumn:orderby:pages:date');
    }

    protected function getOrderDefault()
    {
        return 'DESC';
    }

    public function executeQueryIds($query): array
    {
        $options = [
            'return-type' => POP_RETURNTYPE_IDS,
        ];
        return (array)$this->executeQuery($query, $options);
    }

    protected function getQueryHookName()
    {
        return 'Dataloader_PageList:query';
    }
}
