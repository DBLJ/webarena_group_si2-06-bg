<div id="containerBug">
	<div id="left_container">
	<div id="top_container">
	<p> se déplacer</p>
	<!--<?php // echo $this->Form->create(); ?>
	<?php 
	/*#define largeur (x) & longeur (y) of the arena:
	$x= 15;
	$y= 10;
	if (isset($this->request->params['pass'][0])){
		$valuex = $this->request->params['pass'][0];
	}else{
		$valuex = "";
	}
	if (isset($this->request->params['pass'][1])){
		$valuey = $this->request->params['pass'][1];
	}else{
		$valuey = "";
	}
	echo $this->Form->input('position x', [
		'type' => 'number',
		'min' => 1,
		'max' => $x,
		'value' => $valuey
	]);
	echo $this->Form->input('position y', [
		'type' => 'number',
		'min' => 1,
		'max' => $y,
		'value' => $valuex
	]);
	echo $this->Form->submit();
	echo $this->Form->end(); */ // this part is for handling auto-click to fill, in case we have time to go back on the way we move & attack
	?> -->
	<div id="form_container">
	
<form id ="up_move" name="deplacement_haut" action="sight" method="post" accept-charset="utf-8">

	<input type="hidden" name="process" value="move_y">

				<input type="submit" value="&#8593;">

</form>
<div id="inside_form_container">
<form id ="left_move" name="deplacement_gauche" action="sight" method="post" accept-charset="utf-8">

          
				<input type="hidden" name="process" value="move_x1">

				<input type="submit" value="&#8592;">

</form>



<form id ="down_move" name="deplacement_bas" action="sight" method="post" accept-charset="utf-8">
           
				<input type="hidden" name="process" value="move_y1">
				<input type="submit" value="&#8595;">

</form>
<form id ="right_move" name="deplacement_droite" action="sight" method="post" accept-charset="utf-8">

       
				<input type="hidden" name="process" value="move_x">
			

				<input type="submit" value="&#8594;">

</form>
</div>
</div>
<p>( cliquer sur l'ennemi pour attaquer )</p>
	</div>
	<div id="bottom_container">
	<?php 
	/*echo $x_attack;
	echo $y_attack;*/
	for ($i=0; $i < count($playerList); $i++) { 
	echo '<form name="playerForm" action="sight" method="post" accept-charset="utf-8">' ;
	echo '<ul>' ;
	echo '<input type="hidden" name="process" value="choosePlayer">' ;
	echo '<li>' ;
	echo '<input name="playerName" type="submit" value="' ;
	echo $playerList[$i]['email'] ;
	echo '">' ;
	echo '</li>' ;
	echo '</ul>' ;
	echo '</form>' ;
	}
	?>
	
	<!--
		<ul>
				<input type="hidden" name="process" value="choosePlayer">
			
			<li>
				<input name="playerName" type="submit" value="admin@test.com">
			</li>
		</ul>
		</form>-->
	<?php 
		
	?>
	</div>
	<?php 
	if ($choosenPlayer) {
		if ($ennemy){
	echo '<div id="chat_container">';
	echo '<h3>'.$ennemy[0]['name'].'</h3>';
	echo '<div id="discussion">';
		//<?php
		if($messages == 'undef'){
		echo '<p> choisir un joueur</p>';
		}else{
			$length = count($messages);
		for($i=$length-1; $i>=0; $i--)
		{
			if ($messages[$i]['title'] == "shouted") {
				echo '<p><b>'.$messages[$i]['message'].'</b></p>';
			}else{

				if(($fighterId) == ($messages[$i]['fighter_id_from'])){
					echo '<div class="emitted"><p class="emitted_text">'.$messages[$i]['message'].'</p></div>';
				}
				else{
					echo '<div class="received"><p class="received_text">'.$messages[$i]['message'].'</p></div>';
				}
			}

			
		}
		}
		
		echo '</div>';

		echo '<div id="input_field">';
		echo '<form name="chat_form" action="sight" method="post" accept-charset="utf-8">';
			echo '<input type="hidden" name="process" value="send">';
			echo '<input type="hidden" name="title" size="20" placeholder="Titre">';
			echo '<textarea name="message" rows=1 style="width: 100%" placeholder="Entrez votre message ici"></textarea>';
			echo '<input name="send"type="submit" value="envoyer">';
			echo '<input name="send" type="submit" value="crier">';
			echo '</form>';
		echo '</div>';
	echo '</div>';
    }}
	?>
	</div>
	
	<div id="right_container">
	<?php
	#define largeur (x) & longeur (y) of the arena:
	$x= 14;
	$y= 9;
	$nombre_de_ligne = 0;
	$nombre_de_colonne = 0;

	if ($choosenPlayer) {
	if ($ennemy){
	while ($nombre_de_colonne <= $y) {
		echo '<div class="gameblock_container">';	
		while ($nombre_de_ligne <= $x)
		{
		//perso 0

		if ($perso[0]['coordinate_x']==$nombre_de_ligne and $perso[0]['coordinate_y']==$nombre_de_colonne) {
			echo '<div class="gameblock" id="gb';
    		echo $nombre_de_colonne;
    		echo '';
    		echo $nombre_de_ligne;
    		echo '" onclick="test(';
    		echo $nombre_de_colonne;
    		echo ',';
    		echo $nombre_de_ligne;
    		echo ')" style="background: green;"></div>';
		    $nombre_de_ligne++;
		}
		elseif (($ennemy[0]['coordinate_x']==$nombre_de_ligne and $ennemy[0]['coordinate_y']==$nombre_de_colonne and abs($nombre_de_ligne-$perso[0]['coordinate_x'])+abs($nombre_de_colonne-$perso[0]['coordinate_y'])<=$perso[0]['skill_sight'])){
			echo '<div class="gameblock" id="gb';
    		echo $nombre_de_colonne;
    		echo '';
    		echo $nombre_de_ligne;
    		echo '" onclick="test(';
    		echo $nombre_de_colonne;
    		echo ',';
    		echo $nombre_de_ligne;
    		echo ')" style="background-color:red;"></div>';
		    $nombre_de_ligne++;
		}
		elseif (abs($nombre_de_ligne-$perso[0]['coordinate_x'])+abs($nombre_de_colonne-$perso[0]['coordinate_y'])<=$perso[0]['skill_sight']) {
			echo '<div class="gameblock" id="gb';
    	echo $nombre_de_colonne;
    	echo '';
    	echo $nombre_de_ligne;
    	echo '" onclick="test(';
    	echo $nombre_de_colonne;
    	echo ',';
    	echo $nombre_de_ligne;
    	echo ')" style="background-color:darkgrey;"></div>';
		    $nombre_de_ligne++;
		}
		else{
    	echo '<div class="gameblock" id="gb';
    	echo $nombre_de_colonne;
    	echo '';
    	echo $nombre_de_ligne;
    	echo '" onclick="test(';
    	echo $nombre_de_colonne;
    	echo ',';
    	echo $nombre_de_ligne;
    	echo ')" style="background-color:grey;"></div>';
		    $nombre_de_ligne++;
		}}
		echo '</div>';
		$nombre_de_ligne = 0;
		$nombre_de_colonne++;
	}
	}else{
		echo "ce joueur n'a pas de combattants, selectionnez-en un autre :)";
	}
}else{
	echo "veuillez selectionner un joueur";
}
	?>
	</div>
</div>
