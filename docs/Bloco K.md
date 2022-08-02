#  BLOCO K - SPED FISCAL

## Descrição
Gerar o arquivo bloco k do sped fiscal.

# Início

### chamar a biblioteca

```php
require_once '../../../vendor/autoload.php';
use Divulgueregional\SpedFiscal\Layout;
$Layout = new Layout;
```

### Registro 0000 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=1

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Abertura do Arquivo Digital e Identificação da entidade. |

```php
    $std = new stdClass;
    $std->versaoLayout = '016'; // Código da versão do leiaute conforme a Tabela indicada no Ato Cotepe.
    $std->finalidadeArquivo = '0'; // Código da finalidade do arquivo: 0: Remessa do arquivo original; ou 1: Remessa do arquivo substituto.
    $std->dataInicial = '01082022'; // Data inicial das informações contidas no arquivo.
    $std->dataFinal = '30082022'; // Data final das informações contidas no arquivo.
    $std->razao_social = 'RAZÃO SOCIAL DA EMPRESA'; //Nome empresarial da entidade.
    $std->CNPJ = '77804415000142'; // Número de inscrição da entidade no CNPJ.
    $std->CPF = ''; // 	Número de inscrição da entidade no CPF.
    $std->UF = 'RS'; // Sigla da UF da entidade.
    $std->inscricao_estadual = '3693136957'; // IE da entidade.
    $std->cod_mun = '4305108'; // Código do Município do domicílio fiscal da entidade
    $std->inscricao_municipal = ''; // Inscrição Municipal da entidade.
    $std->suframa = ''; // Inscrição da entidade na Suframa.
    $std->ind_perfil = 'A';// Perfil de apresentação do arquivo fiscal: A: Perfil A; B: Perfil B; C: Perfil C.
    $std->ind_ativ = '0'; // Indicador de tipo de atividade:  0: Industrial ou equiparado a industrial; ou 1: Outros

    $Layout->Identificação($std);

```


### Registro 0001 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=2

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Abertura do Bloco 0 |

```php
    $std = new stdClass;
    $std->ind_mov = 0; // Indicador de movimento: 0: "Bloco" com dados informados; ou 1: "Bloco" sem dados informados.

    $Layout->Registro_0001($std);

```

### Registro 0002 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=565 e a tabela: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=582

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Classificação do estabelecimento industrial ou equiparado a industrial |

```php
    ################################################
    ## 00 - Industrial - Transformação
    ## 01 - Industrial - Beneficiamento
    ## 02 - Industrial - Montagem
    ## 03 - Industrial - Acondicionamento ou Reacondicionamento
    ## 04 - Industrial - Renovação ou Recondicionamento
    ## 05 - Equiparado a industrial - Por opção
    ## 06 - Equiparado a industrial - Importação Direta
    ## 07 - Equiparado a industrial - Por lei específica
    ## 08 - Equiparado a industrial - Não enquadrado nos códigos 05, 06 ou 07
    ## 09 - Outros
    ################################################
    $std = new stdClass;
    $std->clas_estab_ind = '00'; // Informar a classificação do estabelecimento conforme Tabela acima

    $Layout->Registro_0002($std);

```