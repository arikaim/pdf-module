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

use Arikaim\Core\Utils\Utils;
use Arikaim\Core\Extension\Module;
use Arikaim\Modules\Pdf\Facade\Pdf as PdfFacade;

class Pdf extends Module
{
    /**
     * Mpdf instance
     *
     * @var Mpdf
     */
    private $mpdf;

    /**
     * Constructor
     */
    public function __construct()
    {       
        $this->setServiceName('pdf');  
        $this->mpdf = $this->create();
    }

    /**
     * Create mpdf instance
     *
     * @param array $options
     * @return Mpdf
     */
    public function create($options = [])
    {
        $options = (empty($options) == true) ? $options = ['mode' => 'utf-8'] : $options;
        
        return new Mpdf($options);
    }

    /**
     * Call Mpdf method
     *
     * @param string $method
     * @param mixed $args
     * @return mixed
     */
    public function __call($method, $args) 
    {
        return Utils::call($this->mpdf,$method,$args);       
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

    /**
     * Return true if module is installed
     *
     * @return boolean
     */
    public function test()
    {
        try {           
            PdfFacade::WriteHTML('Test');
            if (class_exists('\Mpdf\Mpdf') == false) {
                throw new \Exception("Composer package mpdf/mpdf not installed");               
            }
        } catch(\Exception $e) {
            $this->error = $e->getMessage();         
            return false;
        }

        return true;
    }
}
