<?php
namespace AppBundle\Controller;

// We include the entity that we create in our Controller file
use AppBundle\Entity\Event;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

// Now we need some classes in our Controller because we need that in our form (for the inputs that we will create)
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EventController extends Controller
{
   /**
    * @Route("/", name="event_list")
    */
   public function listAction(){
	// Here we will use getDoctrine to use doctrine and we will select the entity that we want to work with and we used findAll() to bring all the information from it and we will save it inside a variable named todos and the type of the result will be an array 
	$events = $this->getDoctrine()->getRepository('AppBundle:Event')->findAll();
       
       return $this->render('event/index.html.twig', array('events' => $events));
   }

    /**
    * @Route("event/create", name="event_create")
    */
   public function createAction(Request $request){
   	
   	$event = new Event;

   	/* Here we will build a form using createFormBuilder and inside this function we will put our object and then we write add then we select the input type then an array to add an attribute that we want in our input field */

   	$form = $this->createFormBuilder($event)
		->add('name', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
		->add('start_date', DateTimeType::class, array('attr' => array('class'=>'mb-3')))
		->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control mb-3')))
		->add('image', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
		->add('capacity', IntegerType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('email', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('phone', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('address', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('url', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('event_type', ChoiceType::class, array('choices'=>array('Music'=>'Music', 'Sport'=>'Sport', 'Movie'=>'Movie', 'Theater'=>'Theater'),'attr' => array('class'=> 'form-control mb-3')))
   		->add('save', SubmitType::class, array('label'=> 'Create Event', 'attr' => array('class'=> 'btn btn-sm btn-primary mb-3')))
       ->getForm();
       $form->handleRequest($request);

    /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
    if($form->isSubmitted() && $form->isValid()){
       //fetching data
       $name = $form['name']->getData();
       $start_date = $form['start_date']->getData();
       $description = $form['description']->getData();
       $image = $form['image']->getData();
       $capacity = $form['capacity']->getData();
       $email = $form['email']->getData();
       $phone = $form['phone']->getData();
       $address = $form['address']->getData();
       $url = $form['url']->getData();
       $event_type = $form['event_type']->getData();

	// Here we will get the current date
    $now = new\DateTime('now');

    /* these functions we bring from our entities, every column have a set function and we put the value that we get from the form */
    $event->setName($name);
    $event->setStartDate($start_date);
    $event->setDescription($description);
    $event->setImage($image);
    $event->setCapacity($capacity);
    $event->setEmail($email);
    $event->setPhone($phone);
    $event->setAddress($address);
    $event->setUrl($url);
    $event->setEventType($event_type);
    $event->setCreateDate($now);
    $em = $this->getDoctrine()->getManager();
    $em->persist($event);
    $em->flush();
    $this->addFlash(
           'notice',
           'Event Added'
           );
     return $this->redirectToRoute('event_list');
    }
    /* now to make the form we will add this line form->createView() and now you can see the form in create.html.twig file  */

       return $this->render('event/create.html.twig', array('form' => $form -> createView()));
   }

    /**
    * @Route("event/details/{id}", name="event_details")
    */
   public function detailsAction($id){
   	$event = $this->getDoctrine()->getRepository('AppBundle:Event')->find($id);
       return $this->render('event/details.html.twig', array('event' => $event));
   }

    /**
    * @Route("event/edit/{id}", name="event_edit")
    */
   public function editAction($id, Request $request){
   	/* Here we have a variable event and it will save the result of this search and it will be one result because we search based on a specific id */
   	$event = $this->getDoctrine()->getRepository('AppBundle:Event')->find($id);
	$now = new\DateTime('now');

	/* Now we will use set functions and inside this set functions we will bring the value that is already exist using get function for example we have setName() and inside it we will bring the current value and use it again */
    $event->setName($event -> getName());
    $event->setStartDate($event -> getStartDate());
    $event->setDescription($event -> getDescription());
    $event->setImage($event -> getImage());
    $event->setCapacity($event -> getCapacity());
    $event->setEmail($event -> getEmail());
    $event->setPhone($event -> getPhone());
    $event->setAddress($event -> getAddress());
    $event->setUrl($event -> getUrl());
    $event->setEventType($event -> getEventType());
    $event->setCreateDate($now);

    /* Now when you type createFormBuilder and you will put the variable event the form will be filled of the data that you already set it */
	$form = $this->createFormBuilder($event)
		->add('name', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
		->add('start_date', DateTimeType::class, array('attr' => array('class'=>'mb-3')))
		->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control mb-3')))
		->add('image', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
		->add('capacity', IntegerType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('email', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('phone', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('address', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('url', TextType::class, array('attr' => array('class'=> 'form-control mb-3')))
       	->add('event_type', ChoiceType::class, array('choices'=>array('Music'=>'Music', 'Sport'=>'Sport', 'Movie'=>'Movie', 'Theater'=>'Theater'),'attr' => array('class'=> 'form-control mb-3')))
   		->add('save', SubmitType::class, array('label'=> 'Update Event', 'attr' => array('class'=> 'btn btn-sm btn-primary mb-3')))
       ->getForm();
       $form->handleRequest($request);

    /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
    if($form->isSubmitted() && $form->isValid()){
       //fetching data
       $name = $form['name']->getData();
       $start_date = $form['start_date']->getData();
       $description = $form['description']->getData();
       $image = $form['image']->getData();
       $capacity = $form['capacity']->getData();
       $email = $form['email']->getData();
       $phone = $form['phone']->getData();
       $address = $form['address']->getData();
       $url = $form['url']->getData();
       $event_type = $form['event_type']->getData();

       $em = $this->getDoctrine()->getManager();
       $event = $em->getRepository('AppBundle:Event')->find($id);

       $event->setName($name);
	   $event->setStartDate($start_date);
	   $event->setDescription($description);
	   $event->setImage($image);
	   $event->setCapacity($capacity);
	   $event->setEmail($email);
	   $event->setPhone($phone);
	   $event->setAddress($address);
	   $event->setUrl($url);
	   $event->setEventType($event_type);
	   $event->setCreateDate($now);

	   $em->flush();
       $this->addFlash(
               'notice',
               'Event Updated'
               );
       return $this->redirectToRoute('event_list');
       }

       return $this->render('event/edit.html.twig', array('event' => $event, 'form' => $form -> createView()));
   }

   /**
    * @Route("/event/delete/{id}", name="event_delete")
    */
   public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Event')->find($id);
        $em->remove($event);
        $em->flush();
        $this->addFlash(
            'notice',
            'Event Removed'
            );
        return $this->redirectToRoute('event_list');
   }
}