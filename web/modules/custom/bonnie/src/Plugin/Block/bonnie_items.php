<?php
/**
 * @file
 * Contains \Drupal\bonnie\Plugin\Block\bonnie_items.
 */
namespace Drupal\bonnie\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a bonnie_items.
 *
 * @Block(
 *   id = "bonnie_items",
 *   admin_label = @Translation("Bonnie items")
 * )
 */
class bonnie_items extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $db = \Drupal::database();
    $query = $db->select('bonnie', 'b');
    $query->fields('b', ['cat_name', 'your_email', 'cat_photo', 'date']);
    $query->orderBy('date', 'DESC');
    $result = $query->execute()->fetchAll();
    return array(
      '#theme' => 'bonnie-items',
      '#items' => $result,
    );
  }
}
