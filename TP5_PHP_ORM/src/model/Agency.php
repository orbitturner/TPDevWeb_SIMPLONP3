<?php
namespace Orbit\src\model;
use Orbit\libs\core\Model;
    // require_once('../libs/core/Model.php');
    

    class Agency extends Model{
        public function __construct()
        {
            parent::__construct();
            // var_dump($this->findPhysiqueByNum('BP-TEST-DEV-001'));
        }


        //==================|TROUVER UNE AGENCE PAR SON ID|==================    
        public function findAgencyById($id){
            return $this->db->createQueryBuilder()->select('ag')
            ->from('Agency', 'ag')
            ->where('ag.id = :identifier')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getSingleResult();
            
        }
    }
?>