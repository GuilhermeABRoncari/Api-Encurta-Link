## API ENCURTA LINK

**Configuração Inicial:**
Certifique-se de configurar o arquivo .env com um banco de dados compatível com PHP 8.2 e Laravel 10.

```bash
DB_CONNECTION=mysql
DB_HOST=seu_host
DB_PORT=sua_porta
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

## Como utilizar
Para ultilzar é bem simples, são somente dois endpoints.

Na sua maquina local pode ser algo como: `localhost:8000/api/encurtar` apos ultilizar o comando `php artisan serve`! 

No postman ou derivados usando o verbo http *POST* com um json da seguinte forma:
```json
{
    "url": "https://www.google.com"
}
```
e o retorno será um codigo de 6 digitos gerado aleatoriamente:
```json
{
    "short_url": "a3B13c"
}
```

E para recuperar o link(url) original basta usar o verbo http *GET* em `localhost:8000/api/a3B13c` e você já será redirecionado para a pagina que esse codigo de 6 digitos representa.
