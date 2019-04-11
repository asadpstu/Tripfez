<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TripFez</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">

</head> 

<body>

       
 
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">TripFez</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <!--
                
            --->
          </div><!--/.navbar-collapse -->
        </div>
      </nav>
  
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron" style="padding-bottom:0px!important">
        <div class="container">
          <p style="padding-top:10px;">
                <h4></h4> 
                <label style="font-size:18px;font-weight:400;margin-right:15px;">Probable  Booking Date: </label> 
                <input type="text" name="date" id="date" alt="date" class="IP_calendar btn btn-default " title="Y-m-d" readonly>
                <button class="btn btn-default" id="search" role="button" onclick="search()">Search <i class="fa fa-search-plus" aria-hidden="true"></i></i>
                <button class="btn btn-danger" id="continue" role="button" onclick="booking()" style="float:right;display:none;width:150px">Continue Booking (<span id="count" style="font-weight:bolder">0</span>)</button>
                <button class="btn btn-warning" id="selection" role="button" onclick="showhide()" style="float:right;display:none;margin-right:10px;width:150px">Show Selection </button>
               
                </p>
          
        </div>
      </div>

        <div class="container">
        <!-- Example row of columns -->
            <input id="roomNumber" type="text" value="" style="display:none;"/>
            <div class="row">
            
                <div class="table-responsive" id="show-hide" >
                    <table id="records_table"  class="table table-bordered" style="padding:2px!important;display:none">
                            <tr>
                                <th>Sl</th>
                                <th>Room Number</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                    </table> 
                    <div id="main-logic" style="display:none">
                     Main Logic
                    </div>
                </div>  
            </div>
              <!-- Modal -->
                <div class="modal fade " id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content " >
                        
                        <div class="modal-body">
                        <p>Not allowed to select more than three(3) rooms.</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    
                    </div>
                </div> 
              <!--Modal-->
            <!-- modal -->
            <div id="myModal-confirm" class="modal modal-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-body" align="center">
                            
                            <button class="btn btn-primary " style='width:200px;' data-dismiss="modal" aria-hidden="true">Not Now</button>
                            <button class="btn btn-success" style='width:200px;' id="SubForm" onclick="reconfirm()">Yes, Proceed</button>

                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <!-- end modal -->
               

             

 
        </div>
  
<div style="position:fixed;bottom:0px;width:100%;height:25px;background-color:black;color:#FFF;">
     <p align='center'> Copyright &copy; 2018 Tripfez. All rights reserved.</p>
</div>
  

    
    <!--Js-->
    <script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/dynamic-room.js"></script>



  </body>
</html>
 



    




