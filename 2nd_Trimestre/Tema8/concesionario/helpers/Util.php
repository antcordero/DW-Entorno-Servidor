<?php
/**
 * CLASE HELPER (AYUDA)
 * Contiene funciones estáticas para formatear datos en la vista.
 * No necesita instanciarse (no hacemos 'new Util').
 */
class Util {
    
    /**
     * Convierte un número (2500.5) en formato moneda (2.500,50 €)
     * Se llama así: Util::moneda(precio);
     */
    public static function moneda($cantidad) {
        // number_format(numero, decimales, separador_decimal, separador_miles)
        return number_format($cantidad, 2, ',', '.') . ' ' . MONEDA;
    }

    /**
     * Convierte fecha SQL (2023-10-25) a fecha española (25/10/2023)
     */
    public static function fecha($fechaSql) {
        // Creamos un objeto fecha y lo formateamos
        $date = new DateTime($fechaSql);
        return $date->format('d/m/Y');
    }

    /**
     * Acorta un texto si es muy largo (Para descripciones)
     */
    public static function acortar($texto, $largo = 50) {
        if (strlen($texto) > $largo) {
            return substr($texto, 0, $largo) . "...";
        }
        return $texto;
    }
}
?>