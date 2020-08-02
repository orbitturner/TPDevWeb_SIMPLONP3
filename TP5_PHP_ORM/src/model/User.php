<?php
namespace Orbit\src\model;
use Orbit\libs\core\Model;
    // require_once('../libs/core/Model.php');
    

    class User extends Model{
        public function __construct()
        {
            parent::__construct();
            // var_dump($this->findPhysiqueByNum('BP-TEST-DEV-001'));
        }


        //==================|TROUVER UN ETAT PAR SON ID|==================    
        public function findUserById($id){
            return $this->db->createQueryBuilder()->select('u')
            ->from('User', 'u')
            ->where('u.id = :identifier')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getSingleResult();
            
        }
    }
?>