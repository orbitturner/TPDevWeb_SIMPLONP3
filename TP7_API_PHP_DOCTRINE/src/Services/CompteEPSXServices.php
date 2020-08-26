<?php
namespace Orbit\Services;

use Orbit\Models\CompteEPSXModel;
use Orbit\System\Services;

class CompteEPSXServices extends Services{

    
    public function __construct($entityManager, $requestMethod, $methodParams)
    {
        // Defining The Service Model
        $modelClass = new CompteEPSXModel($entityManager);
        // Constructing Parent with Necessary Params
        parent::__construct($modelClass, $entityManager, $requestMethod, $methodParams);
        
    }
    
}