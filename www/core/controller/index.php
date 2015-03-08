<?php
	class index extends GC
	{
		public function showAction()
		{
			$message="IT'S WORK!";
			include_once("./core/view/index/show.php");
		}
	}