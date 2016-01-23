<?php

namespace Omgwagon\LaravelOauthConsumer\Facades;

use Illuminate\Support\Facades\Facade;

class OauthConsumer extends Facade {
    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor() { return 'oauth-consumer'; }
}
