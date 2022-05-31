<?php

namespace Drupal\bonnie\Form;

use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\CssCommand;
use Drupal\file\Entity\File;

/**
 * Class BonnieForm.
 *
 * @package Drupal\Bonnie\Form
 */
class BonnieForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'bonnie_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['system_messages'] = [
      '#markup' => '<div id="form-valid-message"></div>',
    ];
    $form['name'] = [
      '#title' => $this->t('Cat name:'),
      '#type' => 'textfield',
      '#placeholder' => $this->t('From 2 to 32 letters'),
      '#required' => TRUE,
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Your email:'),
      '#placeholder' => ('user-_@company.'),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => [$this, 'validateEmailAjax'],
        'event' => 'input',
        'progress' => [
          'type' => 'throbber',
          'message' => NULL,
        ],
      ],
      '#suffix' => '<span class="email-valid-message"></span>',
    ];
    $form['image'] = [
      '#title' => $this->t('Cat image:'),
      '#description' => $this->t('Allowed photo format png jpg jpeg/ no more than 2MB'),
      '#type' => 'managed_file',
      '#required' => TRUE,
      '#preview_image_style' => 'medium',
      '#upload_location' => 'public://',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_size' => [2097152],
      ],
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => ('Add cat'),
      '#button_type' => 'primary',
      '#ajax' => [
        'callback' => [$this, 'ajaxSubmitCallback'],
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
  public function validateEmailAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (preg_match('/^[a-z_-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $form_state->getValue('email'))) {
      $css = ['border' => '3px solid green'];
      $response->addCommand(new CssCommand('#edit-email', $css));
      $response->addCommand(new HtmlCommand('.email-valid-message', $this->t('Email ok.')));
    }
    else {
      $css = ['border' => '3px solid red'];
      $response->addCommand(new CssCommand('#edit-email', $css));
      $response->addCommand(new HtmlCommand('.email-valid-message', $this->t('Email not valid.')));
    }
    return $response;
  }

  /**
   * {@inheritdoc}
   *
   * @throws \Exception
   */
  public function ajaxSubmitCallback(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (!$form_state->getValue('name')
      || empty($form_state->getValue('name'))
    ) {
      $response->addCommand(new MessageCommand($this->t('Enter cat name.'), '.form-valid-message', ["type" => "error"]));
    }
    elseif (strlen($form_state->getValue('name')) < 2) {
      $response->addCommand(new MessageCommand($this->t('Name is too short.'), '.form-valid-message', ["type" => "error"]));
    }
    elseif (strlen($form_state->getValue('name')) > 32) {
      $response->addCommand(new MessageCommand($this->t('Name is too long.'), '.form-valid-message', ["type" => "error"]));
    }
    elseif (!$form_state->getValue('email')
      || empty($form_state->getValue('email'))
    ) {
      $response->addCommand(new MessageCommand($this->t('Enter email.'), '.form-valid-message', ["type" => "error"]));
    }
    elseif (!$form_state->getValue('image')
      || empty($form_state->getValue('image'))
    ) {
      $response->addCommand(new MessageCommand($this->t('Enter image.'), '.form-valid-message', ["type" => "error"]));
    }
    else {
      $conn = Database::getConnection();

      $fields["cat_name"] = $form_state->getValue('name');
      $fields["your_email"] = $form_state->getValue('email');
      $fid = $form_state->getValue('image');
      $file = File::load($fid[0]);
      $file->setPermanent();
      $file->save();
      $uri = $file->getFileUri();
      $url = file_create_url($uri);
      $fields["cat_photo"] = $url;
      $current_date = \Drupal::time()->getCurrentTime();
      $today_date = \Drupal::service('date.formatter')->format($current_date, 'custom', 'd/M/Y H:i:s');
      $fields["date"] = $today_date;

      $conn->insert('bonnie')->fields($fields)->execute();
      $response->addCommand(new MessageCommand($this->t('Thank'), '.form-valid-message', ['type' => 'status']));
    }
    return $response;

  }
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }
}
