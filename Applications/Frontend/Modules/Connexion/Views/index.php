<div class="container main-content">
	<div class="form-signin">
		<h3 class="short_headline text-center"><span>Se connecter</span></h3>
		<?php
		echo isset($erreurs) ? $erreurs : "";
		?>
		<form method="post">
			<fieldset>
				<input type="text" class="input-block-level" name="login" placeholder="Pseudo">
				<input type="password" class="input-block-level" name="password" placeholder="Mot de passe">
				<label class="checkbox">
					<input type="checkbox" value="remember-me" name="cookie"> Se souvenir de moi
				</label>
				<button class="btn custom-btn btn-primary btn-large" name="go" type="submit"><i class="fa fa-lock"></i>&nbsp; Connexion</button>
			</fieldset>
		</form>
	</div>
	<p class="text-center">
		<a href="/connexion/mot-de-passe-perdu">Mot de passe oublié ?</a> / Vous n'avez pas encore de compte ? <a href="/inscription">Inscrivez-vous</a>
	</p>
</div>