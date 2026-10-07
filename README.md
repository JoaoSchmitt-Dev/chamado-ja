# ChamadoJá

API de gestão de chamados de suporte técnico desenvolvida como Projeto Integrador para o curso de Back-end da Bolsa Futuro Digital.

## Objetivo do projeto

O Chamado Já tem como objetivo centralizar e organizar chamados de suporte técnico, permitindo acompanhar cada atendimento desde a abertura até a resolução.

A aplicação será desenvolvida como uma API REST utilizando Laravel e PostgreSQL.

Entre as funcionalidades previstas estão:

- cadastro e consulta de usuários;
- cadastro e consulta de categorias;
- abertura de chamados;
- consulta e atualização de chamados;
- filtros e paginação;
- registro de comentários;
- alteração de status;
- histórico de alterações de status;
- consulta de resumos dos chamados.

## Problema

Atualmente, as solicitações de suporte podem chegar por diferentes meios, como mensagens, ligações e planilhas.

Essa forma de trabalho dificulta o acompanhamento de informações como:

- quem abriu a solicitação;
- qual problema foi relatado;
- qual é a prioridade do atendimento;
- a qual categoria o chamado pertence;
- quem está acompanhando o atendimento;
- quais chamados ainda estão pendentes;
- quais alterações foram realizadas;
- quantos chamados existem por status, prioridade ou categoria.

O ChamadoJá busca centralizar essas informações em uma única aplicação.

## Integrante

- João Vitor Schmitt

Responsável pelo levantamento de requisitos, modelagem do banco de dados, desenvolvimento da API, testes, documentação e versionamento do projeto.

## Tecnologias utilizadas

O projeto utilizará:

- PHP;
- Laravel;
- PostgreSQL;
- Composer;
- Git;
- ferramenta para testes de requisições HTTP, como Postman, Insomnia, Bruno ou curl.

## Repositório

O código-fonte do projeto está disponível em:

```text
https://github.com/JoaoSchmitt-Dev/chamado-ja
```

## Requisitos para execução

Antes de executar o projeto, é necessário possuir:

- PHP;
- Composer;
- PostgreSQL;
- Git.

## Como clonar o projeto

Clone o repositório:

```bash
git clone https://github.com/JoaoSchmitt-Dev/chamado-ja.git
```

Entre na pasta do projeto:

```bash
cd chamado-ja
```

## Instalação das dependências

Instale as dependências do Laravel:

```bash
composer install
```

## Configuração do ambiente

Crie o arquivo `.env` a partir do `.env.example`.

### Windows

```bash
copy .env.example .env
```

### Linux ou macOS

```bash
cp .env.example .env
```

Depois, gere a chave da aplicação:

```bash
php artisan key:generate
```

## Configuração do banco de dados

Crie um banco PostgreSQL para a aplicação.

Depois configure as informações de conexão no arquivo `.env`.

Exemplo:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=chamado_ja
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```

Após alterar o `.env`, execute:

```bash
php artisan config:clear
```

> O arquivo `.env` não deve ser enviado para o repositório, pois pode conter informações sensíveis como senhas e credenciais.

## Scripts do banco de dados

A estrutura inicial do banco de dados está disponível nos seguintes arquivos:

- `database/schema.sql` — cria as tabelas, restrições, relacionamentos e índices;
- `database/seed.sql` — insere dados fictícios para testes;
- `docs/consultas.sql` — contém consultas SQL utilizadas para validar o modelo e responder perguntas do negócio.

As tabelas principais do sistema são:

- `usuarios`;
- `categorias`;
- `chamados`;
- `comentarios`;
- `historico_status`.

A ordem recomendada para utilização dos arquivos é:

1. `database/schema.sql` — cria a estrutura do banco;
2. `database/seed.sql` — insere os dados de teste;
3. `docs/consultas.sql` — executa consultas para validar os dados e relacionamentos.

## Modelo de dados

O banco de dados é composto por cinco entidades principais:

- `usuarios` — armazena os usuários e seus papéis no sistema;
- `categorias` — padroniza a classificação dos chamados;
- `chamados` — armazena as principais informações dos atendimentos;
- `comentarios` — registra as interações realizadas durante os chamados;
- `historico_status` — registra as alterações de status realizadas ao longo do atendimento.

Os chamados possuem relacionamento com o solicitante, técnico responsável e categoria. Comentários e alterações de status são mantidos em tabelas próprias para preservar o histórico e evitar repetição de dados.

## Migrations

O modelo inicial do banco de dados foi definido no arquivo `database/schema.sql`.

As migrations do Laravel serão desenvolvidas com base nesse modelo, permitindo futuramente que a estrutura do banco seja criada diretamente pela aplicação.

Quando as migrations estiverem implementadas, poderão ser executadas com:

```bash
php artisan migrate
```

## Executando o projeto

Inicie o servidor local do Laravel:

```bash
php artisan serve
```

Por padrão, a aplicação ficará disponível em:

```text
http://127.0.0.1:8000
```

## Contrato inicial da API

As seguintes rotas fazem parte do contrato inicial planejado para a aplicação:

| Método | Rota | Objetivo |
|---|---|---|
| GET | `/api/chamados` | Listar, filtrar e paginar chamados |
| POST | `/api/chamados` | Abrir um chamado |
| GET | `/api/chamados/{id}` | Consultar um chamado específico |
| PATCH | `/api/chamados/{id}` | Atualizar dados de um chamado |
| POST | `/api/chamados/{id}/comentarios` | Registrar comentário |
| PATCH | `/api/chamados/{id}/status` | Alterar o status do chamado |
| GET | `/api/chamados/{id}/historico` | Consultar o histórico de status |

Essas rotas representam o contrato inicial da API e serão implementadas gradualmente durante o projeto.

## Paginação e filtros

A listagem de chamados deverá permitir filtros e paginação.

Exemplo planejado:

```text
GET /api/chamados?status=aberto&prioridade=alta&page=1&per_page=10
```

Filtros previstos:

- `status`;
- `prioridade`.

Parâmetros de paginação previstos:

- `page` — página que será consultada;
- `per_page` — quantidade de registros por página.

## Regras iniciais

Todo chamado deverá possuir:

- solicitante;
- categoria;
- título;
- descrição;
- prioridade;
- status.

Um chamado poderá inicialmente não possuir técnico responsável. O técnico poderá ser atribuído posteriormente durante o atendimento.

Um chamado também poderá possuir:

- comentários;
- registros de histórico.

Os usuários do sistema possuem um papel definido, podendo ser:

- solicitante;
- técnico.

As alterações de status deverão ser registradas no histórico.

Os valores de prioridade deverão ser:

- baixa;
- media;
- alta;
- critica.

Os valores de status deverão ser:

- aberto;
- em_atendimento;
- aguardando;
- resolvido;
- fechado.

Dados inválidos deverão ser rejeitados pela API.

## Prioridades iniciais

As prioridades consideradas inicialmente são:

- Baixa;
- Média;
- Alta;
- Crítica.

Esses valores poderão ser revisados conforme novas especificações forem liberadas.

## Status iniciais

Os status considerados inicialmente são:

- Aberto;
- Em atendimento;
- Aguardando;
- Resolvido;
- Fechado.

Inicialmente, todo novo chamado deverá começar com o status `Aberto`.

As regras de transição entre os status poderão ser refinadas durante o desenvolvimento.

## Autenticação

A autenticação não faz parte obrigatoriamente do núcleo inicial do projeto.

Durante o desenvolvimento serão estudados conceitos relacionados a:

- autenticação;
- autorização;
- hash de senhas;
- tokens de acesso;
- proteção de rotas;
- Laravel Sanctum.

A implementação funcional da autenticação poderá ser realizada posteriormente como extensão do projeto.

## Testes

Os principais fluxos da aplicação deverão possuir testes.

Quando os testes forem implementados, poderão ser executados com:

```bash
php artisan test
```

## Documentação

A documentação do projeto está localizada na pasta `docs`.

Estrutura atual:

```text
chamado-ja/
├── database/
│   ├── schema.sql
│   └── seed.sql
├── docs/
│   ├── casos-de-uso.md
|   ├── consultas.sql
│   ├── contrato-api.md
│   ├── decisoes-banco.md
│   ├── diario.md
|   ├── modelo-er.md
|   ├── modelo-er.png
│   └── requisitos.md
├── README.md
└── ...
```

### Arquivos de documentação

#### `docs/requisitos.md`

Contém:

- objetivo do sistema;
- descrição do problema;
- público da aplicação;
- requisitos funcionais;
- requisitos não funcionais;
- regras de prioridade e status;
- limites do escopo;
- dúvidas e hipóteses do projeto.

#### `docs/casos-de-uso.md`

Contém os casos de uso e histórias de usuário, incluindo:

- ator;
- objetivo;
- resultado esperado;
- critérios de aceite.

#### `docs/contrato-api.md`

Contém o contrato inicial da API, incluindo:

- métodos HTTP;
- rotas;
- objetivos;
- dados de entrada;
- respostas esperadas;
- paginação;
- filtros;
- códigos HTTP;
- plano inicial de trabalho;
- riscos do projeto.

#### `docs/diario.md`

Será utilizado para registrar a evolução semanal do projeto, incluindo:

- atividades realizadas;
- dificuldades encontradas;
- decisões tomadas;
- testes realizados;
- pendências;
- alterações após revisões;
- utilização de ferramentas de inteligência artificial.

## Versionamento

O projeto utiliza Git para controle de versão.

A branch principal utilizada inicialmente é:

```text
main
```

As alterações serão registradas por meio de commits ao longo das etapas semanais.

Fluxo básico utilizado:

```bash
git status
git add .
git commit -m "Descrição da alteração"
git push
```

## Status do projeto

Projeto em desenvolvimento.

O desenvolvimento será realizado de forma incremental durante as etapas do Projeto Integrador.

As funcionalidades, decisões técnicas, testes e alterações serão documentados conforme a evolução do projeto.