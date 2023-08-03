<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjouterContactController extends AbstractController
{
    #[Route('/contactt', name: 'app_ajouter_contact')]

    public function new(Request $request, ContactRepository $contactRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->save($contact, true);

            return $this->redirectToRoute('app_welcome', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ajouter_contact/index.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }
}
