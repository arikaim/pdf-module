<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Pdf\Facade;

use Arikaim\Core\Utils\StaticFacade;

/**
 * Pdf static facade class
 */
class Pdf extends StaticFacade
{
    /**
     * Get instance class name
     *
     * @return string
     */
    public static function getInstanceClass()
    {
        return 'Arikaim\\Modules\\Pdf\\Pdf';
    }

    /**
     * Get container item name
     *
     * @return string
     */
    public static function getContainerItemName()
    {
        return 'pdf';
    }
}
