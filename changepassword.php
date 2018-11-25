<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password </title>
    <!--META TAGS-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="assets/images/Qonly.png">

    <!--BOOTSTRAP CSS STYLE-->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!--Font Awesome css-->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="assets/js/chartist-js-develop/dist/chartist.min.css" rel="stylesheet" type="text/css">

    <!--CUSTOME CSS-->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="assets/css/login.css" rel="stylesheet" type="text/css">
</head>
<body>

<main>

    <nav class="navbar">
        <div class="col-md-12">
            <a class="navbar-brand" href="Login.php"><img src="assets/images/logo.png"></a>
            <ul class="navbar-nav pull-right">
                <li class="nav-item dropdown user-dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><img src="assets/images/en-flag.png"> </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><img src="assets/images/ar-flag.png" class="img-fluid"></a>
                    </div>
                </li>
            </ul>
            <!--</div>-->
        </div>
    </nav>

    <section>
        <div>
            <h1 class="text-center">Change Password of user <span id="myname"></span> </h1>
            <div class="col-md-4 offset-md-4">
                <form class="dr-form">
                    <div class="form-group  ">
                        <label class="">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon "><img src="assets/images/password-icon.png"></div>
                            <input id="userPassword1" type="password" class="form-control passin">
                        </div>
                    </div>
                    <div class="form-group  ">
                        <label class="">confirm Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon"><img src="assets/images/password-icon.png"></div>
                            <input id="userPassword" type="password" class="form-control passin">
                        </div>
                    </div>
                    <button type="submit"id="change" style="cursor: pointer;" class="btn btn-submit col-md-8 offset-md-2">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>
<!--JAVA SCRIPT-->
<!--JQUERY SCROPT-->
<script src="assets/js/jquery.min.js"></script>

<!--BOOTSTRAP SCRIPT-->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script>
		var passcheck="22:333:33";
		var passchecknew="323:3443:34"
		var passchanged=0;
 var myid="<?php echo $_REQUEST['myid'] ?>";
 var myname="<?php echo $_REQUEST['name'] ?>";
			$.get("./pumpy.php", { req:"etcdget.py", name:"logged/"+myname},function(data){ 
	var data2=data.replace(" ","").replace('\n','');
	if (myid != data2) { 
	   console.log('username',myname)
           console.log('myid,data2',myid,'and',data2)
		document.getElementById('Login'+'ref').submit();
 	}		;
				});
		$(document).keypress(
			function(event){
				if(event.which == '13') {
					event.preventDefault();
				}
			});
		function refreshall(){
			$.get("requestdatein.php", { file: "Data/userpass.txtupdated" }, function(data){
				var objdate = jQuery.parseJSON(data);
				passchecknew=objdate.updated;
			});
			if(passchanged==1 && passchecknew != passcheck) { $("#logagain").submit(); }
			else  {  passcheck=passchecknew; }
		}
 $("#head2").text("Change "+myname+" Password");
 $("#wrong").show(); $("#change").hide();$("#changed").hide();
 $(".passin").keyup(function(){
	 
	 if($("#userPassword1").val() != $("#userPassword").val()|| $("#userPassword1").val() =="") {
	 	$("#userPassword1").addClass("NotComplete"); $("#userPassword").addClass("NotComplete");
		$("#wrong").show(); $("#change").hide();
	 }
	 else {
		 $("#wrong").hide(); $("#change").show();
	 }
	});
 $("#change").click(function() {
	 var passchecknew="34:433:43534";
	 $.post("./pump.php", { req:"UnixChangePass", name:"'"+$("#userPassword1").val()+"'", passwd:myname+" "+myname}, function (data){});
	 passchanged=1;
	 $("#change").hide(); $("#changed").show();
	 
	});
	 setInterval('refreshall()', 1000);

</script>

</body>
</html>
