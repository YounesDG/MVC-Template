<?php

namespace DGRSDT_CANDIDAT;

/**
 *  PNTPI configuration
 *
 */
class Config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'pntpi';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'Ppsa_DG';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'Pps@Dg20';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

    /**
     * Visibility Local|Public
     * @var boolean
     */
    const IS_PUBLIC = true;

    /**
     * IP Range , these two constatnts are used if IS_PUBLIC = false
     * @var string
     */
    const START_LOCAL_IP = "192.168.0.1";
    const END_LOCAL_IP = "192.168.254.254";
}
