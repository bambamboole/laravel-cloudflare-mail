# Changelog

## 0.1.0 (2026-09-01)


### Bug Fixes

* fall back to GITHUB_TOKEN when RELEASE_PLEASE_TOKEN is unset ([a8af8ef](https://github.com/bambamboole/laravel-cloudflare-mail/commit/a8af8efba525ee0a292e10dd9efeecf07b099d07))
* require extended-testbench ^0.6.1 to match its scaffold ([0203fdb](https://github.com/bambamboole/laravel-cloudflare-mail/commit/0203fdbc2537d7f442b454089bc532b0cc2dd7ef))
* start release-please versioning at 0.1.0 for the fork ([fe45c8e](https://github.com/bambamboole/laravel-cloudflare-mail/commit/fe45c8e8a62ebbfec9370ec1842ff7a38d7334ea))

## [1.0.0] - 2026-05-21

First stable release. From this version on, the public API (the `cloudflare` mailer configuration keys and the `CloudflareTransportException` class) follows Semantic Versioning. The package's other classes are marked `@internal` and may change in any release.

### Added

- Cloudflare Email Service mail transport for Laravel, registered as the `cloudflare` mailer.
- Credentials resolved from `config/services.php` (`services.cloudflare`) with per mailer overrides on the `config/mail.php` block.
- Configurable API endpoint via `base_url` (default `https://api.cloudflare.com/client/v4`).
- Configurable HTTP request timeout via `timeout` (default 10 seconds).
- Custom header forwarding, with reserved headers filtered out of the payload.
- Attachment support, encoded as base64 in the API payload.
- Synchronous permanent bounce detection: a non empty `result.permanent_bounces` array on an HTTP 200 response is surfaced as a failure.
- Typed failures through `CloudflareTransportException`, exposing `cloudflareCode` and `httpStatus`, rewrapped as a Symfony `TransportException` so they integrate with Laravel queue retries.

### Requirements

- PHP 8.4 or newer.
- Laravel 12 or 13.

[1.0.0]: https://github.com/mateusjunges/laravel-cloudflare-mail/releases/tag/v1.0.0
