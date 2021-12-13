


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>WatchCatalogue | Brands </title>
		<link rel="icon" href="LogoWeb.PNG">
		<link rel="stylesheet" href="Brands.css">
	
		
		
	
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



<h2>Watches || Brands </h2>

<p></p>




<div class="LOGO">
	
	<!-- Image 1 -->
<div class="content_img">
	<a href="AP.php"><img src="AP.jpg" width="300" height="150" ></a>
	<div>Audemars Piguet</div>
   </div>
   
   <!-- Image 2 -->
   <div class="content_img">
	<a href="Rolex.php"><img src="Rolex.jpg" width="300" height="150" ></a>
	<div>Rolex</div>
   </div>
   
   <!-- Image 3 -->
   <div class="content_img">
	<a href="PP.php"><img src="PP.jpg" width="300" height="150"></a>
	<div>Patek Philippe</div> 
   </div>
	  

  <!-- Image 4 -->
  <div class="content_img">
	<a href="Hublot.php"><img src="Hublot.jpg" width="300" height="150"></a>
	<div>Hublot</div> 
   </div>
	  
	 <!-- Image 5 -->
	 <div class="content_img">
		<a href="RichardMille.php"><img src="RM.jpg" width="300" height="150"></a>
		<div>Richard Mille</div> 
	   </div>
		  
	
	
		
		
		<img src="CS.png"  width="250" height="100">
		
		
	







</div>
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