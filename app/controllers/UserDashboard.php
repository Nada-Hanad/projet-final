
<?php


class UserDashboard
{
    use Controller;

    public function index()
    {

        $this->view('userDashboard',  array());
    }
}
