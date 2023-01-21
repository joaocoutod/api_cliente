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

Mostra todos os Clientes</br>
<b>GET:</b> http://local-api-cliente.com.br/clientes


</br>

Busca Clientes por ID</br>
<b>GET:</b> http://local-api-cliente.com.br/clientes/6


</br>

Insere cliente</br>
<b>POST:</b> http://local-api-cliente.com.br/clientes/</br>
exemplo abaixo:
```
{
    "nome": "ana",
    "idade": 23
}
```

</br>

Editar Usuario</br>
<b>UPDATE:</b> http://local-api-cliente.com.br/clientes/6
{
    "nome": "ana kee",
    "idade": 77
}
