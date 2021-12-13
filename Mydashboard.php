<!DOCTYPE html>

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

if(isset($_POST['Logout'])) {
  session_destroy();
  header('Location: login.php');
}

?>




<html>
<head>
<title> Co-Hownership | My-Dashboard</title>
<link rel="stylesheet" href="Mydashboard.css">





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





<h1 style="text-align:center;">  My-Account  </h1>
<form method='post'>
<input type='submit' name='Logout'
 value='Logout'/> 
<div align="center">
         <h2>Profil of <?php echo $userinfo['username']; ?></h2>
         <br /><br />
         Username = <?php echo $userinfo['username']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
      
         <?php
         }
         ?>




      </div>

      <?php 

  







  ?>
     

      
    

     



<p>

<h1 style="text-align:center;font-size:25px;">
       Total Assets
       <br>

     
       <a href="<?php echo "DataBase.php?id=".$userinfo['id'] ?>"  >Add Watches</a>
    </h1>

   

  <div class="flex-container">


  
</div>


<?php
 






 
 
 


 $con=mysqli_connect("localhost","root","","profilcon");
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 
 $user = $_SESSION['username'];
 $result = mysqli_query($con,"SELECT * FROM $user ");
 
  
 
 
 
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
  
 

  
   
  
      
 

  




  

 
 
 
 echo "<tr>";

 echo "<td> <form method='post'>
 <input type='submit' name='button1'
  value='Remove From Portofolio'/> 
   
 
 
 </form>";

 
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['Name'] . "</td>";
 echo "<td>$" . $row['Price'] .  " </td>";
 echo "<td>" . $row['Brand'] . "</td>";
 echo  "<td>" .('<img style="width:120px; height:120px;" src="'.$row['picture'].'">') ; 
 

 
 
 
 } 
 

 
 
 if(isset($_POST['button1'])) {
  


  $user = $_SESSION['username'];

  $insert = mysqli_query($con,"DELETE FROM $user
  WHERE id = 1");

}






 
 
 
 
 
 
    
 
 
 
 
    
 
 
 mysqli_close($con);
 
 
 
 
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

</html>
<?php   

?>