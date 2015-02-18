<?php

class BasesfGuardRegisterActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->getUser()->setFlash('notice', 'Ya estas registrado!');
      $this->redirect('@homepage');
    }

    $this->form = new sfGuardRegisterForm();

    if ($request->isMethod('post'))
    {
      //$this->form->bind($request->getParameter($this->form->getName()));
      
		$captcha = array(
		  'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
		  'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
		);
		$this->form->bind(array_merge($request->getParameter($this->form->getName()), array('captcha' => $captcha) ), $request->getFiles($this->form->getName()));
      
      if ($this->form->isValid())
      {
        $user = $this->form->save();
        $user->setUsername( $user->getEmailAddress() );
        $user->save();
        
        $this->getUser()->signIn($user);
		
		$this->getUser()->setFlash('notice', sprintf('Bienvenido a quehagoporti.com!' ));
        $this->redirect('@homepage');
      }
    }
  }
}
