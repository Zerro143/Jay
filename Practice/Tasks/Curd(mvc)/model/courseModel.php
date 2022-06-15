<?php
class courseModel{
    //ser database config for Mysql
    function __construct($consetup)
    {
        $this -> host = $consetup -> host;
        $this -> user = $consetup -> user;
        $this -> pass = $consetup -> pass;
        $this -> db = $consetup -> db;
    }

    //open mysql database
    public function open_db(){

        $this->condb = new mysqli($this->host,$this->user,$this->pass,$this->db);
        if ($this->condb->connect_error){
            die("Error in Connection: ".$this->condb->connect_error);
        }
    }
    
    public function close_db(){
        $this->condb->close();
    }

    public function selectRecord($course_id){
        try{
            $this->open_db();
          
            $query=$this->condb->prepare("SELECT * FROM course");

            $query->execute();
            $res=$query->get_result();
            $query->close();
            $this->close_db();
            return $res;
        }
        catch(Exception $e){
            $this->close_db();
            throw $e;
        }
    }


}
?>