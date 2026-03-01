<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route("/", name: "app_home")]
    public function index(Request $request): Response
    {
        $page = $request->query->getInt("page", 1);
        $search = $request->query->get("search", "");
        
        $allEvents = [
            ["id" => 1, "title" => "Tech Conference 2026", "description" => "Join us for the biggest tech conference of the year.", "date" => "2026-04-25 09:00:00", "location" => "Convention Center, New York", "seats" => 200, "availableSeats" => 200, "image" => "https://picsum.photos/id/0/800/400"],
            ["id" => 2, "title" => "Music Festival Summer Edition", "description" => "Experience amazing live performances.", "date" => "2026-05-10 14:00:00", "location" => "Central Park, New York", "seats" => 500, "availableSeats" => 500, "image" => "https://picsum.photos/id/1/800/400"],
            ["id" => 3, "title" => "Art Exhibition: Modern Masters", "description" => "Explore contemporary art.", "date" => "2026-04-10 10:00:00", "location" => "Modern Art Museum, Chicago", "seats" => 100, "availableSeats" => 100, "image" => "https://picsum.photos/id/2/800/400"],
            ["id" => 4, "title" => "Startup Pitch Night", "description" => "Watch innovative startups pitch.", "date" => "2026-04-05 18:00:00", "location" => "Innovation Hub, San Francisco", "seats" => 150, "availableSeats" => 150, "image" => "https://picsum.photos/id/3/800/400"],
            ["id" => 5, "title" => "Food & Wine Tasting", "description" => "Savor exquisite cuisine.", "date" => "2026-04-15 19:00:00", "location" => "Grand Hotel, Miami", "seats" => 80, "availableSeats" => 80, "image" => "https://picsum.photos/id/4/800/400"],
            ["id" => 6, "title" => "Digital Marketing Summit", "description" => "Learn marketing strategies.", "date" => "2026-04-20 09:00:00", "location" => "Business Center, Austin", "seats" => 300, "availableSeats" => 300, "image" => "https://picsum.photos/id/5/800/400"],
            ["id" => 7, "title" => "Yoga & Wellness Retreat", "description" => "Relax and rejuvenate.", "date" => "2026-05-05 08:00:00", "location" => "Mountain Resort, Colorado", "seats" => 50, "availableSeats" => 50, "image" => "https://picsum.photos/id/6/800/400"],
            ["id" => 8, "title" => "Blockchain Conference", "description" => "Explore blockchain technology.", "date" => "2026-04-30 10:00:00", "location" => "Tech Center, San Francisco", "seats" => 250, "availableSeats" => 250, "image" => "https://picsum.photos/id/7/800/400"]
        ];
        
        if (!empty($search)) {
            $filtered = [];
            foreach ($allEvents as $event) {
                if (stripos($event["title"], $search) !== false || stripos($event["location"], $search) !== false) {
                    $filtered[] = $event;
                }
            }
            $events = $filtered;
        } else {
            $events = $allEvents;
        }
        
        $perPage = 6;
        $totalEvents = count($events);
        $totalPages = ceil($totalEvents / $perPage);
        $offset = ($page - 1) * $perPage;
        $paginatedEvents = array_slice($events, $offset, $perPage);
        
        return $this->render("home/index.html.twig", [
            "events" => $paginatedEvents,
            "search" => $search,
            "currentPage" => $page,
            "totalPages" => $totalPages,
            "totalEvents" => $totalEvents,
        ]);
    }
}
