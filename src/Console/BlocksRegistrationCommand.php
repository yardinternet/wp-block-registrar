<?php

declare(strict_types=1);

namespace Yard\BlocksRegistration\Console;

use Illuminate\Console\Command;
use Yard\BlocksRegistration\Facades\BlocksRegistration;

class BlocksRegistrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blocksregistration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My custom Acorn command.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info(
            BlocksRegistration::getQuote()
        );
    }
}
