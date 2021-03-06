<?php
Namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Article;
use App\Category;
use App\Tag;
use App\User;
use App\Page;
use App\Http\Controllers\Controller;
use App\Email;
use App\Http\Requests;


class MailController extends Controller
{
    public function send(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|regex:/\+38\(+[0-9]{3}\)+\-+[0-9]{3}\-+[0-9]{2}\-+[0-9]{2}/',
            'email' => 'required|email',
            'message_my' => 'min:10',
        ]);

    	$message=$request;
       
        
    if (!$_POST['g-recaptcha-response'] )  exit('Заполните капчу');   
    if ($_POST['g-recaptcha-response'] ) {
        $url='https://www.google.com/recaptcha/api/siteverify';
        $key='6LfX91wUAAAAACp7iKOACHwSz3sb2V4-nxDfXbkD';
        $query=$url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'].'';
        $data=json_decode(file_get_contents($query));


        if ($data->success){
                Mail::send(['text'=>'emails/email_plain'],  	
                    	['name'=>$message->name,
                    	 'phone'=>$message->phone,
                    	 'email'=>$message->email,
                    	 'message_my'=>$message->message,],	function($m){
                    		$m->to('admin@chammyblog.zzz.com.ua','')->subject('Письмо с chammy блог');
                    		$m->from('admin@chammyblog.zzz.com.ua','admin@chammyblog.zzz.com.ua');
                    	});

                 return redirect()->route('home',['message'=>'Ваше сообщение отправлено']);
            } else exit('Вы не прошли капчу'); 

        }
    
        
    }
}