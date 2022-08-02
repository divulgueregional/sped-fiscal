<?php
namespace Divulgueregional\SpedFiscal;

class Sped
{
    private $registros = [];
    private $contadorBlocos = [];
    private $contadorBlocosRegistro = [];

    function __construct()
    {
        //definir
    }

    ###############################################################
    ############ CRIAR LINHA ######################################
    ###############################################################

    function criarLinha(string $bloco, string $blocoRegistro, string $registro) {
        $this->incrementContadorBloco($bloco);
        $this->incrementContadorBlocoRegistro($blocoRegistro);
        $this->registros[] = $registro;
    }

    private function incrementContadorBloco(string $bloco) {
        if (isset($this->contadorBlocos[$bloco])) {
            $this->contadorBlocos[$bloco] += 1;
        } else {
            $this->contadorBlocos["$bloco"] = 1;
        }
    }

    function incrementContadorBlocoRegistro(string $blocoRegistro) {
        if (isset($this->contadorBlocosRegistro[$blocoRegistro])) {
            $this->contadorBlocosRegistro[$blocoRegistro] += 1;
        } else {
            $this->contadorBlocosRegistro["$blocoRegistro"] = 1;
        }
    }

    ###############################################################
    ############ ENCERRAMENTO DE BLOCO ############################
    ###############################################################
    function criarEncerramentoBloco(string $bloco, string $blocoRegistro, string $registro, int $incrementoAdicional = 0) {
        $this->incrementContadorBloco($bloco);
        $this->incrementContadorBlocoRegistro($blocoRegistro);
        $qtdRegistrosBloco = $this->getContadorBloco($bloco);
        $this->registros[] = "|$registro|" . ($qtdRegistrosBloco + $incrementoAdicional) . "|";
    }

    public function getContadorBloco(string $bloco) {
        return ($this->contadorBlocos["$bloco"] ?? 0);
    }
    ###############################################################
    ############ DADOS PARA GERAR O ARQUIVO #######################
    ###############################################################
    function getRegistros($quabraDeLinha = "\r\n"): string {
        $todosOsRegistros = '';
        foreach ($this->registros as $linha) {
            $todosOsRegistros .= $linha . $quabraDeLinha;
        }

        return $todosOsRegistros;
    }
}