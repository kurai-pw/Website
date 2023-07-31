<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Url;
use Drupal\user\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a User Menu block.
 *
 * @Block(
 *   id = "bancho_header_user_menu",
 *   admin_label = @Translation("[Header] User Menu"),
 *   category = @Translation("Custom")
 * )
 */
class UserMenu extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * {@inheritDoc}
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    protected $currentUser,
    protected $fileUrlGenerator,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_user'),
      $container->get('file_url_generator'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $user = User::load($this->currentUser->id());

    if (!$user->isAnonymous()) {
      // Get player banner if exists.
      if (!($banner = $user->get('field_profile_banner'))->isEmpty()) {
        $banner =
          $this->fileUrlGenerator->generate($banner->entity->getFileUri());
      }

      // Get player avatar.
      if (!($avatar = $user->get('user_picture'))->isEmpty()) {
        $avatar =
          $this->fileUrlGenerator->generate($user->get('user_picture')->entity->getFileUri());
      }

      // Get player name.
      $username =
        $user->getAccountName();
    }

    return [
      '#theme' => 'bancho__user_menu',
      '#user_id' => $this->currentUser->id(),
      '#banner' => $banner ?? NULL,
      '#avatar' => $avatar ?? NULL,
      '#username' => $username ?? NULL,
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }

}
