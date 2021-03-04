<?php

namespace Core;

/**
 * @author Douglas Carvalho Santos
 */
class Model
{

    private $_db;
    public  $table;
    private $_query = '';


    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->_db = \Core\DBConnection::getInstance();
    }

    public function query($query) {
        $this->_db->query($query);
    }

    /**
     * @param  $data
     */
    public function insert($data)
    {
        if(is_array($data) && !empty($data)) {
            $values = '';
            $fields = '';
            $count = 0;
            foreach($data as $field => $value) {
                $fields .= $field . ($count < count($data) - 1 ? ',' : NULL);
                $values .= "'" . $value . "'" . ($count < count($data) - 1 ? ',' : NULL);
                $count++;
            }
            $query = "INSERT INTO $this->table ($fields) VALUES ($values)";
            $this->query = $query;
            // echo $query;
            $this->_db->query($query);
        }
    }

    public function update($id, $data)
    {
        if(is_array($data) && !empty($data) && $id > 0) {
            $values = '';
            $count = 0;
            foreach($data as $field => $value) {
                $values .= $field . " = '" . $value . "'" . ($count < count($data) - 1 ? ', ' : NULL);
                $count++;
            }
            $query = "UPDATE $this->table SET $values WHERE id = $id";
            $this->query = $query;
            // echo $query;
            $this->_db->query($query);
        }
    }

    public function select($fields = '*', $where = NULL, $glue = 'and') {
        if(is_array($where)) {
            $whereString = '';
            $count = 0;
            foreach($where as $field => $value) {
                $whereString .= $field . " = '$value'" . ($count < count($where) - 1 ? ' and ' : NULL);
                $count++;
            }
        }
        $query = "SELECT $fields FROM $this->table" . ($whereString != null ? " WHERE " . $whereString : NULL);
        // echo $query;
        return $this->_db->query($query);
    }

    /**
     * @param  $data
     */
    public function save($data)
    {
        if(isset($data['id']) && $data['id'] > 0) {
            $id = $data['id'];
            unset($data['id']);
            $this->update($id, $data);
            return;
        }
        $this->insert($data);
    }

    /**
     * @param  $id
     */
    public function delete($id)
    {
        // TODO implement here
    }

    /**
     * @param  $id
     */
    public function getByID($id)
    {
        $data = $this->select('*', [
            'id' => $id
        ]);

        if(count($data) > 0) {
            return $data[0];
        }
        return false;
    }

    /**
     * @param  $id
     */
    public function load($page, $where)
    {
        // TODO implement here
    }

    public function selectJoined($fields = '*', $where = NULL, $join = [], $glue = 'and') {

        $whereString = '';
        if(is_array($where)) {
            $count = 0;
            foreach($where as $field => $value) {
                $whereString .= $field . " = '$value'" . ($count < count($where) - 1 ? ' and ' : NULL);
                $count++;
            }
        }

        $joinString = '';
        if(is_array($join)) {
            foreach($join as $table => $compare) {
                $joinString .=  " LEFT JOIN $table ON $compare";
            }
        }

        $query = "SELECT $fields FROM $this->table" . ($joinString != NULL ? $joinString : NULL ) . ($whereString != null ? " WHERE " . $whereString : NULL);
        // echo $query;
        return $this->_db->query($query);

    }

}
