#  SPED FISCAL

## Descrição
Após ter feito todos os blocos, agora é hora de gerar o arquivo<br>


### Salvar dados do SPED
Salvar na pasta ou fazer o download ao rodar no navegador

```php
    // dados do SPED
    $result = $Bloco->getRegistros();// dados do SPED

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