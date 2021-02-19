<?php namespace App\Controllers;

class Home extends BaseController
{

    public function list()
	{
        return view("mail-list");
	}

	public function detail($id)
    {

        return view("detail");
    }

    public function delete()
    {

    }
}


