<?php
//creation of interface
interface Crud{
/*all this mehods have to be implemented by any class that implements these interface*/
public function save();
public function readAll();
public function readUnique();
public function search();
public function update();
public function removeOne();
public function removeAll();


}
?>