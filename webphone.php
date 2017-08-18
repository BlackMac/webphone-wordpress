<?php
/*
Plugin Name: Webphone Plugin for sipgate.io
Plugin URI:  https://github.com/BlackMac/webphone-wordpress
Description: Embeds the sipgate.io Phone in a wordpress post : [sipgate_webphone clientid=CLIENT_ID]
Version:     20170818
Author:      Stefan Lange-Hegermann
Author URI:  https://www.stefanlh.de/
License:     MIT
*/

function sipgate_webphone_func($atts) {
    $clientid = $atts['clientid'];
    $id = uniqid();
    $sipgate_code = '
    <script src="https://phone.sipgate.com/static/js/webphone.js"></script>
    <div id="sipgate-webphone-container-'.$id.'" style="height: 600px; width: 400px;box-shadow:0px 0px 60px #555555; margin:60px auto; border:1px solid #eeeeee;"></div>
    <script type="text/javascript">
    var webphone = new SipgateWebphone();
    webphone.init({
    container: document.getElementById("sipgate-webphone-container-'.$id.'"),
    clientId: "'.$clientid.'"
    });
    </script>';
	
    return $sipgate_code;
}

add_shortcode( 'sipgate_webphone', 'sipgate_webphone_func' );