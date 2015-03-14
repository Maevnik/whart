<?php
	class indexController extends GC
	{
		public function showAction()
		{
			$message="IT WORKs!";
			include_once("./core/view/index/show.php");
		}
		
	}