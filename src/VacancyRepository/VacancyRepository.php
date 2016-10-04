<?php

namespace Netwerven\VacancyRepository;

use Netwerven\VacancyRepository\Sources\SourceInterface;
use Netwerven\App\Models\VacancyEntity;

class VacancyRepository
{
    private $sources = array();

    public function __construct()
    {

    }

    /**
     * @param SourceInterface $source
     */
    public function addSource(SourceInterface $source)
    {
        $this->sources[$source->getIdentifier()] = $source;
    }

    /**
     * @param string $identifier
     *
     * @return SourceInterface $source
     */
    public function getSource($identifier)
    {
        if (isset($this->sources[$identifier])) {

            return $this->sources[$identifier];
        }
    }

    /**
     * @param SourceInterface $source
     *
     * @return bool
     */
    public function removeSource(SourceInterface $source)
    {
        unset($this->sources[$source->getIdentifier()]);
    }

    /**
     * Find one vacancy by id from all sources.
     *
     * @param $id
     *
     * @return Vacancy|null
     */
    public function find($id)
    {
        foreach ($this->sources as $source) {

            $vacancy = $source->find($id);

            if ($vacancy) {

                return $vacancy;
            }
        }

        return null;
    }

    /**
     * Find all vacancies from all sources. Vacancy can be taken only once - from first source where it was found.
     *
     * @return Vacancy[]
     */
    public function findAll()
    {
        $all_vacancies = array();

        foreach ($this->sources as $source) {

            $vacancies = $source->findAll();

            foreach ($vacancies as $vacancy) {

                $all_vacancies[$vacancy->id] = $vacancy;
            }
        }

        return $all_vacancies;
    }
}
