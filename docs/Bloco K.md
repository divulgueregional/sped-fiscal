#  BLOCO K - SPED FISCAL

## Descrição
Gerar o arquivo bloco K do sped fiscal.

# Início

### chamar a biblioteca

```php
require_once '../../../vendor/autoload.php';
use Divulgueregional\SpedFiscal\Layout;
$Layout = new Layout;
```

### Registro K001 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=204

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Abertura do Bloco 0 |

```php
    $std = new stdClass;
    $std->ind_mov = 0; // Indicador de movimento: 0: "Bloco" com dados informados; ou 1: "Bloco" sem dados informados.

    $Bloco->K001($std);

```


### Registro K010 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=204

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Abertura do Bloco K |

```php
    $std = new stdClass;
    $std->IND_TP_LEIAUTE = 0; // Indicador de tipo de leiaute adotado: 0 - Leiaute simplificado 1 - Leiaute completo 2 - Leiaute restrito aos saldos de estoque

    $Bloco->K010($std);

```

### Registro K100 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=205guias/guiasIndex.php?idGuia=582

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Período de Apuração do ICMS/IPI |

```php
    $std = new stdClass;
    $std->DT_INI = '01082022'; // Data inicial a que a apuração se refere.
    $std->DT_FIM = '31082022'; // Data final a que a apuração se refere.

    $Bloco->K100($std);

```

### Registro K200 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=206

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Estoque escriturado |

```php
    $std = new stdClass;
    $std->DT_EST = '01082022'; // Data inicial a que a apuração se refere.
    $std->COD_ITEM = '123'; // Data final a que a apuração se refere.
    $std->QTD = '10'; // Data final a que a apuração se refere.
    $std->IND_EST = '0'; // Indicador do tipo de estoque: 0: Estoque de propriedade do informante e em seu poder; 1: Estoque de propriedade do informante e em posse de terceiros; 2: Estoque de propriedade de terceiros e em posse do informante.
    $std->COD_PART = 'registro 150'; // Código do participante (campo 02 do Registro 0150): - proprietário/possuidor que não seja o informante do arquivo.

    $Bloco->K200($std);
```


### Registro K220 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=207

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Outras movimentações internas entre mercadorias |

```php
    $std = new stdClass;
    $std->DT_MOV = '01082022'; // Data da movimentação interna.
    $std->COD_ITEM_ORI = '123'; // Código do item de origem (campo 02 do Registro 0200).
    $std->COD_ITEM_DEST = '123'; // Código do item de destino (campo 02 do Registro 0200).
    $std->QTD_ORI = '10'; // Quantidade movimentada do item de origem.
    $std->QTD_DEST = '10'; // Quantidade movimentada do item de destino.

    $Bloco->K220($std);
```


### Registro K210 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=259

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Desmontagem de mercadorias - Item de origem |

```php
    $std = new stdClass;
    $std->DT_INI_OS = '01082022'; // Data de início da ordem de serviço.
    $std->DT_FIN_OS = '10082022'; // Data de conclusão da ordem de serviço.
    $std->COD_DOC_OS = '123'; // Código de identificação da ordem de serviço.
    $std->COD_ITEM_ORI = '10'; // Código do item de origem (campo 02 do Registro 0200).
    $std->QTD_ORI = '10'; // Quantidade de origem - saída do estoque.

    $Bloco->K210($std);
```


### Registro K215 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=260

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Desmontagem de mercadorias - Item de destino |

```php
    $std = new stdClass;
    $std->COD_ITEM_DES = '12345'; // Código do item de destino (campo 02 do Registro 0200).
    $std->QTD_DES = '50'; // Quantidade de destino - entrada em estoque.

    $Bloco->K215($std);
```


### Registro K230 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=208

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Itens produzidos |

```php
    $std = new stdClass;
    $std->DT_INI_OP = '01082022'; // Data de início da ordem de produção.
    $std->DT_FIN_OP = '10082022'; // Data de conclusão da ordem de produção.
    $std->COD_DOC_OP = '123'; // Código de identificação da ordem de produção.
    $std->COD_ITEM = '10'; // Código do item produzido (campo 02 do Registro 0200).
    $std->QTD_ENC = '10'; // Quantidade de produção acabada.

    $Bloco->K230($std);
```


### Registro K235 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=209

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Insumos consumidos |

```php
    $std->DT_SAIDA = '01082022'; // Data de saída do estoque para alocação ao produto.
    $std->COD_ITEM = '586'; // Código do item componente/insumo (campo 02 do Registro 0200)
    $std->QTD = '62'; // Quantidade consumida do item.
    $std->COD_INS_SUBST = '10'; // Código do insumo que foi substituído, caso ocorra a substituição (campo 02 do Registro 0210).

    $Bloco->K235($std);
```


### Registro K250 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=210

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Industrialização efetuada por terceiros - Itens produzidos |

```php
    $std = new stdClass;
    $std = new stdClass;
    $std->DT_PROD = '01082022'; // Data do reconhecimento da produção ocorrida no terceiro.
    $std->COD_ITEM = '586'; // Código do item produzido (campo 02 do Registro 0200).
    $std->QTD = '62'; // Quantidade produzida.

    $Bloco->K250($std);
```


### Registro K255 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=211

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Industrialização em terceiros - insumos consumidos |

```php
    $std = new stdClass;
    $std->DT_CONS = '01082022'; // Data do reconhecimento do consumo do insumo referente ao produto informado no campo 04 do Registro K250.
    $std->COD_ITEM = '586'; // Código do insumo (campo 02 do Registro 0200).
    $std->QTD = '62'; // Quantidade de consumo do insumo.
    $std->COD_INS_SUBST = '10'; // Código do insumo que foi substituído, caso ocorra a substituição (campo 02 do Registro 0210).

    $Bloco->K255($std);
```


### Registro K260 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=261

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Reprocessamento/reparo de produto/insumo |

```php
    $std = new stdClass;
    $std->COD_OP_OS = '999'; // Código de identificação da ordem de produção, no reprocessamento, ou da ordem de serviço, no reparo.
    $std->COD_ITEM = '586'; // Código do produto/insumo a ser reprocessado/reparado ou já reprocessado/reparado (campo 02 do Registro 0200).
    $std->DT_SAIDA = '01082022'; // Data de saída do estoque.
    $std->QTD_SAIDA = '10'; // Quantidade de saída do estoque.
    $std->DT_RET = '01082022'; // Data de retorno ao estoque (entrada).
    $std->QTD_RET = '10'; // Quantidade de retorno ao estoque (entrada).

    $Bloco->K260($std);
```


### Registro K265 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=262

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Reprocessamento/reparo - Mercadorias consumidas e/ou retornadas |

```php
    $std = new stdClass;
    $std->COD_ITEM = '01082022'; // Código da mercadoria (campo 02 do Registro 0200).
    $std->QTD_CONS = '586'; // Quantidade consumida - saída do estoque.
    $std->QTD_RET = '62'; // Quantidade retornada - entrada em estoque.

    $Bloco->K265($std);
```


### Registro K270 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=263

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Correção de apontamento dos Registros K210, K220, K230, K250, K260, K291, K292, K301 e K302 |

```php
    ################################################
    ## 1 – correção de apontamento de produção e/ou consumo relativo aos Registros K230/K235;
    ## 2 – correção de apontamento de produção e/ou consumo relativo aos Registros K250/K255;
    ## 3 – correção de apontamento de desmontagem e/ou consumo relativo aos Registros K210/K215;
    ## 4 – correção de apontamento de reprocessamento/reparo e/ou consumo relativo aos Registros K260/K265;
    ## 5 – correção de apontamento de movimentação interna relativo ao Registro K220.
    ## 6 – correção de apontamento de produção relativo ao Registro K291;
    ## 7 – correção de apontamento de consumo relativo ao Registro K292;
    ## 8 – correção de apontamento de produção relativo ao Registro K301;
    ## 9 – correção de apontamento de consumo relativo ao Registro K302.
    ################################################
    $std = new stdClass;
    $std->DT_INI_AP = '01082022'; // Data inicial do período de apuração em que ocorreu o apontamento que está sendo corrigido.
    $std->DT_FIN_AP = '01082022'; // Data final do período de apuração em que ocorreu o apontamento que está sendo corrigido.
    $std->COD_OP_OS = '64532'; // Código de identificação da ordem de produção ou da ordem de serviço que está sendo corrigida.
    $std->COD_ITEM = '12345'; // Código da mercadoria que está sendo corrigido (campo 02 do Registro 0200).
    $std->QTD_COR_POS = '10'; // Quantidade de correção positiva de apontamento ocorrido em período de apuração anterior.
    $std->QTD_COR_NEG = '10'; // Quantidade de correção negativa de apontamento ocorrido em período de apuração anterior.
    $std->ORIGEM = '1'; // Tabela acima.

    $Bloco->K270($std);
```


### Registro K275 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=264

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Correção de apontamento e retorno de insumos dos Registros K215, K220, K235, K255 e K265 |

```php
    $std = new stdClass;
    $std->COD_ITEM = '12345'; // Código da mercadoria (campo 02 do Registro 0200).
    $std->QTD_COR_POS = '15'; // Quantidade de correção positiva de apontamento ocorrido em período de apuração anterior.
    $std->QTD_COR_NEG = '20'; // Quantidade de correção negativa de apontamento ocorrido em período de apuração anterior.
    $std->COD_INS_SUBST = '5'; // Código do insumo que foi substituído, caso ocorra a substituição, relativo aos Registros K235/K255.

    $Bloco->K275($std);
```


### Registro K280 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=265

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Correção de apontamento - Estoque escriturado |

```php
    $std = new stdClass;
    $std->DT_EST = '12345'; // Data do estoque final escriturado que está sendo corrigido.
    $std->COD_ITEM = '15'; // Código do item (campo 02 do Registro 0200).
    $std->QTD_COR_POS = '20'; // Quantidade de correção positiva de apontamento ocorrido em período de apuração anterior.
    $std->QTD_COR_NEG = '5'; // Quantidade de correção negativa de apontamento ocorrido em período de apuração anterior
    $std->IND_EST = '0'; // Indicador do tipo de estoque:
    // 0 = Estoque de propriedade do informante e em seu poder;
    // 1 = Estoque de propriedade do informante e em posse de terceiros;
    // 2 = Estoque de propriedade de terceiros e em posse do informante.
    $std->COD_PART = '5'; // Código do participante (campo 02 do Registro 0150): - proprietário/possuidor que não seja o informante do arquivo.

    $Bloco->K280($std);
```


### Registro K290 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=304

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Produção conjunta - Ordem de Produção |

```php
    $std = new stdClass;
    $std->DT_INI_OP = '01082022'; // Data de início da ordem de produção.
    $std->DT_FIN_OP = '10082022'; // Data de conclusão da ordem de produção.
    $std->COD_DOC_OP = '123'; // Código de identificação da ordem de produção.

    $Bloco->K290($std);
```


### Registro K291 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=305

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Produção conjunta - Itens produzidos |

```php
    $std = new stdClass;
    $std = new stdClass;
    $std->COD_ITEM = '12545'; // Código do item produzido (campo 02 do Registro 0200).
    $std->QTD = '15'; // Quantidade de produção acabada.

    $Bloco->K291($std);
```


### Registro K292 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=307

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Produção conjunta - Insumos consumidos |

```php
    $std = new stdClass;
    $std->COD_ITEM = '12545'; // Código do insumo/componente consumido (campo 02 do Registro 0200)
    $std->QTD = '15'; // Quantidade consumida

    $Bloco->K292($std);
```


### Registro K300 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=308

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Produção conjunta - Industrialização efetuada por terceiros |

```php
    $std = new stdClass;
    $std->DT_PROD = '05082022'; // Data do reconhecimento da produção ocorrida no terceiro.

    $Bloco->K300($std);
```


### Registro K301 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=309

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Produção conjunta - Industrialização efetuada por terceiros - Itens produzidos |

```php
    $std = new stdClass;
    $std->COD_ITEM = '12545'; // Código do item produzido (campo 02 do Registro 0200).
    $std->QTD = '15'; // Quantidade produzida.

    $Bloco->K301($std);
```



### Registro K302 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=310

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Industrialização efetuada por terceiros - Insumos consumidos |

```php
    $std = new stdClass;
    $std->COD_ITEM = '12545'; // Código do insumo (campo 02 do Registro 0200)
    $std->QTD = '15'; // Quantidade consumida.

    $Bloco->K302($std);
```


### Registro K990 da EFD-ICMS/IPI
REFERÊNCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=212

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Encerramento do Bloco K |

```php
    $Bloco->K990('K990');
```


### Salvar dados do SPED
Salvar na pasta ou fazer o download ao rodar no navegador

```php
    // dados do SPED
    $result = $Bloco->getRegistros();

    // Salvar na pasta
    $filename = "SPED.txt";
    file_put_contents($filename, $result);
    chmod($filename, 0777);

    //no navegador
    header("Content-Type: text/plain");
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header("Content-Length: " . strlen($result));
    echo $result;
```