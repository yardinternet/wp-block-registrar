<?php

declare(strict_types=1);

namespace Yard\BlocksRegistration\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string getQuote()
 * @method static string getPostContent()
 */
class BlocksRegistration extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'BlocksRegistration';
    }
}
