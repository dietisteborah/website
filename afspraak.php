<!DOCTYPE html>
<html>
  <head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118437837-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-118437837-1');
	</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS & Javascript-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<!-- icon library -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<!-- CSS adjustments -->
	<link rel="stylesheet" type="text/css" href="customcss/custom.css">
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Khula' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>	
	
	<!-- jquery -->
	<!--<script type="text/javascript" src="jquery.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
    <title>Dietiste Borah Van Doorslaer</title>
	
  </head>
 
<script>
	$(function(){
		$("#header").load("navbar.html");
	});
	$(function(){
		$("#footer").load("footer.html");
	});
</script>
<div id="header">
</div>	
<div class="container">
<?php
	error_reporting(E_ALL);

	require_once '/home/borahv1q/dietisteborah.github.io/vendor/autoload.php';

	putenv('GOOGLE_APPLICATION_CREDENTIALS=/home/borahv1q/public_html/service_account.json');
	
	function authAPI(){
		$client = new Google_Client();
		$client->useApplicationDefaultCredentials();
		$client->setScopes(array(
			'https://www.googleapis.com/auth/calendar.readonly'
		));
		$service = new Google_Service_Calendar($client);
		// Print the next 10 events on the user's calendar.
		$calendarId = 'primary';
		$optParams = array(
		  'maxResults' => 10,
		  'orderBy' => 'startTime',
		  'singleEvents' => true,
		  'timeMin' => date('c'),
		);
		$results = $service->events->listEvents($calendarId, $optParams);

		if (empty($results->getItems())) {
			print "No upcoming events found.\n";
		} else {
			print "Upcoming events:\n";
			foreach ($results->getItems() as $event) {
				$start = $event->start->dateTime;
				if (empty($start)) {
					$start = $event->start->date;
				}
				printf("%s (%s)\n", $event->getSummary(), $start);
			}
		}
	}

	authAPI();
?>
	<!-- Terugbetaling -->
	<div class="row brown_text">
		<div class="col-md-12">
			<h2 class="custom_header top-buffer-35" align="left">Online afspraak maken - under construction</h2
		</div>
	</div>	
</div>
<div id="footer">
</div>
</html>