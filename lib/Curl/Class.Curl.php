<?php
// Viết Bởi Kunkey - Vũ Duy Lực
Class cURL {
	public $url;
	public function try_cURL() {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_URL => $this->url,
		    CURLOPT_SSL_VERIFYPEER => false
		));
		$resp = curl_exec($curl);
		curl_close($curl);
		return $resp;
	}
}
?>