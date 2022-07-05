<?php

abstract class Model{

    abstract public function save($connection);

    public function find($connection, string $property_name, string $property_value){
        $table_name = strtolower(get_class($this)) . "s";
        $query = "SELECT * FROM $table_name WHERE $property_name='$property_value'";
        return mysqli_query($connection, $query);
    }
}

?>