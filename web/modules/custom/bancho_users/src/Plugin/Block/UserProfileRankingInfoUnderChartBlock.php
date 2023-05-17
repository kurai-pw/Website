<?php

namespace Drupal\bancho_users\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a block with user pp and total play time.
 *
 * @Block(
 *   id = "bancho_user_ranking_info_under_chart",
 *   admin_label = @Translation("User Ranking Under Chart"),
 *   category = @Translation("Custom")
 * )
 */
class UserProfileRankingInfoUnderChartBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'bancho__user_ranking_info_under_chart',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return Cache::PERMANENT;
  }

}
