# 🛍️ Catalogfy

Um sistema web completo de catálogo de produtos com **Painel Administrativo**, desenvolvido em **PHP** e **MySQL**. 

Este projeto foi desenvolvido em 2023 como parte de estudos de desenvolvimento web full-stack, aplicando conceitos fundamentais de CRUD, autenticação de usuários, manipulação de banco de dados relacional e interface responsiva com Bootstrap.

---

## 🚀 Tecnologias Utilizadas

- **Linguagem:** PHP (Programação Orientada a Objetos / Procedural)
- **Banco de Dados:** MySQL / MariaDB
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5.2
- **Ambiente sugerido:** XAMPP, Laragon ou Docker

---

## 📁 Estrutura do Projeto

```text
Catalogfy/
│
├── admin/               # Painel administrativo restrito
│   ├── action/          # Scripts de processamento (Cadastro, Edição, Exclusão, Login)
│   ├── classes/         # Classes de conexão e manipulação (Banco.class.php, Produto.class.php)
│   ├── editar.php
│   ├── excluir.php
│   ├── index.php        # Login administrativo
│   ├── painel.php       # Dashboard do admin
│   └── sair.php
│
├── img/                 # Pasta de armazenamento de imagens dos produtos
├── catalogfy2.sql       # Dump do banco de dados MySQL
├── index.php            # Página inicial (vitrine de produtos)
└── produto.php          # Página de detalhes do produto
```

---

## ⚙️ Como Executar o Projeto Localmente

Para rodar este projeto na sua máquina, siga os passos abaixo:

### 1. Pré-requisitos
* Ter o **XAMPP** ou **Laragon** instalado (ou qualquer servidor local com suporte a PHP e MySQL).

### 2. Clonar ou baixar o repositório
Coloque a pasta do projeto dentro do diretório raiz do seu servidor local (por exemplo, `htdocs` no XAMPP):
```bash
git clone https://github.com/rottingyourself/Catalogfy.git
```

### 3. Configurar o Banco de Dados
1. Inicie o **Apache** e o **MySQL** no seu painel do XAMPP/Laragon.
2. Acesse o **phpMyAdmin** (`http://localhost/phpmyadmin`).
3. Crie um novo banco de dados (recomenda-se o nome `catalogfy`).
4. Importe o arquivo `catalogfy2.sql` fornecido na raiz do projeto para criar as tabelas e dados iniciais.

### 4. Acessar a aplicação
* **Vitrine (Loja):** `http://localhost/Catalogfy-main-main/`
* **Painel Administrativo:** `http://localhost/Catalogfy-main-main/admin/`

---

## 📸 Funcionalidades
* **Vitrine Pública:** Exibição dinâmica dos produtos cadastrados com foto, título, descrição e botão de detalhes.
* **Painel Administrativo Protegido:** Controle de acesso para gestão de produtos e categorias.
* **CRUD Completo:** Cadastro, listagem, edição e exclusão de itens integrados ao banco de dados relacional.

---

## 👨‍💻 Autor
Desenvolvido por **[rottingyourself](https://github.com/rottingyourself)**.
