<?php
	//********************************************************************************************//
	//						COPYRIGHT: VOICETECH SOLUTIONS PVT LTD,								**
	//								      BANGALORE												**
	//********************************************************************************************

	//*********** FILE NAME: Inc_side_menu_definitions.php *************************************

	//*********************************** DESCRIPTION ********************************************
	//	Definitions Of  All Side Menus.							**
	//								    														**
	//********************************************************************************************

	//********************************* HISTORY **************************************************

	// Header created by: Makam on 19-03-2014 in release version: 2.0.0.22
		//Included All Side Menus
		//Formatted
	// Header created by: Savitha on 05-09-2014 in release version: 2.0.0.23
		//Changed js/cs plugin path
	//******************************** END OF HEADER *********************************************//	
	if($_GET['Path'] == "ModuleReports")
	{
		$FileSource="../";
	}
	elseif($_GET['Path'] == "SideMenuReports")
	{
		$FileSource="../../";
	}
	elseif($_GET['Path'] != "ModuleReports")
	{
		$FileSource="../";
	}
	if($_GET['Path'] == "Reports")
	{
		$FileSource="../../";
	}
	else
	{
		$FileSource="../";
	}
?>
		<script type="text/javascript" src="../Js/basic.js"></script>
		<script type="text/javascript" src="../Js/CalenderPlugins/jscal2.js"></script>
		<script type="text/javascript" src="../Js/jquery_admin_sidemenu.min.js"></script>
		<script type="text/javascript" src="../Js/bubble-tooltip.js"></script>
		<script type="text/javascript" src="../Js/check_all.js"></script>
		<script type="text/javascript" src="../Js/mootools-1.2.1-core.js"></script>
		<script type="text/javascript" src="../Js/mootools-1.2-more.js"></script>
		<script type="text/javascript" src="../Js/slideitmoo-1.1.js"></script>
		<script type="text/javascript" src="../Js/CalenderPlugins/en.js"></script>
		<script type="text/javascript" src="../Js/jcarousellite_1.0.1c4.js"></script>
		<script type="text/javascript" src="../Js/TopMenuPlugins/jquery.contentcarousel.js"></script>
		<script type="text/javascript" src="../Js/jquery.custom_radio_checkbox.js"></script>
		<script type="text/javascript" src="../Js/TopMenuPlugins/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="../Js/jquery.form.js"></script>
		<script type="text/javascript" src="../Js/jquery.js"></script>
		<script>var $j = jQuery.noConflict();</script>
		<script type="text/javascript" src="../Js/jquery.mCustomScrollbar.concat.min.js"></script>
		<script type="text/javascript" src="../Js/TopMenuPlugins/jquery.min.js"></script>
		<script type="text/javascript" src="../Js/jquery.simplemodal.js"></script>
		<script type="text/javascript" src="../Js/jquery.wallform.js"></script>
		<script type="text/javascript" src="../Js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="../Js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="../Js/jquery-scroller-v1.min.js"></script>
		<script type="text/javascript" src="../Js/jquery-ui-1.7.1.custom.min.js"></script>
		<script type="text/javascript" src="../Js/jsScrollbar.js"></script>
		<script type="text/javascript" src="../Js/jsScroller.js"></script>
		<script type="text/javascript" src="../Js/superTables.js"></script>
		<script type="text/javascript" src="../Js/ddaccordion.js"></script>
		<script type="text/javascript" src="../Js/ddaccordion_manipulate.js"></script>
		<link type='text/css' href='../Css/demo.css' rel='stylesheet' media='screen' />
		<link type='text/css' href='../Css/basic.css' rel='stylesheet' media='screen' />
		<link rel="stylesheet" type="text/css" href= "../Css/Block_style.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/bubble-tooltip.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/core.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/jquery.mCustomScrollbar.css" />
		
		<link rel="stylesheet" type="text/css" href= "../Css/CalenderPlugins/jscal2.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/CalenderPlugins/border-radius.css" />

		<link rel="stylesheet" type="text/css" href= "../Css/login-box.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/main-styles.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/management_style.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/Referee_main_title.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/Referee_scroll_bar.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/Referee_style.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/report_content.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/Report_styles.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/Report_templatemo_style.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/superTables.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/superTables_scroll.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/templatemo_style.css" />
		<link rel="stylesheet" type="text/css" href= "../Css/TopMenuPlugins/top_icons.css" />
		<link rel="stylesheet" type="text/css" href="../Css/styles.css" />
		<link rel="stylesheet" type="text/css" id="main" href="../Css/style_dropdown.css" media="all"/>

		<script type='text/javascript' src='../Js/jquery.js'></script>
		<script type='text/javascript' src='../Js/jquery.simplemodal.js'></script>
		<script type='text/javascript' src='../Js/basic.js'></script>
