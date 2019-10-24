<?php
namespace PoP\Pages\Routing;

class PathUtils {

    public static function getPagePath($page_id)
    {
        $cmsengineapi = \PoP\Engine\FunctionAPIFactory::getInstance();
        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();

        // Generate the page path. Eg: http://mesym.com/events/past/ will render events/past
        $permalink = $cmspagesapi->getPageURL($page_id);

        $domain = $cmsengineapi->getHomeURL();

        // Remove the domain from the permalink => page path
        $page_path = substr($permalink, strlen($domain));

        // Remove the first and last '/'
        $page_path = trim($page_path, '/');

        return $page_path;
    }
}
