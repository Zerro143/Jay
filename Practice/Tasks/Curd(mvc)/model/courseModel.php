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

    //insert record
    public function insertRecord($obj){
        try{
            
            $this->open_db();
            //$r1 = $this->condb->prepare("SELECT * FROM course WHERE id=?");
            //$r1->bind_param("s",$obj->course);
            //$r1->execute();
            //$r2=$r1->get_result();

            //$tr = $r2->num_rows;
            //if($tr==0){
                $query=$this->condb->prepare("INSERT INTO course(course) VALUES(?)");
                $query->bind_param("s",$obj->course);
                $query->execute();
               // return $tr;
          //  }else{ return $tr;}
            

            
        }
        catch(Exception $e){
            $this->close_db();
            throw $e;
        }
    }

    public function selectRecord($course_id){
        try{
            $this->open_db();
          
            $query=$this->condb->prepare("SELECT * FROM course");

            $query->execute();
            $res=$query->get_result();
            while($row = mysqli_fetch_array($res)){
                $data[]= $row;
            }
            $query->close();
            $this->close_db();
          
            return $data;
        }
        catch(Exception $e){
            $this->close_db();
            throw $e;
        }
    }


}
?>