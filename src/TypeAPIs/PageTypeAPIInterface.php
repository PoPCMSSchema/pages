<?php

declare(strict_types=1);

namespace PoP\Pages\TypeAPIs;

/**
 * Methods to interact with the Type, to be implemented by the underlying CMS
 */
interface PageTypeAPIInterface
{
    /**
     * Indicates if the passed object is of type Page
     *
     * @param [type] $object
     * @return boolean
     */
    public function isInstanceOfPageType($object): bool;
}
