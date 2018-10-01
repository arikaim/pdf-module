<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c) 2017-2018 Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license.html
 * 
*/
namespace Arikaim\Modules\Pdf\Facade;

use Arikaim\Core\Utils\StaticFacade;

class Pdf extends StaticFacade
{
    public static function getInstanceClass()
    {
        return 'Arikaim\\Modules\\Pdf\\Pdf';
    }

    public static function getContainerItemName()
    {
        return 'pdf';
    }
}
