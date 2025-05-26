<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Pdf;

use Mpdf\Mpdf;

use Arikaim\Core\Extension\Module;

class Pdf extends Module
{
    /**
     * Install module
     *
     * @return void
     */
    public function install()
    {
        $this->registerService('Pdf');
    }

    /**
     * Get instance
     *
     * @return Mpdf
     */
    public function getMpdf()
    {
        return $this->mpdf;
    }
}
