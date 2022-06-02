<?php

namespace Drupal\bonnie\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

/**
 * Class EditForm.
 *
 * @package Drupal\Bonnie\Form
 */
class EditForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'edit_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $query = \Drupal::database()->select('bonnie', 'b');
    $query->fields('b', ['cat_name', 'your_email', 'cat_photo']);
    $query->condition('id', $form_state->getValue('id-item-edit'));
    $query->execute()->fetchAll();

    $form['#attributes']['class'][] = 'cat-form-edit';

    $form['system_messages'] = [
      '#markup' => '<div id="edit-form-messages"></div>',
    ];

    $form['edit-name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Change name:'),
      '#placeholder' => $this->t('From 2 to 32 letters'),
      '#attributes' => [
        'class' => [
          'name-form-edit',
        ],
      ],
    ];

    $form['edit-email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Change email:'),
      '#placeholder' => ('user-_@company.'),
      '#attributes' => [
        'class' => [
          'email-form-edit',
        ],
      ],
      '#ajax' => [
        'callback' => [$this, 'editValidateEmailAjax'],
        'event' => 'input',
        'progress' => [
          'type' => 'throbber',
          'message' => NULL,
        ],
      ],
      '#prefix' => '<span class="edit-email-valid-message"></span>',
    ];

    $form['edit-image'] = [
      '#title' => $this->t('Change image:'),
      '#description' => $this->t('Allowed photo format png jpg jpeg/ no more than 2MB'),
      '#type' => 'managed_file',
      '#preview_image_style' => 'medium',
      '#upload_location' => 'public://',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_size' => [2097152],
      ],
    ];

    $form['cancel'] = [
      '#type' => 'button',
      '#value' => $this->t('Cancel'),
      '#attributes' => [
        'class' => [
          'form-cancel-edit',
        ],
      ],
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#attributes' => [
        'class' => [
          'form-submit-edit',
        ],
      ],
      '#ajax' => [
        'callback' => [$this, 'editAjaxSubmitCallback'],
      ],
    ];

    $form['id-item-edit'] = [
      '#type' => 'hidden',
      '#attributes' => [
        'class' => [
          'form-id-item-edit',
        ],
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * Ajax callback to validate the email field.
   */
  public function editValidateEmailAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (preg_match('/^[a-z_-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $form_state->getValue('edit-email'))) {
      $css = ['border' => '3px solid green'];
      $response->addCommand(new CssCommand('#edit-email--2', $css));
      $response->addCommand(new HtmlCommand('.edit-email-valid-message', $this->t('Email ok.')));
    }
    else {
      $css = ['border' => '3px solid red'];
      $response->addCommand(new CssCommand('#edit-email--2', $css));
      $response->addCommand(new HtmlCommand('.edit-email-valid-message', $this->t('Email not valid.')));
    }
    return $response;
  }

  /**s
   * {@inheritdoc}
   *
   * @throws \Exception
   */
  public function editAjaxSubmitCallback(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (strlen($form_state->getValue('edit-name')) < 2) {
      $response->addCommand(new MessageCommand($this->t('Name is too short.'), '#edit-form-messages', ["type" => "error"]));
    }
    elseif (strlen($form_state->getValue('edit-name')) > 32) {
      $response->addCommand(new MessageCommand($this->t('Name is too long.'), '#edit-form-messages', ["type" => "error"]));
    }
    elseif (!preg_match('/^[a-z_-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $form_state->getValue('edit-email'))) {
      $response->addCommand(new MessageCommand($this->t('Email not valid.'), '#edit-form-messages', ["type" => "error"]));
    }
    else {
      $response->addCommand(new MessageCommand($this->t('Information was changed.'), '#edit-form-messages', ["type" => "status"]));
    }

    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
