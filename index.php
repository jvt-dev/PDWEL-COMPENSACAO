<?php
function to_xml(SimpleXMLElement $object, array $data)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $new_object = $object->addChild($key);
            to_xml($new_object, $value);
        } else {
            if ($key != 0 && $key == (int) $key) {
                $key = "key_$key";
            }

            $object->addChild($key, $value);
        }
    }
}

    $data = json_decode(file_get_contents("https://viacep.com.br/ws/13560530/json/"), true);

    $xml = new SimpleXMLElement('<data/>');
    to_xml($xml, $data);

    echo $xml->asXML();
    $xml->asXML("endereco.xml");
?>
