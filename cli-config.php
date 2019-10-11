<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use SimpleForms\Database;

$db = new Database();

return ConsoleRunner::createHelperSet($db->getEntityManager());
