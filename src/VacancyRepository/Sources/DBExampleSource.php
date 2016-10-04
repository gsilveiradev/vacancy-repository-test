<?php

namespace Netwerven\VacancyRepository\Sources;

use Netwerven\App\Models\VacancyEntity;

/**
 * DB source with fake data example
 */
class DBExampleSource implements SourceInterface
{
    private $identifier = 'db-example';

    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Simulating: get one vacancy
     */
    public function find($id)
    {
        $vacancy = new VacancyEntity();
        $vacancy->id            = 2;
        $vacancy->title         = 'Vacancy title';
        $vacancy->content       = 'Vacancy content';
        $vacancy->description   = 'Vacancy description';

        return $vacancy;
    }

    /**
     * Simulating: get all vacancies
     */
    public function findAll()
    {
        $vacancies = array();

        for ($i = 0; $i < 10; $i++) {

            $vacancy = new VacancyEntity();
            $vacancy->id            = $i + 1;
            $vacancy->title         = 'Vacancy title' . $i;
            $vacancy->content       = 'Vacancy content' . $i;
            $vacancy->description   = 'Vacancy description' . $i;

            $vacancies[] = $vacancy;
        }

        return $vacancies;
    }
}
