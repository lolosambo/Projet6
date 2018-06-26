<?php
namespace App\Domain\DataFixtures\ORM;

use App\Domain\Models\Tricks;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TricksFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 30; $i++) {
            $name = 'Figure '.$i;
            $groupId = rand(1, 4);
            $content = 'Tu autem, Fanni, quod mihi tantum tribui dicis quantum ego nec adgnosco nec postulo, 
            facis amice; sed, ut mihi videris, non recte iudicas de Catone; aut enim nemo, quod quidem magis credo, 
            aut si quisquam, ille sapiens fuit. Quo modo, ut alia omittam, mortem filii tulit! memineram Paulum, 
            videram Galum, sed hi in pueris, Cato in perfecto et spectato viro.

            Accedebant enim eius asperitati, ubi inminuta vel laesa amplitudo imperii dicebatur, et iracundae suspicionum 
            quantitati proximorum cruentae blanditiae exaggerantium incidentia et dolere inpendio simulantium, si 
            principis periclitetur vita, a cuius salute velut filo pendere statum orbis terrarum fictis vocibus exclamabant.

            Adolescebat autem obstinatum propositum erga haec et similia multa scrutanda, 
            stimulos admovente regina, quae abrupte mariti fortunas trudebat in exitium praeceps, 
            cum eum potius lenitate feminea ad veritatis humanitatisque viam reducere utilia suadendo deberet, 
            ut in Gordianorum actibus factitasse Maximini truculenti illius imperatoris rettulimus coniugem.';
            $trick = new Tricks($name, $groupId, $content);
            $trick->setUser($this->getReference('user'.rand(1, 10)));
            $trick->setGroup($this->getReference('group'.rand(1, 4)));
            $trick->setTrickDate(new \DateTime('+'. rand(2, 100) .' days'));
            $trick->setTrickUpdate(new \DateTime('+'. rand(2, 100) .' days'));
            $this->addReference('trick'.$i, $trick );
            $manager->persist($trick);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
        UsersFixtures::class,
        GroupsFixtures::class
        ];
    }
}
