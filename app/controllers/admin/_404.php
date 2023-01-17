<?php


class _404
{
	use Controller;

	public function index()
	{
		$this->adminView('_404', array());
	}
}
