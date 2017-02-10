<!DOCTYPE html>
<html>
  </head>
    <title>Suppression util</title>
    <link href="style.css" rel="stylesheet" media="all" type="text/css"> 
  </head>
  <body>
    <p>
    <?php
    include ('connectiondb.php');
    $ans = $db->query('SELECT * FROM utilisateur WHERE id = '.$_GET['id'].'');
    $data = $ans->fetch();
    $db->exec('DELETE FROM `listeutil`.`utilisateur` WHERE `utilisateur`.`id` = '.$_GET['id'].'');
    $db->exec('DELETE FROM `listeutil`.`comptes` WHERE `comptes`.`id` = '.$_GET['id'].'');
    echo '<h1>'.$data['identifiant'].' a bien été supprimé</h1>';
    ?>
    </p>
    <br>
    <p>
    <?php
    ?>
    </p>
  </body>
</html>
