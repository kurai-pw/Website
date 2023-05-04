<?php

namespace Drupal\bancho_content\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a copyright block.
 *
 * @Block(
 *   id = "bancho_content_copyright",
 *   admin_label = @Translation("Copyright"),
 *   category = @Translation("Custom")
 * )
 */
class CopyrightBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      'content' => [
        '#markup' => $this->t('.dmg powered @years', [

          '@years' =>
            date('Y') === '2023'
              ? '2023'
              : '2023' . '-' . date("Y")
        ]),
      ]
    ];
  }

}
