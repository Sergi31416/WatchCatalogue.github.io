<!DOCTYPE html>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=profilcon', 'root', '');

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




if(isset($_POST['login-form'])) {
  $userconnect = htmlspecialchars($_POST['userconnect']);
  $mdpconnect = sha1($_POST['mdpconnect']);
  if(!empty($userconnect) AND !empty($mdpconnect)) {
     $requser = $bdd->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
     $requser->execute(array($userconnect, $mdpconnect));
     $userexist = $requser->rowCount();
     if($userexist == 1) {
        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo['id'];
        $_SESSION['username'] = $userinfo['username'];
        $_SESSION['mail'] = $userinfo['mail'];
        
        header("Location: Mydashboard.php?id=".$_SESSION['id']);
     } else {
        $erreur = "Wrong Mail or Password !";
     }
  } else {
     $erreur = "All fields must be completed !";
  }
}

if(isset($_POST['register-form'])) {


   $pseudo = htmlspecialchars($_POST['username']);    
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $psw1 = sha1($_POST['password']);
    $psw2 = sha1($_POST['password2']);
   
    $user = $_SESSION['user'];
    $id = $user['id'];
    
    
   
    // Get text




  
    if(!empty($_POST['username']) AND !empty($_POST['mail'])  AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
       $pseudolength = strlen($pseudo);
       if($pseudolength <= 255) {
         
          if($mail == $mail2) {
             if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
                $reqmail->execute(array($mail));
                $mailexist = $reqmail->rowCount();
                if($mailexist == 0) {
                   if($psw1 == $psw2) {
                      $insertmbr = $bdd->prepare("INSERT INTO user (username,mail, password) VALUES(?, ?, ?)");
                      $insertmbr->execute(array($pseudo, $mail, $psw1));
                     
                     
  $link = mysqli_connect("localhost", "root", "", "profilcon");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE $id (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(30) NOT NULL,
  Price INT(11) NOT NULL,
  Brand VARCHAR(50),
  picture VARCHAR(50)
  )";

if(mysqli_query($link, $sql)){
    echo "Welcome to WatchCatalogue";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



                    
                   
                      echo '<script>alert("Your account was created ! </script>';
                   } else {
                    echo '<script>alert("You password does nott match !")</script>';
                    
                   }
                } else {

                  echo '<script>alert("E-mail Adress already used !")</script>';
             
                }
             } else {
              echo '<script>alert("Your E-Mail is not valid !")</script>';
               
             
             }
          } else {
            echo '<script>alert("Your E-mail does not match !")</script>';
            
          }
       } else {

        echo '<script>alert("Your Username must not reach 255 characters !")</script>';
    
       }
    } else {

      echo '<script>alert("All Fields must be completed !")</script>';
  
     
    }
 }
 ?>



<html>
<head>
<title> Co-Hownership | My-Account</title>
<link rel="stylesheet" href="account.css">





</head>

<body>

	
<link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
		
		<div class="top-right-slide">
		  <div class="inner-container-top">
			<a href="index.php" class="nav-links">HOME</a>
		  </div>
		</div>
		<div class="middle-right-slide">
		  <div class="inner-container-middle">
			<a href="MyDashboard.php" class="nav-links">MyDashboard</a>
		  </div>
		</div>
		<div class="bottom-right-slide">
		  <div class="inner-container-bottom">
			<a href="contact.php" class="nav-links">Contact Us</a>
		  </div>
		</div>
		
		<div class="top-left-slide">
		   <div class="inner-container-left-top">
			<a href="Brands.php" class="nav-links">Brands</a>
		  </div>
		</div>
		<div class="bottom-left-slide">
		  <div class="inner-container-left-bottom">
			<a href="Login.php" class="nav-links">LogIn</a>
		  </div>
		</div>
		
		<div class="menu-btn">
		  <div class="eks-one"></div>
		  <div class="eks-two"></div>
		  <div class="eks-three"></div>
		</div>



<h1> LogIn/Register </h1>


<input type='checkbox' id='form-switch'>
<form id='login-form' action="" method='post'>
  <input type="text"  id="username" name="userconnect"   placeholder="Username" required>
  <input type="password" placeholder="Password"  id="mdpconnect" name="mdpconnect" required>
  <button  name="login-form"    type='submit'>Login</button>
  <label for='form-switch'><span>Register</span></label>
</form>


<form id='register-form' action="" method='post'>
<input type="text" placeholder="Your username" id="username" name="username" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
<input type="email" placeholder="Your  E-mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
<input type="email" placeholder="Retype E-Mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
<input type="password" placeholder="Your password" id="passwword" name="password" />
<input type="password" placeholder="Confirm your password" id="password2" name="password2" />


  <button   name="register-form"  type='submit'>Register</button>
  <label for='form-switch'>Already Member ? Sign In Now..</label>
</form>





<script>

const menu = document.querySelector('.menu-btn');
const topLeftSlider = document.querySelector('.top-left-slide');
const bottomLeftSlider = document.querySelector('.bottom-left-slide');

const topRightSlider = document.querySelector('.top-right-slide');
const middleRightSlider = document.querySelector('.middle-right-slide');
const bottomRightSlider = document.querySelector('.bottom-right-slide');

const eksOne = document.querySelector('.eks-one');
const eksTwo = document.querySelector('.eks-two');
const eksThree = document.querySelector('.eks-three');

var isOpen = false;

menu.addEventListener('click', () => {
  topLeftSlider.classList.toggle('top-left-slide-show');
  bottomLeftSlider.classList.toggle('bottom-left-slide-show');
  topRightSlider.classList.toggle('top-right-slide-show');
  middleRightSlider.classList.toggle('middle-right-slide-show');
  bottomRightSlider.classList.toggle('bottom-right-slide-show');
  eksTwo.classList.toggle('eks-two-fade');
  
   const tl = gsap.timeline();
   const tlEksThree = gsap.timeline();
  
  if(!isOpen) {
    tl.to('.eks-one', {
      y: isOpen? 0 : 9,
    })
      .to('.eks-one', {
      rotate: isOpen? 0 : 45
    })
    
    tlEksThree.to('.eks-three', {
      y: isOpen? 0 : -9,
    })
      .to('.eks-three', {
      rotate: isOpen? 0 : -45
    })
  }
  else {
    tl.to('.eks-one', {
      rotate: isOpen? 0 : 45,
    })
      .to('.eks-one', {
      y: isOpen? 0 : 9,
    })
    
    tlEksThree.to('.eks-three', {
      rotate: isOpen? 0 : -45
    })
      .to('.eks-three', {
      y: isOpen? 0 : -9
    })
  }
  
  isOpen = !isOpen
})

gsap.from('.simple', {
  x: -100,
  duration: 1
})
gsap.from('.menu', {
  x: -100,
  duration: 1.2,
  delay: 0.3,
  opacity: 0
})
gsap.from('.navi', {
  y: -500,
  duration: 2.,
  delay: 0.4,
  opacity: 0
})


</script>
</body>

</html>