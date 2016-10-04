<?php

namespace Netwerven\VacancyRepository\Tests;

use Netwerven\App\Models\VacancyEntity;
use Netwerven\VacancyRepository\VacancyRepository;

class VacancyRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $source;
    private $vacancy;

    /**
     * Set up Test.
     */
    public function setUp()
    {
        $this->source = $this->getMockBuilder('Netwerven\VacancyRepository\Sources\SourceInterface')
            ->setMethods(array('getIdentifier', 'find', 'findAll'))
            ->getMock();

        $this->vacancy = new VacancyEntity();
        $this->vacancy->id            = 1;
        $this->vacancy->title         = 'Vacancy title';
        $this->vacancy->content       = 'Vacancy content';
        $this->vacancy->description   = 'Vacancy description';

        $this->source->expects($this->any())->method('getIdentifier')->will($this->returnValue('source'));
        $this->source->expects($this->any())->method('find')->with(1)->will($this->returnValue($this->vacancy));
        $this->source->expects($this->any())->method('findAll')->will($this->returnValue(array($this->vacancy)));
    }

    public function testAddSource()
    {
        $this->assertNull(null);
    }

    public function testRemoveSource()
    {
        $this->assertNull(null);
    }

    public function testGetSource()
    {
        $repository = new VacancyRepository();
        $repository->addSource($this->source);

        $this->assertEquals($this->source, $repository->getSource($this->source->getIdentifier()));
    }

    public function testFind()
    {
        $repository = new VacancyRepository();
        $repository->addSource($this->source);

        $vacancyId = 1;
        $this->assertEquals($this->vacancy, $repository->find($vacancyId));
    }

    public function testFindAll()
    {
        $repository = new VacancyRepository();
        $repository->addSource($this->source);

        $this->assertEquals(array(1 => $this->vacancy), $repository->findAll());
    }
}
