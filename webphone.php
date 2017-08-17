<?php
/*
Plugin Name: Webphone Plugin for sipgate.io
Plugin URI:  https://github.com/BlackMac/webphone-wordpress
Description: Embeds the sipgate.io Phone in a wordpress post : [sipgate_webphone:CLIENT_ID]
Version:     20170817
Author:      Stefan Lange-Hegermann
Author URI:  https://www.stefanlh.de/
License:     MIT
*/

function insert_sipgate_webphone($text) {
    $id = uniqid();
    $sipgate_code = '
    <script src="https://phone.sipgate.com/static/js/webphone.js"></script>
    <div id="sipgate-webphone-container-'.$id.'" style="height: 600px; width: 400px;"></div>
    <script type="text/javascript">
    var webphone = new SipgateWebphone();
    webphone.init({
    container: document.getElementById("sipgate-webphone-container-'.$id.'"),
    clientId: "$1"
    });
    </script>';

    return preg_replace("/\[sipgate_webphone\:([a-zA-Z_-]*)\]/", $sipgate_code, $text);
}

add_filter( 'the_content', 'insert_sipgate_webphone' );