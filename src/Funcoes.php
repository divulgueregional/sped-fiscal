<?php
namespace Divulgueregional\SpedFiscal;

class Funcoes
{
    public function somenteNumeros($info)
    {
        return preg_replace('/[^0-9]/', '', $info);
    }

    public function textoMaiusculo($info)
    {
        return mb_strtoupper($info, 'UTF-8');
    }

    public function textoMinusculo($info)
    {
        return strtolower($info);
    }

    public function retirarAcento($info)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$info);
    }

    public function textoMaiusculoSemAcento($info)
    {
        $sem_acento = $this->retirarAcento($info);
        return mb_strtoupper($sem_acento, 'UTF-8');
    }

    public function tamanhoString($info, $tamanho)
    {
        if(strlen($info) > $tamanho)
        {
            return substr($info, 0, $tamanho);
        }else{
            return $info;
        }
    }
}