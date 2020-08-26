<?php
namespace Orbit\Services;

use Orbit\Models\ClientPhysiqueModel;

class ClientServices {

    private $db;
    private $requestMethod;
    private $methodParams;

    private $entityModel;

    public function __construct($entityManager, $requestMethod, $methodParams)
    {
        $this->db = $entityManager;
        $this->requestMethod = $requestMethod;
        $this->methodParams = $methodParams;

        $this->entityModel = new ClientPhysiqueModel($entityManager);
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->methodParams) {
                    $response = $this->getEntity($this->methodParams);
                } else {
                    $response = $this->getAllEntities();
                };
                break;
            case 'POST':
                $response = $this->createEntityFromRequest();
                break;
            case 'PUT':
                $response = $this->updateEntityFromRequest($this->methodParams);
                break;
            case 'DELETE':
                $response = $this->deleteEntity($this->methodParams);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getAllEntities()
    {
        $result = $this->entityModel->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function getEntity($id)
    {
        $result = $this->entityModel->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function createEntityFromRequest()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        if (! $this->validateClient($input)) {
            return $this->unprocessableEntityResponse();
        }
        $this->entityModel->insert($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
    }

    private function updateEntityFromRequest($id)
    {
        $result = $this->entityModel->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        if (! $this->validateClient($input)) {
            return $this->unprocessableEntityResponse();
        }
        $this->entityModel->update($id, $input);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function deleteEntity($id)
    {
        $result = $this->entityModel->find($id);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $this->entityModel->delete($id);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function validateClient($input)
    {
        if (! isset($input['firstname'])) {
            return false;
        }
        if (! isset($input['lastname'])) {
            return false;
        }
        return true;
    }

    private function unprocessableEntityResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}