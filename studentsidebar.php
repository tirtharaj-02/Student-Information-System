
	<!DOCTYPE html>
<html>
	<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Yrk5j5q5iBx8o+BBXb+vpoYmfrPtcgc7C8/Cv1L+SCG06rpQOFDZ8hu7tXgJfCKrSwCjKCGE8SlLW+jJvCD3OA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

.sidebar{
	background-color: darkgray;
	position: absolute;
	width: 217px;
	height: 87.5%;
	padding-top: 0;
	box-sizing: border-box;
	transform: translate(-100%);
	transition: transform 0.5s linear 0s;
	
}
.show_sidebar{
	transform: translate(0%)!important;

	
}
#sidebar-toggle {
  position: fixed;
  top: 85px;
  right: 20px;
  z-index: 9999;
  padding: 10px;
  background-color: whitesmoke;
  border: 1px solid;
  border-radius: 22px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}

#sidebar-toggle i {
  font-size: 1.3rem;
}

ul.links{
    margin: 0;
	padding: 0;
	list-style: none;
	height: 100%;
    position: fixed;
    padding-top: 5%;
    text-align: center;
}
ul.links li a{
    text-decoration: none;
    background-color: none;
	color: whitesmoke;
    font-size: 16px;
	text-transform: uppercase;
	text-decoration: none;
	margin-top: 17px;
	display: inline-block;
	height: 10px;
	padding-left: 20px;
	padding: 20px;
	
	
	
}
ul li a:hover
{
	color: goldenrod;
	text-decoration: none;
}
a,a:hover 
{
	text-decoration: none!important;
}
.logout{
	padding-top: 20px;
}





</style>
    </head>
	<header class="header">
		
		<a href="">Student Dashboard</a>

		<div class="logout">
			
			<a href="logout.php" class="btn btn-primary">Logout</a>

		</div>

	</header>
	
	<body>

		<button id="sidebar-toggle" class="btn"><i class="fa fa-bars"></i></button>

			<div id="sidebar" class="sidebar">
				
					<ul class="links">
						
						<li>
							<a href="studentprofile.php">profile </a>
						</li>

						<li>
							<a href="fees_detail.php">fees detail </a>
						</li>

						

						
						

					</ul>
				
			</div>

			<script>
			// Get the button and sidebar elements by ID
			let sidebarToggle = document.getElementById("sidebar-toggle");
			let sidebar = document.getElementById("sidebar");

			// Attach a click event listener to the button
			sidebarToggle.addEventListener("click", function() {
				// Toggle the "show_sidebar" class on the sidebar
				sidebar.classList.toggle("show_sidebar");

				// Toggle the "fa-bars" and "fa-times" classes on the button's icon
				if (sidebarToggle.firstElementChild.classList.contains("fa-bars")) {
				sidebarToggle.firstElementChild.classList.replace("fa-bars", "fa-times");
				} else {
				sidebarToggle.firstElementChild.classList.replace("fa-times", "fa-bars");
				}
			});
			
			</script>
		

			

	</body>
	</html>



	