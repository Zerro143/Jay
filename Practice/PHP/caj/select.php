<?php
include("connection.php");

$sql="select * from posts";
$result = mysqli_query($conn,$sql);


echo ' <tr>
	 <th>Sr.No</th>
	 <th>Date</th>
	 <th>Title</th>
	 <th>Description</th>
	 <th>Edit</th>
	 <th>Delete</th>
	 </tr>';

$i=1;
while($data=mysqli_fetch_array($result))
{
	 echo '
	
	 <tr>
	 <td>'.$i.'</td>
	  <td>'.$data['post_at'].'</td>
        <td>'.$data['post_title'].'</td>
        <td>'.$data['description'].'</td>
        <td><a href="edit.php?edit_id='.$data['id'].'">edit</a></td>
		<td><a href="index.php?del_id='.$data['id'].'" >delete</a></td>
      </tr>';
	  
	  $i++;
}

?>
