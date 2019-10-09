<?php


namespace SimpleForms\Templates;


use SimpleForms\PluginBase;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

abstract class TemplateManagerBase {

  const TEMPLATES_DIR = 'templates';

  public function render($template_path) {
    $template_dir = (new PluginBase())->pluginPath . self::TEMPLATES_DIR;
    $twig = new Environment(new FilesystemLoader($template_dir));
    try {
      echo $twig->render($template_path, $this->getVariables());
    } catch (LoaderError | RuntimeError | SyntaxError $error) {
      if (WP_DEBUG) {
        echo $error;
      }
    }
  }

  abstract function getVariables();

  abstract function renderTemplate();


}
