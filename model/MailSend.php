<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailSend {
	private $mail;
	public $from_mail = "no-reply@monteverdeltda.com";
	public $from_name = ("Portal de Clientes - Monteverde LTDA");
	public $to = [];
	public $reply_mail = "atencionalcliente@monteverdeltda.com";
	public $reply_name = ("Atencion al cliente - Monteverde Servicios Ambientales y Forestales LTDA");
	public $subject = ("Servicios Ambientales y Forestales Monteverde");
	public $message = "";
	public $isHtml = false;
	
	public function __construct(){
	}
	
	public function setHtml($isHtml = false){
		$this->isHtml = $isHtml;
	}
	
	public function setMessage($message = null){
		if($message !== null){
			$this->message = ($message);
		}
	}
	
	public function setSubject($subject = null){
		if($subject !== null){
			$this->subject = utf8_decode($subject);
		}
	}
	
	public function set($key = null, $value){
		if($key !== null && $value !== null){
			$this->{$key} = utf8_decode($value);
		}
	}
	
	public function addTo($email = null, $name = null){
		if($email !== null){
			$name = ($name !== null) ? $name : $email;
			$this->to[] = (object) ["email" => $email, "name" => utf8_decode($name)];
		}
	}
	
	public function setReply($email = null, $name = null){
		if($email !== null){
			$name = ($name !== null) ? $name : $email;
			$this->reply_mail = $email;
			$this->reply_name = utf8_decode($name);
		}
	}
	

	function removeElementsByTagName($tagName, $document) {
	  $nodeList = $document->getElementsByTagName($tagName);
	  for ($nodeIdx = $nodeList->length; --$nodeIdx >= 0; ) {
		$node = $nodeList->item($nodeIdx);
		$node->parentNode->removeChild($node);
	  }
	}
	
	public function sendMail(){
		$this->mail = new PHPMailer(true);
		try {
			//Server settings
			//$this->mail->SMTPDebug = 2;                   // Enable verbose debug output
			$this->mail->isSMTP();                         // Set mailer to use SMTP
			$this->mail->Host        = smtp_Host;          // Specify main and backup SMTP servers
			$this->mail->SMTPAuth    = smtp_SMTPAuth;      // Enable SMTP authentication
			$this->mail->SMTPAutoTLS = smtp_SMTPAutoTLS;
			$this->mail->Username    = smtp_Username;      // SMTP username
			$this->mail->Password    = smtp_Password;      // SMTP password
			$this->mail->SMTPSecure  = smtp_SMTPSecure;    // Enable TLS encryption, `ssl` also accepted
			$this->mail->Port        = smtp_Port;          // TCP port to connect to
			
			//Recipients
			$this->mail->setFrom($this->from_mail, $this->from_name);
			foreach($this->to as $to){
				$this->mail->addAddress($to->email, $to->name);     // Add a recipient
			}
			$this->mail->addReplyTo($this->reply_mail, $this->reply_name);
			# $this->mail->addCC('cc@example.com');
			# $this->mail->addBCC('bcc@example.com');

			// Attachments
			# $this->mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			# $this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			// Content
			$this->mail->isHTML($this->isHtml);                                  // Set email format to HTML
			$this->mail->Subject = $this->subject;
			$this->mail->Body    = $this->message;
			
			// create a new DomDocument object
			$doc = new DOMDocument();
			$doc->loadHTML($this->message);
			$this->removeElementsByTagName('script', $doc);
			$this->removeElementsByTagName('style', $doc);
			$this->removeElementsByTagName('link', $doc);
			
			$this->mail->AltBody = strip_tags($doc->saveHtml());
			$this->mail->send();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}