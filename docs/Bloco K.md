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

### Registro 0005 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=3

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Dados complementares da entidade |

```php
    $std = new stdClass;
    $std->fantasia = 'nome FANTASIA'; // Nome de fantasia associado ao nome empresarial.
    $std->cep = '95084190'; // Código de Endereçamento Postal.
    $std->end = 'Rua Américo Ribeiro Mendes'; // Logradouro e endereço do imóvel.
    $std->num = '888'; // Número do imóvel.
    $std->compl = ''; //Dados complementares do endereço.
    $std->bairro = 'CENTRO'; // Bairro em que o imóvel está situado.
    $std->fone = '5433335847'; // Número do telefone (DDD+FONE).
    $std->fax = ''; // 	Número do fax.
    $std->email = 'meu_email@gmail.com'; // Endereço do correio eletrônico.

    $Layout->Registro_0005($std);
```


### Registro 0015 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=4

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Dados do contribuinte substituto ou responsável pelo ICMS destino |

```php
    $std = new stdClass;
    $std->UF_ST = 'RS'; // 	Sigla da unidade da federação do contribuinte substituído ou unidade de federação do consumidor final não contribuinte - ICMS Destino EC 87/15.
    $std->IE_ST = '3693136957'; // 	Inscrição Estadual do contribuinte substituto na unidade da federação do contribuinte substituído ou unidade de federação do consumidor final não contribuinte - ICMS Destino EC 87/15.

    $Layout->Registro_0015($std);
```


### Registro 0100 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=5

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Dados do contabilista |

```php
    $std = new stdClass;
    $std->NOME = 'NOME DO CONTADOR'; // Nome do contabilista.
    $std->CPF = '12345678901'; // Número de inscrição do contabilista no Cadastro de Pessoa Física (CPF).
    $std->CRC = 'RS-012345'; // Número de inscrição do contabilista no Conselho Regional de Contabilidade (CRC).
    $std->CNPJ = '77804415000142'; // Número de inscrição do escritório de contabilidade no Cadastro Nacional de Pessoa Jurídica (CNPJ), se houver.
    $std->CEP = '95080000'; // Código de Endereçamento Postal (CEP).
    $std->END = 'CENTRO'; // Logradouro e endereço do imóvel.
    $std->NUM = '500'; // Número do imóvel.
    $std->COMPL = ''; // Dados complementares do endereço.
    $std->BAIRRO = 'BAIRRO'; // Bairro em que o imóvel está situado.
    $std->FONE = '5433335847'; // Número do telefone (DDD+Telefone).
    $std->FAX = ''; // Número do fax.
    $std->EMAIL = 'email_contador@gmail.com'; // Endereço do correio eletrônico.
    $std->COD_MUN = '4305108'; // Código do município, conforme tabela IBGE.

    $Layout->Registro_0100($std);
```


### Registro 0150 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=6

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Tabela de cadastro do participante |

```php
    $std = new stdClass;
    $std->COD_PART = '123456'; // Código de identificação do participante no arquivo.
    $std->NOME = 'nome do participante'; // Nome pessoal ou empresarial do participante
    $std->COD_PAIS = '108'; // Código do país do participante, conforme a tabela indicada no item 3.2.1
    $std->CNPJ = '77804415000142'; // CNPJ do participante.
    $std->CPF = ''; // CPF do participante.
    $std->IE = '123456'; // Inscrição Estadual (IE) do participante.
    $std->COD_MUN = '4305108'; // Código do Município, conforme a Tabela IBGE.
    $std->SUFRAMA = ''; // Número de inscrição do participante na Suframa.
    $std->END = 'RUA B'; // Logradouro e endereço do imóvel.
    $std->NUM = '305'; // NNúmero do imóvel.
    $std->COMPL = ''; // Dados complementares do endereço.
    $std->BAIRRO = 'Bairro'; // Bairro em que o imóvel está situado.

    $Layout->Registro_0150($std);
```


### Registro 0175 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=7

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Alteração da Tabela de Cadastro de Participante |

```php
    $std = new stdClass;
    $std->DT_ALT = '02082022'; // Data de alteração do cadastro. o valor informado no campo deve estar entre o campo DT_INI e o campo DT_FIN do registro 0000.
    $std->NR_CAMPO = '03'; // Número do campo alterado (Somente campos 03 a 13, exceto 07). Valores Válidos: [03, 04, 05, 06, 08, 09, 10, 11, 12, 13].
    $std->CONT_ANT = ''; // Conteúdo anterior do campo.

    $Layout->Registro_0175($std);
```


### Registro 0190 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=8

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Identificação das Unidades de Medida |

```php
    $std = new stdClass;
    $std->unid = 'M'; // 	Código da UM.
    $std->descricao = 'METRO'; // 	Descrição da UM.

    $Layout->Registro_0190($std);
```


### Registro 0200 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=9

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Tabela de identificação do item (produto e serviços) |

```php
    ################################################
    ## Tipo do item - Atividades Industriais, Comerciais e Serviços:
    ## 00: Mercadoria para Revenda;
    ## 01: Matéria-Prima;
    ## 02: Embalagem;
    ## 03: Produto em Processo;
    ## 04: Produto Acabado;
    ## 05: Subproduto;
    ## 06: Produto Intermediário;
    ## 07: Material de Uso e Consumo;
    ## 08: Ativo Imobilizado;
    ## 09: Serviços;
    ## 10: Outros insumos;
    ## 99: Outras.
    ################################################
    ##################################################
    ## FAZER LOOP COM TODOS OS PRODUTOS
    ##################################################
    $std = new stdClass;
    $std->COD_ITEM = '019334'; // Código do item.
    $std->DESCR_ITEM = 'KIT BLOCO MANIFOULD'; // Descrição do item.
    $std->COD_BARRA = ''; // Representação alfanumérico do código de barra do produto, se houver.
    $std->COD_ANT_ITEM = ''; // Código anterior do item com relação à última informação apresentada.
    $std->UNID_INV = 'UN'; // Unidade de medida utilizada na quantificação de estoques.
    $std->TIPO_ITEM = '01'; // Tipo do item - Atividades Industriais, Comerciais e Serviços: TABELA ACIMA
    $std->COD_NCM = '84819090'; // Código da Nomenclatura Comum do Mercosul (NCM)
    $std->EX_IPI = ''; // Código EX, conforme a TIPI.
    $std->COD_GEN = '84'; // Código do gênero do item, conforme a Tabela 4.2.1 
    $std->COD_LST = ''; // Código do serviço conforme lista do Anexo I da Lei Complementar Federal nº 116/2003.
    $std->ALIQ_ICMS = '18,00'; // Alíquota de ICMS aplicável ao item nas operações internas.
    $std->CEST = '1007900'; // Código Especificador da Substituição Tributária

    $Layout->Registro_0200($std);
```


### Registro 0205 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=10

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Alteração do item |

```php
    $std = new stdClass;
    $std->DESCR_ANT_ITEM = 'MEU ITEM'; // Descrição anterior do item.
    $std->DT_INI = '01082022'; // Data inicial de utilização da descrição do item
    $std->DT_FIM = '31082022'; // Data final de utilização da descrição do item.
    $std->COD_ANT_ITEM = ''; // Código anterior do item com relação à última informação apresentada.

    $Layout->Registro_0205($std);
```


### Registro 0206 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=11

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Código de produto conforme Tabela publicada pela ANP |

```php
    $std = new stdClass;
    $std->COD_COMB = '123'; // Código do produto, conforme tabela publicada pela ANP.
    $Layout->Registro_0206($std);
```


### Registro 0210 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=203

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Consumo específico padronizado (válido até 31/12/2021) |

```php
    $std = new stdClass;
    $std->COD_ITEM_COMP = '123'; // Código do item componente/insumo (campo 02 do Registro 0200).
    $std->QTD_COMP = '10'; // Quantidade do item componente/insumo para se produzir uma unidade do item composto/resultante.
    $std->PERDA = ''; // Perda/quebra normal percentual do insumo/componente para se produzir uma unidade do item compoto/resultante.

    $Layout->Registro_0210($std);
```


### Registro 0220 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=12

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Fatores de conversão de unidades |

```php
    $std = new stdClass;
    $std->UNID_CONV = 'PC'; // Unidade comercial a ser convertida na unidade de estoque, referida no registro 0200. Ou unidade do 0200 utilizada na EFD anterior.
    $std->FAT_CONV = '1'; // Fator de conversão: fator utilizado para converter (multiplicar) a unidade a ser convertida na unidade adotada no inventário.
    $std->COD_BARRA = ''; // Representação alfanumérica do código de barra da unidade comercial do produto, se houver.

    $Layout->Registro_0220($std);
```


### Registro 0300 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=13

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Cadastro de bens ou componentes do Ativo Imobilizado |

```php
    $std = new stdClass;
    $std->COD_IND_BEM = '3'; // Código individualizado do bem ou componente adotado no controle patrimonial do estabelecimento informante.
    $std->IDENT_MERC = '1'; // Identificação do tipo de mercadoria: 1: Bem; 2: Componente.
    $std->DESCR_ITEM = 'Descrição do bem ou componente'; // Descrição do bem ou componente (modelo, marca e outras características necessárias a sua individualização).
    $std->COD_PRNC = '8'; // Código de cadastro do bem principal nos casos em que o bem ou componente (campo 02) esteja vinculado a um bem principal.
    $std->COD_CTA = '1'; // Código da conta analítica de contabilização do bem ou componente (campo 06 do Registro 0500).
    $std->NR_PARC = '24'; // Número total de parcelas a serem apropriadas, segundo a legislação de cada Unidade Federada (UF)..

    $Layout->Registro_0300($std);
```


### Registro 0305 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=14

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Informação sobre a utilização do bem |

```php
    $std = new stdClass;
    $std->COD_CCUS = '1'; // Código do centro de custo onde o bem está sendo ou será utilizado (campo 03 do Registro 0600).
    $std->FUNC = 'Descrição sucinta da função'; // Descrição sucinta da função do bem na atividade do estabelecimento.	
    $std->VIDA_UTIL = '24'; // Vida útil estimada do bem, em número de meses.

    $Layout->Registro_0305($std);
```


### Registro 0400 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=15

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Tabela de Natureza da Operação/Prestação |

```php
    $std = new stdClass;
    $std->COD_NAT = '1234567890'; // Código da natureza da operação/prestação.
    $std->DESCR_NAT = 'NATUREZA DA OPERAÇÃO'; // Descrição da natureza da operação/prestação.

    $Layout->Registro_0400($std);
```


### Registro 0450 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=16

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Tabela de Informação Complementar do Documento Fiscal |

```php
    $std = new stdClass;
    $std->COD_INF = '123456'; // Código da informação complementar do documento fiscal.
    $std->TXT = 'Texto livre da informação complementar'; // Texto livre da informação complementar existente no documento fiscal, inclusive espécie de normas legais, poder normativo, número, capitulação, data e demais referências pertinentes com indicação referentes ao tributo.

    $Layout->Registro_0450($std);
```


### Registro 0460 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=17

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Tabela de Observações do Lançamento Fiscal |

```php
    $std = new stdClass;
    $std->COD_OBS = '123456'; // Código da Observação do lançamento fiscal.
    $std->TXT = 'TESTE DE OBS FISCAL'; // Descrição da observação vinculada ao lançamento fiscal

    $Layout->Registro_0460($std);
```


### Registro 0500 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=18

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Plano de Contas Contábeis |

```php
    ################################################
    ## Código da natureza da conta/grupo de contas:
    ## 01: Contas de ativo;
    ## 02: Contas de passivo;
    ## 03: Patrimônio líquido;
    ## 04: Contas de resultado;
    ## 05: Contas de compensação;
    ## 09: Outras.
    ################################################
    $std = new stdClass;
    $std->DT_ALT = '01082022'; // Data da inclusão/alteração.
    $std->COD_NAT_CC = '09'; // Código da natureza da conta/grupo de contas: tabela acima
    $std->IND_CTA = 'S'; // Indicador do tipo de conta: S: Sintética (grupo de contas); A: Analítica (conta).
    $std->NIVEL = '100'; // Nível da conta analítica/grupo de contas.
    $std->COD_CTA = '5000'; // Código da conta analítica/grupo de contas.
    $std->NOME_CTA = 'OUTRAS DESPESAS'; // Nome da conta analítica/grupo de contas.

    $Layout->Registro_0500($std);
```


### Registro 0600 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=19

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Centro de Custos |

```php
    ################################################
    ## caso o contribuinte não adote centros de custos deverão ser informados os seguintes códigos:
    ## a. tratando-se de atividade econômica comercial ou de serviços:
    ## 1: área operacional;
    ## 2: área administrativa;

    ## b. tratando-se de atividade econômica industrial:
    ## 3: área produtiva;
    ## 4: área de apoio à produção;
    ## 5: área administrativa;
    ################################################
    $std = new stdClass;
    $std->DT_ALT = '01082022'; // Data da inclusão/alteração.
    $std->COD_CCUS = '3'; // Código do centro de custos.
    $std->CCUS = 'área produtiva'; // Nome do centro de custos.

    $Layout->Registro_0600($std);
```


### Registro 0990 da EFD-ICMS/IPI
REFERENCIA: https://www.valor.srv.br/guias/guiasIndex.php?idGuia=20

| Parâmetro | Tipo | Descrição |
| :--- | :---: | :--- |
| $std | stdClass | Encerramento do Bloco 0 |

```php
    $Layout->Registro_0990('0990');
```


### Salvar dados do SPED
Salvar na pasta ou fazer o download ao rodar no navegador

```php
    // dados do SPED
    $result = $Layout->getRegistros();

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