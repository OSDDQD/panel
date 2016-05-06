<?php namespace Serverfireteam\Panel\libs;


class AuthAdmin
{
	public function checkLoggedIn ()
    {
        $access = !\Auth::guard('panel')->guest();
        return $access;
	}
}

