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

		public function select_studentRecord($id)
		{
			try
			{
                $this->open_db();
                if($id>0)
				{	
					$query=$this->condb->prepare("SELECT * FROM student WHERE id=$id");
				
				}
                else
                {$query=$this->condb->prepare("SELECT * FROM student INNER JOIN course ON student.course_id = course.course_id");	}		
				
				$query->execute();
				$res=$query->get_result();	
				$query->close();				
				$this->close_db();
				while($row = mysqli_fetch_array($res)){
                    $data[]=$row;
                }                
                return $data;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}
		public function select_courseRecord($id)
		{
			try
			{
                $this->open_db();
                if($id>0)
				{	
					$query=$this->condb->prepare("SELECT * FROM course WHERE course_id=$id");
				
				}
                else
                {$query=$this->condb->prepare("SELECT * FROM course");	}		
				
				$query->execute();
				$res=$query->get_result();	
				$query->close();				
				$this->close_db();
				while($row = mysqli_fetch_array($res)){
                    $data[]=$row;
                }                
                return $data;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function insert_student($obj)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("SELECT * FROM student WHERE email =?");
				$query->bind_param("s",$obj->mail);
				$query->execute();
				$r2= $query->get_result();
				$tr = $r2->num_rows;
				if($tr==0){
					$query=$this->condb->prepare("INSERT INTO student(`fname`, `lname`, `email`, `m`, `course_id`, `bdate`, `created_date`, `update_date`) VALUES (?,?,?,?,?,?,?,?)");
					$query->bind_param("ssssssss",$obj->fname, 
					$obj->fname,
					$obj->lname,
					$obj->bdate,
					$obj->m,
					$obj->mail,
					$obj->course,
					$obj->cdate,
					$obj->udate,);
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
		public function insert_courseRecord($obj)
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

		public function delete_stdRecord($id)
		{	
			try{
				$this->open_db();
				// echo "DELETE FROM course WHERE id=$id";
				$query=$this->condb->prepare("DELETE FROM student WHERE id=$id");
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

		public function delete_courseRecord($id)
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

		public function update_courseRecord($id,$course)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("UPDATE course SET course='$course' WHERE course_id=$id");
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