

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>

<style>


form {
  /* Uniquement centrer le formulaire sur la page */
  margin: 0 auto;
  width: 400px;
  /* Encadré pour voir les limites du formulaire */
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;
}

form div + div {
  margin-top: 1em;
}

label {
  /* Pour être sûrs que toutes les étiquettes ont même taille et sont correctement alignées */
  display: inline-block;
  width: 90px;
  text-align: right;
}

input, textarea {
  /* Pour s'assurer que tous les champs texte ont la même police.
     Par défaut, les textarea ont une police monospace */
  font: 1em sans-serif;

  /* Pour que tous les champs texte aient la même dimension */
  width: 300px;
  box-sizing: border-box;

  /* Pour harmoniser le look & feel des bordures des champs texte */
  border: 1px solid #999;
}

input:focus, textarea:focus {
  /* Pour souligner légèrement les éléments actifs */
  border-color: #000;
}

textarea {
  /* Pour aligner les champs texte multi‑ligne avec leur étiquette */
  vertical-align: top;

  /* Pour donner assez de place pour écrire du texte */
  height: 5em;
}

.button {
  /* Pour placer le bouton à la même position que les champs texte */
  padding-left: 90px; /* même taille que les étiquettes */
}

button {
  /* Cette marge supplémentaire représente grosso modo le même espace que celui
     entre les étiquettes et les champs texte */
  margin-left: .5em;
}


</style>


  <body>
    <p>This is my page</p>

    <form action="thanks.php" method="post">
        <div>
            <label for="firstname">Nom :</label>
            <input type="text" id="firstname" name="firstname">
        </div>
        <div>
            <label for="surname">Nom :</label>
            <input type="text" id="surname" name="surname">
        </div>

        <div>
            <label for="mail">e-mail :</label>
            <input type="email" id="mail" name="mail">
        </div>

        <div>
            <label for="phone">telephone :</label>
            <input type="phone" id="phone" name="phone">
        </div>
        <div>
            <label for="sujet">sujet :</label>
            <input id="sujet" id="sujet" name="sujet"></textarea>
        </div>
        <div>
            <label for="msg">Message :</label>
            <textarea id="msg" name="message"></textarea>
        </div>
        <div class="button">
            <button type="submit">Envoyer le message</button>
        </div>
    </form>
    
  </body>
</html>






<?php

$surname = $_POST { 'surname'};
$firstname = $_POST {'firstname'};
$email = $_POST {'email'};
$phone = $_POST {'phone'};
$sujet = $_POST {'sujet'};
$message = $_POST {'message'};

$connection = new PDO ('mysql:host=localhost;dbname=;charset=UTF8;','loginroot','password');

$query = "INSERT INTO dbb (surname, firstname, email, phone, sujet,message)
        VALUES(:surname,:firstname,:email,:phone,:sujet,:message);";

 $statement = $connection->prepare($query);
 $statement  -> bindValue(':surname',$surname,PDO::PARAM_STR);
 $statement  -> bindValue(':firstname',$firstname,PDO::PARAM_STR); 
 $statement  -> bindValue(':email',$email,PDO::PARAM_STR); 
 $statement  -> bindValue(':sujet',$sujet,PDO::PARAM_STR); 
 $statement  -> bindValue(':phone',$phone,PDO::PARAM_STR); 
 $statement  -> bindValue(':message',$message,PDO::PARAM_STR);
 $statement -> execute();
 
 echo "Merci $surname $firstname de nous avoir contacté à propos de $sujet
 Un de nos conseiller vous contactera soit à l’adresse $email ou par téléphone au $phone 
 dans les plus brefs délais pour traiter votre demande";
