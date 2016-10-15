<?php
function SignIn($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class='SignIn Paper'>
    <h1>Sign In</h1>
    <h2>Enter The Password</h2>
    <form action="admin.php" method="POST">
      <input type="password" name="password" />
      <input type="submit" value="Sign In" />
    </form>
    <p>Hint: The password is password</p>
  </div>
TEMPLATE;
};
