<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;

class ContactForm extends Form
{
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->minLength('name',3,'please enter valid name ')
            ->email('email');

        return $validator;
    }
    protected function _execute(array $data): bool
    {

        $name = $data['name'];
        $email = $data['email'];
        $body = $data['body'];
        // Send an email.
        $mailer = new Mailer('default');
                $mailer
                    ->setTransport('gmail') //your email configuration name
                    ->setFrom(['hk244381@gmail.com' => 'Code The Pixel'])
                    ->setTo('hk244381@gmail.com')
                    ->setEmailFormat('html')
                    ->setSubject('Verify New Account')
                    ->deliver('name :'.$name. 'email :'.$email.'body :'.$body);
        return true;
    }
}
?>