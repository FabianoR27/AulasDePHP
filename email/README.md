# 📧 Envio de E-mails com PHPMailer

Este projeto demonstra como enviar e-mails usando a biblioteca **PHPMailer** em PHP.  
O objetivo é oferecer um exemplo funcional e bem estruturado de integração com SMTP, utilizando boas práticas de organização e segurança.

---

## 🚀 Tecnologias utilizadas

- **PHP**
- **PHPMailer** (instalado via Composer)
- **HTML / CSS**

---

## ⚙️ Instalação

Antes de tudo, verifique se você tem o **Composer** instalado na sua máquina.  
Se ainda não tiver, baixe em: [https://getcomposer.org/](https://getcomposer.org/)

Depois, na pasta do projeto (`email/`), execute:

```bash
composer install
```

Esse comando vai baixar automaticamente o **PHPMailer** dentro da pasta `vendor/`.

---

## 📬 Configuração do envio de e-mails

1. Localize o arquivo `send_email.php`.
2. Edite as variáveis de configuração SMTP, por exemplo:
   ```php
   $mail->Host = 'smtp.seuprovedor.com';
   $mail->Username = 'seu_email@dominio.com';
   $mail->Password = 'sua_senha';
   $mail->setFrom('seu_email@dominio.com', 'Seu Nome');
   ```
3. Certifique-se de que o seu servidor ou serviço de hospedagem **permite envio SMTP**.

> ⚠️ **Importante:** Nunca envie senhas reais para o GitHub.  
> Use um arquivo `.env` (não versionado) para armazenar suas credenciais com segurança.

---

## 🧪 Testando o envio

Abra o arquivo `index.html` no navegador e preencha o formulário para enviar um e-mail.  
O script `send_email.php` será executado e enviará a mensagem via PHPMailer.

---

## 📂 Estrutura do projeto

```
email/
│
├── composer.json        # Configuração do Composer
├── composer.lock
├── .gitignore
├── index.html           # Formulário de envio
├── send_email.php       # Lógica de envio de e-mails
├── style.css            # Estilo visual do formulário
└── vendor/              # Bibliotecas instaladas (ignorada no Git)
```

---

## 🧑‍💻 Autor

**Fabiano Ramos**  
💻 Estudante de Sistemas para Internet – FATEC São Roque  
Desenvolvedor em formação • São Roque/SP – 2025

---

## 📝 Licença

Este projeto é de uso educacional e pode ser adaptado livremente.
