<?php

/*
SE DEFINE LA ZONA HORARIA LOCAL
*/
    date_default_timezone_set('America/Argentina/Buenos_Aires');
abstract class Cuenta
{
    /**
     * @var int $numero Número de cuenta.
     */
    protected $numero;
    /**
     * @var int $saldo Saldo de la cuenta
     */
    protected $saldo;
    /**
     * @var string $titular Nombre de la persona titular de la cuenta
     */
    protected $titular;
    /*
SE CREA $MOVIM QUE ALMACENARÁ LOS MOVIMIENTOS
*/
    protected $movim = array();
/*
/*
SE CREA $SHOW QUE MOSTRARA LOS MOVIMIENTOS EN TEXTO
*/
        protected $show;


    /**
     * Constructor
     * @params int $numero
     * @params string $titular
     * @params int $saldo
     */
    public function __construct($numero, $titular, $saldo)
    {
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldo;
        /*
A $MOVIM SE LE ASIGNA POR DEFECTO EL MONTO Y LA FECHA CON LA QUE FUÉ CREADA LA CUENTA.
*/
        $this->movim = [ date('d-m-Y h:i:s a', time())." --------------- "."%2b".$saldo];
/*
A $SHOW SE INICIALIZA COMO STRING VACIO
*/
        $this->show = "";
    }
    
    
    /**
     * Permite realizar un depósito, incrementando el saldo de la cuenta
     *
     * @param int $monto El monto a depositar
     * @return string Mensaje que especifica el resultado de la operación.
     */
    public function depositar($monto)
    {
        $this->saldo += $monto;
        return "El depósito se realizó correctamente.";
    }

    /**
     * Permite realizar una extracción, disminuyendo el saldo de la cuenta
     *
     * @param int $monto El monto a extraer
     * @return string Mensaje que especifica el resultado de la operación.
     * 
     */
    public function extraer($monto) {
        $this->saldo -= $monto;
        return "Extracción realizada correctamente.";
    }

    /**
     * Permite obtener el saldo.
     *
     * @return int El saldo de la cuenta.
     */
    public function getSaldo()
    {
        return $this->saldo;
    }
}
