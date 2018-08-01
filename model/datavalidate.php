<?php

class DataValidator {
    function uniqidValidator($presumedUniquid) {
        if (strlen($presumedUniquid) == 13) {
            return true;
        }
        return false;
    }

    function stringValidator($presumedString) {
        $regexPattern = '/^[a-zA-Z0-9_ .-]*$/';
        if (strlen($presumedString) == 0) return false;
        if (preg_match($regexPattern, $presumedString)) return true;
        return false;
    }

    function integerValidator($presumedNumber) {
        $regexPattern = '/^[0-9]*$/';
        if (preg_match($regexPattern, $presumedNumber)) {
            return true;
        }
        return false;
    }
}

?>