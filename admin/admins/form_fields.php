<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($admin)) {
  redirect_to(url_for('/admin/admins/index'));
}
?>

<label for="admin[nome]">Nome</label>
<input type="text" name="admin[nome]" value="<?php echo h($admin->nome); ?>" />


<label for="admin[cognome]">Cognome</label>
<input type="text" name="admin[cognome]" value="<?php echo h($admin->cognome); ?>" />

<label for="admin[email]">Email</label>
<input type="text" name="admin[email]" value="<?php echo h($admin->email); ?>" />

<label for="admin[username]">Username</label>
<input type="text" name="admin[username]" value="<?php echo h($admin->username); ?>" />

<label for="admin[password]">Password</label>
<input type="password" name="admin[password]" value="" />

<label for="admin[confirm_password]">Conferma Password</label>
<input type="password" name="admin[confirm_password]" value="" />
