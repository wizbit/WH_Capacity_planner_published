<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ForecastOrders;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ForecastOrdersController extends Controller
{
    /**
     * @Route("/forecastOrders", name="forecastOrders", methods={"GET"})
     */
    public function indexAction(Request $request)
    {
        $Repository = $this->getDoctrine()->getRepository(ForecastOrders::class);
        $forecastOrders = $Repository->findAll();
		
		$form = $this->createForecastOrderForm();

        // replace this example code with whatever you need
        return $this->render('default/forecastOrders.html.twig', [
			'forecastOrders' => $forecastOrders,
			'form' => $form->createView()
		]);
    }

    /**
     * @Route("/forecastOrders/{id}/delete", name="delete_forecastOrder")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $forecastOrder = $em->getRepository(ForecastOrder::class)->find($id);
        if (!$forecastOrder) {
            throw new NotFoundHttpException();
        }

        $em->remove($forecastOrder);
        $em->flush();
        return $this->redirectToRoute('forecastOrders');
    }

    /**
     * @Route("/forecastOrder", name="upload_forecastOrder_csv", methods={"POST"})
     */
    public function uploadAction(Request $request)
    {
        $form = $this->createForecastOrdersForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['csv']->getData();

            $contents = file_get_contents($file->getPathname());
            $serializer = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);
            $rawForecastOrders = $serializer->decode($contents, 'csv');

            $em = $this->getDoctrine()->getManager();

            foreach($rawForecastOrder as $rawForecastOrder) {
                $forecastOrder = new ForecastOrder();
                $forecastOrder->setItemCode($rawForecastOrder['Item Code']);
                $forecastOrder->setShippedDate($rawForecastOrder['Expected Ship Date']);
                $forecastOrder->setQtyShipped($rawForecastOrder['Expected Qty Shipped']);
				$forecastOrder->setOwner($rawForecastOrder['Owner']);
                $em->persist($forecastOrder);
            }

            $em->flush();

        }

        return $this->redirectToRoute('ForecastOrders');
    }

    /**
     * @Route("/forecastOrders/delete_all", name="delete_all_forecastOrders", methods={"GET"})
     */
    public function deleteAllAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(ForecastOrder::class);
        $repo->deleteAll();
        return $this->redirectToRoute('ForecastOrders');
    }

    private function createForecastOrderForm($data = null)
    {
        return $this->createFormBuilder($data)
            ->add('csv', FileType::class)
            ->add('Upload', SubmitType::class)
            ->getForm();
    }
}
