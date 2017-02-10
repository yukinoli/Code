<!DOCTYPE html>
<html>
  <head>
    <link href="style.css" rel="stylesheet" media="all" type="text/css">
    <meta charset="utf-8" />
    <title>Etat utilisateur</title>
  </head>
  <body>
  <p>
  <?php
  mb_internal_encoding('UTF-8');
  include ('connectiondb.php');
  if(isset($_POST['utilisateur']))
  echo $_POST['utilisateur'];
  $util = $_POST;
  $line1 = '';
  {
    foreach($util as $line)
    {
      $line1 = $line1." ".$line;
    }
    $res = explode(' ',$line1);
// creation identifiant
    $nom = substr($res[1], 0, 3);
    $prenom = substr($res[2], 0, 3);
    $low = $prenom.$nom;
    $identifiant = strtolower($low);
// creation mot de passe
    $e = 4;
    for($i = 1; $i <= $e; $i++)
    {
      $num = '0123456789';
      $d = 9;
      $n = mt_rand(2,($d));
      $nbr = mt_rand(0,($e));
      $mdp = $identifiant[$nbr].$num[$n].$mdp;
    }
// creation mail
   $mailp = substr($res[2], 0, 1);
   $adressemail = $mailp.'.'.$res[1].'@ch-calais.fr'; 
   $adressemail2 = strtolower($adressemail);
// requete
    $ans = $db->query('SELECT MAX(id) FROM utilisateur');
    $idmax = $ans->fetch();
    $id = $idmax[0] + 1;
    if(empty($_POST['cora']))
    {
      $cora = 0;
      $mailcora = 'non';
    }
    else
    {
      $cora = 1;
      $mailcora = 'oui';
    }
    if(empty($_POST['synapse']))
    {
      $synapse = 0;
      $mailsynapse = 'non';
    }
    else
    {
      $synapse = 1;
      $mailsynapse = 'oui';
    }
    if(empty($_POST['ultragenda']))
    {
      $ultragenda = 0;
      $mailultra = 'non';
    }
    else
    {
      $ultragenda = 1;
      $mailultra = 'oui';
    }
    if(empty($_POST['winrest']))
    {
      $winrest = 0;
      $mailwinrest = 'non';
    }
    else
    {
      $winrest = 1;
      $mailwinrest = 'oui';
    }
    if(empty($_POST['ennov']))
    {
      $ennov = 0;
      $mailennov = 'non';
    }
    else
    {
      $ennov = 1;
      $mailennov = 'oui';
    }
    if(empty($_POST['cpage']))
    {
      $cpage = 0;
      $mailcpage = 'non';
    }
    else
    {
      $cpage = 1;
      $mailcpage = 'oui';
    }
    if(empty($_POST['lecteur']))
    {
      $lecteur = 0;
      $maillecteur = 'non';
    }
    else
    {
      $lecteur = 1;
      $maillecteur = 'oui';
    }
    if(empty($_POST['internet']))
    {
      $internet = 0;
      $mailinternet = 'non';
    }
    else
    {
      $internet = 1;
      $mailinternet = 'oui';
    }
    if(empty($_POST['mail']))
    {
      $adressemail2 = '';
      $cmail = 0;
      $mailc = 'non';
    }
    else
    {
      $cmail = 1;
      $mailc = 'oui';
    }
    $ans = $db->prepare('INSERT INTO utilisateur(id, nom, prenom, identifiant, mot_de_passe,  mail, fonction, service, cora, synapse, ultragenda, lecteur, internet, cmail, winrest, ennov, cpage) VALUES (:id, :nom, :prenom, :identifiant, :mot_de_passe, :mail, :fonction, :service, :cora, :synapse, :ultragenda, :lecteur, :internet, :cmail, :winrest, :ennov, :cpage)');
    $ans->execute(array(
      'id' => $id,
      'nom' => $res[1],
      'prenom' => $res[2],
      'identifiant' => $identifiant,
      'mot_de_passe' => $mdp,
      'mail' => $adressemail2,
      'fonction' => $_POST['fonction'],
      'service' => $_POST['service'],
      'cora' => $cora,
      'synapse' => $synapse,
      'ultragenda' => $ultragenda,
      'lecteur' => $lecteur,
      'internet' => $internet,
      'cmail' => $cmail,
      'winrest' => $winrest,
      'ennov' => $ennov,
      'cpage' => $cpage
    ));
    $ans = $db->prepare('INSERT INTO comptes(id, cora, synapse, ultragenda, lecteur, internet, mail, winrest, ennov, cpage) VALUES (:id, :cora, :synapse, :ultragenda, :lecteur, :internet, :mail, :winrest, :ennov, :cpage)');
    $ans->execute(array(
      'id' => $id,
      'cora' => 0,
      'synapse' => 0,
      'ultragenda' => 0,
      'lecteur' => 0,
      'internet' => 0,
      'mail' => 0,
      'winrest' => 0,
      'ennov' => 0,
      'cpage' => 0
    ));
    $ans->closeCursor();
    echo '<h1>Votre compte à bien été créé</h1><br>';
    echo '<p>Votre mot de passe est <mark>'.$mdp.'</mark><br>';
    echo 'Votre identifiant est <mark>'.$identifiant.'</mark></p>';
  }
// envoie mail
    $message = '<html><h1>Création de lutilisateur'.$nom.' '.$prenom.'</h1><br><br><p>Sont mot de passe est '.$mdp.'<br>Sont identifiant est '.$identifiant.'<br>Compte Cora : '.$mailcora.'<br>Compte Synapse : '.$mailsynapse.'<br>Compte Ultragenda : '.$mailultra.'<br>Compte Winrest : '.$mailwinrest.'<br>Compte Ennov : '.$mailennov.'<br>Compte Cpage : '.$mailcpage.'<br>Lecteur reseau : '.$maillecteur.'<br>Acces internet : '.$mailinternet.'<br>Adresse mail : '.$mailc.'</p></html>';
    $subject = 'Creation utilisateur';
    $to = 'cedric.duboille@gmail.com';
    $headers = "From: $from";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
    mail($to, $subject, $message, $headers);
  ?>
  </p>
  <?php
  if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "sichcinfo" AND (isset($_POST['username'])) AND $_POST['username'] == "root")
  {
    echo '<form action="creationUtilisateur" name="retour">';
    echo '<input type="submit" value="Créer"/>';
    echo '<input type="hidden" value="'.$_POST['mot_de_passe'].'"/>';
    echo '</form>';
  }
  ?>
 <!--  <form action="creationUtilisateur.php" name="retour">
    <input type="submit" name="retour" value="Retour">
  </form> -->
  </body>
</html>
