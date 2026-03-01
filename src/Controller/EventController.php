<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route("/event/{id}", name: "event_show")]
    public function show($id): Response
    {
        $events = [
            1 => ["id" => 1, "title" => "Tech Conference 2026", "description" => "Join us for the biggest tech conference of the year featuring industry leaders.", "date" => "2026-04-25 09:00:00", "location" => "Convention Center, New York", "seats" => 200, "availableSeats" => 200, "image" => "https://picsum.photos/id/0/800/400"],
            2 => ["id" => 2, "title" => "Music Festival Summer Edition", "description" => "Experience amazing live performances from top artists.", "date" => "2026-05-10 14:00:00", "location" => "Central Park, New York", "seats" => 500, "availableSeats" => 500, "image" => "https://picsum.photos/id/1/800/400"],
            3 => ["id" => 3, "title" => "Art Exhibition: Modern Masters", "description" => "Explore contemporary art from renowned artists.", "date" => "2026-04-10 10:00:00", "location" => "Modern Art Museum, Chicago", "seats" => 100, "availableSeats" => 100, "image" => "https://picsum.photos/id/2/800/400"],
            4 => ["id" => 4, "title" => "Startup Pitch Night", "description" => "Watch innovative startups pitch their ideas.", "date" => "2026-04-05 18:00:00", "location" => "Innovation Hub, San Francisco", "seats" => 150, "availableSeats" => 150, "image" => "https://picsum.photos/id/3/800/400"],
            5 => ["id" => 5, "title" => "Food & Wine Tasting", "description" => "Savor exquisite cuisine and fine wines.", "date" => "2026-04-15 19:00:00", "location" => "Grand Hotel, Miami", "seats" => 80, "availableSeats" => 80, "image" => "https://picsum.photos/id/4/800/400"],
            6 => ["id" => 6, "title" => "Digital Marketing Summit", "description" => "Learn the latest digital marketing strategies.", "date" => "2026-04-20 09:00:00", "location" => "Business Center, Austin", "seats" => 300, "availableSeats" => 300, "image" => "https://picsum.photos/id/5/800/400"],
            7 => ["id" => 7, "title" => "Yoga & Wellness Retreat", "description" => "Relax and rejuvenate at our exclusive retreat.", "date" => "2026-05-05 08:00:00", "location" => "Mountain Resort, Colorado", "seats" => 50, "availableSeats" => 50, "image" => "https://picsum.photos/id/6/800/400"],
            8 => ["id" => 8, "title" => "Blockchain Conference", "description" => "Explore the future of blockchain technology.", "date" => "2026-04-30 10:00:00", "location" => "Tech Center, San Francisco", "seats" => 250, "availableSeats" => 250, "image" => "https://picsum.photos/id/7/800/400"]
        ];
        
        if (!isset($events[$id])) {
            throw $this->createNotFoundException("Event not found");
        }
        
        return $this->render("event/show.html.twig", ["event" => $events[$id]]);
    }
}
