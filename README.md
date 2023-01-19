# api_cliente

Configuração

<p>arquivo: c:\Windows\System32\drivers\etc\hosts </p>
<p>adiciona no final: 127.0.0.1 local-api-cliente.com.br</p>

<br>

<p>arquivo: C:\xampp\apache\conf\extra\httpd-vhosts.conf </p>

```
    <VirtualHost *:80>
        ServerAdmin webmaster@local-api-cliente.com.br
        DocumentRoot "C:\xampp\htdocs\projetos\api\api_cliente"
        ServerName local-api-cliente.com.br
        ErrorLog "logs/local-api-cliente.com.br-error.log"
        CustomLog "logs/local-api-cliente.com.br-access.log" common
    </VirtualHost>
```

