<?php

namespace SONUser\Auth;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Doctrine\ORM\EntityManager;

class DoctrineAdapter implements AdapterInterface {
    
    /**
     * @var Doctrine\ORM\EntityManager; 
     */
    protected $em;
    protected $username;
    protected $Password;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;        
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function setPassword($Password) {
        $this->Password = $Password;
        return $this;
    }
    
    public function authenticate() {
        $repository = $this->em->getRepository('SONUser\Entity\User');
        $user = $repository->findBy(array('username' => $this->getUserName(), 
            'password' => $this->getPassword()));
        
        if ($user){
            return new Result(Result::SUCCESS, array('user' => $user), array(true));
        } else {
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array(false));
        }
    }
}
