<?php

namespace App\Controller;

use App\Repository\EventRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'admin_dashboard')]
    public function dashboard(EventRepository $eventRepository, ReservationRepository $reservationRepository): Response
    {
        $events = $eventRepository->findAll();
        $totalReservations = $reservationRepository->count([]);
        
        return $this->render('admin/dashboard.html.twig', [
            'events' => $events,
            'totalReservations' => $totalReservations,
            'totalEvents' => count($events),
        ]);
    }

    #[Route('/reservations', name: 'admin_reservations')]
    public function reservations(ReservationRepository $reservationRepository, Request $request): Response
    {
        $eventId = $request->query->get('event');
        $search = $request->query->get('search');
        
        if ($eventId) {
            $reservations = $reservationRepository->findByEvent($eventId);
        } elseif ($search) {
            $reservations = $reservationRepository->searchReservations($search);
        } else {
            $reservations = $reservationRepository->findAll();
        }
        
        return $this->render('admin/reservations.html.twig', [
            'reservations' => $reservations,
            'eventFilter' => $eventId,
            'search' => $search,
        ]);
    }

    #[Route('/reservation/{id}/delete', name: 'admin_reservation_delete', methods: ['POST'])]
    public function deleteReservation($id, ReservationRepository $reservationRepository, Request $request): Response
    {
        $reservation = $reservationRepository->find($id);
        
        if (!$reservation) {
            throw $this->createNotFoundException('Reservation not found');
        }
        
        if ($this->isCsrfTokenValid('delete' . $reservation->getId(), $request->request->get('_token'))) {
            $reservationRepository->remove($reservation, true);
            $this->addFlash('success', 'Reservation deleted successfully!');
        }
        
        return $this->redirectToRoute('admin_reservations');
    }
}