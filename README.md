## Gestão de Estagiários

Passos para instalação:
1. Clonar o repositório git
2. Instalar as dependências com o comando `composer install`
3. Configurar as variáveis de ambiente do arquivo .env
4. Gerar a key criptografada com o comando `php artisan key:generate`
5. Rodar o comando `php artisan migrate`
6. Para rodar a aplicação usar o comando `php artisan serve`

Pré-requisitos:

- PhP 8.2+
- Composer
- Git
- Extensões recomendadas para o VS Code:
    - PHP Intelephense
    - Laravel Pint
    - SQLite Viewer
    - Laravel Blade Formatter

## Roadmap

- Laravel (9+)
- Tailwind CSS (vite opcional)
- banco sqlite
- Identidade visual da Fundação (inspirações: InfoGer, etc)
- não precisa login 


Primeiro módulo 
- Cadastro do estagiário - tabela estagiarios
    - Nome completo (string) - nome
    - Data de nascimento (data) - nascimento
    - CPF (string) - cpf
    - email (string) - email
    - telefone com ddd celular - (string) - telefone
    - nome faculdade (string) - faculdade
    - cnpj faculdade (string) - cnpj_faculdade
    - nome do curso (string) - curso
    - expectativa formação (data) - data_final_curso
    - Termo de estágio assinado (upload: pdf) - termo_estagio
    - Data inicial do contrato de estágio - data_inicio_estagio
    - Data final do contrato - data_fim_estagio

Telas:
- Formulário de cadastro de estagiário
- Formulário de edição do estagiário
- Listagem dos estagiários.
    - Cada item da lista tem um botão para o formulário de edição.
    - Nessa mesma tela, tem um botão "Cadastrar estagiário" para a tela de formulário de cadastro
    - Cada item tem um botão que abre um modal com todas as informações do estagiário
    - Botão para excluir estagiário

 
O usuário do sistema poderá cadastrar, editar e excluir os dados dos estagiários
