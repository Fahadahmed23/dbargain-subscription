<?php

if(!class_exists('DBargainCheckSubscription')) {
    return;
}

class DBargainCheckSubscription
{

    public function __construct()
    {
        /**
         * include all required files
         */
        require_once __DIR__ . '/class.dbargain.api.php';

    }
}

new DBargainCheckSubscription;
