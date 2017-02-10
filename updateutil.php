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
  include ('connectiondb.php');
  if(isset($_POST['updateutil']))
  echo $_POST['updateutil'];
  {
    $id = $_POST['id'];
    $ans = $db->query('SELECT * FROM comptes WHERE id = '.$id.'');
    $data = $ans->fetch();
    if(isset($_POST['synapse']) AND $data['synapse'] == 0)
    {
      $syn = 1;
      $db->exec('UPDATE comptes SET synapse='.$syn.' WHERE id = '.$id.'');
    }
    if(isset($_POST['cora']) AND $data['cora'] == 0)
    {
      $cora = 1;
      $db->exec('UPDATE comptes SET cora='.$cora.' WHERE id = '.$id.'');
    }
    if(isset($_POST['ultragenda']) AND $data['ultragenda'] == 0)
    {
      $ultra = 1;
      $db->exec('UPDATE comptes SET ultragenda='.$ultra.' WHERE id = '.$id.'');
    }
    if(isset($_POST['lecteur']) AND $data['lecteur'] == 0)
    {
      $lecteur = 1;
      $db->exec('UPDATE comptes SET lecteur='.$lecteur.' WHERE id = '.$id.'');
    }
    if(isset($_POST['internet']) AND $data['internet'] == 0)
    {
      $internet = 1;
      $db->exec('UPDATE comptes SET internet='.$internet.' WHERE id = '.$id.'');
    }
    if(isset($_POST['cmail']) AND $data['mail'] == 0)
    {
      $mail = 1;
      $db->exec('UPDATE comptes SET  mail='.$mail.' WHERE id = '.$id.'');
    }
    if(isset($_POST['winrest']) AND $data['winrest'] == 0)
    {
      $winrest = 1;
      $db->exec('UPDATE comptes SET  winrest='.$winrest.' WHERE id = '.$id.'');
    }
    if(isset($_POST['ennov']) AND $data['ennov'] == 0)
    {
      $ennov = 1;
      $db->exec('UPDATE comptes SET  ennov='.$ennov.' WHERE id = '.$id.'');
    }
    if(isset($_POST['cpage']) AND $data['cpage'] == 0)
    {
      $cpage = 1;
      $db->exec('UPDATE comptes SET  cpage='.$cpage.' WHERE id = '.$id.'');
    }
    echo '<h1>les données ont bien été mise a jour</h1><br>';
  }
  ?>
  </p>
  </body>
</html>
