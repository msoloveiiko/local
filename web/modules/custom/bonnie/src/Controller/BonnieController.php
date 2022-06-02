<?php

namespace Drupal\Bonnie\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for BonnieForm.
 */
class BonnieController extends ControllerBase {

  /**
   * Returns a page.
   *
   * @return array
   *   A renderable array.
   */
  public function content() {
    $bonnieForm = \Drupal::formBuilder()->getForm('Drupal\bonnie\Form\BonnieForm');
    $deleteBonnieForm = \Drupal::formBuilder()->getForm('Drupal\bonnie\Form\DeleteBonnieForm');
    $editForm = \Drupal::formBuilder()->getForm('Drupal\bonnie\Form\EditForm');
    $block_manager = \Drupal::service('plugin.manager.block');
    $config = [];
    $bonnie_items_block = $block_manager->createInstance('bonnie_items', $config);
    return [
      '#theme' => 'bonnie_template',
      '#title' => 'Hello! You can add here a photo of your cat.',
      '#form' => $bonnieForm,
      '#bonnie' => $bonnie_items_block->build(),
      '#DeleteBonnieForm' => $deleteBonnieForm,
      '#EditForm' => $editForm,
    ];
  }
}
