<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Create admin user
        $admin = new User();
        $admin->setEmail('admin@eventreservation.com');
        $admin->setUsername('admin');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'admin123'));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        // Create regular user
        $user = new User();
        $user->setEmail('user@eventreservation.com');
        $user->setUsername('user');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'user123'));
        $manager->persist($user);

        // Sample events
               $events = [
    [
        'title' => 'Tunis Tech Summit 2026',
        'description' => 'A major gathering of Tunisian developers, startups, and tech leaders discussing AI, cybersecurity, and innovation in Tunisia.',
        'date' => '+30 days',
        'location' => 'Cité de la Culture, Tunis',
        'seats' => 200
    ],
    [
        'title' => 'Carthage Music Festival Night',
        'description' => 'Enjoy a magical summer night with live performances inspired by the famous Carthage International Festival.',
        'date' => '+45 days',
        'location' => 'Amphitheatre of Carthage, Tunis',
        'seats' => 500
    ],
    [
        'title' => 'Sidi Bou Said Art Exhibition',
        'description' => 'Discover beautiful modern and traditional artworks inspired by Tunisian culture and Mediterranean heritage.',
        'date' => '+15 days',
        'location' => 'Art Gallery, Sidi Bou Said',
        'seats' => 120
    ],
    [
        'title' => 'Startup Tunisia Pitch Night',
        'description' => 'Young Tunisian entrepreneurs pitch innovative startup ideas to investors and mentors.',
        'date' => '+10 days',
        'location' => 'Technopole El Ghazala, Ariana',
        'seats' => 150
    ],
    [
        'title' => 'Tunisian Food & Couscous Festival',
        'description' => 'Taste authentic Tunisian dishes like couscous, brik, and ojja prepared by top local chefs.',
        'date' => '+20 days',
        'location' => 'La Marsa Beach Hall, Tunis',
        'seats' => 100
    ],
    [
        'title' => 'Digital Marketing Tunisia Summit',
        'description' => 'Learn modern digital marketing strategies from Tunisian experts and agencies.',
        'date' => '+25 days',
        'location' => 'Sfax International Fair Center',
        'seats' => 250
    ],
    [
        'title' => 'Desert Yoga & Wellness Retreat',
        'description' => 'A peaceful yoga and meditation retreat in the beautiful Sahara desert.',
        'date' => '+40 days',
        'location' => 'Douz Desert Camp, Kebili',
        'seats' => 60
    ],
    [
        'title' => 'Blockchain & FinTech Tunisia Conference',
        'description' => 'Explore blockchain, crypto innovation, and fintech startups shaping the Tunisian digital economy.',
        'date' => '+35 days',
        'location' => 'Novation City, Sousse',
        'seats' => 200
    ]
];

        foreach ($events as $eventData) {
            $event = new Event();
            $event->setTitle($eventData['title']);
            $event->setDescription($eventData['description']);
            $event->setDate($eventData['date']);
            $event->setLocation($eventData['location']);
            $event->setSeats($eventData['seats']);
            $event->setImage($eventData['image']);
            $manager->persist($event);
        }

        $manager->flush();
    }
}