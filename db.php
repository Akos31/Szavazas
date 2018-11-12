<?php

define("DB_HOST", "localhost");
define("DB_NAME", "szavazasok");
define("DB_PASSWORD", "");
define("DB_USER", "root");



class DB {
    private $dbconn;

    public function __construct() {}

    private function disconnect() {
        $this->dbconn->close();
    }

    private function connect() {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ( $conn->connect_error ) {
            die('Nincs kapcsolat az adatbazissal!');
        }
        $utf8_char = $conn->query( "SET CHARACTER SET 'utf8'" );
        $utf8_set = $conn->query( "SET NAMES 'utf8'" );
        if ( ( $utf8_char === FALSE ) || ( $utf8_set === FALSE ) ) {
            throw new Exception('Nem lehet kiválasztani a megfelelő karakterkészletet!');
        }
        $this->dbconn = $conn;
    }

    public function getName() {
        return DB_NAME;
    }

    /**
     * runs the SQL statement (UPDATE, DELETE, INSERT)
     * params:
     *              sql         the text of the SQL statement that should be executed
     *
     * returns
     *      NULL if the connection failed
     *      FALSE if there was an error
     *      TRUE on success
     */
    public function update( $sql ) {
        $this->connect();
        try {
            $return = $this->dbconn->query( $sql );
            $this->disconnect();
            return $return;
        } catch (Exception $e) {
            return null;
        }
    }
    public function updateReturnID( $sql ) {
        $this->connect();
        try {
            $return = $this->dbconn->query( $sql );
            if ( $return ) {
                $return = $this->dbconn->insert_id;
            }
            $this->disconnect();
            return $return;
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * runs the SQL statement (SELECT)
     * params:
     *              sql         the text of the SQL statement that should be executed
     *
     * returns
     *      NULL if the connection failed or there was no result
     *      an array that contains the result rows of the executed statement
     */
    public function query( $sql ) {
        $this->connect();
        try {
            $result = $this->dbconn->query( $sql );
            $this->disconnect();

            // if there was no result
            if ( !$result ) { return null; }

            // if there were results we should place it into an array
            $return = array();
            while ( $row = $result->fetch_assoc() ) {
                $return[] = $row;
            }

            return $return;
        } catch (Exception $e) {
            return null;
        }
    }

    public function queryGetOne( $sql ) {
        $this->connect();
        try {
            $result = $this->dbconn->query( $sql );
            $this->disconnect();

            // if there was no result
            if ( !$result ) { return null; }

            // if there were results we should place it into an array
            $return = array();
            while ( $row = $result->fetch_assoc() ) {
                $return[] = $row;
            }

            if ( count( $return ) == 0 ) return null;

            return $return[0];
        } catch (Exception $e) {
            return null;
        }
    }

    public function getColumnNames( $table ) {
        $sql = "SELECT `COLUMN_NAME` 
                FROM `INFORMATION_SCHEMA`.`COLUMNS` 
                WHERE `TABLE_NAME`='$table';";
        return $this->query( $sql );
    }

}