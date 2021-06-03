## Auth
#### PHP Authentication Project

WE are going to use a bucnh of functions and methods to create authentication process




##### This is a smalll project about authentication process by PHP (Basic), with session and cookie:

 ##### Pages of this project: 
	1. Index.php or login page.<br>
	2. Register page.<br>
	3. Profile page.<br>
	4. All Users page. (Display all user)<br>
    5. Edit page. (For edit form information)<br>

<em><>Note:Bootstrap is used to create these pages</em>
--------

<p>Index.php or login page:</p>

    1. Basic form with 2 input fields and a submit button. 
        1.Username/Email - User can login with username or email both.
        2.Password  

    2. Existing Username/Email/Password will be checked with that of database.
    3. If ok than redirect to profile page.
    4. If No username or email available than asked to create a new account.
    5. A "create an account" will redirect to register/create new account page.
    6. Login users will not be able to see the login page  
    
 

	How to: 	
	1. Logged in users will not able enter/view this page
 	<?php
	if(isset($_SESSION['name'])){
	header('location: profile.php');
	   }
	?>
	2. get user name/email information information via POST method
	3. Get data from the database based on user name
	4. Check user data with num_rows property (num_rows property check frequency of data available on database)
	5. if username or email available, user info sent to session  and redirect to profile page.  or else send a validation message	
	

Register Now page:
	1. Basic form with 8 input fields and a submit button (To collection user data and send to user table) and login button (redirect to login page/index) for 	existing user.
	2. Basic validations
		a. all fields are required
		b. Email check
		c. Confirm password
		d. Check box - I agree ticked
	Advance check:
		a. Email Already Exist
		b. username already exist
		c. Cell number already exist 

How to: 
	1.Collecting form data
		1. all input field must be inside form tag
		2. use POST method to get the data
		3. all input field must have a name
	2. Receive data by $_POST() function
	3. Check 'I agree' by following method

	$status = 'disagree';
		
		if(isset($_POST['status'])) {
		$status = $_POST['status'];
		}
	if $status = 'disagree' -  a warning will be sent

	4. photo information will be receive via $_FILE() function
	5. Passord will be encripted by following method (salt)
	password_hash($pass,PASSWORD_DEFAULT);
	6. Validation for empty cell check by empty() function
	7. Email validation by !filter_var($email, FILTER_VALIDATE_EMAIL) 
	8. Password confirmation by 
	if($cpass !== $pass){
			$mess = validationMsg ("Password do not match", "danger");
	9. Existing  Username/Email/Password will be check with num_rows property

value check function:
function valueCheck($table, $column, $val){
        global $connection;
        $sql  = "SELECT $column FROM $table WHERE $column ='$val'";
		$data = $connection -> query($sql);
		return $data -> num_rows; 
}



	10. After successful check and validation of information, user will be sent to login page

End of Register page
--------------------
Profile Page: 
Features: information changed/loaded dynamically
	1. Proifle picture 
	2. User Name
	3. Table with multiple more information
	4. Login user won't be be able to see login/index page
	5. Also on one will be able to see this profile page with logging in, they will be redirect to index/login page
How to: 
 	1. logout button will send "?logout=OK" information to url
	2. $_GET function get the this information and initiate session-destroy() function and
	3. redirection to login page (index.php) by header() function
	4. also block entry for this page if not name available on session (current)
	5. all the dynamic information will be avail through session information
End of Profile page

-----

All Users page:

Features: 1. Basic table with 6 columns
	2. Action column has 3 button
		1. View
		2. Edit and
		3. Delete.
	3. Table data is dynamically populated
	4. Login users will not able see its own view

	


