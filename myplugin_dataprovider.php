<?php

class myplugin_dataprovider {
    
    private static $instance = null;
    
    private function __construct() {
    }

    public static function getInstance() {
        if (myplugin_dataprovider::$instance == null) {
            myplugin_dataprovider::$instance = new myplugin_dataprovider();
        }
        return myplugin_dataprovider::$instance;
    }
    
    public function getData() {
        $data = [
            'nome' => 'Mario',
            'cognome' => 'Rossi'
        ];
        
        return $data;
    }
    
}
