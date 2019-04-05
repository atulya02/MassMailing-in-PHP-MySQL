<!DOCTYPE html>
<html>
<head>
	<title>Login/SignUp</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div id="overlay">
  <div id="mail-container">
    <div id="line-container">
        <div class="line line-1"></div>
        <div class="line line-4"></div>
        <div class="line line-2"></div>
        <div class="line line-5"></div>
        <div class="line line-3"></div>
    </div>
    <div id="mail"></div>
</div>
  
</div>

<section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        <p class="user_unregistered-text">Create one and send thousands of emails at a single click.</p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Have an account?</h2>
        <p class="user_registered-text">Just Hop on in.</p>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>
    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form" action="validation.php" method="post">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" placeholder="Username" name="Username" class="forms_field-input" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password"  name="PassLogin" class="forms_field-input" required />
            </div>
          </fieldset>
          <div><?php 
          session_start();

		   if (isset($_SESSION['message']))
				{
				    echo $_SESSION['message'];
				    
				} ?>
					
				</div>
          <div class="forms_buttons">
            <button type="button" class="forms_buttons-forgot">Forgot password?</button>
            <input type="submit" value="Log In" class="forms_buttons-action">
          </div>
        </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form class="forms_form" action="register.php" method="post">
          <fieldset class="forms_fieldset">
          	<div class="forms_field">
              <input type="text" placeholder="Full Name" name="name" class="forms_field-input" required />
            </div>
          	<div class="forms_field">
              <input type="text" placeholder="Email" name="email" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="text" placeholder="Username" name="Username" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" name="Pass" class="forms_field-input" required />
            </div>
            
          </fieldset>
          <div class="forms_buttons">
            <input type="submit" value="Sign up" class="forms_buttons-action">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<script type="text/javascript">
	/**
 * Variables
 */
const signupButton = document.getElementById('signup-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener('click', () => {
  userForms.classList.remove('bounceRight')
  userForms.classList.add('bounceLeft')
}, false)

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener('click', () => {
  userForms.classList.remove('bounceLeft')
  userForms.classList.add('bounceRight')
}, false)
</script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $("#overlay").slideUp("");
        }, 5500);
    })
</script>


