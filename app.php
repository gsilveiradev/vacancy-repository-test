<?php

require_once __DIR__.'/vendor/autoload.php';

use Netwerven\VacancyRepository\VacancyRepository;
use Netwerven\VacancyRepository\Sources\ApiExampleSource;
use Netwerven\VacancyRepository\Sources\DBExampleSource;

// Init Repository object
$repository = new VacancyRepository();

// Instance an API Source Example
$api_source = new ApiExampleSource();
$repository->addSource($api_source);

// Instance an DB Source Example
$db_source = new DBExampleSource();
$repository->addSource($db_source);

// Get one vacancy where ID = 1
$vacancy = $repository->find(1);
echo "One vacancy:\r\n".json_encode($vacancy);

// Get all vacancies
$vacancies = $repository->findAll();
echo "\r\nAll vacancies:\r\n".json_encode($vacancies);
