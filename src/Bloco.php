<?php
//REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=200
namespace Divulgueregional\SpedFiscal;
use Divulgueregional\SpedFiscal\Sped;
use Divulgueregional\SpedFiscal\Funcoes;

class Bloco
{
    function __construct()
    {
        $this->Sped = new Sped;
        $this->Funcoes = new Funcoes;
    }

    ###########################################################
    ############ BLOCO 0 ######################################
    ###########################################################
    
    // Registro 0000 da EFD-ICMS/IPI - Abertura do arquivo digital e identificação da entidade
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=1
    public function Identificacao($std)
    {
        $this->Sped->criarLinha('0', '0000', "|0000|$std->versaoLayout|$std->finalidadeArquivo|{$this->Funcoes->somenteNumeros($std->dataInicial)}|{$this->Funcoes->somenteNumeros($std->dataFinal)}|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->razao_social, 100))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->CNPJ, 14))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->CPF, 11))}|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->UF, 2))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->inscricao_estadual, 14))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->cod_mun, 7))}|{$this->Funcoes->somenteNumeros($std->inscricao_municipal)}|{$this->Funcoes->tamanhoString($std->suframa, 9)}|$std->ind_perfil|$std->ind_ativ|");
    }

    // Registro 0001 da EFD-ICMS/IPI - Abertura do Bloco 0
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=2
    public function Registro_0001($std)
    {
        $this->Sped->criarLinha('0', '0001', "|0001|$std->ind_mov|");
    }

    // Registro 0002 da EFD-ICMS/IPI - Classificação do estabelecimento industrial ou equiparado a industrial
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=565 e a tabela: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=582
    public function Registro_0002($std)
    {
        $this->Sped->criarLinha('0', '0002', "|0002|$std->clas_estab_ind|");
    }

    // Registro 0005 da EFD-ICMS/IPI - Dados complementares da entidade
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=3
    public function Registro_0005($std)
    {
        $this->Sped->criarLinha('0', '0005', "|0005|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->fantasia, 60))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->cep, 8))}|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->end, 60))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->num, 10))}|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->compl, 60))}|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->bairro, 60))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->fone, 11))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->fax, 11))}|{$this->Funcoes->textoMinusculo($std->email)}|");
    }

    // Registro 0015 da EFD-ICMS/IPI - Dados do contribuinte substituto ou responsável pelo ICMS destino
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=4
    public function Registro_0015($std)
    {
        $this->Sped->criarLinha('0', '0015', "|0015|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->UF_ST, 2))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->IE_ST, 14))}|");
    }

    // Registro 0100 da EFD-ICMS/IPI - Dados do contabilista
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=5
    public function Registro_0100($std)
    {
        $this->Sped->criarLinha('0', '0100', "|0100|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->NOME, 60))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->CPF, 11))}|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->CRC, 15))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->CNPJ, 14))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->CEP, 8))}|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->END, 60))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->NUM, 10))}|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->COMPL, 60))}|{$this->Funcoes->textoMaiusculoSemAcento($this->Funcoes->tamanhoString($std->BAIRRO, 60))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->FONE, 11))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->FAX, 11))}|{$this->Funcoes->textoMinusculo($std->EMAIL)}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->COD_MUN, 7))}|");
    }

    // Registro 0150 da EFD-ICMS/IPI - Tabela de cadastro do participante
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=6
    public function Registro_0150($std)
    {
        $this->Sped->criarLinha('0', '0150', "|0150|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_PART, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->NOME, 100))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->COD_PAIS, 5))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->CNPJ, 14))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->CPF, 11))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->IE, 14))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->COD_MUN, 7))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->SUFRAMA, 9))}|{$this->Funcoes->textoMinusculo($this->Funcoes->tamanhoString($std->END, 60))}|{$this->Funcoes->textoMinusculo($this->Funcoes->tamanhoString($std->NUM, 10))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COMPL, 60))}|{$this->Funcoes->textoMinusculo($this->Funcoes->tamanhoString($std->BAIRRO, 60))}|");
    }

    // Registro 0175 da EFD-ICMS/IPI - Alteração da Tabela de Cadastro de Participante
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=7
    public function Registro_0175($std)
    {
        $this->Sped->criarLinha('0', '0175', "|0175|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_ALT, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->NR_CAMPO, 2))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->CONT_ANT, 100))}|");
    }

    // Registro 0190 da EFD-ICMS/IPI - Identificação das Unidades de Medida
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=8
    public function Registro_0190($std)
    {
        $this->Sped->criarLinha('0', '0190', "|0190|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->unid, 6))}|{$this->Funcoes->textoMaiusculo($std->descricao)}|");
    }

    // Registro 0200 da EFD-ICMS/IPI - Tabela de identificação do item (produto e serviços)
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=9
    public function Registro_0200($std)
    {
        $this->Sped->criarLinha('0', '0200', "|0200|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->textoMaiusculo($std->DESCR_ITEM)}|{$this->Funcoes->textoMaiusculo($std->COD_BARRA)}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ANT_ITEM, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->UNID_INV, 6))}|{$this->Funcoes->tamanhoString($std->TIPO_ITEM, 2)}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->COD_NCM, 8))}|{$this->Funcoes->tamanhoString($std->EX_IPI, 3)}|{$this->Funcoes->tamanhoString($std->COD_GEN, 2)}|{$this->Funcoes->tamanhoString($std->COD_LST, 5)}|{$this->Funcoes->tamanhoString($std->ALIQ_ICMS, 9)}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->CEST, 7))}|");
    }

    // Registro 0205 da EFD-ICMS/IPI - Alteração do item
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=10
    public function Registro_0205($std)
    {
        $this->Sped->criarLinha('0', '0205', "|0205|{$this->Funcoes->textoMaiusculo($std->DESCR_ANT_ITEM)}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_INI, 8))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_FIM, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ANT_ITEM, 60))}|");
    }

    // Registro 0206 da EFD-ICMS/IPI - Código de produto conforme Tabela publicada pela ANP
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=11
    public function Registro_0206($std)
    {
        $this->Sped->criarLinha('0', '0206', "|0206|{$this->Funcoes->textoMaiusculo($std->COD_COMB)}|");
    }

    // Registro 0210 da EFD-ICMS/IPI - Consumo específico padronizado (válido até 31/12/2021)
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=203
    public function Registro_0210($std)
    {
        $this->Sped->criarLinha('0', '0210', "|0210|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM_COMP, 60))}|{$std->QTD_COMP}|{$std->PERDA}|");
    }

    // Registro 0220 da EFD-ICMS/IPI - Fatores de conversão de unidades
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=12
    public function Registro_0220($std)
    {
        $this->Sped->criarLinha('0', '0220', "|0220|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->UNID_CONV, 6))}|{$std->FAT_CONV}|{$std->COD_BARRA}|");
    }

    // Registro 0300 da EFD-ICMS/IPI - Cadastro de bens ou componentes do Ativo Imobilizado
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=13
    public function Registro_0300($std)
    {
        $this->Sped->criarLinha('0', '0300', "|0300|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_IND_BEM, 60))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->IDENT_MERC, 1))}|{$this->Funcoes->textoMaiusculo($std->DESCR_ITEM)}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_PRNC, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_CTA, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->NR_PARC, 60))}|");
    }

    // Registro 0305 da EFD-ICMS/IPI - Informação sobre a utilização do bem
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=14
    public function Registro_0305($std)
    {
        $this->Sped->criarLinha('0', '0305', "|0305|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_CCUS, 60))}|{$this->Funcoes->textoMaiusculo($std->FUNC)}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->VIDA_UTIL, 3))}|");
    }

    // Registro 0400 da EFD-ICMS/IPI - Tabela de Natureza da Operação/Prestação
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=15
    public function Registro_0400($std)
    {
        $this->Sped->criarLinha('0', '0400', "|0400|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_NAT, 10))}|{$this->Funcoes->textoMaiusculo($std->DESCR_NAT)}|");
    }

    // Registro 0450 da EFD-ICMS/IPI - Tabela de Informação Complementar do Documento Fiscal
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=16
    public function Registro_0450($std)
    {
        $this->Sped->criarLinha('0', '0450', "|0450|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_INF, 6))}|{$this->Funcoes->textoMaiusculo($std->TXT)}|");
    }

    // Registro 0460 da EFD-ICMS/IPI - Tabela de Observações do Lançamento Fiscal
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=17
    public function Registro_0460($std)
    {
        $this->Sped->criarLinha('0', '0460', "|0460|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_OBS, 6))}|{$this->Funcoes->textoMaiusculo($std->TXT)}|");
    }

    // Registro 0500 da EFD-ICMS/IPI - Plano de Contas Contábeis
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=18
    public function Registro_0500($std)
    {
        $this->Sped->criarLinha('0', '0500', "|0500|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_ALT, 8))}|{$this->Funcoes->tamanhoString($std->COD_NAT_CC, 2)}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->IND_CTA, 1))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_CTA, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->NOME_CTA, 60))}|");
    }

    // Registro 0600 da EFD-ICMS/IPI - Centro de Custos
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=19
    public function Registro_0600($std)
    {
        $this->Sped->criarLinha('0', '0600', "|0600|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_ALT, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_CCUS, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->CCUS, 60))}|");
    }

    // Registro 0990 da EFD-ICMS/IPI - Encerramento do Bloco 0
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=20
    public function Registro_0990()
    {
        $this->Sped->criarEncerramentoBloco('0', '0990', "0990");
    }
    ###########################################################
    ############ FIM - BLOCO 0 ################################
    ###########################################################



    ###########################################################
    ############ BLOCO E ######################################
    ###########################################################
    public function criarBloco_E_Vazio($std)
    {
        $this->Sped->criarLinha('E', 'E001', "|E001|0|");
        $this->Sped->criarLinha('E', 'E100', "|E100|$std->DT_INI|$std->DT_FIN|");
        $this->Sped->criarLinha('E', 'E110', "|E110|0|0|0|0|0|0|0|0|0|0|0|0|0|0|");
        $this->Sped->criarEncerramentoBloco('E', 'E990', "E990");
    }

    ###########################################################
    ############ FIM - BLOCO E ################################
    ###########################################################


    ###########################################################
    ############ BLOCO H ######################################
    ###########################################################
    // Registro H001 da EFD-ICMS/IPI - Abertura do Bloco H
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=160
    public function H001($std)
    {
        $this->Sped->criarLinha('0', 'H001', "|H001|$std->ind_mov|");
    }

    // Registro H005 da EFD-ICMS/IPI - Totais do inventário
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=161
    public function H005($std)
    {
        $this->Sped->criarLinha('0', 'H005', "|H005|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_INV, 8))}|{$this->Funcoes->tamanhoString($std->VL_INV, 19)}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->MOT_INV, 2))}|");
    }

    // Registro H010 da EFD-ICMS/IPI - Inventário
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=162
    public function H010($std)
    {
        $this->Sped->criarLinha('0', 'H010', "|H010|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->UNID, 6))}|{$this->Funcoes->tamanhoString($std->QTD, 19)}|{$this->Funcoes->tamanhoString($std->VL_UNIT, 19)}|{$this->Funcoes->tamanhoString($std->VL_ITEM, 19)}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->IND_PROP, 1))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_PART, 60))}|{$this->Funcoes->textoMaiusculo($std->TXT_COMPL)}|{$this->Funcoes->textoMaiusculo($std->COD_CTA)}|{$this->Funcoes->tamanhoString($std->VL_ITEM_IR, 19)}|");
    }

    // Registro H020 da EFD-ICMS/IPI - Informação complementar do inventário
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=163
    public function H020($std)
    {
        $this->Sped->criarLinha('0', 'H020', "|H020|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->CST_ICMS, 3))}|{$this->Funcoes->tamanhoString($std->BC_ICMS, 15)}|{$this->Funcoes->tamanhoString($std->VL_ICMS, 15)}|");
    }

    // Registro H030 da EFD-ICMS/IPI - Informações complementares do inventário das mercadorias sujeitas ao regime de substituição tributária
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=579
    public function H030($std)
    {
        $this->Sped->criarLinha('0', 'H030', "|H030|{$this->Funcoes->tamanhoString($std->VL_ICMS_OP, 19)}|{$this->Funcoes->tamanhoString($std->VL_BC_ICMS_ST, 19)}|{$this->Funcoes->tamanhoString($std->VL_ICMS_ST, 19)}|{$this->Funcoes->tamanhoString($std->VL_FCP, 19)}|");
    }

    // Registro H990 da EFD-ICMS/IPI - Encerramento do Bloco H
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=164
    public function H990()
    {
        $this->Sped->criarEncerramentoBloco('0', 'H990', "H990");
    }

    ###########################################################
    ############ FIM - BLOCO H ################################
    ###########################################################


    ###########################################################
    ############ BLOCO k ######################################
    ###########################################################
    // Registro 0001 da EFD-ICMS/IPI - Abertura do Bloco 0
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=204
    public function K001($std)
    {
        $this->Sped->criarLinha('0', 'K001', "|K001|$std->ind_mov|");
    }

    // Registro K001 da EFD-ICMS/IPI - Abertura do Bloco K
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=204
    public function K010($std)
    {
        $this->Sped->criarLinha('0', 'K010', "|K010|$std->IND_TP_LEIAUTE|");
    }

    // Registro K100 da EFD-ICMS/IPI - Período de Apuração do ICMS/IPI
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=205
    public function K100($std)
    {
        $this->Sped->criarLinha('0', 'K100', "|K100|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_INI, 8))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_FIM, 8))}|");
    }

    // Registro K200 da EFD-ICMS/IPI - Estoque escriturado
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=206
    public function K200($std)
    {
        $this->Sped->criarLinha('0', 'K200', "|K200|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_EST, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->QTD, 50))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->IND_EST, 1))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_PART, 60))}|");
    }

    // Registro K220 da EFD-ICMS/IPI - Outras movimentações internas entre mercadorias
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=207
    public function K220($std)
    {
        $this->Sped->criarLinha('0', 'K220', "|K220|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_MOV, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM_ORI, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM_DEST, 60))}|{$this->Funcoes->textoMaiusculo($std->QTD_ORI)}|{$this->Funcoes->textoMaiusculo($std->QTD_DEST)}|");
    }

    // Registro K210 da EFD-ICMS/IPI - Desmontagem de mercadorias - Item de origem
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=259
    public function K210($std)
    {
        $this->Sped->criarLinha('0', 'K210', "|K210|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_INI_OS, 8))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_FIN_OS, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_DOC_OS, 30))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM_ORI, 60))}|{$std->QTD_ORI}|");
    }

    // Registro K215 da EFD-ICMS/IPI - Desmontagem de mercadorias - Item de destino
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=260
    public function K215($std)
    {
        $this->Sped->criarLinha('0', 'K215', "|K215|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM_DES, 60))}|{$this->Funcoes->tamanhoString($std->QTD_DES, 19)}|");
    }

    // Registro K230 da EFD-ICMS/IPI - Itens produzidos
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=208
    public function K230($std)
    {
        $this->Sped->criarLinha('0', 'K230', "|K230|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_INI_OP, 8))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_FIN_OP, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_DOC_OP, 30))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$std->QTD_ENC}|");
    }

    // Registro K235 da EFD-ICMS/IPI - Insumos consumidos
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=209
    public function K235($std)
    {
        $this->Sped->criarLinha('0', 'K235', "|K235|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_SAIDA, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->textoMaiusculo($std->QTD)}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_INS_SUBST, 60))}|");
    }

    // Registro K250 da EFD-ICMS/IPI - Industrialização efetuada por terceiros - Itens produzidos
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=210
    public function K250($std)
    {
        $this->Sped->criarLinha('0', 'K250', "|K250|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_PROD, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->textoMaiusculo($std->QTD)}|");
    }

    // Registro K255 da EFD-ICMS/IPI - Industrialização em terceiros - insumos consumidos
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=211
    public function K255($std)
    {
        $this->Sped->criarLinha('0', 'K255', "|K255|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_CONS, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->textoMaiusculo($std->QTD)}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_INS_SUBST, 60))}|");
    }

    // Registro K260 da EFD-ICMS/IPI - Reprocessamento/reparo de produto/insumo
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=261
    public function K260($std)
    {
        $this->Sped->criarLinha('0', 'K260', "|K260|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_OP_OS, 30))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_SAIDA, 8))}|{$this->Funcoes->tamanhoString($std->QTD_SAIDA, 19)}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_RET, 8))}|{$this->Funcoes->tamanhoString($std->QTD_RET, 19)}|");
    }

    // Registro K265 da EFD-ICMS/IPI - Reprocessamento/reparo - Mercadorias consumidas e/ou retornadas
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=262
    public function K265($std)
    {
        $this->Sped->criarLinha('0', 'K265', "|K265|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$std->QTD_CONS}|{$std->QTD_RET}|");
    }

    // Registro K270 da EFD-ICMS/IPI - Correção de apontamento dos Registros K210, K220, K230, K250, K260, K291, K292, K301 e K302
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=263
    public function K270($std)
    {
        $this->Sped->criarLinha('0', 'K270', "|K270|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_INI_AP, 8))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_FIN_AP, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_OP_OS, 30))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->QTD_COR_POS, 19))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->QTD_COR_NEG, 19))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->ORIGEM, 1))}|");
    }

    // Registro K275 da EFD-ICMS/IPI - Correção de apontamento e retorno de insumos dos Registros K215, K220, K235, K255 e K265
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=264
    public function K275($std)
    {
        $this->Sped->criarLinha('0', 'K275', "|K275|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->tamanhoString($std->QTD_COR_POS, 19)}|{$this->Funcoes->tamanhoString($std->QTD_COR_NEG, 19)}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_INS_SUBST, 60))}|");
    }

    // Registro K280 da EFD-ICMS/IPI - Correção de apontamento - Estoque escriturado
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=265
    public function K280($std)
    {
        $this->Sped->criarLinha('0', 'K280', "|K280|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_EST, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->tamanhoString($std->QTD_COR_POS, 19)}|{$this->Funcoes->tamanhoString($std->QTD_COR_NEG, 19)}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->IND_EST, 1))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_PART, 60))}|");
    }

    // Registro K290 da EFD-ICMS/IPI - Produção conjunta - Ordem de Produção
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=304
    public function K290($std)
    {
        $this->Sped->criarLinha('0', 'K290', "|K290|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_INI_OP, 8))}|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_FIN_OP, 8))}|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_DOC_OP, 30))}|");
    }

    // Registro K291 da EFD-ICMS/IPI - Produção conjunta - Itens produzidos
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=305
    public function K291($std)
    {
        $this->Sped->criarLinha('0', 'K291', "|K291|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->tamanhoString($std->QTD, 19)}|");
    }

    // Registro K292 da EFD-ICMS/IPI - Produção conjunta - Insumos consumidos
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=307
    public function K292($std)
    {
        $this->Sped->criarLinha('0', 'K292', "|K292|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->tamanhoString($std->QTD, 19)}|");
    }

    // Registro K300 da EFD-ICMS/IPI - Produção conjunta - Industrialização efetuada por terceiros
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=308
    public function K300($std)
    {
        $this->Sped->criarLinha('0', 'K300', "|K300|{$this->Funcoes->somenteNumeros($this->Funcoes->tamanhoString($std->DT_PROD, 8))}|");
    }

    // Registro K301 da EFD-ICMS/IPI - Produção conjunta - Industrialização efetuada por terceiros - Itens produzidos
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=309
    public function K301($std)
    {
        $this->Sped->criarLinha('0', 'K301', "|K301|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->tamanhoString($std->QTD, 19)}|");
    }

    // Registro K302 da EFD-ICMS/IPI - Produção conjunta - Industrialização efetuada por terceiros - Insumos consumidos
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=310
    public function K302($std)
    {
        $this->Sped->criarLinha('0', 'K302', "|K302|{$this->Funcoes->textoMaiusculo($this->Funcoes->tamanhoString($std->COD_ITEM, 60))}|{$this->Funcoes->tamanhoString($std->QTD, 19)}|");
    }

    // Registro 0990 da EFD-ICMS/IPI - Encerramento do Bloco K
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=212
    public function K990()
    {
        $this->Sped->criarEncerramentoBloco('0', 'K990', "K990");
    }

    ###########################################################
    ############ FIM - BLOCO K ################################
    ###########################################################


    ###########################################################
    ############ BLOCO 1 ######################################
    ###########################################################
    public function criarBloco_1_Vazio()
    {
        $this->Sped->criarLinha('1', '1001', "|1001|0|");
        $this->Sped->criarLinha('1', '1010', "|1010|N|N|N|N|N|N|N|N|N|N|N|N|N|");
        $this->Sped->criarEncerramentoBloco('1', '1990', "1990");
    }

    ###########################################################
    ############ FIM - BLOCO 1 ################################
    ###########################################################


    ###########################################################
    ############ BLOCO 9 ######################################
    ###########################################################
    // Registro 0990 da EFD-ICMS/IPI - Encerramento do Bloco K
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=212
    public function Bloco9()
    {
        $this->Sped->criarLinha('9', '9001', "|9001|0|"); //inicio bloco 9

        //incrementa antes pois essas linhas foram adicionadoas depois do for
        $this->Sped->incrementContadorBlocoRegistro('9990');
        $this->Sped->incrementContadorBlocoRegistro('9999');

        foreach ($this->Sped->getBlocosTotalizadores() as $bloco => $qtd) {
            $this->Sped->criarLinha('9', '9900', "|9900|$bloco|$qtd|");
        }

        $this->Sped->criarEncerramentoBloco('9', '9900', "9900|9900", -1);
        $this->Sped->criarEncerramentoBloco('9', '9990', "9990", 1);
        $this->Sped->criarLinha('9', '9999', "|9999|" . ($this->Sped->getTotalLinhas() + 1) . '|');
    }
    ###########################################################
    ############ FIM - BLOCO 9 ################################
    ###########################################################

    ###########################################################
    ############ BLOBO VAZIO ##################################
    ###########################################################
    public function criarBlocoVazio($bloco, $abertura, $fechamento)
    {
        return $this->Sped->criarBlocoVazio($bloco, $abertura, $fechamento);
    }
    ###########################################################
    ############ FIM - BLOBO VAZIO ############################
    ###########################################################

    // pegar os dados do SPED
    public function getRegistros()
    {
        return $this->Sped->getRegistros();
    }
}