<?php
	
	class courseModel
	{
		
		// set database config for mysql
		function __construct($consetup)
		{
			$this->host = $consetup->host;
			$this->user = $consetup->user;
			$this->pass =  $consetup->pass;
			$this->db = $consetup->db;            					
		}
		// open mysql data base
		public function open_db()
		{
			$this->condb=new mysqli($this->host,$this->user,$this->pass,$this->db);
			if ($this->condb->connect_error) 
			{
    			die("Erron in connection: " . $this->condb->connect_error);
			}
		}
		// close database
		public function close_db()
		{
			$this->condb->close();
		}	

		// insert record
		public function insertRecord($obj)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("INSERT INTO course (course) VALUES (?)");
				$query->bind_param("s",$obj->course);
				$query->execute();
				$res= $query->get_result();
				$last_id=$this->condb->insert_id;
				$query->close();
				$this->close_db();
				return $last_id;
			}
			catch (Exception $e) 
			{
				$this->close_db();	
            	throw $e;
        	}
		}
        //update record
		public function updateRecord($obj)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("UPDATE course SET course=?,WHERE course_id=?");
				$query->bind_param("si", $obj->course,$obj->course_id);
				$query->execute();
				$res=$query->get_result();						
				$query->close();
				$this->close_db();
				return true;
			}
			catch (Exception $e) 
			{
            	$this->close_db();
            	throw $e;
        	}
        }
         // delete record
		public function deleteRecord($course_id)
		{	
			try{
				$this->open_db();
				$query=$this->condb->prepare("DELETE FROM course WHERE course_id=?");
				$query->bind_param("i",$course_id);
				$query->execute();
				$res=$query->get_result();
				$query->close();
				$this->close_db();
				return true;	
			}
			catch (Exception $e) 
			{
            	$this->close_Db();
            	throw $e;
        	}		
        }   
        // select record     
		public function selectRecord($course_id)
		{
			try
			{
                $this->open_db();
                if($course_id>0)
				{	
					$query=$this->condb->prepare("SELECT * FROM course WHERE course_id=?");
					$query->bind_param("i",$course_id);
				}
                else
                {$query=$this->condb->prepare("SELECT * FROM course");	}		
				
				$query->execute();
				$res=$query->get_result();	
				$query->close();				
				$this->close_db();                
                return $res;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}
	}

?>