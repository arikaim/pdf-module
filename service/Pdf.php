<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Pdf\Service;

use Mpdf\Mpdf;

use Arikaim\Core\Service\Service;
use Arikaim\Core\Service\ServiceInterface;

/**
 * Pdf service class
*/
class Pdf extends Service implements ServiceInterface
{
    /**
     * Init service
     */
    public function boot()
    {
        $this->setServiceName('pdf');        
    }

    /**
     * Create mpdf instance
     *
     * @param array $options
     * @return Mpdf
     */
    public function create($options = []): Mpdf
    {
        $options = (empty($options) == true) ? $options = ['mode' => 'utf-8'] : $options;
        
        return new Mpdf($options);
    }


    /**
     * Write html code to pdf
     * @param string $html
     * @param array $options
     */
    public function writeHTML(string $html, array $options = [])
    {
        $mpdf = $this->create($options);
        $mpdf->WriteHTML($html);
           
        return $mpdf->Output();
    }

    /**
     * Create pdf from html component
     * @param string $componentName
     * @param array $params
     * @param array $options
     */
    public function createFromComponent(string $componentName, array $params = [], array $options = []) 
    {
        global $arikaim;

        $component = $arikaim
            ->get('page')
            ->renderHtmlComponent($componentName,$params,'en','html');      
            
        $mpdf = $this->create($options);
        $mpdf->WriteHTML($component->getHtmlCode());
        
        return $mpdf->Output();
    } 
}
