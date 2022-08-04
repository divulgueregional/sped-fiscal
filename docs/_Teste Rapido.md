# TESTE RÁPIDO BLOCO 0 SPED-FISCAL

## Introdução
Teste rápido: Gerar o arquivo do sped fiscal.<br>
Não precisa alterar nenhum valor<br>
Só colocar no php e rodar que vai salvar o arquivo na pasta,<br>
assim terá uma prévia de como fica o arquivo  do sped fiscal.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\SpedFiscal\Bloco;
    $Bloco = new Bloco;

    //Abertura do Arquivo Digital e Identificação da entidade.
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
    
    $Bloco->Identificacao($std);

    $std = new stdClass;
    $std->ind_mov = 0; // Indicador de movimento: 0: "Bloco" com dados informados; ou 1: "Bloco" sem dados informados.

    $Bloco->Registro_0001($std);

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

    $Bloco->Registro_0005($std);


    $Bloco->Registro_0990('0990');
    ##### FIM - BLOCO 0 #########################################

    //BLOCO B NÃO USADO
    $Bloco->criarBlocoVazio($bloco = 'B', $abertura = "B001", $fechamento = "B990");

    //BLOCO C NÃO USADO
    $Bloco->criarBlocoVazio($bloco = 'C', $abertura = "C001", $fechamento = "C990");

    //BLOCO D NÃO USADO
    $Bloco->criarBlocoVazio($bloco = 'D', $abertura = "D001", $fechamento = "D990");

    // BLOBO E - VAZIO
    $std = new stdClass;
    $std->DT_INI = '01082022'; // Data inicial a que a apuração se refere.
    $std->DT_FIN = '31082022'; // Data final a que a apuração se refere.
    $Bloco->criarBloco_E_Vazio($std);

    //BLOCO G NÃO USADO
    $Bloco->criarBlocoVazio($bloco = 'G', $abertura = "G001", $fechamento = "G990");

    //BLOCO H NÃO USADO
    $Bloco->criarBlocoVazio($bloco = 'H', $abertura = "H001", $fechamento = "H990");

    //BLOCO K NÃO USADO
    $Bloco->criarBlocoVazio($bloco = 'K', $abertura = "K001", $fechamento = "K990");

    //BLOCO 1 - - VAZIO
    $Bloco->criarBloco_1_Vazio();

    ##### BLOCO 9 ###############################################
    $Bloco->Bloco9();
    ##### FIM - BLOCO 9 #########################################

    // dados do SPED
    $result = $Bloco->getRegistros();

    //salvar na pasta
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