<?php

namespace SONRest;

use Zend\Mvc\MvcEvent;

class Module {

    public function onBootstrap(MvcEvent $e){
        $sharedEvents = $e->getApplication()->getEventManager()->getSharedManager();
        $sharedEvents->attach('Zend\Mvc\Controller\AbstractRestfulController', 
                MvcEvent::EVENT_DISPATCH, 
                array($this, 'postProcess'), 
                -100);
    }
    
    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'SONRest\Service\ProcessJson' => function($sm) {
            $serializer = $sm->get('jms_serializer.serializer');
            return new Service\ProcessJson(null, null, $serializer);
        },
        ));
    }

    public function postProcess(MvcEvent $e) {
        $processJson = $e->getTarget()->getServiceLocator()->get('SONRest\Service\ProcessJson'); 
        $data = $e->getResult();
        $response = new \Zend\Http\Response();
       
        $processJson->setResponse($response)
                ->setData($data);
        
        return $processJson->process();
    }

}
