#  BLOCO K - SPED FISCAL

## Descrição
Gerar o arquivo sped-ficasl do bloco k.

# Início

### chamar a biblioteca
Referencia SpedFiscal\Layout

```php
require_once '../../../vendor/autoload.php';
use Divulgueregional\SpedFiscal\Layout;
$Layout = new Layout;
```

### Registro 0000 da EFD-ICMS/IPI
Abertura do Arquivo Digital e Identificação da entidade.

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=1 |

```php
    $std = new stdClass; // Abertura do Arquivo Digital e Identificação da entidade.
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

    $Layout->Identificação($std); // Registro 0000 da EFD-ICMS/IPI

```

### Registro 0001 da EFD-ICMS/IPI
Abertura do Bloco 0

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=2 |

```php
    $std = new stdClass; // Abertura do Bloco 0
    $std->ind_mov = 0; // Indicador de movimento: 0: "Bloco" com dados informados; ou 1: "Bloco" sem dados informados.

    $Layout->Registro_0001($std); // Registro 0001 da EFD-ICMS/IPI

```