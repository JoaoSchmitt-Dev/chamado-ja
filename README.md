# ChamadoJá

API de gestão de chamados de suporte técnico desenvolvida como Projeto Integrador para o curso de Back-end da Bolsa Futuro Digital.

## Objetivo do projeto

O ChamadoJá tem como objetivo centralizar e organizar chamados de suporte técnico, permitindo acompanhar cada atendimento desde a abertura até a resolução.

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

Os scripts SQL utilizados durante a etapa de modelagem permanecem no projeto como referência e documentação da estrutura inicial do banco:

- `database/schema.sql` — estrutura SQL definida durante a modelagem;
- `database/seed.sql` — dados fictícios utilizados nos testes iniciais;
- `docs/consultas.sql` — consultas SQL utilizadas para validar o modelo e responder perguntas do negócio.

Na aplicação Laravel, a criação da estrutura do banco é realizada pelas migrations e a carga de dados de demonstração é realizada pelos seeders.

## Modelo de dados

O banco de dados é composto por cinco entidades principais:

- `usuarios` — armazena os usuários e seus papéis no sistema;
- `categorias` — padroniza a classificação dos chamados;
- `chamados` — armazena as principais informações dos atendimentos;
- `comentarios` — registra as interações realizadas durante os chamados;
- `historico_status` — registra as alterações de status realizadas ao longo do atendimento.

Os chamados possuem relacionamento com o solicitante, técnico responsável e categoria. Comentários e alterações de status são mantidos em tabelas próprias para preservar o histórico e evitar repetição de dados.

## Migrations

A estrutura do banco de dados foi implementada por meio das migrations do Laravel.

As principais tabelas criadas são:

- `usuarios`;
- `categorias`;
- `chamados`;
- `comentarios`;
- `historico_status`.

As migrations também configuram:

- chaves primárias;
- chaves estrangeiras;
- índices;
- valores permitidos para papel, prioridade e status;
- valores padrão;
- campos opcionais.

Para executar as migrations:

```bash
php artisan migrate
```

Para apagar as tabelas e recriar toda a estrutura do banco:

```bash
php artisan migrate:fresh
```

> O comando `migrate:fresh` apaga todas as tabelas do banco configurado antes de executar novamente as migrations.

## Models e relacionamentos

O projeto possui os seguintes Models Eloquent:

- `Usuario`;
- `Categoria`;
- `Chamado`;
- `Comentario`;
- `HistoricoStatus`.

Os principais relacionamentos são:

- um usuário pode abrir vários chamados como solicitante;
- um usuário pode ser responsável por vários chamados como técnico;
- um chamado pertence a um solicitante;
- um chamado pode possuir um técnico responsável;
- um chamado pertence a uma categoria;
- uma categoria pode possuir vários chamados;
- um chamado pode possuir vários comentários;
- cada comentário pertence a um usuário;
- um chamado pode possuir vários registros no histórico de status;
- cada registro de histórico está relacionado ao usuário responsável pela alteração.

## Validação

Os dados recebidos pela API são validados utilizando Form Requests do Laravel.

Atualmente o projeto possui:

- `StoreUsuarioRequest`;
- `StoreCategoriaRequest`;
- `StoreChamadoRequest`;
- `UpdateChamadoRequest`.

Entre as principais regras de validação estão:

- campos obrigatórios;
- limite de caracteres;
- validação de e-mail;
- unicidade de e-mail e nome de categoria;
- verificação da existência de usuários e categorias relacionados;
- limitação dos valores permitidos para papel e prioridade;
- suporte a atualizações parciais utilizando `sometimes`.

Chamados novos recebem automaticamente o status `aberto`, sem depender do envio desse campo pelo cliente.

## Resources

As respostas JSON da API são controladas utilizando Resources do Laravel.

Foram criados:

- `UsuarioResource`;
- `CategoriaResource`;
- `ChamadoResource`.

Os Resources definem quais atributos são expostos pela API e evitam o retorno direto de todos os dados armazenados nos Models.

Informações sensíveis, como a senha dos usuários, não são retornadas nas respostas JSON.

## Dados de demonstração

O projeto possui dados de demonstração gerados pelo `DatabaseSeeder`.

A carga inicial contém:

- usuários solicitantes;
- usuários técnicos;
- categorias;
- chamados relacionados.

Para recriar o banco e carregar os dados de demonstração:

```bash
php artisan migrate:fresh --seed
```

Esse comando recria todas as tabelas e, em seguida, executa os seeders do projeto.

## Executando o projeto

Inicie o servidor local do Laravel:

```bash
php artisan serve
```

Por padrão, a aplicação ficará disponível em:

```text
http://127.0.0.1:8000
```

## Rota de saúde

A API possui uma rota simples para verificar se a aplicação está funcionando:

```text
GET /api/saude
```

Com o servidor em execução, a rota pode ser acessada em:

```text
http://127.0.0.1:8000/api/saude
```

Ou testada pelo terminal:

```bash
curl.exe http://127.0.0.1:8000/api/saude
```

Resposta esperada:

```json
{
    "dados": {
        "aplicacao": "ChamadoJá",
        "status": "funcionando"
    }
}
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

As rotas de usuários, categorias e o CRUD principal de chamados já estão implementadas.

As funcionalidades adicionais, como comentários, alteração de status e histórico, serão implementadas nas próximas etapas.

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

Foram realizados testes manuais dos principais endpoints da API utilizando PowerShell com `Invoke-RestMethod` e `Invoke-WebRequest`.

### Casos testados

| Teste | Resultado esperado | Resultado obtido |
|---|---|---|
| Criação válida de usuário | `201 Created` | Sucesso |
| Cadastro de usuário com e-mail repetido | `422 Unprocessable Content` | Sucesso |
| Listagem de categorias | `200 OK` | Sucesso |
| Criação válida de categoria | `201 Created` | Sucesso |
| Criação válida de chamado | `201 Created` | Sucesso |
| Criação de chamado sem título | `422 Unprocessable Content` | Sucesso |
| Criação com categoria inexistente | `422 Unprocessable Content` | Sucesso |
| Consulta de chamado existente | `200 OK` | Sucesso |
| Consulta de chamado inexistente | `404 Not Found` | Sucesso |
| Atualização parcial de chamado | `200 OK` | Sucesso |
| Atualização com prioridade inválida | `422 Unprocessable Content` | Sucesso |

### Exemplo de criação de chamado

`POST /api/chamados`

Entrada:

```json
{
    "solicitante_id": 1,
    "categoria_id": 1,
    "titulo": "Erro ao acessar sistema",
    "descricao": "O sistema apresenta erro depois do login.",
    "prioridade": "alta"
}
```

O chamado é criado automaticamente com:

```json
{
    "status": "aberto"
}
```

### Testes automatizados

Os principais fluxos da aplicação também deverão possuir testes automatizados.

Quando forem implementados, poderão ser executados com:

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

Até o momento foram concluídas:

- documentação inicial dos requisitos;
- modelagem do banco de dados;
- migrations;
- chaves estrangeiras e índices;
- Models Eloquent;
- relacionamentos entre os Models;
- dados de demonstração utilizando Seeder;
- rota de saúde `GET /api/saude`;
- controllers de usuários, categorias e chamados;
- Form Requests e validações;
- Resources para controle das respostas JSON;
- CRUD principal de chamados;
- testes manuais dos principais endpoints.

As próximas etapas envolvem a implementação de comentários, alteração de status, histórico de status e novos testes da API.