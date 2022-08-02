<?php
namespace Divulgueregional\SpedFiscal;
use Divulgueregional\SpedFiscal\Sped;
use Divulgueregional\SpedFiscal\Funcoes;

class Layout
{
    function __construct()
    {
        $this->Sped = new Sped;
        $this->Funcoes = new Funcoes;
    }

    // Registro 0000 da EFD-ICMS/IPI - Abertura do arquivo digital e identificação da entidade
    // REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=1
    public function Identificação($std)
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
    public function Registro_0990($std)
    {
        $this->Sped->criarEncerramentoBloco('0', '0990', "0990");
    }

    // pegar os dados do SPED
    public function getRegistros()
    {
        return $this->Sped->getRegistros();
    }
}