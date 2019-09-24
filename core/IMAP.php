<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * PHP-IMAP
 * Retrieve Your Emails from any mail server Using PHP and IMAP
 *
 * @package IMAP
 * @author Ind(feliphegomez) | 2019-09-12/15
 *
 * @credits http://php.net/manual/en/function.imap-open.php/
 * @credits http://davidwalsh.name/gmail-php-imap/
 * @credits http://www.backslash.gr/content/blog/webdevelopment/8-check-your-email-with-php-and-imap/
 * @credits http://www.codediesel.com/php/downloading-gmail-attachments-using-php/
 *
 * ******************************/

# IMAP Configs
/**
	* --localhost POP3 with and without SSL--
	* "{localhost:995/pop3/ssl/novalidate-cert}"
	* "{localhost:110/pop3/notls}"
	*
	* --localhost IMAP with and without SSL--
	* "{localhost:993/imap/ssl/novalidate-cert}"
	* "{localhost:143/imap/notls}"
	*
	* --localhost NNTP with and without SSL--
	* --you have to specify an existing group, control.cancel should exist--
	* "{localhost:563/nntp/ssl/novalidate-cert}control.cancel"
	* "{localhost:119/nntp/notls}control.cancel"
	*
	* --web.de POP3 without SSL--
	* "{pop3.web.de:110/pop3/notls}"
	*
	* --Goggle with POP3 or IMAP--
	* "{pop.gmail.com:995/pop3/ssl/novalidate-cert}"
	* "{imap.gmail.com:993/imap/ssl/novalidate-cert}"
	* 
*/
 
class IMAP extends EntidadBase{
	public $boxes = [];
	public $mails = [];
	public $total = 0;
	public $total_unread = 0;
	public $inbox;
	
	public function __construct($adapter) {
		$this->adapter = $adapter;
        $table = "media";
        parent::__construct($table, $adapter);
	}
	
	public function setBoxes($box = []){
		$this->boxes = !is_array($box) ? (array) $box : $box;
	}
	
	public function addBox($box){
		$this->boxes[] = is_array($box) ? (object) $box : $box;
	}
	
	public function getBoxes(){
		return $this->boxes;
	}
	
	public static function decodeIMAPText($str = "") : string {
		$op = '';
		$decode_header = imap_mime_header_decode($str);
		foreach ($decode_header AS $obj){
			$op .= htmlspecialchars(rtrim($obj->text, "\t"));
		}
		return ($op);
	}
	
	public static function convertKeyValuesIMAP($item){
		$new = new stdClass();
		foreach($item as $key=>$value){
			$new->{$key} = "";
			if (!is_array($value) && !is_object($value)) {
				$new->{$key} = IMAP::decodeVal($value);
			}else{
				$new->{$key} = IMAP::convertKeyValuesIMAP($value);
			}
		}
		return $new;
	}
	
	public static function decodeVal($string) {
		$tabChaine=imap_mime_header_decode($string);
		$texte='';
		for ($i=0; $i<count($tabChaine); $i++) {
			switch (strtoupper($tabChaine[$i]->charset)) { //convert charset to uppercase
				case 'UTF-8': $texte.= $tabChaine[$i]->text; //utf8 is ok
					break;
				case 'DEFAULT': $texte.= $tabChaine[$i]->text; //no convert
					break;
				default: if (in_array(strtoupper($tabChaine[$i]->charset),$this->upperListEncode())) //found in mb_list_encodings()
							{$texte.= mb_convert_encoding($tabChaine[$i]->text,'UTF-8',$tabChaine[$i]->charset);}
						 else { //try to convert with iconv()
							  $ret = iconv($tabChaine[$i]->charset, "UTF-8", $tabChaine[$i]->text);    
							  if (!$ret) $texte.=$tabChaine[$i]->text;  //an error occurs (unknown charset) 
							  else $texte.=$ret;
							}                    
					break;
				}
		}
			
		return $texte;    
	}
	
	public function open($mailbox, $username, $password){
		$this->inbox = @imap_open($mailbox, $username, $password) or die("no se puede conectar: " . imap_last_error());
		return $this->inbox;
	}
	
	function base64_to_jpeg($base64_string, $output_file) {
		// open the output file for writing
		$ifp = fopen( $output_file, 'wb' ); 

		// split the string on commas
		// $data[ 0 ] == "data:image/png;base64"
		// $data[ 1 ] == <actual base64 string>
		$data = explode( ',', $base64_string );

		// we could add validation here with ensuring count( $data ) > 1
		fwrite( $ifp, base64_decode( $data[ 1 ] ) );

		// clean up the file resource
		fclose( $ifp ); 

		return $output_file; 
	}
	
	public function loadMails($box = null, $limit = 5, $complete = false){
		$this->mails = [];
		$this->total = 0;
		$this->total_unread = 0;
		$boxexRaiz = $box == null ? $this->boxes : isset($this->boxes[$box]) ? [$this->boxes[$box]] : [];
		$objectR = (object) [];
		$objectR->success = false;
		$objectR->total = 0;
		$objectR->box = [];
		
		if (!count($boxexRaiz)) {
			
		} else {
			foreach ($boxexRaiz as $curMailBox) {
				$curMailBox_original = $curMailBox;
				if(!isset($curMailBox->enable) || !isset($curMailBox->mailbox)){
					$curMailBox = (object) [
						'id' 	=> $curMailBox->id,
						'label' 	=> $curMailBox->label,
						'enable'	=> $curMailBox->actived == 1 ? true : false,
						'host'	=> $curMailBox->host,
						'user'	=> $curMailBox->user,
						'mailbox' 	=> "{{$curMailBox->host}:{$curMailBox->port}{$curMailBox->args_add}}INBOX",
						'username' 	=> "{$curMailBox->user}",
						'password' 	=> "{$curMailBox->pass}"
					];
				}
				$curMailBox->total = 0;
				$curMailBox->mails = [];
				
				if ($curMailBox->enable){
					// IMAP Open
					$inbox = $this->open($curMailBox->mailbox, $curMailBox->username, $curMailBox->password); 
					
					if ( $inbox ) {
						// Get the last week's emails only
						// Instead of searching for this week's message you could search for all the messages in your inbox using: $emails = imap_search($inbox,'ALL');
						# $emails = $complete = false ? imap_search($inbox, 'SINCE '. date('d-M-Y',strtotime("-1 hour"))) : @imap_search($inbox, 'ALL');
						# $emails = @imap_search($inbox, 'SINCE '. date('d-M-Y',strtotime("-1 hour")));
						# $emails = @imap_search($inbox, 'SINCE '. date('d-M-Y',strtotime("-1 week")));
						# $emails = @imap_search($inbox, 'ALL');
						$emails = @imap_search($inbox, 'UNSEEN');
						
						if ($emails == false || !count($emails)) {
							//print '<p>No E-mails found.</p>';
							$objectR->success = false;
							return $objectR;
						} else {
							$objectR->success = true;
							rsort($emails); // Sort
							$total_search = (int) (count($emails));
							if($total_search > 0){
								foreach(array_reverse($emails) as $email){
									if($limit == null || $limit > ($curMailBox->total)){
										$MC = imap_check($inbox);
										$overview = imap_fetch_overview($inbox,$email,0); // Fetch the email's overview and show subject, from and date.
										/*
											subject - el sujeto del mensaje
											from - quién lo envió
											to - destinatario
											date - cuándo fue enviado
											message_id - ID del mensaje
											references - es una referencia a este id de mensaje
											in_reply_to - es una respueste a este id de mensaje
											size - tamaño en bytes
											uid - UID del mensaje que está en el buzón
											msgno - número de secuencia de mensaje en el buzón
											recent - este mensaje está marcado como reciente
											flagged - este mensaje está marcado
											answered - este mensaje está marcado como respondido
											deleted - este mensaje está marcado para su eliminación
											seen - este mensaje está marcado como ya leído
											draft - este mensaje está marcado como borrador
										*/
										/**/
										$texto = $this->getBody($overview[0]->uid, $inbox);
										$message = "";
										$elementos = imap_mime_header_decode($texto);
										for ($i=0; $i<count($elementos); $i++) {
											#$message .= "Conjunto de caracteres: {$elementos[$i]->charset}\n";
											
											if(trim($elementos[$i]->text) !== ''){
												$message .= "{$elementos[$i]->text}\n";
											}
										}
										
										if(trim($message) == ''){
											# $message = "Conjunto de caracteres: {$elementos[$i]->charset}\n";											
											$message = imap_fetchbody($inbox,$email,'1.2');
											if ( trim($message) == '' ){ $message = imap_fetchbody($inbox,$email,2); $message = quoted_printable_decode($message); }
											if ( trim($message) == '' ){ $message = imap_fetchbody($inbox,$email,1); }
											
										}
										
										
										// Message Body
										/*$my_message = $this->getBody($overview[0]->uid, $inbox);
										$message = imap_fetchbody($inbox,$email,'1.2');
										echo json_encode($message)."\n";
										if ( trim($message) == '' ){ $message = imap_fetchbody($inbox,$email,2); }
										echo json_encode($message)."\n";
										$message = quoted_printable_decode($message);	
										echo json_encode($message)."\n";									
										if ( trim($message) == '' ){ $message = imap_fetchbody($inbox,$email,1); }
										echo json_encode($message)."\n";*/
										
										# echo json_encode("\n");
										# echo json_encode($message)."\n";
										/*
										if (base64_encode(base64_decode($message, true)) === $message){
										   $message = "<div><img src=\"data:image/png;base64, {$message}\" alt=\"\" /></div>";
										} else {
										   $message = $message;
										}
										*/
											
										// Attachements
										$structure = imap_fetchstructure($inbox,$email);
										$attachments = array();
										if( isset($structure->parts) && count($structure->parts) ) {
											for($i = 0; $i < count($structure->parts); $i++) {
												$attachments[$i] = array(
													'is_attachment' => false,
													'filename' => '',
													'name' => '',
													'attachment' => ''
												);
								 
												if($structure->parts[$i]->ifdparameters) {
													foreach($structure->parts[$i]->dparameters as $object) {
														if(strtolower($object->attribute) == 'filename') {
															$attachments[$i]['is_attachment'] = true;
															$attachments[$i]['filename'] = $object->value;
														}
													}
												}
								 
												if($structure->parts[$i]->ifparameters) {
													foreach($structure->parts[$i]->parameters as $object) {
														if(strtolower($object->attribute) == 'name') {
															$attachments[$i]['is_attachment'] = true;
															$attachments[$i]['name'] = $object->value;
														}
													}
												}
												if($attachments[$i]['is_attachment']) {
													$attachments[$i]['attachment'] = imap_fetchbody($inbox, $email, $i+1); 
													// 3 = BASE64 encoding
													if($structure->parts[$i]->encoding == 3) {
														$attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']); 
														
														/*
														$this->base64_to_jpeg(
															$attachments[$i]['attachment']
															, dirname(__DIR__) . "/public/attachments/{$curMailBox->host}/{$curMailBox->user}/{$year}-{$mouth}-{$day}/{$email}/"
														);
														
														$targetPath = ;
														$targetFile = rand(50000, 90000);
														$path_short = $targetPath . $targetFile;
														if (!is_dir(dirname($path_short))) {
															mkdir(dirname($path_short), 0755, true);
														}
														
														if (!file_exists($path_short)) {
															$fp = fopen($path_short, "w+");
															fwrite($fp, $attachment['attachment']);
															fclose($fp);
														}*/
													}
													// 4 = QUOTED-PRINTABLE encoding // imap_qprint
													elseif($structure->parts[$i]->encoding == 4) { $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']); }
												}
											}
										}
										
										preg_match ('/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i', $overview[0]->message_id, $mId );
										preg_match ('/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i', htmlspecialchars_decode(IMAP::decodeIMAPText($overview[0]->from)), $mFrom );
										preg_match ('/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i', htmlspecialchars_decode(IMAP::decodeIMAPText($overview[0]->to)), $mTo );

										$mailInsert = [
											"box" => $curMailBox->id,
											"message_id" => !isset($mId[0]) ? $overview[0]->message_id : $mId[0],
											"uid" => !isset($overview[0]->uid) ? 0 : $overview[0]->uid,
											"status" => $overview[0]->seen?'read':'unread',
											"subject" => htmlspecialchars_decode(IMAP::decodeIMAPText($overview[0]->subject)),
											"from" => htmlspecialchars_decode(IMAP::decodeIMAPText($overview[0]->from)),
											"from_email" => !isset($mFrom[0]) ? htmlspecialchars_decode(IMAP::decodeIMAPText($overview[0]->from)) : $mFrom[0],
											"to" => htmlspecialchars_decode(IMAP::decodeIMAPText($overview[0]->to)),
											"to_email" => !isset($mTo[0]) ? htmlspecialchars_decode(IMAP::decodeIMAPText($overview[0]->to)) : $mTo[0],
											"date" => $overview[0]->date,
											"message" => htmlspecialchars($message),
											"size" => IMAP::decodeIMAPText($overview[0]->size),
											// "references" => IMAP::decodeIMAPText($overview[0]->references),
											"msgno" => IMAP::decodeIMAPText($overview[0]->msgno),
											"recent" => IMAP::decodeIMAPText($overview[0]->recent),
											"flagged" => IMAP::decodeIMAPText($overview[0]->flagged),
											"answered" => IMAP::decodeIMAPText($overview[0]->answered),
											"deleted" => IMAP::decodeIMAPText($overview[0]->deleted),
											"seen" => IMAP::decodeIMAPText($overview[0]->seen),
											"draft" => IMAP::decodeIMAPText($overview[0]->draft),
											"attachments" => [],
											"overview" => $overview[0],
										];
										
										$creaMail = new Email($this->adapter);
										$idMailSQL = $creaMail->crear($mailInsert);
										if ($idMailSQL > 0){
											$mailInsert['id'] = $idMailSQL;
										
											// Guardar Adjuntos
											$day = date("d");
											$mouth = date("m");
											$year = date("Y");
											
											$updateAtt = false;
											foreach($attachments as $attachment){
												if ($attachment['is_attachment'] == 1){
													$filename = $attachment['name'];
													if (empty($filename)) $filename = $attachment['filename'];
													if (empty($filename)) $filename = time() . ".dat";
													
													
													
													$remplaceFrom = array("=2E", '=?UTF-8?Q?');
													$remplaceTo = array(".", '-UTF8-');
													$filename = str_replace($remplaceFrom, $remplaceTo, $filename);
													$ignores = array("=", "?", "&", "?iso-8859-1", "?=");
													$filename = str_replace($ignores, "", $filename);

													// prefix the email number to the filename in case two emails have the attachment with the same file name.
													$targetPath = dirname(__DIR__) . "/public/attachments/{$curMailBox->host}/{$curMailBox->user}/{$year}-{$mouth}-{$day}/{$email}/";
													$targetFile = ("{$email}-{$filename}");
													$path_short = $targetPath . $targetFile;
													if (!is_dir(dirname($path_short))) {
														mkdir(dirname($path_short), 0755, true);
													}
													
													if (!file_exists($path_short)) {
														$fp = fopen($path_short, "w+");
														fwrite($fp, $attachment['attachment']);
														fclose($fp);
													}
														
													// Adjunto
													if (file_exists($path_short)) {
														$targetPath = "/public/attachments/{$curMailBox->host}/{$curMailBox->user}/{$year}-{$mouth}-{$day}/{$email}/";
														$path_short = $targetPath . $targetFile;
														$response = [];
														$fileBase = new Attachments($this->adapter);
														$dataFile = [
															'name' => $attachment['name'],
															'filename' => $attachment['filename'],
															"targetPath" => $targetPath,
															"targetFile" => $targetFile,
															"path_short" => $path_short
														];
														$idFile = $fileBase->crear($dataFile);
														
														if ($idFile > 0){
															$dataFile['id'] = $idFile;
															
															// Agregar Attachements al Email
															$requests_media = new EmailAttachments($this->adapter);
															$media = $requests_media->crear([
															  'email' => $mailInsert['id'],
															  'attachment' => $dataFile['id']
															]);
															
															if ($media > 0){
																$dataFile['id'] = $media;
																$mailInsert['attachments'][] = $dataFile;
																$updateAtt = true;
															}
															
															$curMailBox->total++;
															$curMailBox->mails[] = $mailInsert;
															$this->addMail((object) $mailInsert);
															$objectR->total++;
														} else {
															#'status' => 'error',
															#'info'   => 'No se pudo cargar el archivo solicitado :(, ocurrió un misterioso error.'
														}
													}
												}
											}
											// validar Total
											if ($updateAtt == true){
												$update = $creaMail->updateBy($idMailSQL, 'attachments', json_encode($mailInsert['attachments']));
											}
										}
										#sleep(1);
									} // FIN limit
				
								} // FIN foreach
							}
						}
						
						imap_close($inbox);
						
					} else {
						// print '<p>::CONNECTION_ERROR:: '. imap_last_error().'</p>';
						$objectR->success = false;
					}
				}
				
				$objectR->box[] = $curMailBox;
				$EmailBox = new EmailBox($this->adapter);
				//$EmailBox->updateSync($curMailBox_original->id);
				
				
				sleep(1);
			} // FIN foreach
		}
		return $objectR;
	}
	
	public function getMails(){
		return $this->mails;
	}
	
	public function addMail($mail){
		$this->mails[] = $mail;
		$this->total++;
		if($mail->status == 'unread'){ $this->total_unread++; }
	}
	
	public function getBody($uid, $imap){
		$body = $this->get_part($imap, $uid, "TEXT/HTML");
		// if HTML body is empty, try getting text body
		if ($body == "") {
			$body = $this->get_part($imap, $uid, "TEXT/PLAIN");
		}
		return $body;
	}

	public function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false){
		if (!$structure) {
			$structure = imap_fetchstructure($imap, $uid, FT_UID);
		}
		if ($structure) {
			if ($mimetype == $this->get_mime_type($structure)) {
				if (!$partNumber) {
					$partNumber = 1;
				}
				$text = imap_fetchbody($imap, $uid, $partNumber, FT_UID);
				switch ($structure->encoding) {
					case 3:
						return imap_base64($text);
					case 4:
						return imap_qprint($text);
					default:
						return $text;
				}
			}

			// multipart
			if ($structure->type == 1) {
				foreach ($structure->parts as $index => $subStruct) {
					$prefix = "";
					if ($partNumber) {
						$prefix = $partNumber . ".";
					}
					$data = $this->get_part($imap, $uid, $mimetype, $subStruct, $prefix . ($index + 1));
					if ($data) {
						return $data;
					}
				}
			}
		}
		return false;
	}

	public function get_mime_type($structure){
		$primaryMimetype = ["TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER"];

		if ($structure->subtype) {
			return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
		}
		return "TEXT/PLAIN";
	}
}