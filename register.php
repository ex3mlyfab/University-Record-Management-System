<?php 
  require_once 'header.php';
  ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-6 text-center">
            <h1><strong><?php echo $appname;?></strong><br>Registration Form</h1>
                <div class="description">
                    <p>Apply for the course of your choice here and click on restration status a while later to find out if you have been admitted.
	                            	
                    </p>
                </div>
                            
        </div>
        <div class="col-sm-6 form-box bg-dark">
            <div class="form-top">
                <div class="form-top-left">
                	<h3>Register Now</h3>
                   	<p>Fill in your particulars in the form below:</p>
                </div>
                <div class="form-top-right">
                       	<i class="fa fa-pencil"></i>
                </div>
                <div class="form-top-divider"></div>
            </div>
            <div class="form-bottom">
			    <form role="form" action="regtreat.php" method="post" class="registration-form">
			    <div class="form-group">
			        <label class="sr-only" for="form-first-name">First name</label>
			            <input type="text" name="first-name" placeholder="First name..." class="form-first-name form-control" id="form-first-name" required>
			    </div>
			    <div class="form-group">
			        <label class="sr-only" for="form-last-name">Last name</label>
			            <input type="text" name="form-last-name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name" required>
			    </div>
			    <div class="form-group">
			        <label class="sr-only" for="form-email">Email</label>
			            <input type="email" name="form-email" placeholder="Email..." class="form-email form-control" id="form-email" required>
			    </div>

			    <div class="form-group">
			    	<label class="bg-white">Select Department You Wish To Apply For:</label>
			    	<?php getdepartment(); ?>
			    </div>
			    <div class="form-top">
			        <div class="form-top-left">
			        	
			           	<p>enter registration payment details:</p>
			        </div>
			        <div class="form-top-right">
			               	<i class="fa fa-credit-card"></i>
			        </div>
			        <div class="form-top-divider"></div>
			    </div>
			    <div class="form-group">
			        <label class="sr-only" for="transaction-date">transaction- date</label>
			            <input type="date" name="transaction-date" placeholder="date on teller" class="form-first-name form-control" id="transaction-date" required>
			    </div>
			    <div class="form-group">
			        <label class="sr-only" for="teller-number">Last name</label>
			            <input type="text" name="teller-number" placeholder="teller-number" class="form-last-name form-control" id="teller-number" required>
			    </div>
			    <div class="form-group">
			        <label class="sr-only" for="bank-name">Last name</label>
			            <input type="text" name="bank-name" placeholder="bank name..." class="form-last-name form-control" id="bank-name" required>
			    </div>
			    <div class="form-group">
			        <label class="sr-only" for="Amount">Last name</label>
			            <input type="text" name="amount" placeholder="amount paid..." class="form-last-name form-control" id="form-last-name" required>
			    </div>


			    <button type="submit" class="btn">Register</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
<?php 
require_once 'footer.php';
?>