<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ram Katha Registration : Morari Bapu</title>
	
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <meta name="robots" content="index, follow" />
    <meta itemprop="image" content="img/logo.png">
    <meta property="og:locale" content="en_US">

    <meta property="og:title" content="">
    <meta property="og:site_name" content="">
    <meta property="og:url" content="Moraribapu">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
	<meta property="og:image" content="img/logo.png">
	
	<!-- /OG Img -->
	
	
	  <!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="img/logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/logo.png">
	


	<link href="css/bootstrap.min.css" rel="stylesheet" >
	 <link href="fonts/css/fontawesome.min.css" rel="stylesheet" >
	<link href="fonts/css/brands.min.css" rel="stylesheet" />
    <link href="fonts/css/solid.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/contact.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/country-state-city@3.2.1/dist/csc.min.js"></script>

</head>
<body>
<div class="main position-relative"> 
 <div class="main_2">
	<section id="center" class="center_count">
		<div class="center_om bg_back">
			<div class="container-xl">
				<div class="row center_o1">
					<div class="col-md-9">
					  <div class="center_o1l">
					    <h1 class="font_60 text-white"></h1>
						<p class="text-white p-3 mt-3 mb-0"><br /><br /><br /><br /><br /><br /></p>
					  </div>
					</div>
					
				</div>
			</div>
		</div>   
	</section>
 </div>
</div>
<p class="text-blck p-3 mt-3 mb-0">Welcome to Ramkatha by Morari Bapu, Delhi – 17th to 25th January 2026.</p>
<section id="donate_dt" class="p_4 pb-0 w-75 mx-auto">
    <div class="container-xl">
	   <div class="donate_dt1 row">
	     <div class="col-md-12">
		   <div class="donate_dt1l rounded_20 p-4 border_1">
		     
			   <form action="sendemail.php" method="post" enctype="multipart/form-data">
				   <div class="donate_dt1l2 mt-3">
					 <h5 class="mt-4">Please register here.</h5>
					 <div class="donate_dt1l2i1 row mt-3">
					
				  <div class="col-md-6">
					 <div class="donate_dt1l2i1l">
						 <h6>Select Country Code and Write Mobile no</h6>
					  <div class="input-group overflow-hidden rounded_20 border-0 bg_light font_14">
						  <select class="form-select rounded_20 border-0 bg_light font_14" name="countryCode" id="countryCode" style="max-width: 160px;" required>
							  <option>Country Code</option>
						  </select>
						  <input class="form-control rounded_20 border-0 bg_light font_14" placeholder="Mobile Number (Whatsapp)" type="text" name="main_phone_no" pattern="[0-9]{10}" id="phoneno" required>
						<script>
							const number=document.querySelector('#phoneno');
							number.addEventListener('invalid',(e)=>{
								e.target.setCustomValidity('Mobile number should be a 10 digit number');
							})
							number.addEventListener('input',(e)=>{
								e.target.setCustomValidity('');
							})
						</script>
					  </div>
					 </div>
					 </div>
					 <div class="col-md-6">
						 <div class="donate_dt1l2i1l">
						  <label>Email Address</label>
						  <input class="form-control rounded_20 border-0 bg_light font_14" placeholder="Email Address" name="main_email_id"  type="text" >
						 </div>
						</div>
						
					 </div>
					 
					<div class="donate_dt1l2i1 row mt-3">
					<div class="col-md-4">
						  <div class="donate_dt1l2i1l">
							  <label>First Name</label>
							  <input type="text" class="form-control rounded_20 border-0 bg_light font_14" name="main_first_name" placeholder="First Name" maxlength="25" required>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="donate_dt1l2i1l">
							  <label>Middle Name</label>
							  <input type="text" class="form-control rounded_20 border-0 bg_light font_14" name="main_middle_name" placeholder="Middle Name" maxlength="25" >
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="donate_dt1l2i1l">
							  <label>Last Name</label>
							  <input type="text" class="form-control rounded_20 border-0 bg_light font_14" name="main_last_name" placeholder="last Name" maxlength="25" required>
						  </div>
					  </div>
					  </div>
					<div class="donate_dt1l2i1 row mt-3">
						<div class="col-md-4">
						<div class="donate_dt1l2i1l">
							<label class="d-block">Sex</label>

							<div class="d-flex flex-column flex-md-row flex-wrap gap-3 mt-2">
							
							<div class="form-check">
								<input type="radio" value="Male" class="form-check-input" name="main_gender" required>
								<label class="form-check-label">Male</label>
							</div>

							<div class="form-check">
								<input type="radio" value="Female" class="form-check-input" name="main_gender" required>
								<label class="form-check-label">Female</label>
							</div>

							<div class="form-check">
								<input type="radio" value="Other" class="form-check-input" name="main_gender" required>
								<label class="form-check-label">Other</label>
							</div>

							</div>
						</div>
						</div>
						<div class="col-md-4 ">
								<div class="donate_dt1l2i1l">
									<label>Age</label>
									<input type="text" name="main_age" class="form-control rounded_20 border-0 bg_light font_14" placeholder="Age" pattern="[0-9]{1,3}" required>
								</div>
							</div>
							<div class="col-md-4">
						  <div class="donate_dt1l2i1l">
							  <label>Photo</label>
							  <input type="file" name="main_photo" accept=".jpg,.jpeg,.png" class="form-control rounded_20 border-0 bg_light font_14" required>
						  </div>
					  </div>

					</div>

					  <div class="donate_dt1l2i1 row mt-3">
		  
					  <div class="col-md-4">
						  <div class="donate_dt1l2i1l">
							  <label>ID Proof Type</label>
							  <select class="form-control rounded_20 border-0 bg_light font_14" name="main_id_proof_type" required>
								  <option value="">Select ID</option>
								  <option>Aadhaar</option>
								  <option>PAN</option>
								  <option>Voter ID</option>
								  <option>Passport</option>
							  </select>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="donate_dt1l2i1l">
							  <label>ID Proof Number</label>
							  <input type="text" name="main_id_proof_no" class="form-control rounded_20 border-0 bg_light font_14" placeholder="Enter ID Number" required>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="donate_dt1l2i1l">
							  <label>ID Proof File</label>
							  <input type="file" name="main_id_proof" accept=".jpg,.jpeg,.png,.pdf " class="form-control rounded_20 border-0 bg_light font_14" required>
						  </div>
					  </div>
					  </div>
					<div class="donate_dt1l2i1 row mt-3">
					<div class="col-md-6">
					 <div class="donate_dt1l2i1l">
					  <h6>Date of Arrival</h6>
					  <select class="form-control rounded_20 border-0 bg_light font_14" name="arrival_date" required>
						  <option value="">Select date</option>
						  <option value="17 January 2026">17 January 2026</option>
						  <option value="18 January 2026">18 January 2026</option>
						  <option value="19 January 2026">19 January 2026</option>
						  <option value="20 January 2026">20 January 2026</option>
						  <option value="21 January 2026">21 January 2026</option>
						  <option value="22 January 2026">22 January 2026</option>
						  <option value="23 January 2026">23 January 2026</option>
						  <option value="24 January 2026">24 January 2026</option>
					  </select>
					 </div>
					</div>
					<div class="col-md-6">
					 <h6>Date of Departure</h6>
					  <select class="form-control rounded_20 border-0 bg_light font_14" name="departure_date" required>
						  
						  <option value="">Select date</option>
						  <option value="18 January 2026">18 January 2026</option>
						  <option value="19 January 2026">19 January 2026</option>
						  <option value="20 January 2026">20 January 2026</option>
						  <option value="21 January 2026">21 January 2026</option>
						  <option value="22 January 2026">22 January 2026</option>
						  <option value="23 January 2026">23 January 2026</option>
						  <option value="24 January 2026">24 January 2026</option>
						  <option value="24 January 2026">25 January 2026</option>
					  </select>
					  </div>
					</div>
				   <div class="donate_dt1l2i1 mt-3">
					  <div class="col-md-12">
					 <div class="donate_dt1l2i1l">
					  <h6>Number of Guests:</h6>
					  <div class="input-group overflow-hidden rounded_20 border-0 bg_light font_14">
							  <i class="bi bi-dash-square-fill btn btn-danger" id="sub"></i>
	  
						  <input
							  type="number"
							  class="form-control border-0 bg_light font_14"
							  placeholder="Number of Guests"
							  name="total_people" id="total_people" ;
						  >
							  <i class="bi bi-plus-square-fill btn btn-danger" id="add"></i>
	  
						  </div>
					  </div>
					  </div>
					  <script>
						  const guest=document.querySelector('#total_people');
						  const add=document.querySelector('#add');
						  const sub=document.querySelector('#sub');
						  function triggerInput() {
							  guest.dispatchEvent(new Event('input'));
						  }
						  add.addEventListener('click',()=>{
							  if (guest.value === '') {
								  guest.value = 0;
								}
							  guest.value=Number(guest.value)+1;
							  triggerInput(); 
						  });
						  
						  sub.addEventListener('click',()=>{
							  if (guest.value === '') {
								  guest.value=0;
								}
							  if(guest.value>0){
								  guest.value=Number(guest.value)-1;
	  
							  }
							  if(guest.value==0){
								  guest.value='';
							  }
							  triggerInput(); 
						  })
					  </script>
	  
				   </div>
				   <div class="donate_dt1l2i1 row mt-3">
					   <div id="peopleContainer"></div>
					  
				  <template id="personTemplate">
				<div class="person-box mt-3">
				  <h5>Person <span class="person-no"></span></h5>
				  <hr>
				  <div class="donate_dt1l2i1 row mt-3">
					  <div class="col-md-4 mb-3">
						  <div class="donate_dt1l2i1l">
							  <label>First Name</label>
							  <input type="text" name="first_name[]" class="form-control rounded_20 border-0 bg_light font_14" placeholder="First Name" required>
						  </div>
					  </div>
					  <div class="col-md-4 mb-3">
						  <div class="donate_dt1l2i1l ">
							  <label>Middle Name</label>
							  <input type="text" name="middle_name[]" class="form-control rounded_20 border-0 bg_light font_14" placeholder="Middle Name" >
						  </div>
					  </div>
					  <div class="col-md-4 mb-3">
						  <div class="donate_dt1l2i1l ">
							  <label>Last Name</label>
							  <input type="text" name="last_name[]" class="form-control rounded_20 border-0 bg_light font_14" placeholder="Last Name" required>
						  </div>
					  </div>
					 
	  
						  <div class="col-md-4 4 mb-3">
							  <div class="donate_dt1l2i1l">
								  <label>Age</label>
								  <input type="text" name="age[]" class="form-control rounded_20 border-0 bg_light font_14" placeholder="Age" pattern="[0-9]{1,3}" required>
							  </div>
						  </div>
			  
						 <div class="col-md-4 4 mb-3">
						<div class="donate_dt1l2i1l">
							<label class="d-block">Sex</label>

							<div class="d-flex flex-column flex-md-row flex-wrap gap-3 mt-2">
							
							<div class="form-check">
								<input type="radio" value="Male" class="form-check-input" name="gender[]" required>
								<label class="form-check-label">Male</label>
							</div>

							<div class="form-check">
								<input type="radio"value="Female" class="form-check-input" name="gender[]" required>
								<label class="form-check-label">Female</label>
							</div>

							<div class="form-check">
								<input type="radio" value="Other" class="form-check-input" name="gender[]" required>
								<label class="form-check-label">Other</label>
							</div>

							</div>
						</div>
						</div>
					<div class="col-md-4">
						  <div class="donate_dt1l2i1l mb-3">
							  <label>Photo</label>
							  <input type="file" name="photo[]" accept=".jpg,.jpeg,.png" class="form-control rounded_20 border-0 bg_light font_14" required>
						  </div>
					  </div>
					  
		  
				
		  
					  <div class="col-md-4">
						  <div class="donate_dt1l2i1l mb-3">
							  <label>ID Proof Type</label>
							  <select class="form-control rounded_20 border-0 bg_light font_14" name="id_proof_type[]" required>
								  <option value="">Select ID</option>
								  <option>Aadhaar</option>
								  <option>PAN</option>
								  <option>Voter ID</option>
								  <option>Passport</option>
							  </select>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="donate_dt1l2i1l mb-3">
							  <label>ID Proof Number</label>
							  <input type="text" name="id_proof_no[]" class="form-control rounded_20 border-0 bg_light font_14" placeholder="ID Number" required>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="donate_dt1l2i1l mb-3">
							  <label>ID Proof File</label>
							  <input type="file" name="id_proof[]" accept=".jpg,.jpeg,.png,.pdf " class="form-control rounded_20 border-0 bg_light font_14" required>
						  </div>
					  </div>  
		  
				  
				  </div>
				  </div>
				  
				</template>
			
	  
			</div>
			<hr>
				   <div class="donate_dt1l2i1 row mt-3">
					<div class="col-md-4">
					 <div class="donate_dt1l2i1l">
								<h6>Select Country</h6>
				<select class="form-control rounded_20 border-0 bg_light font_14" name="country" id="country">
				 
				</select>
	  
					 </div>
				  </div>
				  <div class="col-md-4">
					 <div class="donate_dt1l2i1l">
					   <h6>Select State</h6>
				<select class="form-control rounded_20 border-0 bg_light font_14" name="state" id="state">
				  
				</select>
					 </div>
					 </div>
					 <div class="col-md-4">
					 <div class="donate_dt1l2i1l">
					   <h6>Select City</h6>
				<select class="form-control rounded_20 border-0 bg_light font_14" name="city" id="city">
				  
				</select>
					 </div>
					 </div>
					 </div>
	  
	  
				  
				   <div class="donate_dt1l2i1 row mt-3">
					<div class="col-md-12">
					 <div class="donate_dt1l2i1l">
					  <h6>Address</h6>
					  <textarea placeholder="Write your Address" class="form-control rounded_20 border-0 bg_light font_14 form_text" name="address"></textarea>
					  <h6 class="mb-0 mt-4 center_sm">
							<input type="submit" class="button" value="Register Now" style="border:0 !important">

						</div>
						</h6>


          <p class="mt-3">
            Accommodation will be allotted as per availability.
          </p>
					 </div>
					</div>
				   </div>
				   </div>
				 
			   </form>
		   </div>
		 </div>
	   </div>
	</div>
   </section>
 

<div class="footer_m position-relative">
  <div class="footer_m1">
    <section id="footer" class="p_4 bg_blue">
<div class="container-xl">
   <div class="footer_1 row">
     <div class="col-md-4">
	   <div class="footer_1l">
	     <a class="text-white mb-5" ><img src="img/logo1.png" class="bg-white" width="120vw" height="50vh"></a>
		 <p class="text-light">We Invite you to the Ram Katha.</p>
		 <ul class="mb-0 flex_box">
<li class="d-flex text-light mt-3"><span class="me-3"><i class="fa fa-envelope col_oran"></i></span> ahimsa.vishwa@gmail.com </li>
<li class="d-flex text-light mt-3"><span class="me-3"><i class="fa fa-map-marker col_oran"></i></span>  World Peace Centre, Ahimsa, Sector-39, Gurugram-122 022 <br> Ahimsa Vishwa Bharti, 63/1, Old Rajinder Nagar, New Delhi-110 060 </li>
</ul>
	   </div>
	 </div>
	 <!-- <div class="col-md-2">
	   <div class="footer_1l">
	     <h4 class="text-white mb-4">Information</h4>
         <div class="row footer_3ism">
		 <h6 class="col-md-12 col-6"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Ministries</a></h6>
	 <h6 class="col-md-12 col-6 mt-2"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Services</a></h6>
	 <h6 class="col-md-12 col-6 mt-2"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Sermons</a></h6>
	 <h6 class="col-md-12 col-6 mt-2"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Donations</a></h6>
	 <h6 class="col-md-12 col-6 mt-2"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Volunteers</a></h6>
	 <h6 class="col-md-12 col-6 mt-2 mb-0"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Events</a></h6>
	    </div>
	   </div>
	 </div> -->
	 <!-- <div class="col-md-2">
	   <div class="footer_1l">
	     <h4 class="text-white mb-4">Others</h4>
         <div class="row footer_3ism">
		 <h6 class="col-md-12 col-6"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Shop</a></h6>
	 <h6 class="col-md-12 col-6 mt-2"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Cart</a></h6>
	 <h6 class="col-md-12 col-6 mt-2"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Checkout</a></h6>
	 <h6 class="col-md-12 col-6 mt-2"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Blog</a></h6>
	 <h6 class="col-md-12 col-6 mt-2"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Contact Us</a></h6>
	 <h6 class="col-md-12 col-6 mt-2 mb-0"><i class="fa fa-chevron-right col_oran me-1 font_13 align-middle"></i> <a class="text-light a_tag" href="#"> Policy</a></h6>
	    </div>
	   </div>
	 </div> -->
	 <!-- <div class="col-md-4">
	   <div class="footer_1l">
	     <h4 class="text-white mb-4">Recent Posts</h4>
         <div class="footer_1li row">
		  <div class="col-md-3 col-4">
		   <div class="footer_1lil">
		       <div class="grid clearfix">
			<figure class="effect-jazz mb-0">
			<a href="#"><img src="img/13.jpg" class="w-100" alt="img25"></a>
			</figure>
			</div>
		   </div>
		  </div>
		  <div class="col-md-9 col-8">
		   <div class="footer_1lir">
	       <h6 class="font_13 text-white"><i class="fa fa-calendar col_oran me-1"></i> October 26, 2020</h6>
		   <h5 class="mb-0 fs-6"><a class="text-light a_tag" href="#">All we’ve discovered by now</a></h5>
		   </div>
		  </div>
		</div>
		<div class="footer_1li row mt-4">
		  <div class="col-md-3 col-4">
		   <div class="footer_1lil">
		       <div class="grid clearfix">
			<figure class="effect-jazz mb-0">
			<a href="#"><img src="img/14.jpg" class="w-100" alt="img25"></a>
			</figure>
			</div>
		   </div>
		  </div>
		  <div class="col-md-9 col-8">
		   <div class="footer_1lir">
	       <h6 class="font_13 text-white"><i class="fa fa-calendar col_oran me-1"></i> October 28, 2020</h6>
		   <h5 class="mb-0 fs-6"><a class="text-light a_tag" href="#">We Who Believe In God</a></h5>
		   </div>
		  </div>
		</div>
		<div class="footer_1li row mt-4">
		  <div class="col-md-3 col-4">
		   <div class="footer_1lil">
		       <div class="grid clearfix">
			<figure class="effect-jazz mb-0">
			<a href="#"><img src="img/15.jpg" class="w-100" alt="img25"></a>
			</figure>
			</div>
		   </div>
		  </div>
		  <div class="col-md-9 col-8">
		   <div class="footer_1lir">
	       <h6 class="font_13 text-white"><i class="fa fa-calendar col_oran me-1"></i> October 29, 2020</h6>
		   <h5 class="mb-0 fs-6"><a class="text-light a_tag" href="#">Expecting new issued cases</a></h5>
		   </div>
		  </div>
		</div>
	   </div>
	 </div> -->
   </div>
</div>
</section>

<section id="footer_b" class="bg_blue">
<div class="container-xl">
   <div class="footer_b1 row">
     <div class="col-md-5">
	   <div class="footer_b1l">
	     <p class="mb-0 text-light"> Copyright © Morari Bapu. All Rights Reserved | Design by <a class="col_oran fw-bold" href="https://CRMWala.com/">CRMWala</a></p>
	   </div>
	 </div>
	 <div class="col-md-3">
	   <div class="footer_b1m p-4 bg-white">
	     <h3 class="mb-0"><a class="text-white mb-5"><img src="img/logo1.png" width="150vw" height="30vh"></a></h3>
	   </div>
	 </div>
	 <!-- <div class="col-md-4">
	   <div class="footer_b1r text-end">
	     <ul class="mb-0">
	    <li class="d-inline-block"><a class="d-block text-center" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
		<li class="d-inline-block ms-2"><a class="d-block text-center" href="#"><i class="fa-brands fa-twitter"></i></a></li>
		<li class="d-inline-block ms-2"><a class="d-block text-center" href="#"><i class="fa-brands fa-pinterest"></i></a></li>
		<li class="d-inline-block ms-2"><a class="d-block text-center" href="#"><i class="fa-brands fa-instagram"></i></a></li>
	  </ul>
	   </div>
	 </div> -->
   </div>
</div>
</section>
  </div>
  
</div>


<script src="js/common.js"></script>
<script src="js/template.js"></script>
<script src="js/cities.js"></script>
<script src="js/country-code.js"></script>

</body>


</html>