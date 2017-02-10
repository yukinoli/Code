<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Utilisateurs</title>
    <link href="style.css" rel="stylesheet" media="all" type="text/css">
  </head>
  <body>
    <p>
    </p>
    <p>
    <p>
    <div>
      <form action="utilisateur.php" method="post" name="utilsateur">
        <h2>Création utilisateur</h2>
        <input placeholder='Nom' type="text" name="nom" /><br><br> 
        <input placeholder='Prenom' type="text" name="prenom" /><br><br>
        <input placeholder='Votre service' type="text" name="service" /><br><br>
        <select name="fonction">
          <option value="">Votre fonction</option>
          <option value="medecin">Medecin</option>
          <option value="infirmier">Infirmier</option>
          <option value="aide">Aide soignant</option>
          <option value="premanance">Permanance administration</option>
        </select><br><br>
        <div>
          <pre><input type="checkbox" name="mail" value="1"> Adresse mail</pre>
          <pre><input type="checkbox" name="lecteur" value="1"> Lecteur reseau</pre>
          <pre><input type="checkbox" name="internet" value="1"> Acces internet</pre>
          <pre><input type="checkbox" name="cora" value="1"> Acces logiciel Cora</pre>
          <pre><input type="checkbox" name="synapse" value="1"> Acces logiciel Synapse</pre>
          <pre><input type="checkbox" name="ultragenda" value="1"> Acces logiciel Ultragenda</pre>
          <pre><input type="checkbox" name="winrest" value="1"> Acces logiciel Winrest</pre>
          <pre><input type="checkbox" name="ennov" value="1"> Acces logiciel Ennov</pre>
          <pre><input type="checkbox" name="cpage" value="1"> Acces logiciel Cpage</pre>
          <input type="hidden" name="mot_de_passe" value="<?php$_POST['mot_de _passe']?>"/>
          <input type="hidden" name="username" value="<?php$_POST['username']?>"/>
        </div>
        <input type="submit" name="envoie" value="Créer"/>
      </form>
    </div>
    </p>
    <?php
    include ('connectiondb.php'); 
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "sichcinfo" AND (isset($_POST['username'])) AND $_POST['username'] == "root")
    {
    echo '<p>
    <table name="util">
      <caption><h1>Utilisateurs existant</h1></caption>
      <thead>   
        <tr>
          <td>Nom</td>
          <td>Prenom</td>
          <td>Identifiant</td>
          <td>Mot de passe</td>
          <td>Mail</td>
          <td>Fonction</td>
          <td>Service</td>
          <td>Ticket glpi</td>
          <td>Compte Cora</td>
          <td>Compte Synapse</td>
          <td>Compte Ultragenda</td>
          <td>Compte mail</td>
          <td>Compte Winrest</td>
          <td>Compte Ennov</td>
          <td>Compte Cpage</td>
          <td>Lecteur réseau</td>
          <td>Accès Internet</td>
          <td>Supprimer</td>
        </tr>
      </thead>
      <tbody>';
        $i = 1;
        $ans = $db->query('SELECT * FROM utilisateur ORDER BY nom');
          while($data = $ans->fetch())
          {
            $glpi = $db2->query('SELECT * FROM glpi_tickets WHERE content LIKE "%'.$data['identifiant'].'%"');       
            $glpi2 = $glpi->fetch();
            if($data['cora'] == 0)
            {
              $echcora = 'non';
            }
            else
            {
              $echcora = 'oui';
            }
            if($data['synapse'] == 0)
            {
              $echsynapse = 'non';
            }
            else
            {
              $echsynapse = 'oui';
            }
            if($data['ultragenda'] == 0)
            {
              $echultragenda = 'non';
            }
            else
            {
              $echultragenda = 'oui';
            }
            if($data['lecteur'] == 0)
            {
              $echlecteur = 'non';
            }
            else
            {
              $echlecteur = 'oui';
            }
            if($data['internet'] == 0)
            {
              $echinternet = 'non';
            }
            else
            {
              $echinternet = 'oui';
            }
            if($data['cmail'] == 0)
            {
              $cmail = 'non';
            }
            else
            {
              $cmail = 'oui';
            }
            if($data['winrest'] == 0)
            {
              $winrest = 'non';
            }
            else
            {
              $winrest = 'oui';
            }
            if($data['ennov'] == 0)
            {
              $ennov = 'non';
            }
            else
            {
              $ennov = 'oui';
            }
            if($data['cpage'] == 0)
            {
              $cpage = 'non';
            }
            else
            {
              $cpage = 'oui';
            }
            echo '<tr><td><a href="etatutil.php?id='.$data['id'].'">'.$data['nom'].'</a></td>';
            echo '<td>'.$data['prenom'].'</td>';
            echo '<td>'.$data['identifiant'].'</td>';
            echo '<td>'.$data['mot_de_passe'].'</td>';
            echo '<td>'.$data['mail'].'</td>';
            echo '<td>'.$data['fonction'].'</td>';
            echo '<td>'.$data['service'].'</td>';
            echo '<td><a href="http://srvglpi/glpi/front/ticket.form.php?id='.$glpi2['id'].'" />'.$glpi2['id'].'</td>';
            echo '<td>'.$echcora.'</td>';
            echo '<td>'.$echsynapse.'</td>';
            echo '<td>'.$echultragenda.'</td>';
            echo '<td>'.$cmail.'</td>';
            echo '<td>'.$winrest.'</td>';
            echo '<td>'.$ennov.'</td>';
            echo '<td>'.$cpage.'</td>';
            echo '<td>'.$echlecteur.'</td>';
            echo '<td>'.$echinternet.'</td>';
            echo '<td><a href="suppression.php?id='.$data['id'].'">supprimer</a></td></tr>';
          }
        $ans->closeCursor();
      echo '</tbody>  
    </table>
    </p>
    </p>';
    }
    ?>
  </body>
</html>
