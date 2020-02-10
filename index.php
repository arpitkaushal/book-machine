<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Book that machine!</title>
</head>
<body class="grey lighten-3">

  <!-- NAVBAR -->
  <nav class="z-depth-0 grey lighten-4">    
    <div class="nav-wrapper container">
        
      <a href="#" class="brand-logo" style="text-decoration: none; color: #000000;">
        Book That!<!--<img src="img/logo.svg" style="width: 180px; margin-top: 10px;"> -->
      </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li class="logged-in" style="display: none;">
            <a href="#" class="grey-text modal-trigger" data-target="modal-account">Account Info</a>
          </li>
          <li class="logged-in" style="display: none;">
            <a href="#" class="grey-text" id="logout">Logout</a>
          </li>
          <li class="admin" style="display: none;">
            <a href="#" class="grey-text" id="pend-req">Pending Requests</a>
          </li>
          <li class="admin" style="display: none;">
            <a href="#" class="grey-text" id="appr-req">Approved Requests</a>
          </li>
          <li class="logged-in" style="display: block;">
            <a href="#" class="grey-text modal-trigger" data-target="modal-create">Create Booking</a>
          </li>
          <li class="logged-out" style="display: none;">
            <a href="#" class="grey-text modal-trigger" data-target="modal-login">Login</a>
          </li>
          <li class="logged-out" style="display: none;">
            <a href="#" class="grey-text modal-trigger" data-target="modal-signup">Sign up</a>
          </li>
        </span>
      </ul>
    </div>
  </nav>

  <!-- SIGN UP MODAL -->
  <div id="modal-signup" class="modal">
    <div class="modal-content">
      <h4>Sign up</h4><br />
      <form id="signup-form">
        <div class="input-field">
          <input type="email" id="signup-email" required />
          <label for="signup-email">Email address</label>
        </div>
        <div class="input-field">
          <input type="password" id="signup-password" required />
          <label for="signup-password">Choose password</label>
        </div>
        <button class="btn yellow darken-2 z-depth-0">Sign up</button>
      </form>
    </div>
  </div>

  <!-- LOGIN MODAL -->
  <div id="modal-login" class="modal">
    <div class="modal-content">
      <h4>Login</h4><br />
      <form id="login-form">
        <div class="input-field">
          <input type="email" id="login-email" required />
          <label for="login-email">Email address</label>
        </div>
        <div class="input-field">
          <input type="password" id="login-password" required />
          <label for="login-password">Your password</label>
        </div>
        <button class="btn yellow darken-2 z-depth-0">Login</button>
      </form>
    </div>
  </div>

  <!-- ACCOUNT MODAL -->   
  <div id="modal-account" class="modal">
    <div class="modal-content center-align">
      <h4>Account details</h4><br />
      <div class="account-details"></div>
      <div class="account-extras"></div>
    </div>
  </div>
 

  <!-- CREATE GUIDE MODAL -->
  <div id="modal-create" class="modal">
    <div class="modal-content" >
      <div class="row" style="height: 800px,width: 1000px;">
        <div class="col">
          <h4>Create Guide</h4><br />
          <form id="create-form">
            <div class="input-field">
              <input type="number" id="roll" required>
              <label for="roll">Roll No</label>
            </div>
            <div class="input-field">
              <input type="number" id="contact" required>
              <label for="contact">Contact No.</label>
            </div>
            
            <div class="input-field">
              Start date and time *
              <br/>Date:
                <select class="custom-select mr-sm-2" id="stseldd" style="width:15%;" onblur="valdd()">
                    <option selected>dd</option>
                    <?php
                      for ($i = 1; $i <= 31; $i++) {
                          echo "<option value=\"$i\">$i</option><br>";
                      }
                    ?>
                </select>
                <select class="custom-select mr-sm-2" id="stselmm" style="width:15%;" onblur="valmm()">
                    <option selected>mm</option>
                    <?php
                      for ($i = 1; $i <= 12; $i++) {
                          echo "<option value=\"$i\">$i</option><br>";
                      }
                    ?>
                </select>
                <select class="custom-select mr-sm-2" id="stselyy" style="width:15%;" onblur="valyy()">
                    <option selected>yy</option>
                      <?php
                        echo "<option value=\"".date("Y")."\">".date("Y")."<\option>"; 
                        echo "<option value=\"".(date("Y")+1)."\">".(date("Y")+1)."<\option>"; 
                      ?>
                </select>

                Time:
                  <select class="custom-select mr-sm-2" id="stselhh" style="width:15%;" onblur="valdd()">
                      <option selected>hh</option>
                      <?php
                        for ($i = 0; $i <= 23; $i++) {
                            echo "<option value=\"$i\">$i</option><br>";
                        }
                      ?>
                  </select>
                  <select class="custom-select mr-sm-2" id="stselmin" style="width:15%;" onblur="valmm()">
                      <option selected>mm</option>
                      <?php
                        for ($i = 0; $i <= 59; $i++) {
                            echo "<option value=\"$i\">$i</option><br>";
                        }
                      ?>
                  </select>

                  <br/><span id="showdd"> </span><span id="showmm" style="margin-left: 5px;"> </span><span id="showyy" style="margin-left: 5px;"> </span>
              </div>

              <div class="input-field">
                End date and time *
                <br/>Date:
                  <select class="custom-select mr-sm-2" id="enseldd" style="width:15%;" onblur="valdd()">
                      <option selected>dd</option>
                      <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value=\"$i\">$i</option><br>";
                        }
                      ?>
                  </select>
                  <select class="custom-select mr-sm-2" id="enselmm" style="width:15%;" onblur="valmm()">
                      <option selected>mm</option>
                      <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value=\"$i\">$i</option><br>";
                        }
                      ?>
                  </select>
                  <select class="custom-select mr-sm-2" id="enselyy" style="width:15%;" onblur="valyy()">
                      <option selected>yy</option>
                        <?php
                        $yr = intval(date("Y"));
                        echo "<option value=\" $yr \">$yr<\option>"; 
                        echo "<option value=\"$yr+1\">$yr+1<\option>";
                        ?>
                  </select>

                  <br/><span id="showdd"> </span><span id="showmm" style="margin-left: 5px;"> </span><span id="showyy" style="margin-left: 5px;"> </span>

                  <br/>Time:
                    <select class="custom-select mr-sm-2" id="enselhh" style="width:15%;" onblur="valdd()">
                        <option selected>hh</option>
                        <?php
                          for ($i = 0; $i <= 23; $i++) {
                              echo "<option value=\"$i\">$i</option><br>";
                          }
                        ?>
                    </select>
                    <select class="custom-select mr-sm-2" id="enselmin" style="width:15%;" onblur="valmm()">
                        <option selected>mm</option>
                        <?php
                          for ($i = 0; $i <= 59; $i++) {
                              echo "<option value=\"$i\">$i</option><br>";
                          }
                        ?>
                    </select>
                </div>
                <!-- <div class="input-field">
                  <label for="exampleFormControlFile1">Attach File</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div> -->
                <button class="btn yellow darken-2 z-depth-0">Create</button>      
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ADMIN ACTIONS -->
  <form class="center-align admin-actions admin" style="margin: 40px auto; max-width: 300px; display:none;">
  <input type="email" placeholder="User email" id="admin-email" required />
  <button class="btn-small yellow darken-2 z-depth-0">Make admin</button>
  </form>

  <div class="container"><center><h1>All Bookings</h1></center></div>
  <!-- GUIDE LIST -->
  <div class="container" style="margin-top: 40px;">
    <ul class="collapsible z-depth-0 guides" style="border: none;">
      <!-- <li>
        <div class="collapsible-header grey lighten-4">Guide title</div>
        <div class="collapsible-body white">Lorem ipsum dolor sit amet.</div>
      </li>
      <li>
        <div class="collapsible-header grey lighten-4">Guide title</div>
        <div class="collapsible-body white"><span>Lorem ipsum dolor sit amet.</span></div>
      </li>
      <li>
        <div class="collapsible-header grey lighten-4">Guide title</div>
        <div class="collapsible-body white"><span>Lorem ipsum dolor sit amet.</span></div>
      </li>
      <li>
        <div class="collapsible-header grey lighten-4">Guide title</div>
        <div class="collapsible-body white"><span>Lorem ipsum dolor sit amet.</span></div>
      </li> -->
      
    
    </ul>
    <ul id="time-list"></ul>
  </div>
  

  <!-- Core FB SDK, must be added before other scripts and is always required -->
  <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-app.js"></script>        <!--imported main functions -->
  <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-auth.js"></script>       <!--imported authentication -->
  <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-firestore.js"></script>  <!--imported firestore -->
  <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-analytics.js"></script>  <!-- imported analytics --> 
  <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-functions.js"></script>  <!-- imported functions --> 
  
  <!-- Firebase initializing -->
  <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyAJG-ndkrcxVF3PEyFu8bi_bHfGG6IGpCc",
      authDomain: "booking-portal-2380a.firebaseapp.com",
      databaseURL: "https://booking-portal-2380a.firebaseio.com",
      projectId: "booking-portal-2380a",
      storageBucket: "booking-portal-2380a.appspot.com",
      messagingSenderId: "770233035360",
      appId: "1:770233035360:web:a5d6e0cda3526048203105",
      measurementId: "G-BT20CR0R7M"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    //make auth and firebase references
    const auth = firebase.auth();
    const db = firebase.firestore();
    const functions = firebase.functions();
    // Update Firestore settings 
    // db.settings({ timestampsInSnapshots: true}); 
  </script>


  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="scripts/auth.js"></script>
  <script src="scripts/index.js"></script>
  <script>
  function hi(uid){
    db.collection('requests').doc(uid).update({status: 'Approved'})};
  </script>
  <script>
      function valdd(){
        x = document.getElementById("seldd");
        if (x.value == "dd") {
          document.getElementById("showdd").innerHTML = "Please select a date!";
        }else {
          document.getElementById("showdd").innerHTML = "";
        };
      }

      function valmm(){
        y = document.getElementById("selmm");
        if (y.value == "mm") {
          document.getElementById("showmm").innerHTML = "Please select a month!";
        }else {
          document.getElementById("showmm").innerHTML = "";
        };
      }

      function valyy(){
        z = document.getElementById("selyy");
        if (z.value == "yy") {
          document.getElementById("showyy").innerHTML = "Please select a year!";
        }else {
          document.getElementById("showyy").innerHTML = "";
        };
      }
  </script>
</body>
</html>

<!-- Helo helosnakes everywhere -->