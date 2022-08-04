#  BLOCO H - SPED FISCAL

## Descrição
Bloco H do sped fiscal.<br>


### Registro H001 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=160

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Abertura do Bloco H |

```php
    $std = new stdClass;
    $std->ind_mov = 0; // Indicador de movimento: 0: "Bloco" com dados informados; ou 1: "Bloco" sem dados informados.

    $Bloco->H001($std);

```


### Registro H005 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=161

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Totais do inventário |

```php
    $std = new stdClass;
    $std->DT_INV = '01082022'; // Data do inventário.
    $std->VL_INV = '25320.45'; // Valor total do estoque
    $std->MOT_INV = '01'; // Informe o motivo do Inventário:
        // 01 - No final no período;
        // 02 - Na mudança de forma de tributação da mercadoria (ICMS);
        // 03 - Na solicitação da baixa cadastral, paralisação temporária e outras situações;
        // 04 - Na alteração de regime de pagamento - condição do contribuinte;
        // 05 - Por determinação dos fiscos;
        // 06 - Para controle das mercadorias sujeitas ao regime de substituição tributária - restituição/ ressarcimento/ complementação.

    $Bloco->H005($std);

```

### Registro H010 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=162

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Inventário |

```php
    $std = new stdClass;
    $std->COD_ITEM = '12345'; // Código do item (Campo 02 do Registro 0200).
    $std->UNID = 'UN'; // Unidade do item.
    $std->QTD = '10'; // Quantidade do item.
    $std->VL_UNIT = '12.50'; // Valor unitário do item.
    $std->VL_ITEM = '125.00'; // Valor do item.
    $std->IND_PROP = '0'; // ndicador de propriedade/posse do item:
    // 0: Item de propriedade do informante e em seu poder;
    // 1: Item de propriedade do informante em posse de terceiros;
    // 2: Item de propriedade de terceiros em posse do informante.
    $std->COD_PART = '123'; // Código do participante (campo 02 do Registro 0150): - proprietário/possuidor que não seja o informante do arquivo
    $std->TXT_COMPL = 'Descrição complementar'; // Descrição complementar.
    $std->COD_CTA = '125.25.10'; // Código da conta analítica contábil debitada/creditada.
    $std->VL_ITEM_IR = '12.50'; // Valor do item para efeitos do Imposto de Renda.

    $Bloco->H010($std);

```

### Registro H020 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=163

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Informação complementar do inventário |

```php
    $std = new stdClass;
    $std->CST_ICMS = '12345'; // Código da Situação Tributária (CST) referente ao ICMS, conforme a Tabela indicada no item 4.3.1.
    $std->BC_ICMS = '2520.45'; // Informe a Base de Cálculo (BC) do ICMS.
    $std->VL_ICMS = '520.32'; // Informe o valor do ICMS a ser debitado ou creditado.

    $Bloco->H020($std);
```


### Registro H030 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=579

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Informações complementares do inventário das mercadorias sujeitas ao regime de substituição tributária |

```php
    $std = new stdClass;
    $std->VL_ICMS_OP = '100.00'; // Valor médio unitário do ICMS OP.
    $std->VL_BC_ICMS_ST = '100.00'; // Valor médio unitário da base de cálculo do ICMS ST
    $std->VL_ICMS_ST = '100.00'; // Valor médio unitário do ICMS ST.
    $std->VL_FCP = '100.00'; // Valor médio unitário do FCP.

    $Bloco->H030($std);
```


### Registro H990 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=164

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Encerramento do Bloco H |

```php
    $Bloco->H990();
```