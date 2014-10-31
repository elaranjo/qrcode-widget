<?php
/**
 * A PHP class for generate a QR Code from a text, using the Charts Google API.
 * 
 * @author Ernane Laranjo <elaranjo@gmail.com>
 * @version 0.1
 * @copyright http://www.gnu.org/licenses/gpl-3.0 GNU General Public License (GPL) 3.0
 */
class QRCodeWidget {
	
	/**
	 * Google URL API
	 *
	 * @var string
	 * @access private
	 */
	private $google_url_api;
	
	/**
	 * Google chart type
	 * ex.: qr
	 * 
	 * @var string
	 * @access private
	 */
	private $cht;
	
	/**
	 * Text to be coded
	 *
	 * @var string
	 * @access private
	 */
	private $chl;
	
	/**
	 * QrCode Size
	 * ex.: 120x120
	 *
	 * @var string
	 * @access private
	 */
	private $chs;

	function __construct(){
		$this->google_url_api = "http://chart.apis.google.com/chart?";
		$this->cht = "cht=qr";
		$this->chs = "chs=120x120";
	}
	
	/**
	 * Set the value to be coded 
	 *
	 * @return void
	 * @param $val
	 * @access public
	 */
	public function setValue($val){
		
		$val = urlencode($val);
		$this->chl = "chl=$val";
	}
	
	/**
	 * Set the size of the QR Code image
	 *
	 * @return void
	 * @param Integer $size
	 * @access public  
	 */
	public function setQrcodeSize($size) {
		if( is_int($size) && $size > 120):
			$this->chs = "chs=".$size."x".$size;
		else:
			die("<b>Error:</b> The size must be an Integer value and greater than 120.");
		endif;
	}
	
	/**
	 * Get the generated QR Code
	 *
	 * @return string
	 * @param String $qrc_file_name
	 * @access public
	 */
	public function getQrcode() {
		$url = $this->configureUrl();
		
		return "<img src='$url' />";
	}
	
	/**
	 * Get the API params and return the full URL to generate the QR Code
	 *
	 * @return string
	 * @access private
	 */
	private function configureUrl(){
		return $this->google_url_api . $this->cht .'&'. $this->chl .'&'. $this->chs;
	}
}

?>