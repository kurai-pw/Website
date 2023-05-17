<?php

namespace Drupal\bancho_api;

use Drupal\Component\Serialization\Json;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Provides a service for commerce Loko Client.
 */
class BanchoAPI {

  /**
   * The API domain.
   *
   * @var string
   */
  private string $domain = 'https://api.kurai.pw';

  /**
   * Constructor for the BanchoAPI service.
   */
  public function __construct(protected ClientInterface $httpClient) {}

  /**
   * Base method for the API request.
   *
   * @param string $method
   *   HTTP method.
   * @param string $apiPath
   *   URL string.
   * @param array $options
   *   Request options to apply. See \GuzzleHttp\RequestOptions.
   *
   * @return \Psr\Http\Message\ResponseInterface
   *   Representation of an outgoing, server-side response.
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  protected function apiBaseRequest(string $method, string $path, array $params = []): ResponseInterface {
    return $this->httpClient->request($method, $this->domain . $path, $params);
  }

  /**
   * {@inheritdoc}
   */
  public function getPlayerInfo(int|string $uid) {
    $uid = 3;
    $response = $this->apiBaseRequest('GET', '/v1/get_player_info', [
      'query' => [
        'id' => $uid,
        'scope' => 'all',
      ],
    ]);

    return Json::decode((string) $response->getBody());
  }

}

