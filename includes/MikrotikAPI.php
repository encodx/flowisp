<?php
// includes/MikrotikAPI.php

// Ensure this file is not accessed directly
if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
    die('Access denied.');
}

// Autoload Composer dependencies
// This path is relative to the file including it. Let's use an absolute path from the project root.
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}

use PEAR2\Net\RouterOS\Client;
use PEAR2\Net\RouterOS\Request;
use PEAR2\Net\RouterOS\Response;
use PEAR2\Net\RouterOS\Exception as RouterOSException;

class MikrotikAPI {
    private $client;
    private $connected = false;

    /**
     * Attempts to connect to the MikroTik router.
     * @param string $host
     * @param string $user
     * @param string $pass
     * @param int $port
     * @param int $timeout
     */
    public function __construct(string $host, string $user, string $pass, int $port = 8728, int $timeout = 3) {
        try {
            // The last argument is 'legacy' mode, which we'll keep false.
            $this->client = new Client($host, $user, $pass, $port, false, $timeout);
            $this->connected = true;
        } catch (RouterOSException $e) {
            // A connection error occurred (e.g., timeout, wrong credentials)
            $this->connected = false;
        }
    }

    /**
     * Checks if the client is connected.
     * @return bool
     */
    public function isConnected(): bool {
        return $this->connected;
    }

    /**
     * Fetches system resource information (uptime, cpu-load, etc.).
     * @return array|null
     */
    public function getResources() {
        if (!$this->isConnected()) {
            return null;
        }
        try {
            $request = new Request('/system/resource/print');
            $response = $this->client->sendSync($request);

            // The 'find' method returns the first response of a certain type
            if ($response->getType() === Response::TYPE_DATA) {
                 return $response->getUnsafeAttributes();
            }
            return null;
        } catch (RouterOSException $e) {
            // Error during command execution
            return null;
        }
    }

    /**
     * A simple ping test to a given address.
     * Note: This can be slow.
     * @param string $address
     * @return array
     */
    public function ping(string $address = '8.8.8.8', int $count = 1) {
        if (!$this->isConnected()) {
            return [];
        }
        $request = new Request('/ping');
        $request->setArgument('address', $address);
        $request->setArgument('count', $count);
        
        $responses = $this->client->sendSync($request)->getAllOfType(Response::TYPE_DATA);
        
        $results = [];
        foreach ($responses as $response) {
            $results[] = $response->getUnsafeAttributes();
        }
        return $results;
    }
}
