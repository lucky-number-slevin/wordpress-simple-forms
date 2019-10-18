<?php


namespace SimpleForms\Controller;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use ReflectionException;
use SimpleForms\Enum\FormType;
use SimpleForms\Mapper\FormCalculatorMapper;
use SimpleForms\Mapper\FormMapper;
use SimpleForms\Storage\Database;
use WP_REST_Request;
use WP_REST_Response;


/**
 * Class CreateFormController
 * @package SimpleForms\Controller
 */
class CalculatorFormController extends ControllerBase {

  /**
   * @var FormMapper
   */
  private $formMapper;

  /**
   * @var FormCalculatorMapper
   */
  private $formCalculatorMapper;

  /**
   * @var EntityManager
   */
  private $entityManager;

  /**
   * CalculatorFormController constructor.
   */
  public function __construct() {
    $this->formMapper = new FormMapper();
    $this->formCalculatorMapper = new FormCalculatorMapper();
    $this->entityManager = Database::getConnection()->getEntityManager();
  }

  /**
   * @inheritDoc
   */
  public function getRoutes() {

    $routes['create-calculator-form'] = [
      'methods' => 'POST',
      'callback' => [$this, 'createCalculatorForm']
    ];

    $routes['create-calculator-form-2'] = [
      'methods' => 'GET',
      'callback' => [$this, 'returnFormCallback']
    ];

    return $routes;
  }

  /**
   * @param WP_REST_Request $request
   * @return WP_REST_Response
   * @throws ORMException
   * @throws ReflectionException
   * @throws OptimisticLockException
   */
  public function createCalculatorForm(WP_REST_Request $request) {

    $body_params = $request->get_body_params();

    if (!isset($body_params['form'])) {
      return new WP_REST_Response('Missing "form" data in ' . __FUNCTION__, 400);
    }

    $form_data = $body_params['form'];
    if (!isset($form_data['name'])) {
      return new WP_REST_Response('You did not provide any name for the form.', 400);
    }
    $form_data['type'] = FormType::CALCULATOR;

    $new_form = $this->formMapper->arrayToEntity($form_data);

    $form_calculators = [];
    if (isset($body_params['calculators'])) {
      foreach ($body_params['calculators'] as $calculator) {
        $calculator['form_id'] = $new_form->getId();
        $new_calculator = $this->formCalculatorMapper->arrayToEntity($calculator);
        $form_calculators[] = $new_calculator;
      }
      $new_form->setFormCalculators($form_calculators);
    }
    $this->entityManager->persist($new_form);
    $this->entityManager->flush();

    if ($new_form->getId()) {
      return new WP_REST_Response([
        'message' => 'Form "' . $new_form->getName() . '" has been created successfully.',
        'status' => 200
      ]);
    }
    return new WP_REST_Response('Something went wrong while trying to create "' . $new_form->getName() . '" form.', 500);
  }

}
