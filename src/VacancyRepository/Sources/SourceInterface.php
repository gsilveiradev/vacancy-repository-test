<?php

namespace Netwerven\VacancyRepository\Sources;

use Netwerven\App\Models\VacancyEntity;

/**
 * Source interface
 */
interface SourceInterface
{
    /**
     * Return the source identifier.
     *
     * @return string
     */
    public function getIdentifier();

    /**
     * Get one vacancy by id.
     *
     * @param $id
     *
     * @return object Vacancy
     */
    public function find($id);

    /**
     * Get all vacancies.
     *
     * @return array Vacancy
     */
    public function findAll();
}
