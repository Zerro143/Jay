<?php
	
	class crmodel
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

        // select record     
		public function selectRecord($id)
		{
			try
			{
                $this->open_db();
                if($id>0)
				{	
					$query=$this->condb->prepare("SELECT * FROM course WHERE id=?");
					$query->bind_param("i",$id);
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
		public function insertRecord($obj)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("SELECT * FROM course WHERE course =?");
				$query->bind_param("s",$obj);
				$query->execute();
				$r2= $query->get_result();
				$tr = $r2->num_rows;
				if($tr==0){
					$query=$this->condb->prepare("INSERT INTO course (course) VALUES (?)");
					$query->bind_param("s",$obj);
					$query->execute();
					return $tr;
				}
				else{
					return $tr;
				}
			}
			catch (Exception $e) 
			{
				$this->close_db();	
            	throw $e;
        	}
		}

		public function deleteRecord($id)
		{	
			try{
				$this->open_db();
				// echo "DELETE FROM course WHERE id=$id";
				$query=$this->condb->prepare("DELETE FROM course WHERE course_id=$id");
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

		public function updateRecord($obj,$obj2)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("UPDATE course SET course='$obj2' WHERE course_id=$obj");
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
	}

?>