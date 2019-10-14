<?php


namespace SimpleForms\Callback\Partial\Form;


use SimpleForms\Enum\FormFieldType;

/**
 * Class CreateFormCallback
 * @package SimpleForms\Callback\Partial
 */
class CreateFormCallback extends FormCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return 'partial/create-form.html.twig';
  }

  /**
   * @inheritDoc
   */
  public function getTemplateVariables() {

    $select_field_options = [
      's-f-1' => [
        'value' => 1,
        'label' => 'Select Option 1'
      ],
      's-f-2' => [
        'value' => 2,
        'label' => 'Select Option 2'
      ],
      's-f-3' => [
        'value' => 3,
        'label' => 'Select Option 3'
      ]
    ];

    $form_fields['select_field'] = [
      'type' => FormFieldType::SELECT_GROUP,
      'label' => 'Select one option',
      'options' => $select_field_options
    ];

    $form_fields['text_input_field'] = [
      'type' => FormFieldType::TEXT_INPUT,
      'label' => 'Put some text in here'
    ];

    $radio_button_options = [
      's-f-1' => [
        'value' => 1,
        'label' => 'Radio Button Option 1'
      ],
      's-f-2' => [
        'value' => 2,
        'label' => 'Radio Button Option 2'
      ],
      's-f-3' => [
        'value' => 3,
        'label' => 'Radio Button Option 3'
      ]
    ];

    $form_fields['radio_group_field'] = [
      'type' => FormFieldType::RADIO_GROUP,
      'label' => 'Pick one option',
      'options' => $radio_button_options
    ];

    $checkbox_button_options = [
      's-f-1' => [
        'value' => 1,
        'label' => 'Checkbox Option 1'
      ],
      's-f-2' => [
        'value' => 2,
        'label' => 'Checkbox Option 2'
      ],
      's-f-3' => [
        'value' => 3,
        'label' => 'Checkbox Option 3'
      ]
    ];

    $form_fields['checkbox_group_field'] = [
      'type' => FormFieldType::CHECKBOX_GROUP,
      'label' => 'Pick one option',
      'options' => $checkbox_button_options
    ];

    $form_fields['submit'] = [
      'type' => FormFieldType::SUBMIT,
      'label' => 'Create'
    ];

    return [
      'title' => 'Create a Simple Form',
      'action' => '/actiooooooooooooooooooooooooooon',
      self::FORM_FIELDS_KEY => $form_fields
    ];
  }
}
