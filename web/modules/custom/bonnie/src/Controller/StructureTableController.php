<?php

namespace Drupal\bonnie\Controller;

/**
 * Contains \Drupal\bonnie\Controller\StructureTableController.
 */

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the bonnie module.
 */
class StructureTableController extends ControllerBase {

  /**
   * Returns a page.
   *
   * @return array
   *   A renderable array.
   */
  public function content() {
    $query = \Drupal::database()->select('bonnie', 'b');
    $query->fields("b", ["id", "cat_name", "your_email", "cat_photo", "date"]);
    $query->orderBy("date", "DESC");
    $result = $query->execute()->fetchAll();

    $deleteBonnieForm = \Drupal::formBuilder()->getForm("Drupal\bonnie\Form\DeleteBonnieForm");
    $editForm = \Drupal::formBuilder()->getForm("Drupal\bonnie\Form\EditForm");
    $deleteAllBonnieForm = \Drupal::formBuilder()->getForm("Drupal\bonnie\Form\DeleteAllBonnieForm");
    return [
      "#theme" => "cat-structure-table",
      "#items" => $result,
      '#title' => 'Cat list',
      "#DeleteBonnieForm" => $deleteBonnieForm,
      "#EditForm" => $editForm,
      "#DeleteAllBonnieForm" => $deleteAllBonnieForm,
    ];
  }

}
