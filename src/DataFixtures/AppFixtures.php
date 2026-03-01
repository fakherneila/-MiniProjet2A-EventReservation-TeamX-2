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
                'title' => 'Tech Conference 2026',
                'description' => 'Join us for the biggest tech conference of the year featuring industry leaders and innovative workshops.',
                'date' => new \DateTime('+30 days'),
                'location' => 'Convention Center, New York',
                'seats' => 200,
                'image' => 'tech-conference.jpg'
            ],
            [
                'title' => 'Music Festival Summer Edition',
                'description' => 'Experience amazing live performances from top artists across multiple stages.',
                'date' => new \DateTime('+45 days'),
                'location' => 'Central Park, New York',
                'seats' => 500,
                'image' => 'music-festival.jpg'
            ],
            [
                'title' => 'Art Exhibition: Modern Masters',
                'description' => 'Explore contemporary art from renowned international artists.',
                'date' => new \DateTime('+15 days'),
                'location' => 'Modern Art Museum, Chicago',
                'seats' => 100,
                'image' => 'art-exhibition.jpg'
            ],
            [
                'title' => 'Startup Pitch Night',
                'description' => 'Watch innovative startups pitch their ideas to investors.',
                'date' => new \DateTime('+10 days'),
                'location' => 'Innovation Hub, San Francisco',
                'seats' => 150,
                'image' => 'startup-pitch.jpg'
            ],
            [
                'title' => 'Food & Wine Tasting',
                'description' => 'Savor exquisite cuisine and fine wines from top chefs and sommeliers.',
                'date' => new \DateTime('+20 days'),
                'location' => 'Grand Hotel, Miami',
                'seats' => 80,
                'image' => 'food-wine.jpg'
            ],
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