<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<!-- <?php echo form_open('student/create'); ?>-->

<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
</head>
   <body>
   
      <form action = "<?php $_PHP_SELF ?>" method = "POST">
	 First Name: <input type = "text" name = "Fname" /><br>
	 Last  Name: <input type = "text" name = "Lname" /><br>
	 Class Roll Number: <input type = "text" name = "CRN" /><br>
	 University Roll Number: <input type = "text" name = "URN" /><br>
	 Address : <input type = "text" name = "Address" /><br>
	 Phone No: <input type = "number" name = "Phone_No" /><br>	
	 Date Of Admission: <input type = "date" name = "DOAdmn" /> 
	<input type = "submit" value="Submit" /><br><br>
      </form>
      
   </body>
</html>
<!-- 
Sno
First name
Last Name
Class Roll No
Address
Ph No
Date Of Admission
-->



