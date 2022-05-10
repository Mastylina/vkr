<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\PostWorker;
use App\Entity\Worker;

class PostWorkerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // мастер маникюра
        $manicurist = new PostWorker();
        $manicurist->setName('Мастер маникюра');

        //Работник 1
        $worker = new Worker();
        $worker->setEmail('mastylina@bk.ru');
        $worker->setRoles(['ROLE_USER']);
        $worker->setPassword('123654');
        $worker->setNumberPhone('123654');
        $worker->setPhoto('фото');
        $worker->setSurname('Луговая');
        $worker->setName('Анастасия');
        $worker->setPatronymic('Сергеевна');
        $manicurist->addWorker($worker);

        $manager->persist($manicurist);

        // мастер по педикюру
        $masterPedicure = new PostWorker();
        $masterPedicure->setName('Мастер по педикюру');

        //Работник 1
        $worker = new Worker();
        $worker->setEmail('mastylin@bk.ru');
        $worker->setRoles(['ROLE_USER']);
        $worker->setPassword('123654');
        $masterPedicure->addWorker($worker);
        $worker->setNumberPhone('89555455');
        $worker->setPhoto('фото');
        $worker->setSurname('Крутских');
        $worker->setName('Анастасия');
        $worker->setPatronymic('Юрьевна');
        $manager->persist($masterPedicure);

        $manager->flush();
    }
}