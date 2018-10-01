<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c) 2017-2018 Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license.html
 * 
*/
namespace Arikaim\Modules\Pdf;

use Arikaim\Core\Utils\Utils;
use Arikaim\Core\Module\Module;
use Arikaim\Core\Module\ModulesManager;
use Arikaim\Core\Form\Properties;
use Arikaim\Modules\Pdf\Facade\Pdf as PdfFacade;

class Pdf extends Module
{
    private $mpdf;

    public function __construct()
    {
        $properties = new Properties(ModulesManager::getModuleConfigFileName('pdf'));
        $config = $properties->toArray();
     
        $this->mpdf = new \Mpdf\Mpdf($config);
        $this->setBootable(false);
    }

    public function __call($method, $args) 
    {
        return Utils::call($this->mpdf,$method,$args);       
    }

    public function get()
    {
        return $this->mpdf;
    }

    public function test()
    {
        try {
            PdfFacade::WriteHTML('Test');
        } catch(\Exception $e) {
            $this->error = $e->getMessage();         
            return false;
        }
        return true;
    }
}
