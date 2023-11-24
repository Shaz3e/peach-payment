<?php

namespace Shaz3e\PeachPayment\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UpdatePeachPaymentConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:peach-payment-config';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Peach Payment Configuration in .env file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->updateEnv('PEACHPAYMENT_API_URL');
        $this->updateEnv('PEACHPAYMENT_CLIENT_ID');
        $this->updateEnv('PEACHPAYMENT_CLIENT_SECRET');
        $this->updateEnv('PEACHPAYMENT_MERCHANT_ID');
        $this->updateEnv('PEACHPAYMENT_CHECKOUT_URL');
        $this->updateEnv('PEACHPAYMENT_DOMAIN');
        $this->updateEnv('PEACHPAYMENT_ENTITY_ID');

        $this->info('Peach Payment configuration updated successfully.');
    }

    /**
     * Update .env file with data
     */
    private function updateEnv($key)
    {
        $value = $this->ask("What is your $key?");

        // Check if the key already exists in the .env file
        $existingKey = env($key);
        if ($existingKey !== null) {
            $this->info("'$key' already exists in .env. Skipping...");
            return;
        }

        // Append the new key-value pair to the .env file
        file_put_contents('.env', "$key=$value\n", FILE_APPEND);

        // File::put('.env', "$key=$value");
        $this->info("'$key' has been added to .env");

    }
}
