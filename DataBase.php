
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>WatchCatalogue | DataBase </title>
		<link rel="icon" href="LogoWeb.PNG">
		<link rel="stylesheet" href="Brands.css">
	
	</head>



	<body>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=profilcon', 'root', '');
  if(isset($_GET['id']) AND $_GET['id'] > 0) {
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();

  $_SESSION['id'] = $userinfo['id'];
  $_SESSION['username'] = $userinfo['username'];
  $_SESSION['mail'] = $userinfo['mail'];

  $id = htmlspecialchars($_GET['id']);


} ?>
    
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
		
		<div class="top-right-slide">
		  <div class="inner-container-top">
			<a href="index.html" class="nav-links">HOME</a>
		  </div>
		</div>
		<div class="middle-right-slide">
		  <div class="inner-container-middle">
			<a href="MyDashboard" class="nav-links">MyDashboard</a>
		  </div>
		</div>
		<div class="bottom-right-slide">
		  <div class="inner-container-bottom">
			<a href="contact.html" class="nav-links">Contact Us</a>
		  </div>
		</div>
		
		<div class="top-left-slide">
		   <div class="inner-container-left-top">
			<a href="Brands.html" class="nav-links">Brands</a>
		  </div>
		</div>
		<div class="bottom-left-slide">
		  <div class="inner-container-left-bottom">
			<a href="#" class="nav-links">LogIn/Register</a>
		  </div>
		</div>
		
		<div class="menu-btn">
		  <div class="eks-one"></div>
		  <div class="eks-two"></div>
		  <div class="eks-three"></div>
		</div>


    <a href="<?php echo ("MyDashboard.php?id=".$userinfo['id'])?>" class="previous round"><img src="back.jpg" style="height: 50px; margin-top:30px;"></a>
        <h4 style="font-size:80px;text-align:center;">Catalogue DataBase </h4>
    
     
<p>
        <form method='post'>
<input type='submit' name='ALL Watches'
 value='ALL Watches'/> 
        <form method='post'>
<input type='submit' name='Rolex'
 value='Rolex'/> 

 <form method='post'>
<input type='submit' name='AP'
 value='AP'/> 
	
<p></p>
<p></p>






 </div>

 <?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=profilcon', 'root', '');
if(isset($_GET['id']) AND $_GET['id'] > 0) {
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();

  $_SESSION['id'] = $userinfo['id'];
  $_SESSION['username'] = $userinfo['username'];
  $_SESSION['mail'] = $userinfo['mail'];

  $id = htmlspecialchars($_GET['id']);


}






?>

 <?php
 









$con=mysqli_connect("localhost","root","","profilcon");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM ap");
$result1 = mysqli_query($con,"SELECT * FROM ap WHERE Brand ='Rolex' ");
$result3 = mysqli_query($con,"SELECT * FROM ap WHERE Brand ='AP' ");





echo "<table style='text-align:center; margin-left:30%; 'border='1'>
<tr>
<th></th>
<th>ID</th>
<th>Model</th>
<th>Price</th>
<th>Brand</th>
<th>Image</th>
</tr>";

while($row = mysqli_fetch_array($result))
{

 
  
    
    



  if(isset($_POST['All Watches'])) {
    $result = $result;
  }elseif(isset($_POST['Rolex'])) {
  $result = $result1;
} elseif(isset($_POST['AP'])) {
  $result = $result3;
}




echo "<tr>";

echo "<td> <form method='post'>
<input type='submit' name='button1'
 value='Add to Portofolio'/> 
</form>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Price'] .  "</td>";
echo "<td>" . $row['Brand'] . "</td>";
echo  "<td>" .('<img style="width:120px; height:120px;" src="'.$row['picture'].'">')
; 

echo "</tr>";

  





}



  if(isset($_POST['button1'])) {
    
    $result4 = mysqli_query($con,"SELECT * FROM ap");
    $row1 = mysqli_fetch_array($result4);
  
      $user = $_SESSION['username']; 
    $id = $row1['id'];
    $insert = mysqli_query($con,"INSERT INTO $user SELECT * FROM ap WHERE id = 1 " );
    
    
  }


mysqli_close($con);




?>


<?php

 

 



?>


	</body>



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

 
<footer></footer>
</html>