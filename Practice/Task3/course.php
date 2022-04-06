<style>

.col-2{
  text-align: center;
  margin-top: 6px;
  
}
.col-1{
  text-align: center;
  margin-top: 6px;
}

</style>


<html>
    <head>
        <title>Student Grid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    </head>
</html>
<body>
<div class="container">
     
  <div class="row">
        <div class="col-2">
            Course ID
        </div>
        <div class="col-2">
            Course Name
        </div>
        
         
    </div>
    <div class="row">
    
        <div class="col-2">
             1
        </div>
        <div class="col-2">
             PHP
        </div>
        <div class="col-2">
            <button onclick="add()">Add</button>
            <button onclick="edit()">Edit</button>
            <button onclick="del()">Delete</button>
            <script>
                function add() {
                  let text;
                  let course = prompt("Enter the Course Name:", "Java");
                  if (course == null || course == "") {
                    text = "No Course was added.";
                  } else {
                    text =  course + " Was added to course";
                  }
                  document.getElementById("demo").innerHTML = text;
                }
            </script>
            
            
           

            
        </div>
        
        
         
    </div>
  </div>
  
</div>
<div class="container">
        <p id="demo"></p>
</div>
</body>