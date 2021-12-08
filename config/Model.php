<?php

class Model {
    public function __construct() {
        /**
         * Seta o nome da tabela com o nome da Model que a instanciou.
         */
        $this->table = strtolower(get_class($this))."s";
    }

    /**
     * Cria a conexão com o banco.
     * 
     * @return function -> conexão.
     */
    private function connect() {
        $HOST = 'localhost';
        $DATABASE = 'template';
        $USER = 'root';
        $PASSWORD = '';

        return new PDO("mysql:host=$HOST;dbname=$DATABASE", $USER, $PASSWORD);
    }

    /**
     * Executa um insert no banco.
     * 
     * @param {array}
     */
    public function create($data) {
        if(array_keys($data) != $this->rows) return false; // Valida se os campos passados são autorizados.

        $keys = implode(',', array_keys($data));
        $values = implode(',', $data);

        $query = "INSERT INTO $this->table($keys) VALUES ($values)";
        $conn = $this->connect();
        $sql = $conn->prepare($query);
        $sql->execute();

        return $sql;
    }

    /**
     * Realiza um delete no banco.
     * 
     * @param {int} $id
     */
    public function delete($id) {
        $conn = $this->connect();
        $sql = $conn->prepare("DELETE FROM $this->table WHERE id = $id");
        $sql->execute();

        return $sql;
    }

    /**
     * Executa um select no banco.
     * 
     * @param {string} $id.
     * 
     * @return {array} -> dados da resultantes da consulta.
     */
    public function get($cond = null) {
        $conn = $this->connect();

        if($cond !== null) {
            $query = "SELECT * FROM $this->table $cond";
        } else {
            $query = "SELECT * FROM $this->table";
        }

        $sql = $conn->prepare($query);
        $sql->execute();
        
        $result = json_encode($sql->fetchAll());
        var_dump($result);
        return $result;
    }
}

