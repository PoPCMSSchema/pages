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
    /**
     * Indicate if an page with provided ID exists
     *
     * @param [type] $id
     * @return void
     */
    public function pageExists($id): bool;
    /**
     * Get the page with provided ID or, if it doesn't exist, null
     *
     * @param int $id
     * @return void
     */
    public function getPage($id): ?object;
    /**
     * Get the list of pages
     *
     * @param array $query
     * @param array $options
     * @return array
     */
    public function getPages(array $query, array $options = []): array;
    /**
     * Get the number of pages
     *
     * @param array $query
     * @param array $options
     * @return array
     */
    public function getPageCount(array $query = [], array $options = []): int;
    /**
     * Page custom post type
     *
     * @return string
     */
    public function getPageCustomPostType(): string;
}
