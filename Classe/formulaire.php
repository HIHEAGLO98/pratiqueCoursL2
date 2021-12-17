<!-- FORMULAIRE -->

<form method="post" action="traitement.php">
	<h3 align="centre">Etat civil</h3>
	<p>
		<label>Nom 
			<input type="text" maxlength="25" size="30"  name="nom" >
		</label>
	</p>
	<p>	
		<label>Prenom <input type="text" placeholder="ton prenom" autocomplete="false" required="true" name="prenom"></label> 
	</p>
	<p>
		<label>Date de naissance 
			<input type="date" name="dateNaiss">
		</label> 
	</p>
	<p>
		<label>Heure de naissance 
			<input type="time"  autocomplete="false" required="true" name="heureNaiss">
		</label> 
	</p>
	<p>
		<label>Sexe </label> <input type="radio" value="Féminin" name="sexe" /> <label>Féminin</label> <input type="radio" value="Masculin" name="sexe" /><label>Masculin</label> 
	</p>		
	<p>	
		<label>Taille <input type="number" max="192" min="140" name="Taille" autocomplete="false"></label>cm 
	</p>
	<h3 align="centre">Autre</h3>
	<p>	
		<label>Code PIN <input type="password" placeholder="code PIN" name="pin" autocomplete="false" required="true"></label> 
	</p>
	<p>
		<label>Email <input type="email" placeholder="Votre email" name="email"></label> 
	</p>
	<p>
		<label>Teint <input type="color" name="teint" /> </label> 
	</p>
	

	<input type="submit" value="Envoyer" name="Envoyer">
	<input type="reset" value="Annuler" name="Annuler">

</form>


<!-- 	<label>Votre CV <input type="file" /></label> <br/><br/>
 -->