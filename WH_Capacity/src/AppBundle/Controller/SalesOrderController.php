<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SalesOrder;
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

class SalesOrderController extends Controller
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function indexAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(SalesOrder::class);
        $salesOrders = $repo->findAll();

        $form = $this->createSalesOrderForm();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'orders' => $salesOrders,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/salesorder/{id}/delete", name="delete_order")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository(SalesOrder::class)->find($id);
        if (!$order) {
            throw new NotFoundHttpException();
        }

        $em->remove($order);
        $em->flush();
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/", name="upload_csv", methods={"POST"})
     */
    public function uploadAction(Request $request)
    {
        $form = $this->createSalesOrderForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['csv']->getData();

            $contents = file_get_contents($file->getPathname());
            $serializer = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);
            $rawOrders = $serializer->decode($contents, 'csv');

            $em = $this->getDoctrine()->getManager();

            foreach($rawOrders as $rawOrder) {
                $salesOrder = new SalesOrder();
                $salesOrder->setOrderRef($rawOrder['Order Ref']);
                $salesOrder->setDateOrdered(\DateTime::createFromFormat('d/m/Y H:i', $rawOrder['Date Ordered']));
                $salesOrder->setDateShipped(\DateTime::createFromFormat('d/m/Y H:i', $rawOrder['Date Shipped']));
                $em->persist($salesOrder);
            }

            $em->flush();

        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/sales/delete_all", name="delete_all_orders", methods={"GET"})
     */
    public function deleteAllAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(SalesOrder::class);
        $repo->deleteAll();
        return $this->redirectToRoute('homepage');
    }

    private function createSalesOrderForm($data = null)
    {
        return $this->createFormBuilder($data)
            ->add('csv', FileType::class)
            ->add('Upload', SubmitType::class)
            ->getForm();
    }
	

} 
