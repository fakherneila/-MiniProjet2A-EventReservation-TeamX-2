<?php

namespace App\Command;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:import-events', description: 'Import static events to database')]
class ImportEventsCommand extends Command
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $events = [
            [
                'title' => 'Tech Conference 2026',
                'description' => 'Join us for the biggest tech conference of the year featuring industry leaders and innovative workshops.',
                'date' => '+30 days',
                'location' => 'Convention Center, New York',
                'seats' => 200
            ],
            [
                'title' => 'Music Festival Summer Edition',
                'description' => 'Experience amazing live performances from top artists across multiple stages.',
                'date' => '+45 days',
                'location' => 'Central Park, New York',
                'seats' => 500
            ],
            [
                'title' => 'Art Exhibition: Modern Masters',
                'description' => 'Explore contemporary art from renowned international artists.',
                'date' => '+15 days',
                'location' => 'Modern Art Museum, Chicago',
                'seats' => 100
            ],
            [
                'title' => 'Startup Pitch Night',
                'description' => 'Watch innovative startups pitch their ideas to investors.',
                'date' => '+10 days',
                'location' => 'Innovation Hub, San Francisco',
                'seats' => 150
            ],
            [
                'title' => 'Food & Wine Tasting',
                'description' => 'Savor exquisite cuisine and fine wines from top chefs and sommeliers.',
                'date' => '+20 days',
                'location' => 'Grand Hotel, Miami',
                'seats' => 80
            ],
            [
                'title' => 'Digital Marketing Summit',
                'description' => 'Learn the latest digital marketing strategies from industry experts.',
                'date' => '+25 days',
                'location' => 'Business Center, Austin',
                'seats' => 300
            ],
            [
                'title' => 'Yoga & Wellness Retreat',
                'description' => 'Relax and rejuvenate at our exclusive wellness retreat.',
                'date' => '+40 days',
                'location' => 'Mountain Resort, Colorado',
                'seats' => 50
            ],
            [
                'title' => 'Blockchain Conference',
                'description' => 'Explore the future of blockchain technology and cryptocurrencies.',
                'date' => '+35 days',
                'location' => 'Tech Center, San Francisco',
                'seats' => 250
            ]
        ];

        $output->writeln('Importing events to database...');
        
        foreach ($events as $eventData) {
            $event = new Event();
            $event->setTitle($eventData['title']);
            $event->setDescription($eventData['description']);
            $event->setDate(new \DateTime($eventData['date']));
            $event->setLocation($eventData['location']);
            $event->setSeats($eventData['seats']);
            $event->setImage('https://picsum.photos/id/' . rand(0, 100) . '/800/400');
            
            $this->entityManager->persist($event);
            $output->writeln('  ✓ Added: ' . $eventData['title']);
        }
        
        $this->entityManager->flush();
        $output->writeln('Successfully imported ' . count($events) . ' events!');
        
        return Command::SUCCESS;
    }
}
