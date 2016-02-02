<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\asd;
use AppBundle\Form\asdType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
class asdController extends Controller{
    /**
     * indexAction
     *
     * @Route(
     *     path="/asd_index",
     *     name="app_asd_index"
     * )
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:asd');
        /**
         * @var Asd $asd
         */
        $asd = $repository->findAll();
        return $this->render(':asd:index.html.twig',
            [
                'asd' => $asd,
            ]
        );
    }
    /**
     * @Route("/asd_insert", name="app_asd_insert")
     */
    public function insertAction()
    {
        $asd = new Asd();
        $form = $this->createForm(asdType::class, $asd);
        return $this->render(':asd:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_asd_do-insert')
            ]
        );
    }
    /**
     * @Route("/asd_do-insert", name="app_asd_do-insert")
     */
    public function doInsert(Request $request)
    {
        $asd = new Asd();
        $form = $this->createForm(asdType::class, $asd);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $m = $this->getDoctrine()->getManager();
            $m->persist($asd);
            $m->flush();
            $this->addFlash('messages', 'añadido');
            return $this->redirectToRoute('app_asd_index');
        }
        $this->addFlash('messages', 'Review your form data');
        return $this->render(':asd:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_asd_do-insert')
            ]
        );
    }
    /**
     * @Route("/asd_update/{id}", name="app_asd_update")
     */
    public function updateAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:asd');
        $asd = $repository->find($id);
        $form = $this->createForm(asdType::class, $asd);
        return $this->render(':asd:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_asd_do-update', ['id' => $id])
            ]
        );
    }
    /**
     * @Route("/asd_do-update/{id}", name="app_asd_do-update")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function doUpdateAction($id, Request $request)
    {
        $m          = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:asd');
        $asd       = $repository->find($id);
        $form       = $this->createForm(asdType::class, $asd);
        // user is updated with incoming data
        $form->handleRequest($request);
        if ($form->isValid()) {
            $m->flush();
            $this->addFlash('messages', 'Actualizado');
            return $this->redirectToRoute('app_asd_index');
        }
        $this->addFlash('messages', 'Review your form');
        return $this->render(':asd:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_asd_index', ['id' => $id]),
            ]
        );
    }
    /**
     *
     * @Route("/asd_remove/{id}", name="app_asd_remove")
     * @ParamConverter(name="asd", class="AppBundle:asd")
     */
    public function removeAction(asd $asd)
    {
        $m = $this->getDoctrine()->getManager();
        $m->remove($asd);
        $m->flush();
        $this->addFlash('messages', 'Eliminado');
        return $this->redirectToRoute('app_asd_index');
    }
}