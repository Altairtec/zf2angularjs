<?php

namespace SONRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class ProdutoController extends AbstractRestfulController {
    
    //GET    
    public function getList(){
        
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Produto')->findAll();         
        return $data;
    }
    
    //GET
    public function get($id){
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Produto')->find($id);         
        return $data;        
    }
    
    //POST
    public function create($data){
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        
        $produto = $serviceProduto->insert($data);
        if ($produto){
            return $produto;            
        } else {
            return array('success' => false);
        }        
    }
    
    //PUT
    public function update($id, $data){
        $serviceCategoria = $this->getServiceLocator()->get('Application\Service\Produto');
        $param['id'] = $id;
        $param['nome'] = $data['nome']; 
        $param['descricao'] = $data['descricao'];
        $param['categoriaId'] = $data['categoriaId'];        
        
        $categoria = $serviceCategoria->update($param);
        if ($categoria){
            return $categoria;            
        } else {
            return array('success' => false);
        }            
    }
        
    //DELETE
    public function delete($id){
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        $result = $serviceProduto->delete($id);
        return $result;
    }
    
}
