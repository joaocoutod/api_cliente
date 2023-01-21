## Configuração

<p>Ferramentas para teste</p>
<li>Xampp</li>
<li>Postman</li>

<br>

<p>Configure a rota copiando e colando o comando abaixo no final do arquivo que estar em: c:\Windows\System32\drivers\etc\hosts </p>


```
    127.0.0.1 local-api-cliente.com.br
```
<p>Essa serar a rota da api: local-api-cliente.com.br</p>

<br>

<p>VirtualHost do xampp, copie e cole o codigo abaixo no final do arquivo em: C:\xampp\apache\conf\extra\httpd-vhosts.conf </p>

```
    <VirtualHost *:80>
        ServerAdmin webmaster@local-api-cliente.com.br
        DocumentRoot "C:\xampp\htdocs\projetos\api\api_cliente"
        ServerName local-api-cliente.com.br
        ErrorLog "logs/local-api-cliente.com.br-error.log"
        CustomLog "logs/local-api-cliente.com.br-access.log" common
    </VirtualHost>
```

## EndPoints

GET: http://local-api-cliente.com.br/clientes</br>
Mostra todos os Clientes

</br>

GET: http://local-api-cliente.com.br/clientes/6</br>
Busca Clientes por ID

</br>

POST: http://local-api-cliente.com.br/clientes/</br>
Insere cliente</br>
exemplo abaixo:
```
{
    "nome": "ana",
    "idade": 23
}
´´´

</br>

