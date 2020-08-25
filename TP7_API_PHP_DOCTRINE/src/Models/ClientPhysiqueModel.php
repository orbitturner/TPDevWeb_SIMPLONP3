<?php
namespace Orbit\Models;

use ClientPhysique;

class ClientPhysiqueModel {

    private $db = null;

    public function __construct($entityManager)
    {
        $this->db = $entityManager;        
        // $clientRepository = $this->db->getRepository(ClientPhysique::class);
        
    }

    //==================|TROUVER TOUS LES CLIENTS|================== 
    /**
     * FindAll Clients
     *
     * @return array() | String()
     */
    public function findAll()
    {
        try {
            $clients = $this->db->createQueryBuilder()
            ->select('c')
            ->from(ClientPhysique::class,'c')
            ->getQuery()
            ->getArrayResult();

            return $clients;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    //==================|TROUVER UN CLIENT PAR SON ID|================== 
    /**
     * Find a Client By ID
     *
     * @param [int] $id
     * @return array() | String()
     */
    public function find($id)
    {
        try {
            $result = $this->db->createQueryBuilder()
            ->select('c')
            ->from(ClientPhysique::class, 'c')
            ->where('c.id = :identifier')
            ->orderBy('c.name', 'ASC')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getArrayResult();
            
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    //==================|TROUVER UN CLIENT PAR SON NUM|==================    
        /**
         * @return object
         */
        public function findN($numero){
            return $this->db->createQueryBuilder()->select('c')
            ->from(ClientPhysique::class, 'c')
            ->where('c.numId = :numeroClient')
            // ->orderBy('c.name', 'ASC')
            ->setParameter('numeroClient', $numero)
            ->getQuery()
            ->getArrayResult();
            
        }
    //==================|CREATION D'UN CLIENT PHYSIQUE|==================

    public function insert(Array $input)
    {
        try {
            if($this->db != null)
            {
                $client = new ClientPhysique();
                //
                $client->setNom($input['nom']);
                $client->setPrenom($input['prenom']);
                $client->setPrenom($input['prenom']);
                $client->setNumId($this->physiqueNumGen());
                $client->setEmail($input['email']);
                $client->setCni($input['cni']);
                $client->setTelephone($input['telephone']);
                $client->setAdresse($input['adresse']);
                $client->setSexe($input['sexe']);
                $client->setDateNaiss($input['dateNaiss']);
                $client->setDateCreation(Date('Ymd - H:m:s'));
                $client->setFeatures($input['features']);
                $client->setIsSalarie($input['isSalarie']);
                //
                $this->db->persist($client);
                $this->db->flush();

                return $client->getId();
            }
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE person
            SET 
                firstname = :firstname,
                lastname  = :lastname,
                firstparent_id = :firstparent_id,
                secondparent_id = :secondparent_id
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'id' => (int) $id,
                'firstname' => $input['firstname'],
                'lastname'  => $input['lastname'],
                'firstparent_id' => $input['firstparent_id'] ?? null,
                'secondparent_id' => $input['secondparent_id'] ?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        try {
            if($this->db != null)
            {
                $ClientPhysique = $this->db->find(ClientPhysique::class, $id);
                if($ClientPhysique != null)
                {
                    $this->db->remove($ClientPhysique);
                    $this->db->flush();
                    return $ClientPhysique->getId();
                }else {
                    return "Objet ".$id." does not existe!";
                }
            }
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

        //==================|GENERATION NUMERO CLIENT PHYSIQUE|==================  
        /**
         * Generer un Numero de compte 
         * @return string
         *  */  
        public function physiqueNumGen(): string{
            $highest_id = $this->db->createQueryBuilder()
            ->select('MAX(c.id)')
            ->from(ClientPhysique::class, 'c')
            ->getQuery()
            ->getArrayResult();
            $date = Date('Ymd'); //2020-07-01

            //Generate an Client Number as "TDTSB-MoisAnnee-lastIdCompte[select max(id) from compte]+1"
            $numIdClient = sprintf("BP-CP-%s-%d", $date, $highest_id+1);
            return $numIdClient;
        }
}