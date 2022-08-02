# TESTE RÁPIDO BLOCO K SPED-FISCAL

## Introdução
Teste rápido: Gerar o arquivo bloco k do sped fiscal.<br>
Não precisa alterar nenhum valor<br>
Só colocar no php e rodar que vai salvar o arquivo na pasta

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\SpedFiscal\Layout;
    $Layout = new Layout;

    //Abertura do Arquivo Digital e Identificação da entidade.
    $std = new stdClass;
    $std->versaoLayout = '016';
    $std->finalidadeArquivo = '0';
    $std->dataInicial = '01082022';
    $std->dataFinal = '30082022';
    $std->razao_social = 'RAZÃO SOCIAL DA EMPRESA';
    $std->CNPJ = '77804415000142';
    $std->CPF = '';
    $std->UF = 'RS';
    $std->inscricao_estadual = '3693136957';
    $std->cod_mun = '4305108';
    $std->inscricao_municipal = '';
    $std->suframa = '';
    $std->ind_perfil = 'A';
    $std->ind_ativ = '0';

    $Layout->Identificação($std);

    // Abertura do Bloco 0
    $std = new stdClass; 
    $std->ind_mov = 0;

    $Layout->Registro_0001($std); 

    // Abertura do Bloco 0
    $std = new stdClass;
    $std->ind_mov = 0;

    $Layout->Registro_0001($std);

     // Classificação do estabelecimento industrial ou equiparado a industrial
    $std = new stdClass;
    $std->clas_estab_ind = '00';

    $Layout->Registro_0002($std);

    // Dados complementares da entidade
    $std = new stdClass;
    $std->fantasia = 'FANTASIA';
    $std->cep = '95084190';
    $std->end = 'Rua Américo Ribeiro Mendes';
    $std->num = '888';
    $std->compl = '';
    $std->bairro = 'CENTRO';
    $std->fone = '5433335847';
    $std->fax = '';
    $std->email = 'meu_email@gmail.com';

    $Layout->Registro_0005($std);

    // Dados do contribuinte substituto ou responsável pelo ICMS destino
    $std = new stdClass;
    $std->UF_ST = 'RS';
    $std->IE_ST = '3693136957';

    $Layout->Registro_0015($std);

    // Dados do contabilista
    $std = new stdClass;
    $std->NOME = 'NOME DO CONTADOR';
    $std->CPF = '12345678901';
    $std->CRC = 'RS-012345';
    $std->CNPJ = '77804415000142';
    $std->CEP = '95080000';
    $std->END = 'CENTRO';
    $std->NUM = '500';
    $std->COMPL = '';
    $std->BAIRRO = 'BAIRRO';
    $std->FONE = '5433335847';
    $std->FAX = '';
    $std->EMAIL = 'email_contador@gmail.com';
    $std->COD_MUN = '4305108';

    $Layout->Registro_0100($std);

    // Identificação das Unidades de Medida
    $std = new stdClass;
    $std->unid = 'M';
    $std->descricao = 'METRO';

    $Layout->Registro_0190($std);

    // Tabela de identificação do item (produto e serviços)
    $std = new stdClass;
    $std->COD_ITEM = '019334';
    $std->DESCR_ITEM = 'KIT BLOCO MANIFOULD';
    $std->COD_BARRA = '';
    $std->COD_ANT_ITEM = '';
    $std->UNID_INV = 'UN';
    $std->TIPO_ITEM = '01';
    $std->COD_NCM = '84819090';
    $std->EX_IPI = '';
    $std->COD_GEN = '84';
    $std->COD_LST = '';
    $std->ALIQ_ICMS = '18,00';
    $std->CEST = '1007900';

    $Layout->Registro_0200($std);

    // Fatores de conversão de unidades
    $std = new stdClass;
    $std->DESCR_ANT_ITEM = 'MEU ITEM';
    $std->DT_INI = '01082022';
    $std->DT_FIM = '31082022';
    $std->COD_ANT_ITEM = '';

    $Layout->Registro_0205($std);

    // Encerramento do Bloco 0
    $Layout->Registro_0990('0990');

    // dados do SPED
    $result = $Layout->getRegistros();

    // Salvar na pasta
    $filename = "SPED.txt";
    file_put_contents($filename, $result);
    chmod($filename, 0777);
    exit;
    
    //no navegador
    header("Content-Type: text/plain");
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header("Content-Length: " . strlen($result));
    echo $result;
```