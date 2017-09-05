<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use AppBundle\Entity\Owner;
use AppBundle\Service\Prediction;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ItemController extends Controller
{
    /**
     * @var Prediction
     */
    private $prediction;

    /**
     * ItemController constructor.
     * @param Prediction $prediction
     */
    public function __construct(Prediction $prediction)
    {
        $this->prediction = $prediction;
    }

    /**
     * @Route("/items", name="items", methods={"GET"})
     */
    public function indexAction(Request $request)
    {
        $itemRepository = $this->getDoctrine()->getRepository(Item::class);
        $items = $itemRepository->findAll();
		
		$form = $this->createItemForm();

        // replace this example code with whatever you need
        return $this->render('default/items.html.twig', [
			'items' => $items,
			'form' => $form->createView()
		]);
    }

    /**
     * @Route("/items/{id}/delete", name="delete_item")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository(Item::class)->find($id);
        if (!$item) {
            throw new NotFoundHttpException();
        }

        $em->remove($item);
        $em->flush();
        return $this->redirectToRoute('items');
    }

    /**
     * @Route("/items", name="upload_item_csv", methods={"POST"})
     */
    public function uploadAction(Request $request)
    {
        $form = $this->createItemForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['csv']->getData();

            $contents = file_get_contents($file->getPathname());
            $serializer = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);
            $rawItems = $serializer->decode($contents, 'csv');

            $em = $this->getDoctrine()->getManager();

            $ownerRepository = $this->getDoctrine()->getRepository(Owner::class);
            $owners = [];

            foreach($rawItems as $rawItem) {
                $item = new Item();
                $item->setCode($rawItem['Item Code']);

                if (isset($owners[$rawItem['Owner']])) {
                    $item->setOwner($owners[$rawItem['Owner']]);
                } else {
                    $owner = $ownerRepository->findBy(['name' => $rawItem['Owner']]);
                    if (count($owner) === 0) {
                        $owner = new Owner();
                        $owner->setName($rawItem['Owner']);
                        $em->persist($owner);
                    } else {
                        $owner = $owner[0];
                    }

                    $owners[$rawItem['Owner']] = $owner;
                    $item->setOwner($owner);
                }

                $item->setDescription($rawItem['Description']);
                $item->setLength($rawItem['Length']);
                $item->setWidth($rawItem['Width']);
                $item->setHeight($rawItem['Height']);
                $item->setAbc($rawItem['ABC']);
                $em->persist($item);
            }

            $em->flush();

        }

        return $this->redirectToRoute('items');
    }

    /**
     * @Route("/items/delete_all", name="delete_all_items", methods={"GET"})
     */
    public function deleteAllAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Item::class);
        $repo->deleteAll();
        return $this->redirectToRoute('items');
    }

    /**
     * @Route("/items/{id}/predict", name="predict", methods={"GET"}, requirements={"id": "\d+"})
     * @ParamConverter("item")
     */
    public function predictAction(Item $item)
    {
        $date = $this->prediction->predictRunOutOfItem($item);
        return $this->render('default/prediction.html.twig', ['date' => $date]);
    }

    private function createItemForm($data = null)
    {
        return $this->createFormBuilder($data)
            ->add('csv', FileType::class)
            ->add('Upload', SubmitType::class)
            ->getForm();
    }
}
