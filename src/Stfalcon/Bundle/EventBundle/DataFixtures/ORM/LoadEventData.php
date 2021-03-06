<?php

namespace Stfalcon\Bundle\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Stfalcon\Bundle\EventBundle\Entity\Event;

class LoadEventData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
        $event = new Event();
        $event->setName('Zend Framework Day');
        $event->setSlug('zend-framework-day-2011');
        $event->setDescription('Zend Framework Day посвящен популярному PHP фреймворку Zend Framework и является наследником конференции ZFConf Ukraine 2010.');
        $event->setLogo('/tmp/logo.jpg');
        $event->setCity('Киев');
        $event->setPlace('отель "Казацкий"');

        $manager->persist($event);
        $manager->flush();

        $this->addReference('event-zfday', $event);
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}