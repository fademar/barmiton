<?php

	namespace Controller;

	use \W\Controller\Controller;

	class AboutController extends Controller
	{
		public function aPropos()
		{
			$this->show('about/about');
		}
	}
?>