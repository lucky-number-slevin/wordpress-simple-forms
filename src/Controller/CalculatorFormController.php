<?php


namespace SimpleForms\Controller;


use SimpleForms\Enum\FormFieldType;
use SimpleForms\Enum\FormType;
use SimpleForms\Mapper\FormMapper;
use WP_REST_Request;


/**
 * Class CreateFormController
 * @package SimpleForms\Controller
 */
class CalculatorFormController extends ControllerBase {

  /**
   * @inheritDoc
   */
  public function getRoutes() {

    $routes['create-calculator-form'] = [
      'methods' => 'POST',
      'callback' => [$this, 'createCalculatorForm']
    ];

    return $routes;
  }

  /**
   * @param WP_REST_Request $request
   * @throws \ReflectionException
   */
  public function createCalculatorForm(WP_REST_Request $request) {

    $body = json_decode(json_encode(json_decode($request->get_body())), true);

    $form_data = $body['form']['name'];
    $form_data['type'] = FormType::CALCULATOR;

    $form_mapper = new FormMapper();

    $new_form = $form_mapper->jsonToEntity($form_data);
    // TODO: save form (implement service for this) -> Storage/Repository

    wp_send_json(json_encode($new_form));

    $calculators = $body['calculators'];
    foreach ($calculators as $calculator) {
      $calculator->form_id = $new_form->getId();
    }

//    wp_send_json(json_decode($request->get_body()));
  }

}
