//<?php

class hook17 extends _HOOK_CLASS_
{
  public function dismissSiteMessage()
    {
		\IPS\Session::i()->csrfCheck();

    if ( !\IPS\Settings::i()->siteMessage_allowDismiss ) {
      return;
    }

		if ( \IPS\Member::loggedIn()->member_id )
		{
			\IPS\Member::loggedIn()->siteMessage_dismissed = TRUE;
			\IPS\Member::loggedIn()->save();
		}
		else
		{
			\IPS\Request::i()->setCookie( 'siteMessage_dismissed', TRUE );
		}

    if ( \IPS\Request::i()->isAjax() )
		{
			\IPS\Output::i()->sendOutput( NULL, 200 );
		}
		else
		{
			\IPS\Output::i()->redirect( isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : \IPS\Http\Url::internal( '' ) );
		}

	}
}
