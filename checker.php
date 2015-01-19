<?
/**
 * This function returns the status code of an URL.
 *
 * @author Pascal Hollenstein <webmaster@zockerade.com>
 * @version 1.0
 * @license GNU AGPL
 * 
 * @param $url_to_check The URL that has to be checked.
 * 
 * @return integer
 */
function get_http_status_code($url_to_check) {
	if (is_string($url_to_check) && function_exists("curl_init")) {
		$curl_handle = curl_init();
		if (is_resource($curl_handle)) {
			curl_setopt($curl_handle, CURLOPT_URL, $url_to_check);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
			curl_exec($curl_handle);
			$http_status_code = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
			curl_close($curl_handle);
			//return $http_status_code;
			return $http_status_code;
		}
	}
	return 404;
}


$url = htmlspecialchars($_GET["mail"]);
$mail = htmlspecialchars($_GET["mail"]);

$status = get_http_status_code($url);

echo $status;


?>