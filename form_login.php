
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <!--Made with love by Mutiullah Samim -->
  <!--Bootsrap 4 CDN-->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Tangerine');
    html,body{
      background-image: url('https://i.pinimg.com/originals/f4/72/3d/f4723d45c3b1587b23242b07579564af.jpg');

      background-size: cover;
      background-repeat: no-repeat;
      height: 100%;
      font-family: "Sofia", sans-serif;
    }
    .container{
      height: 100%;
      align-content: center;
    }
    .card{
      height: 300px;
      margin-top: 300px;
      margin-bottom: auto;
      width: 500px;
      background-color: rgba(143,188,143,1) !important;
    }
    .social_icon span{
      font-size: 60px;
      margin-left: 10px;
      color: #FFC312;
    }
    .social_icon span:hover{
      color: white;
      cursor: pointer;
    }
    .card-header h3{
      font-size: 60px;
      color: white;
    }
    .social_icon{
      position: absolute;
      right: 20px;
      top: -30px;
    }
    .input-group-prepend span{
      width: 50px;
      background-color: #FFC312;
      color: black;
      border:0 !important;
    }
    input:focus{
      outline: 0 0 0 0  !important;
      box-shadow: 0 0 0 0 !important;
    }
    .remember{
      color: white;
    }
    .remember input
    {
      width: 20px;
      height: 20px;
      margin-left: 15px;
      margin-right: 5px;
    }
    .login_btn{
      color: black;
      background-color: #CACFD2;
      width: 170px;
    }
    .login_btn2{
      color: black;
      background-color: #CACFD2;
      width: 170px;
    }
    .login_btn:hover{
      color: black;
      background-color: white;
    }
    .links{
      color: white;
    }
    .links a{
      margin-left: 4px;
    }

    .banner {
      background-color: #F5A623;
      color: #FFFFFF;
      padding: 10px;
      text-align: center;
    }
    .banner img {
      height: 80px;
      width: 80px;
      margin-right: 50px;
      vertical-align: middle;
    }

  </style>
</head>
<body>

  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="card">
        <div class="card-header">
          <span class="glyphicon glyphicon-lock"> </span>
          <center><h2>PWO Law-Track</h2></center>

          <div class="d-flex justify-content-end social_icon">

          </div>
        </div>

        <div class="card-body">

          <form name="frmlogin" action="login.php" method="POST" class="form-horizontal" autocomplete="off">

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="Username" class="form-control" placeholder="Username" required="Username" autocomplete="off">

            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="Password" class="form-control" placeholder="Password" required="Password" id="myInput">
              <input type="button" onclick="myFunction()" class="btn btn-warning" value="*">
            </div>
            <script>
              function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
            </script>
            <div class="form-group">
              <div align="center">
               <a href="login.php">
                <input type="reset" value="Clear" class="btn btn-danger btn-sm"></a>
                <input type="submit" value="Login" class="  btn btn-primary btn-lg" style="width: 313px;" ></a>
              </div><br>



            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<!--div class="banner">
    <img src="assets/dist/img/pwo8.png" alt="PWO Logo">
    <h5>Welcome to Product Seller</h5>
  </div-->