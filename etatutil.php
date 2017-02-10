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
  if(isset($_GET['id']))
  {
  $id = $_GET['id'];
  $ans = $db->query('SELECT * FROM utilisateur WHERE id = '.$id.'');
  $data = $ans->fetch();
  echo '<h2>'.$data['nom'].' '.$data['prenom'].' a les comptes suivant créés :<br></h2>';
  $identifiant = $data['identifiant'];
  $ans = $db->query('SELECT * FROM comptes WHERE id = '.$id.'');
  $data2 = $ans->fetch();
  echo '<h3 name="un"><ul>';
  if($data['cora'] == 1 AND $data2['cora'] == 1) 
  {
    echo '<li>Compte Cora</li>';
  }
  if($data['synapse'] == 1 AND $data2['synapse'] == 1) 
  {
    echo '<li>Compte Synapse</li>';
  }
  if($data['ultragenda'] == 1 AND $data2['ultragenda'] == 1) 
  {
    echo '<li>Compte Ultragenda</li>';
  }
  if($data['lecteur'] == 1 AND $data2['lecteur'] == 1) 
  {
    echo '<li>Lecteur reseau</li>';
  }
  if($data['internet'] == 1 AND $data2['internet'] == 1) 
  {
    echo '<li>Connexion internet</li>';
  }
  if($data['cmail'] == 1 AND $data2['mail'] == 1) 
  {
    echo '<li>Adresse mail</li>';
  }
  if($data['winrest'] == 1 AND $data2['winrest'] == 1) 
  {
    echo '<li>Compte Winrest</li>';
  }
  if($data['ennov'] == 1 AND $data2['ennov'] == 1) 
  {
    echo '<li>Compte Ennov</li>';
  }
  if($data['cpage'] == 1 AND $data2['cpage'] == 1) 
  {
    echo '<li>Compte Cpage</li>';
  }
  echo '</ul></h3>';
  }
  ?>
  </p>
  <br>
  <br>
  <p>
  <h2>Il reste les comptes suivant à lui créer</h2> 
  <?php
  echo '<h3 name="deux"><ul>';
  if($data['cora'] == 1 AND $data2['cora'] == 0) 
  {
    echo '<li>Compte Cora</li>';
  }
  if($data['synapse'] == 1 AND $data2['synapse'] == 0) 
  {
    echo '<li>Compte Synapse</li>';
  }
  if($data['ultragenda'] == 1 AND $data2['ultragenda'] == 0) 
  {
    echo '<li>Compte Ultragenda</li>';
  }
  if($data['lecteur'] == 1 AND $data2['lecteur'] == 0) 
  {
    echo '<li>Lecteur reseau</li>';
  }
  if($data['internet'] == 1 AND $data2['internet'] == 0) 
  {
    echo '<li>Connexion internet</li>';
  }
  if($data['cmail'] == 1 AND $data2['mail'] == 0) 
  {
    echo '<li>Adresse mail</li>';
  }
  if($data['winrest'] == 1 AND $data2['winrest'] == 0) 
  {
    echo '<li>Compte winrest</li>';
  }
  if($data['ennov'] == 1 AND $data2['ennov'] == 0) 
  {
    echo '<li>Compte Ennov</li>';
  }
  if($data['cpage'] == 1 AND $data2['cpage'] == 0) 
  {
    echo '<li>Compte Cpage</li>';
  }
  if($data2['cora'] == 1 AND $data2['cora'] AND $data2['ultragenda'] AND $data2['lecteur'] AND $data2['internet'] == 1 AND $data2['mail'] == 1)
  {
    echo 'Il ny a plus de compte a créer';
  }
  echo '</ul></h3>';
  ?>
  </p>
  <br>
  <br>
  <p>
  <h2>Ajouter un compte que vous venez de créer à cette utilisateur</h2>
  <form action="updateutil.php" method="post" name="updateutil">
    <?php
    if($data['cora'] == 1 AND $data2['cora'] == 0)
    {
      echo '<pre><input type="checkbox" name="cora" value="1"> Compte Cora</pre>';
    }
    if($data['synapse'] == 1 AND $data2['synapse'] == 0)
    {
      echo '<pre><input type="checkbox" name="synapse" value="1"> Compte Synapse</pre>';
    }
    if($data['ultragenda'] == 1 AND $data2['ultragenda'] == 0)
    {
      echo '<pre><input type="checkbox" name="ultragenda" value="1"> Compte ultragenda</pre>';
    }
    if($data['lecteur'] == 1 AND $data2['lecteur'] == 0)
    {
      echo '<pre><input type="checkbox" name="lecteur" value="1"> Lecteur reseau</pre>';
    }
    if($data['internet'] == 1 AND $data2['internet'] == 0)
    {
      echo '<pre><input type="checkbox" name="internet" value="1"> Compte internet</pre>';
    }
      echo '<input type="hidden" name="id" value='.$id.'>';
    if($data['cmail'] == 1 AND $data2['mail'] == 0)
    {
      echo '<pre><input type="checkbox" name="cmail" value="1"> Adresse mail</pre>';
    }
    if($data['winrest'] == 1 AND $data2['winrest'] == 0)
    {
      echo '<pre><input type="checkbox" name="winrest" value="1"> Compte Winrest</pre>';
    }
    if($data['ennov'] == 1 AND $data2['ennov'] == 0)
    {
      echo '<pre><input type="checkbox" name="ennov" value="1"> Compte Ennov</pre>';
    }
    if($data['cpage'] == 1 AND $data2['cpage'] == 0)
    {
      echo '<pre><input type="checkbox" name="cpage" value="1"> Compte cpage</pre>';
    }
    ?>
      <input type="submit" name="envoie"/>
  </form>
  </p>
  </body>
</html>
