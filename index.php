<?php
	require("config.php");

	require(ROOT_LOCATION . "/modules/general/Main.php");

	require(ROOT_LOCATION . "/modules/menu/Main.php");

	if (!$_SESSION['loggedIn']) {
		header("LOCATION: " . RELATIVE_ROOT . "/login/?return=" . urlencode($_SERVER['REQUEST_URI']) . ((isset($_GET['noMobile'])) ? "&noMobile&noJS" : ""));
		exit();
	}
		
	$back = RELATIVE_ROOT . "/";
	$headerText = "SIS.Web Access";
	$name = $_SESSION['name'];
	
	$buttons[1]['displayed'] = true;
	$buttons[1]['enabled'] = true;
	$buttons[1]['svg'] = ROOT_LOCATION . "/data/images/web-access/timetable.svg";
	$buttons[1]['text'] = "Stundenplan";
	$buttons[1]['url'] = RELATIVE_ROOT . "/timetables/";
	$buttons[1]['jsurl'] = RELATIVE_ROOT . "/timetables/?js";

	$buttons[2]['displayed'] = true;
	$buttons[2]['enabled'] = true;
	$buttons[2]['svg'] = ROOT_LOCATION . "/data/images/web-access/substitudes.svg";
	$buttons[2]['text'] = "Supplierplan";
	$buttons[2]['url'] = RELATIVE_ROOT . "/substitudes/";
	$buttons[2]['jsurl'] = RELATIVE_ROOT . "/substitudes/?js";

	$buttons[5]['displayed'] = true;
	$buttons[5]['enabled'] = true;
	$buttons[5]['svg'] = ROOT_LOCATION . "/data/images/web-access/news.svg";
	$buttons[5]['text'] = "News";
	$buttons[5]['url'] = RELATIVE_ROOT . "/news/";
	$buttons[5]['jsurl'] = RELATIVE_ROOT . "/news/?js";
	
	$buttons[6]['displayed'] = true;
	$buttons[6]['enabled'] = false;
	$buttons[6]['svg'] = ROOT_LOCATION . "/data/images/web-access/inputs.svg";	
	$buttons[6]['text'] = "Eingaben";		
	$buttons[6]['url'] = RELATIVE_ROOT . "/backend/?noJS" . (isset($_GET['noMobile']) ? "&noMobile" : "");
	$buttons[6]['jsurl'] = RELATIVE_ROOT . "/backend/?js&menu";
	// if any value in the rights-array is true => enable this menu option
	foreach ($_SESSION['rights'] as $value) {
		if ($value)
			$buttons[6]['enabled'] = true;
	}

	generateMenu();

?>
