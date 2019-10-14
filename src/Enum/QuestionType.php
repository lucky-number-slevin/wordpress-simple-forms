<?php


namespace SimpleForms\Enum;


use SimpleForms\Entity\Question\MultipleAnswerQuestion;
use SimpleForms\Entity\Question\SingleAnswerQuestion;


/**
 * Enum QuestionType
 * @package SimpleForms\Enum
 */
final class QuestionType extends EnumBase {

  const RADIO_BUTTON = 'RADIO_BUTTON';
  const CHECKBOX = 'CHECKBOX';
  const TEXT_INPUT = 'TEXT_INPUT';

  /**
   * @param string $type
   * @param $question
   * @return bool
   */
  public static final function isValidQuestionType(string $type, $question) {
    switch (get_class($question)) {
      case MultipleAnswerQuestion::class:
        switch ($type) {
          case self::RADIO_BUTTON:
          case self::CHECKBOX:
            return TRUE;
          default:
            return FALSE;
        }
        break;
      case SingleAnswerQuestion::class:
        if ($type === self::TEXT_INPUT) {
          return TRUE;
        }
        return FALSE;
        break;
      default:
        return FALSE;
    }
  }

}
