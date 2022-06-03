<?php

namespace Drupal\bonnie\Form;

/**
 * @file
 * Contains \Drupal\bonnie\Form\DeleteCheckbox.
 */

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides form for the bonnie module.
 */
class DeleteCheckbox extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return "delete_checkbox_form";
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form["#attributes"]["class"][] = "form-delete-checkbox-cats";

    $form["title"] = [
      "#type" => "html_tag",
      "#tag" => "h2",
      "#value" => $this->t("Do you want delete these cats?"),
      "#attributes" => [
        "class" => [
          "form-checkbox-title",
        ],
      ],
    ];

    $form["actions"]["submit"] = [
      "#type" => "submit",
      "#value" => $this->t("Delete"),
      "#attributes" => [
        "class" => [
          "form-delete-checkbox",
        ],
      ],
    ];

    $form["cancel"] = [
      "#type" => "button",
      "#value" => $this->t("Cancel"),
      "#attributes" => [
        "class" => [
          "form-cancel-checkbox",
        ],
      ],
    ];

    $form["id-item"] = [
      "#type" => "hidden",
      "#attributes" => [
        "class" => [
          "form-id-item-checkbox",
        ],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    if ($form_state->getValue("id-item") == NULL) {
      \Drupal::messenger()->addStatus($this->t("Nothing is marked."));
    }
    else {
      $items = explode(" ", $form_state->getValue("id-item"));
      $query = \Drupal::database()->delete("bonnie");
      $query->condition("id", $items, "IN");
      $query->execute();

      \Drupal::messenger()->addStatus($this->t("All marked cats have been removed."));
    }
  }

}
