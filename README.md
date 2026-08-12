# 🛍️ Catalogfy

Sistema web de catálogo de produtos com painel administrativo, desenvolvido em PHP e MySQL.

## Visão Geral

O projeto inclui:
- vitrine pública com listagem de produtos;
- página de detalhes do produto;
- painel administrativo para gerenciamento de itens;
- CRUD de produtos e categorias;
- autenticação de usuários e controle de acesso.

## Stack

- PHP
- MySQL / MariaDB
- HTML5, CSS3 e JavaScript
- Bootstrap 5.2
- XAMPP, Laragon ou Docker

## Estrutura do Projeto

```text
Catalogfy/
├── admin/
│   ├── action/
│   ├── classes/
│   ├── editar.php
│   ├── excluir.php
│   ├── index.php
│   ├── painel.php
│   └── sair.php
├── img/
├── catalogfy2.sql
├── index.php
├── produto.php
└── README.md
```

## Como Executar Localmente

### 1. Pré-requisitos

- PHP e MySQL em ambiente local;
- XAMPP, Laragon ou equivalente.

### 2. Clonar o repositório

```bash
git clone https://github.com/rottingyourself/Catalogfy-main.git
```

### 3. Configurar o banco de dados

1. Inicie o Apache e o MySQL.
2. Acesse o phpMyAdmin em `http://localhost/phpmyadmin`.
3. Crie um banco de dados, por exemplo: `catalogfy`.
4. Importe o arquivo `catalogfy2.sql` disponível na raiz do projeto.

### 4. Acessar a aplicação

- Vitrine: `http://localhost/Catalogfy-main/`
- Painel administrativo: `http://localhost/Catalogfy-main/admin/`

## Funcionalidades

- exibição dinâmica dos produtos cadastrados;
- cadastro, edição e exclusão de itens;
- gestão de categorias e usuários;
- interface responsiva com Bootstrap.

## Autor

Desenvolvido por [rottingyourself](https://github.com/rottingyourself), durante o curso de Técnico em Desenvolvimento de Sistemas no Senac, Pindamonhangaba, em 2023.
