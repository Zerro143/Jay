<html>
    <head>
        <style>
  
            .col-25 {
              text-align: center;
              float: Left;
              width: 16%;
              margin-top: 6px;
            }
            .col-75 {
              float: left;
              width: 75%;
              margin-top: 6px;
            }
            .row:after {
              content: "";
              display: table;
              clear: both;
            }
        
            form{
                align-self: center;
            }
            .studentform{
              display: block;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="studentForm">
                <form name="student" method="post">
          
            <div class="row">
            <input id= "did"type="hidden" name="id" value="">
              <div class="col-25">
                <label for="fname">First Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="fname" placeholder="Your name.."value="">
                <span class="error"id = "ferr">* </span>
              </div>

            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Last Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lname" placeholder="Your last name.." value="">
                <span class="error" id = "lerr">* </span>
              </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Birth Date</label>
                </div>
                <div class="col-75">
                    <input type="date" name="bdate" max="2013-01-01" id="bdate"value="">
                    <span class="error" id="bderr">*</span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="m">Mobile no:</label>
                </div>
                <div class="col-75">
                    <input type="phone" id="m" name="m"placeholder="Mobile no." value="">  
                    <span class="error"id = "merr">* </span>
                </div>
            </div>
                <div class="row">
                    <div class="col-25">
                        <label for="mail">Email:</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="mail" name="mail"placeholder="Email" value="">  
                        <span class="error" id="mailerr">* </span>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-25">
                        <label for="course">Course:</label>
                    </div>
                    <div class="col-75">
                    <select id = "course1" class = "course "name = "course">
                    </select> 
                    <span class="error">* </span>
                  </div>
                </div>

            </form>

        </div>
      </div>
    </body>
</html>