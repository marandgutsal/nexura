<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Empleado;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $id = 1;
        $taskEntity = new Empleado;

            $successLoginFacebook_form_ajax = $this->createCustomForm(
            'AppBundle\Form\EmpleadoType', $taskEntity, 'POST', 'successLoginFacebook_form');
            
        /*
            array(
                'successLoginFacebook_form_ajax' => $successLoginFacebook_form_ajax->createView()
            ),

        */

        //  replace this example code with whatever you need
        return $this->render('default/index.html.twig',  [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'successLoginFacebook_form_ajax' => $successLoginFacebook_form_ajax->createView()
        ]);
    }

    private function createCustomForm($objForm, $objEntity, $method, $route) {
        $form = $this->createForm($objForm, $objEntity, array(
            'action' => $this->generateUrl($route),
            'method' => $method
        ));
        return $form;
    }

    public function successLoginFacebookFormAction(Request $request) {

        $id = $_GET["id"];
        $nombre = $_GET["nombre"];
        $email = $_GET["email"];
        $sexo = $_GET["sexo"];
        $boletin = $_GET["boletin"];
        $descripcion = $_GET["descripcion"];
        $area_id = $_GET["area_id"];
        
        $em2 = $this->getDoctrine()->getEntityManager();
        $db2 = $em2->getConnection();

        $query1 = "
        INSERT INTO `empleado`(
        `id`, 
        `nombre`, 
        `email`, 
        `sexo`, 
        `boletin`, 
        `descripcion`, 
        `area_id`) 
        VALUES (
        '$id',
        '$nombre',
        '$email',
        '$sexo',
        '$boletin',
        '$descripcion',
        '$area_id')
    ";

    $stmt1 = $db2->prepare($query1);
    $params1 = array();
    $stmt1->execute($params1);
    
//    $locationId = $this->check_location($location_name, $location_parent, $territoriality_id);





        return $this->render('default/index2.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);

    }

}
