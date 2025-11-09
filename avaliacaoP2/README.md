# 💻 Sistema de Login - Avaliação P2 (PHP)

Este projeto foi desenvolvido como parte da **Avaliação P2** da disciplina de **Desenvolvimento para Servidores**, com o objetivo de implementar um sistema completo de **autenticação de usuários**, **recuperação de senha** e **notificação de acesso via e-mail**.

---

## 🚀 Funcionalidades Implementadas

### 🔐 Login de Usuário
- Campos para **Usuário**, **E-mail** e **Senha**  
- Botão **“Entrar”** para envio dos dados ao servidor  
- Validação das credenciais de login  
- Redirecionamento para a página **home.php** em caso de sucesso  
- Envio automático de **notificação de acesso por e-mail** para:  
  `marcos.sousa12@fatec.sp.gov.br`  
  (com assunto e data/hora do login bem-sucedido)

---

### 🧾 Instruções de acesso

Na tela de login, o usuário deve preencher os seguintes campos obrigatórios:

- **Usuário:** nome livre que será exibido na área restrita após o login. Use sua criatividade para informar um nome irado.
- **E-mail:** deve corresponder a um e-mail válido cadastrado no sistema.
- **Senha:** deve coincidir com a senha correspondente ao e-mail informado.

### 🔐 Credenciais de acesso padrão
- **E-mail:** `marcos.sousa12@fatec.sp.gov.br` (tanto para login, quanto para recuperação de senha)  
- **Senha:** `Fatec2025SI`

---

### 🔁 Recuperação de Senha
- Link **“Esqueci a Senha”** redireciona para a página `forget_password.php`  
- O usuário deve informar o **E-mail de cadastro**  
- O sistema verifica se o e-mail informado existe  
- Se for válido, o sistema envia um **e-mail de recuperação** com uma nova senha temporária (`Fatec2025SI`)  
- Caso o e-mail **não exista**, uma mensagem informando o erro é exibida na tela

---

## 🧩 Estrutura do Projeto

```
📁 projeto-login/
│
├── components/              # Componentes reutilizáveis (HTML/PHP)
├── css/                     # Arquivos de estilo
├── images/                  # Recursos visuais
├── vendor/                  # Biblioteca PHPMailer (instalada via Composer)
│
├── .gitignore               # Ignora a pasta /vendor no repositório
├── composer.json
├── composer.lock
│
├── login.php                # Página de Login
├── home.php                 # Página Restrita (simulação de acesso autorizado)
├── forget_password.php      # Página de Recuperação de Senha
├── usuarios.php             # Usuários e senhas mockadas
│
└── README.md
```

> ⚠️ A pasta `vendor` não é enviada ao GitHub, pois está listada no arquivo `.gitignore`.  
> Para executar o projeto corretamente em outro ambiente, é necessário instalar novamente o **PHPMailer** via Composer.

---

## ⚙️ Tecnologias Utilizadas

- **PHP 8+**
- **HTML5 / CSS3**
- **PHPMailer** (para envio de e-mails)
- **Servidor local (XAMPP ou WAMP)**

---

## 🧰 Instalação do PHPMailer (via Composer)

1. Abra o terminal dentro da pasta do projeto.  
2. Execute o comando abaixo para instalar o PHPMailer:

```bash
composer require phpmailer/phpmailer
```

3. Após a instalação, a pasta **`vendor/`** será criada automaticamente.  
4. O projeto já está preparado para utilizá-la, sem necessidade de configurações adicionais.

---

## ▶️ Como Executar o Projeto

1. Instale e inicie o **XAMPP** (ou outro servidor local).  
2. Coloque a pasta do projeto dentro do diretório:

```
C:\xampp\htdocs\
```

3. Inicie o **Apache** no painel do XAMPP.  
4. No navegador, acesse:

```
http://localhost/avaliacaoP2/login.php
```

---

## 🔑 Como Fazer Login

1. Acesse a tela de login pelo navegador.  
2. Utilize as credenciais abaixo:  
   - **E-mail:** marcos.sousa12@fatec.sp.gov.br  
   - **Senha:** Fatec2025SI  
3. Clique em **Entrar**.  
4. Se as informações forem válidas:
   - O sistema redireciona o usuário para a página **home.php**;  
   - Um e-mail de **notificação de acesso** é enviado automaticamente para o endereço do professor, informando a data e hora do login.  
5. Caso o e-mail digitado **não exista**, o sistema exibe uma mensagem de erro e o acesso é bloqueado.

---

## 🔄 Como Recuperar a Senha

1. Na tela de login, clique no link **“Esqueci a Senha”**.  
2. Informe o e-mail cadastrado.  
3. Se o e-mail for válido:
   - O sistema envia uma nova senha temporária (`Fatec2025SI`) para o endereço informado;  
   - Uma mensagem de confirmação é exibida na tela.  
4. Se o e-mail **não for encontrado**, o sistema informa que o endereço não está cadastrado.

---

## 📅 Informações da Avaliação

**Disciplina:** Desenvolvimento para Servidores  
**Avaliação:** P2  
**Professor:** Marcos Sousa  
**Aluno:** Fabiano Ramos  
**Instituição:** FATEC São Roque  

---

## 💡 Observações Finais

Este projeto foi desenvolvido com **finalidade didática**, simulando autenticação e envio de e-mails.  
Para um uso real, recomenda-se:
- Armazenar usuários e senhas em banco de dados seguro  
- Criptografar senhas com `password_hash()`  
- Utilizar variáveis de ambiente (.env) para proteger credenciais de e-mail  

---

## 🧑‍💻 Autor

**Fabiano Ramos**  
💻 Estudante de Sistemas para Internet – FATEC São Roque  
Desenvolvedor em formação • São Roque/SP – 2025

---

## 📝 Licença

Este projeto é de uso educacional e pode ser adaptado livremente.
