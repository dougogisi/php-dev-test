<?php

namespace Src\Lib\Clients;

use Src\AppErrors\InvalidGithubClientSettings;
use Src\AppResponses\ResponseInterface;
use Src\AppResponses\GithubUserResponse;

class GithubUserClient
{
    /**
     * API domain
     * @var string
     */
    protected $domain = 'https://api.github.com/';

    protected $curlClient;

    /**
     * GithubClient constructor.
     * @param array $settings
     * @throws InvalidGithubClientSettings
     */
    public function __construct(array $settings)
    {
        $isValidSettings = $this->validateSettings($settings);

        if (!$isValidSettings) {
            throw new InvalidGithubClientSettings('Invalid settings for client');
        }

        $config['path'] = sprintf('users/%s/repos', $settings['username']);
        $config['userAgent'] = 'DEV TEST USERAGENT';
        $this->initialiseClient($config);
    }

    /**
     * @param array $config
     */
    protected function initialiseClient(array $config): void
    {
        $this->curlClient = curl_init();
        curl_setopt($this->curlClient, CURLOPT_URL, sprintf('%s%s', $this->domain, $config['path']));
        curl_setopt($this->curlClient, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlClient, CURLOPT_USERAGENT, $config['userAgent']);
    }

    /**
     * @param array $settings
     * @return bool
     */
    public function validateSettings(array $settings): bool
    {
        return !isset($settings['username']) || empty($settings['username']) ? false : true;
    }

    /**
     * @return bool|ResponseInterface
     */
    public function fetch()
    {
        $output = curl_exec($this->curlClient);
        $responseCode   = curl_getinfo($this->curlClient, CURLINFO_HTTP_CODE);

        if(curl_errno($this->curlClient)) {
            print curl_error($this->curlClient);
            return false;
        }

        if ($responseCode != 200) {
            print $output;
            return false;
        }

        curl_close($this->curlClient);
        $this->curlClient = null;
        return new GithubUserResponse($output, $responseCode);

    }

    /**
     * kill client if still open on destroy
     */
    function __destruct() {
        if ($this->curlClient) {
            curl_close($this->curlClient);
        }
    }
}
