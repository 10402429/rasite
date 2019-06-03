<?php require_once 'partial/header.php'; ?>

      <main>
        <section>
      	<?php 
      	require_once 'dbconfig.php';


          $ticketid = $_GET['id'];
      		$sql = "SELECT * FROM tickets WHERE id = $ticketid";
  			   $result = $conn->query($sql);

  			   $ticket = $result->fetch_assoc();

          if(isset($_GET['handeld']) && $_GET['handeld'] == "true"){
            $ticketid = $_GET['id'];
            $sql = "UPDATE tickets SET status = 1 WHERE id = $ticketid";

              $conn->query($sql);

              $title = "Ticket permanent verwijderd.";
              $short_disc = "Perm. Verweiderd: " . $ticket['id'];
              $disc = "De ticket is permanent verweiderd. Het is niet mogelijk om de ticket weer op actief te zetten.
              De tickry zal opnieuw aangemaakt moeten worden indien iemand de gebruiker weer wilt gebruiken.";
              $level = 0;

              require_once 'logsUse.php';

              header("Location: tickets.php?status=0&page=1");
          }
  				?>

         	 	<article class="single-user">
  					<p>Titel: <b><?php echo $ticket['title']; ?></b></p>
  					<p>Beschrijving: <b><?php echo $ticket['discription']; ?></b></p>
            <p>Prioriteit: <b><?php echo $ticket['priority']; ?></b></p>
  					<p>Datum/tijd: <b><?php echo $ticket['date_time']; ?></b></p>
            <span>
              <button name="edit" class="btn-green">Edit</button>
              <button name="delete" class="btn-red" onclick="confDelete(<?php echo $ticket['id']; ?>)">Verwerkt</button>
            </span>

          		</article>
      	</section>
        
      </main>

<?php require_once 'partial/footer.php'; ?>
