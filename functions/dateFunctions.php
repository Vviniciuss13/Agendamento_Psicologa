<?php
    function dateValidation($data_nasc) {
        $arrayDate = explode('-', $data_nasc);
        if (checkdate($arrayDate[1], $arrayDate[2], $arrayDate[0])) {
            return true;
        }
    }

    function ageCalculator($data_nasc) {
        $date = new DateTime($data_nasc);
        $idade = $date->diff(new DateTime(date('Y-m-d')));
        return $idade->format('%y');
    }
?>