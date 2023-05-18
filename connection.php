<?php

class DatabaseConnection {
    private $config;
    private $connect;
    private $driver;

    public function __construct($driver)
    {
        $this->driver = $driver;
        $this->setConfiguration();
    }

    private function setConfiguration() {
        $appConfig = include_once './config.php';
        $this->config = $appConfig['db'][$this->driver];
    }

    private function getConfiguration() {
        return $this->config;
    }

    private function createConnection()
    {
        $config = $this->getConfiguration();
        $connect = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);

        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        } else {
            $this->connect = $connect;
        }
    }

    public function getConnection()
    {
        if (!$this->connect) {
            $this->createConnection();
        }
        return $this->connect;
    }

    public function closeConnection()
    {
        $this->connect->close();
    }
}