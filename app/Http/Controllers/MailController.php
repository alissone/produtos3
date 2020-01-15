<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email() {
      $data = array('name'=>'Alisson');

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('alisson@email.com', 'Teste de e-mail básico')->subject
            ('Mensagem do e-mail básico');
         $message->from('damascenoalisson@gmail.com','Eu mesmo');
      });
      echo 'E-mail básico enviado';
   }
   public function html_email() {
      $data = array('name'=>'Alisson');
      Mail::send('mail', $data, function($message) {
         $message->to('alisson@email.com', 'Teste de e-mail HTML')->subject
            ('Mensagem do e-mail HTML enviado pelo Laravel');
         $message->from('damascenoalisson@gmail.com','Eu mesmo de novo');
      });
      echo 'E-mail HTML enviado';
   }
}