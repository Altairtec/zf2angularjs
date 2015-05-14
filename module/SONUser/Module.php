<?php

namespace SONUser;

class Module {
    
    public function getServiceConfig(){
        return array(
            'factories' => array(
                'SONUser\Auth\DoctrineAdapter' => function($sm){
                    return Auth\DoctrineAdapter($sm->get('Doctrine\ORM\EntityManager'));            
                }
            ),
        );                
    }
    
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ),
            ),
        );
    }
    
    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }
    
}
