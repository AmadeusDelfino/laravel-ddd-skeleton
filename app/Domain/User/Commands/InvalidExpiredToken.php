<?php


namespace App\Domain\User\Commands;

use Illuminate\Console\Command;

class InvalidExpiredToken extends Command
{
    protected $signature = 'token:invalid-expired {invalid-all=no}';

    protected $description = '<Description>';

    public function handle()
    {
        #TODO código para invalidar tokens
    }
}

