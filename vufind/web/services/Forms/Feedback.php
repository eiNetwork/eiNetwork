<?php
/**
 *
 * Copyright (C) Villanova University 2007.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 */

require_once 'Action.php';

class Feedback extends Action {

	function launch()
	{
		global $interface;
		global $configArray;
		global $library;
		global $locationSingleton;
		global $timer;
		global $user;

		// Include Search Engine Class
		require_once 'sys/' . $configArray['Index']['engine'] . '.php';
		require_once 'sys/Mailer.php';
		//$mailer = new VuFindMailer();
		//$mailer->send("ngccontact@einetwork.net","ilsadmin@einetwork.net","hello","hi");
		if (isset($_REQUEST['submit'])){
			$ToEmail = 'ngccontact@einetwork.net'; 
			$EmailSubject = 'User Feedback';
			if($_REQUEST["email"]!=null){
				$mailheader = "From: ".$_REQUEST["email"]."\r\n"; 
				$mailheader .= "Reply-To: ".$_REQUEST["email"]."\r\n"; 
			}else{
				$mailheader = "From: "."ilsadmin@einetwork.net"."\r\n"; 
				$mailheader .= "Reply-To: "."ilsadmin@einetwork.net"."\r\n"; 
			}
			$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$MESSAGE_BODY = '';
			if($_REQUEST["name_input"]!=null){
				$MESSAGE_BODY = "Name: &nbsp;&nbsp;".$_REQUEST["name_input"]."</br>"; 
			}else{
				//$MESSAGE_BODY = "Name: &nbsp;&nbsp;".$_REQUEST["name"]."</br>"; 
			}
			if($_REQUEST["email"]!=null){
				$MESSAGE_BODY .= "Email: &nbsp;&nbsp;".$_REQUEST["email"]."</br></br>";
			}
			if(isset($_REQUEST["useragent"])){
				$MESSAGE_BODY .= "User Agent: ".$_REQUEST["useragent"]."</br></br>"; 
			}
			if(isset($_REQUEST["feedback-textarea"])){
				$MESSAGE_BODY .= "Feedback: </br>".nl2br($_REQUEST["feedback-textarea"])."\r\n"; 
			}
			mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure");
			$interface->assign("submit",true);
		}else{
			$interface->assign("submit",false);
			
		}
		
		//$timer->logTime('Include search engine');

		$interface->assign('showBreadcrumbs', 0);

		if ($user){
			$catalog = new CatalogConnection($configArray['Catalog']['driver']);
			$patron = $catalog->patronLogin($user->cat_username, $user->cat_password);
			$profile = $catalog->getMyProfile($patron);
			if (!PEAR::isError($profile)) {
				$interface->assign('profile', $profile);
			}
		}

		//Get the lists to show on the home page
		require_once 'sys/ListWidget.php';
		$widgetId = 1;
		$activeLocation = $locationSingleton->getActiveLocation();
		if ($activeLocation != null && $activeLocation->homePageWidgetId > 0){
			$widgetId = $activeLocation->homePageWidgetId;
			$widget = new ListWidget();
			$widget->id = $widgetId;
			if ($widget->find(true)){
				$interface->assign('widget', $widget);
			}
		}else if (isset($library) && $library->homePageWidgetId > 0){
			$widgetId = $library->homePageWidgetId;
			$widget = new ListWidget();
			$widget->id = $widgetId;
			if ($widget->find(true)){
				$interface->assign('widget', $widget);
			}
		}

		// Cache homepage
		$interface->caching = 0;
		$cacheId = 'homepage|' . $interface->lang;
		//Disable Home page caching for now.
		if (!$interface->is_cached('layout.tpl', $cacheId)) {
			$interface->setPageTitle('Feedback');
			$interface->setTemplate('Feedback.tpl');
		}
		$interface->display('layout.tpl', $cacheId);
	}

}