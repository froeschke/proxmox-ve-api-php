<?php

namespace VineVax\PVE;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Psr7\Response;

class Proxmox
{
    protected static $client;
    protected $url;
    protected $host;
    protected $port;
    protected $token;
    protected $secret;
    protected $username;
    protected $password;
    protected $realm;
    protected $ticket;
    protected $csrf;

    public function __construct(Client $client)
    {
        self::$client = $client;
    }

    /**
     * Access the Proxmox Virtual Environment server using a ticket cookie
     *
     * @param array $options
     *
     */
    public static function withTicket(string $host, string $username, string $password, int $port = 8006, float $timeout = 2.0)
    {
        $url = "https://{$host}:{$port}/api2/json/";

        $tempClient = new Client([
            'base_uri' => $url,
            'timeout' => $timeout,
        ]);

        $request = $tempClient->post($url . '/access/ticket', [
            'form_params' => [
                'username' => $username,
                'password' => $password,
            ]
        ]);

        $response = json_decode($request->getBody(), true);

        $ticket = $response['data']['ticket'];
        $csrfToken = $response['data']['CSRFPreventionToken'];

        $jar = CookieJar::fromArray(
            [
                'PVEAuthCookie' => $ticket,
            ],
            $host
        );

        $client = new Client([
            'base_uri' => $url,
            'timeout' => $timeout,
            'headers' => [
                'Accept' => 'application/json',
                'CSRFPreventionToken' => $csrfToken,
            ],
            'cookies' => $jar,
        ]);

        return new self($client);
    }

    /**
     * Access the Proxmox Virtual Environment server using the json api
     *
     * @param string $host
     * @param int $port
     * @param string $token
     * @param string $secret
     */
    public static function withToken(string $host, string $token, string $secret, int $port = 8006, float $timeout = 2.0)
    {
        $url = "https://{$host}:{$port}/api2/json/";

        $client = new Client([
            'base_uri' => $url,
            'timeout' => $timeout,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => "PVEAPIToken={$token}={$secret}",
            ],
        ]);

        return new self($client);
    }

    public function cluster(): Cluster
    {
        return new Cluster();
    }

    public function nodes(string $node = null): Node
    {
        return new Node($node);
    }

    public function version()
    {
        return Proxmox::json(
            Proxmox::get("version")
        );
    }

    public static function json(Response $response, $key = 'data')
    {
        $json = json_decode($response->getBody(), true);

        return $key != null ? $json[$key] : $json;
    }

    public static function get(string $path, array $params = null): Response
    {
        return self::$client->get($path);
    }

    public static function post(string $path, array $params = null): Response
    {
        return self::$client->post($path, [
            'form_params' => $params
        ]);
    }

    public static function put(string $path, array $params = null): Response
    {
        return self::$client->put($path, [
            'form_params' => $params
        ]);
    }

    public static function delete(string $path, array $params = null): Response
    {
        return self::$client->delete($path, [
            'form_params' => $params
        ]);
    }
}
