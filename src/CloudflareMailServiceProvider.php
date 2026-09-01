<?php
declare(strict_types=1);

namespace Bambamboole\CloudflareMail;

use Bambamboole\CloudflareMail\Cloudflare\Client;
use Bambamboole\CloudflareMail\Cloudflare\Config as CloudflareConfig;
use Bambamboole\CloudflareMail\Cloudflare\PayloadBuilder;
use Bambamboole\CloudflareMail\Transport\CloudflareTransport;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

final class CloudflareMailServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Mail::extend('cloudflare', function (array $mailerConfig = []): CloudflareTransport {
            $config = CloudflareConfig::fromArray([
                'account_id' => $mailerConfig['account_id'] ?? Config::get('services.cloudflare.account_id'),
                'api_token' => $mailerConfig['api_token'] ?? Config::get('services.cloudflare.api_token'),
                'base_url' => $mailerConfig['base_url'] ?? Config::get('services.cloudflare.base_url'),
                'timeout' => $mailerConfig['timeout'] ?? Config::get('services.cloudflare.timeout'),
            ]);

            return new CloudflareTransport(
                client: new Client(
                    accountId: $config->accountId,
                    apiToken: $config->apiToken,
                    baseUrl: $config->baseUrl,
                    timeout: $config->timeout,
                ),
                payloadBuilder: new PayloadBuilder,
            );
        });
    }
}
