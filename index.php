<!DOCTYPE html>
<html>
<head>
	<title>Encrypt and Decrypt Strings</title>
    <link rel='shortcut icon' type='image/x-icon' href='favicon.png' /> 
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<!-- jQuery library -->
	<script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="assets/js/script.js"></script> -->

	<!-- Latest compiled JavaScript -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Latest compiled and minified CSS -->
</head>
<body>
    <div class="container">
         <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-center maintitle">Encrypt and Decrypt Strings</h3>
            </div>   
        </div><hr id="divider">
        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <input type="text" name="connectip" class="form-control" placeholder="Enter string to be encrypted" id="string">
            </div>   
        </div>
        <div class="row btnrow">
            <div class="col-md-6" style="border-right: 1px solid #cccbcb;">
                    <center><button class="btn btn-primary btn-lg" id="encryptbtn" data-target="#resultpop" name="encrypt" value="encrypt"><i class="fa fa-lock" aria-hidden="true"></i></i>Encrypt</button></center>
            </div>
            <div class="col-md-6">
                    <center><button class="btn btn-primary btn-lg" id="decryptbtn" data-target="#resultpop" name="decrypt" value="decrypt"><i class="fa fa-unlock" aria-hidden="true"></i>Decrypt</button></center>
            </div>
        </div>
        <div class="row btnrow resultdiv" style="display: none">
            <hr id="divider">
            <div class="col-md-12">
                    <center><h4><strong>Your Result:</strong></h4></center>
            </div><br>
            <div class="col-md-12">
                    <center><p id="result"></p></center>
            </div><br>
            <div class="col-md-12">
                    <center><button type="button" class="btn btn-success center-block" onclick="copyToClipboard('#result')" id="copy">Copy String</button></center>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- <div id="resultpop" class="modal fade" role="dialog">
        <div class="modal-dialog"> -->
        <!-- Modal content-->
            <!-- <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Your String</h4>
                  </div>
                <div class="modal-body">
                    <p id="result"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success center-block" onclick="copyToClipboard('#result')" id="copy">Copy String</button>
                </div>
            </div> -->
       <!--  </div>
    </div>
 -->
    <script>
        $(document).ready(function(){
            
                $("#encryptbtn, #decryptbtn").click(function(){
                $('.resultdiv').hide();
                var string  =   $("#string").val();
                var todo    =   $(this).val();
                
                if(string !== ''){

                    $.ajax({
                        url: 'function.php',
                        type:'POST',
                        data: {"string":string,"todo":todo},
                        dataType: 'json',
                        error: function(data)
                        {
                            alert("Error");
                            console.log(data);
                            $("#result").text(data);
                        },
                        success: function(data)
                        {
                            $("#copy").text("Copy String");
                            $(".resultdiv").show();
                            $("#result").text(data);
                        }
                    });
                }
                else{
                    $('.resultdiv').hide();
                    alert("Please Input String");
                }   
            });
        }); 

        function copyToClipboard(element) {
          var $temp = $("<input>");
          $("body").append($temp);
          $temp.val($(element).text()).select();
          document.execCommand("copy");
          $temp.remove();
          $("#copy").text("Copied");
        }
    </script>
</body>
</html>