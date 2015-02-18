<?php

/**
 * tellus actions.
 *
 * @package    quehagoporti
 * @subpackage tellus
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tellusActions extends sfActions
{
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TellUsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TellUsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$captcha = array(
	  'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
	  'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
	);
	$form->bind(array_merge($request->getParameter($form->getName()), array('captcha' => $captcha) ), $request->getFiles($form->getName()));
	  
    if ($form->isValid())
    {
      $tell_us = $form->save();
      
      // send an email
      $message = $this->getMailer()
		  ->compose(
		  'contactus@guatevoluntaria.org',
		  sfConfig::get('app_email_to'),
		  'Contactanos',
<<<EOF
Nombre: {$tell_us->getName()}
Apellido: {$tell_us->getLastName()}
Email: {$tell_us->getEmail()}
Telefono: {$tell_us->getMobile()}

Comentario: 
{$tell_us->getComment()}
EOF
		);
 
      $this->getMailer()->send($message);
      
      $this->getUser()->setFlash('notice', sprintf('Mensaje enviado exitosamente.' ));
      
      $this->redirect('@contactus');
    }
  }
}
