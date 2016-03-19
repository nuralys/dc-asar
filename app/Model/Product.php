<?php 

class Product extends AppModel{

	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		),
		'body' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите текст'
		),
		'img1' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
				'message' => 'Ошибка загрузки картинки'
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '2MB'),
				'message' => 'Максимальный размер картинки 2MB'
			),
			'customUploadImg' => array(
				'rule' => 'customUploadImg',
				'message' => 'Ошибка обработки обработки картинки'
			)
		),
		'img2' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
				'message' => 'Ошибка загрузки картинки'
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '2MB'),
				'message' => 'Максимальный размер картинки 2MB'
			),
			'customUploadImg2' => array(
				'rule' => 'customUploadImg2',
				'message' => 'Ошибка обработки обработки картинки'
			)
		)
	);

	public function customUploadImg($file = array()){
		/*ws begin*/
		
		/*if(!is_uploaded_file($file['img']['tmp_name'])){
			return false;
		}*/
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['img1']['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/product/' . $fileName;
		$path_th = WWW_ROOT . 'img/product/thumbs/' . $fileName;
		copy($file['img1']['tmp_name'], $path);
		copy(WWW_ROOT . trim($this->data[$this->alias]["imgcrop"], '/'), $path_th);
unlink($file['img1']['tmp_name']);
unlink(WWW_ROOT . trim($this->data[$this->alias]["imgcrop"]));
		/*if(!move_uploaded_file($file['img']['tmp_name'], $path)){
			return false;
		}*/
		//$this->resizeImg($path, $path_th, 553, 415, $ext);
/*ws end*/
		$this->data[$this->alias]['img1'] = $fileName;
		return true;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/product/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}
	public function resizeImg($target, $dest, $wmax = 647, $hmax = 647, $ext){
		/*
		$target - путь к оригинальному файлу
		$dest - путь сохранения обработанного файла
		$wmax - максимальная ширина
		$hmax - максимальная высота
		$ext - расширение файла
		*/
		list($w_orig, $h_orig) = getimagesize($target);
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

		if(($wmax / $hmax) > $ratio){
			$wmax = $hmax * $ratio;
		}else{
			$hmax = $wmax / $ratio;
		}
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = imagecreatefromgif($target);
				break;
			case("png"):
				$img = imagecreatefrompng($target);
				break;
			default:
				$img = imagecreatefromjpeg($target);    
		}
		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
		
		if($ext == "png"){
			imagesavealpha($newImg, true); // сохранение альфа канала
			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
			imagefill($newImg, 0, 0, $transPng); // заливка  
		}
		
		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
		switch($ext){
			case("gif"):
				imagegif($newImg, $dest);
				break;
			case("png"):
				imagepng($newImg, $dest);
				break;
			default:
				imagejpeg($newImg, $dest);    
		}
		imagedestroy($newImg);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////

	public function customUploadImg2($file = array()){

		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['img2']['name']));
		$fileName = $this->genNameFile2($ext);
		$path = WWW_ROOT . 'img/product/' . $fileName;
		$path_th = WWW_ROOT . 'img/product/thumbs/' . $fileName;
		copy($file['img2']['tmp_name'], $path);
		copy(WWW_ROOT . trim($this->data[$this->alias]["imgcrop2"], '/'), $path_th);
unlink($file['img2']['tmp_name']);
unlink(WWW_ROOT . trim($this->data[$this->alias]["imgcrop2"]));
		$this->data[$this->alias]['img2'] = $fileName;
		return true;
	}

	public function genNameFile2($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/product/' . $name)){
			$name = $this->genNameFile2($ext);
		}
		return $name;
	}
	public function resizeImg2($target, $dest, $wmax = 647, $hmax = 647, $ext){
		/*
		$target - путь к оригинальному файлу
		$dest - путь сохранения обработанного файла
		$wmax - максимальная ширина
		$hmax - максимальная высота
		$ext - расширение файла
		*/
		list($w_orig, $h_orig) = getimagesize($target);
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

		if(($wmax / $hmax) > $ratio){
			$wmax = $hmax * $ratio;
		}else{
			$hmax = $wmax / $ratio;
		}
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = imagecreatefromgif($target);
				break;
			case("png"):
				$img = imagecreatefrompng($target);
				break;
			default:
				$img = imagecreatefromjpeg($target);    
		}
		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
		
		if($ext == "png"){
			imagesavealpha($newImg, true); // сохранение альфа канала
			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
			imagefill($newImg, 0, 0, $transPng); // заливка  
		}
		
		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
		switch($ext){
			case("gif"):
				imagegif($newImg, $dest);
				break;
			case("png"):
				imagepng($newImg, $dest);
				break;
			default:
				imagejpeg($newImg, $dest);    
		}
		imagedestroy($newImg);
	}
}