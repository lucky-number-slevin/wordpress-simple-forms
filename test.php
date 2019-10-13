<?php

$allowed_params = ['title', 'name', 'age', 'sex'];

$params = [
  'title' => 'TITLE',
  'age' => 33,
  'error' => 'ERROR',
  'number' => 100,
  'text' => 'TEXT',
  'sex' => 'MALE'
];

$param_keys = array_keys($params);

$params_to_remove = array_diff($param_keys, $allowed_params);

foreach ($params_to_remove as $key) {
  if(in_array($key, $param_keys)) {
    unset($params[$key]);
  }
}

