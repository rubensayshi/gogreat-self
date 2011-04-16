<?php

namespace GoGreat\UserBundle\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\TextField;
use Symfony\Component\Form\PasswordField;

class EditProfileForm extends Form
{
    protected function configure()
    {
        $this->add(new TextField('username'));
        $this->add(new PasswordField('password'));
        $this->add(new TextField('email'));
    }
    
    public function getIndentifier()
    {
    	return 'form_profile_edit';
    }
}