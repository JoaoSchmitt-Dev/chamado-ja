# Diário do Projeto — ChamadoJá

Este arquivo será utilizado para registrar a evolução semanal do Projeto Integrador.

O desenvolvimento será acompanhado durante 8 semanas, considerando registros às terças e quartas-feiras.

---

## Semana 1 — 28/09/2026 e 30/09/2026

### Segunda-feira — 28/09/2026

**O que foi feito:**

- Apresentação geral do Projeto Integrador e do desafio ChamadoJá.
- Leitura inicial do briefing e entendimento do problema proposto.
- Identificação das principais funcionalidades esperadas para a API.
- Início da documentação do projeto.
- Início da elaboração do arquivo `requisitos.md`.

**Dificuldades encontradas:**

- N/A

**Decisões tomadas:**

- N/A

**Testes realizados:**

- N/A

**Pendências:**

- Finalizar o levantamento dos requisitos.
- Criar os casos de uso e histórias de usuário.
- Elaborar o contrato inicial da API.
- Atualizar o README do projeto.

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na interpretação do briefing e na organização inicial da documentação.
- Parte gerada ou sugerida: estrutura dos requisitos e sugestões de organização do documento.
- Alterações realizadas por mim: revisão e adaptação dos textos para manter as definições de acordo com o projeto.
- Como foi testado ou validado: comparação das sugestões com o briefing apresentado pelo professor.

### Quarta-feira — 30/09/2026

**O que foi feito:**

- Continuação e revisão do arquivo `requisitos.md`.
- Definição dos requisitos funcionais e não funcionais.
- Registro das regras iniciais de prioridade e status.
- Definição dos limites de escopo do projeto.
- Criação do arquivo `casos-de-uso.md` com os casos de uso e histórias de usuário.
- Criação do arquivo `contrato-api.md`.
- Definição inicial das rotas da API, métodos HTTP, entradas e respostas esperadas.
- Criação e atualização do `README.md`.
- Organização inicial da estrutura de documentação dentro da pasta `docs`.
- Preparação do repositório GitHub e revisão dos comandos necessários para versionar e enviar o projeto.

**Dificuldades encontradas:**

- N/A

**Decisões tomadas:**

- Utilizar inicialmente as prioridades Baixa, Média, Alta e Crítica.
- Utilizar inicialmente os status Aberto, Em atendimento, Aguardando, Resolvido e Fechado.
- Definir `Aberto` como status inicial de um chamado.
- Manter a branch `main` como branch principal do projeto nesta etapa.
- Manter toda a documentação complementar dentro da pasta `docs`. 

**Testes realizados:**

- N/A

**Pendências:**

- N/A

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na elaboração, revisão e organização da documentação inicial do projeto.
- Parte gerada ou sugerida: requisitos, casos de uso, contrato inicial da API, estrutura de paginação, README e modelo do diário.
- Alterações realizadas por mim: revisão das sugestões, escolha das regras iniciais e adaptação dos conteúdos para o projeto.
- Como foi testado ou validado: comparação com o briefing do projeto, revisão manual dos documentos e conferência da consistência entre os arquivos.

### Fechamento da semana

**Resumo da semana:**

- Foi realizada a apresentação inicial do Projeto Integrador e iniciado o planejamento do ChamadoJá.
- A documentação inicial do projeto foi estruturada, incluindo requisitos, casos de uso, contrato da API, README e diário.
- Foram definidas as primeiras hipóteses de funcionamento do sistema e a estrutura inicial das rotas da API.
- O projeto ficou preparado para o início da implementação nas próximas etapas.

**Pendências para a próxima semana:**

- N/A

---

## Semana 2 — 05/10/2026 e 07/10/2026

### Segunda-feira — 05/10/2026

**O que foi feito:**

- Início da etapa de banco de dados do projeto ChamadoJá.
- Definição das entidades necessárias para representar o sistema.
- Modelagem das tabelas `usuarios`, `categorias`, `chamados`, `comentarios` e `historico_status`.
- Definição das chaves primárias e estrangeiras.
- Definição dos relacionamentos entre as tabelas.
- Definição dos campos obrigatórios e dos campos que podem possuir valor nulo.
- Definição dos valores permitidos para prioridade e status dos chamados.
- Criação do modelo entidade-relacionamento do banco.
- Início da criação do arquivo responsável pela estrutura do banco de dados.

**Dificuldades encontradas:**

- N/A

**Decisões tomadas:**

- Utilizar uma única tabela `usuarios` para armazenar solicitantes e técnicos, diferenciando-os por seu tipo ou papel no sistema.
- Criar a tabela `categorias` separadamente para evitar repetição de informações nos chamados.
- Utilizar `solicitante_id`, `tecnico_id` e `categoria_id` como chaves estrangeiras na tabela `chamados`.
- Permitir que `tecnico_id` seja nulo enquanto nenhum técnico estiver atribuído ao chamado.
- Criar tabelas separadas para `comentarios` e `historico_status`, pois um chamado pode possuir vários registros desses tipos.
- Manter prioridade e status com valores padronizados para evitar informações inconsistentes.

**Testes realizados:**

- N/A

**Pendências:**

- Finalizar os scripts SQL.
- Criar dados iniciais para testar os relacionamentos.
- Criar consultas SQL relacionadas às necessidades do sistema.
- Documentar as decisões tomadas durante a modelagem.

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na revisão da modelagem do banco de dados e na compreensão dos relacionamentos entre as entidades.
- Parte gerada ou sugerida: sugestões para organização das tabelas, relacionamentos, regras de integridade e documentação.
- Alterações realizadas por mim: revisão das sugestões e adaptação da estrutura conforme os requisitos do projeto ChamadoJá.
- Como foi testado ou validado: comparação da modelagem com os requisitos do projeto e revisão dos relacionamentos definidos no banco.

---

### Quarta-feira — 07/10/2026

**O que foi feito:**

- Finalização da estrutura inicial do banco de dados.
- Finalização do arquivo `schema.sql` com a criação das tabelas, chaves e restrições.
- Criação do arquivo `seed.sql` com dados suficientes para testar os relacionamentos entre as tabelas.
- Criação do arquivo `consultas.sql`.
- Desenvolvimento das consultas necessárias para responder às principais perguntas do sistema.
- Criação e revisão do arquivo `modelo-er.md`.
- Criação do arquivo `docs/decisoes-banco.md`.
- Documentação dos motivos para a existência de cada tabela.
- Documentação dos motivos pelos quais determinadas informações não são armazenadas diretamente na tabela `chamados`.
- Revisão da organização e normalização do banco de dados.

**Dificuldades encontradas:**

- N/A

**Decisões tomadas:**

- Manter o `modelo-er.md` focado na estrutura das entidades e relacionamentos.
- Criar o arquivo `decisoes-banco.md` especificamente para registrar as justificativas das decisões de modelagem.
- Manter usuários, categorias, comentários e histórico em tabelas próprias para reduzir repetição de dados.
- Utilizar chaves estrangeiras para relacionar os dados em vez de repetir nomes e outras informações diretamente na tabela `chamados`.
- Criar dados iniciais que permitam testar diferentes situações de chamados, categorias, usuários, comentários e alterações de status.

**Testes realizados:**

- N/A

**Pendências:**

- N/A

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na revisão dos scripts SQL, elaboração das consultas e organização da documentação da etapa de banco de dados.
- Parte gerada ou sugerida: sugestões de consultas SQL, estrutura do `seed.sql`, explicações sobre relacionamentos e organização do arquivo `decisoes-banco.md`.
- Alterações realizadas por mim: análise, adaptação e organização das sugestões conforme a estrutura definida para o projeto.
- Como foi testado ou validado: revisão dos scripts, análise dos relacionamentos e conferência dos resultados esperados das consultas.

### Fechamento da semana

**Resumo da semana:**

- Foi concluída a etapa inicial de modelagem do banco de dados do ChamadoJá.
- Foram definidas as tabelas `usuarios`, `categorias`, `chamados`, `comentarios` e `historico_status`.
- Foram estabelecidas as chaves primárias, estrangeiras, relacionamentos e restrições necessárias.
- Foram criados os arquivos `schema.sql`, `seed.sql` e `consultas.sql`.
- O modelo entidade-relacionamento e as decisões de banco foram documentados.
- A estrutura do banco ficou preparada para posteriormente ser integrada à aplicação Laravel.

**Pendências para a próxima semana:**

- N/A

---

## Semana 3 — 12/10/2026 e 14/10/2026

### Segunda-feira — 12/10/2026

**O que foi feito:**

- Continuação da implementação da estrutura do banco de dados no Laravel.
- Revisão das migrations das tabelas `usuarios`, `categorias`, `chamados`, `comentarios` e `historico_status`.
- Configuração das chaves estrangeiras utilizando `foreignId()` e `constrained()`.
- Definição dos campos opcionais, como `tecnico_id` na tabela `chamados`.
- Definição dos valores permitidos para papel, prioridade e status utilizando `enum`.
- Inclusão dos índices definidos anteriormente no modelo do banco.
- Execução das migrations utilizando `php artisan migrate:fresh`.
- Verificação das migrations utilizando `php artisan migrate:status`.
- Criação da rota de saúde `GET /api/saude`.

**Dificuldades encontradas:**

- Entender a diferença entre `foreign()`, `foreignId()` e `constrained()`.
- Entender como representar as restrições de valores permitidos nas migrations.
- Ajustar corretamente o campo `alterado_em` da tabela `historico_status`.

**Decisões tomadas:**

- Utilizar `foreignId()` juntamente com `constrained()` para criação das chaves estrangeiras.
- Utilizar `enum` para limitar os valores de papel, prioridade e status.
- Manter `tecnico_id` como campo opcional, pois um chamado pode ainda não possuir técnico responsável.
- Utilizar `cascadeOnDelete()` nos relacionamentos de comentários e histórico com chamados.
- Recriar o banco utilizando as migrations do Laravel com `migrate:fresh`.
- Manter os mesmos índices definidos anteriormente no `schema.sql`.

**Testes realizados:**

- Execução do comando `php artisan migrate:fresh`.
- Execução do comando `php artisan migrate:status`.
- Verificação de que todas as migrations foram executadas com status `Ran`.
- Teste da rota `GET /api/saude`.
- Verificação do retorno da rota em formato JSON.

**Pendências:**

- N/A

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na revisão das migrations e explicar recursos do Laravel utilizados na criação do banco.
- Parte gerada ou sugerida: correções de chaves estrangeiras, uso de `enum`, criação de índices e estrutura da rota de saúde.
- Alterações realizadas por mim: adaptação das sugestões às tabelas e regras já definidas para o projeto ChamadoJá.
- Como foi testado ou validado: execução das migrations, consulta do status das migrations e teste da rota de saúde.


### Quarta-feira — 14/10/2026

**O que foi feito:**

- Criação dos Models Eloquent `Usuario`, `Categoria`, `Chamado`, `Comentario` e `HistoricoStatus`.
- Configuração da propriedade `$table` nos Models para identificar as respectivas tabelas do banco.
- Configuração dos campos `$fillable`.
- Criação dos relacionamentos entre os Models utilizando `belongsTo()` e `hasMany()`.
- Configuração dos relacionamentos do chamado com solicitante, técnico, categoria, comentários e histórico de status.
- Configuração do Model `HistoricoStatus` para não utilizar os campos padrão `created_at` e `updated_at`.
- Teste da existência dos Models utilizando o Laravel Tinker.
- Criação de dados de demonstração por meio do `DatabaseSeeder`.
- Criação de usuários solicitantes e técnicos, categorias e chamados relacionados.
- Execução do comando `php artisan migrate:fresh --seed`.
- Teste da aplicação e da rota de saúde utilizando `curl`.

**Dificuldades encontradas:**

- Entender quando utilizar `belongsTo()` e quando utilizar `hasMany()`.
- Entender como o Eloquent identifica a tabela relacionada a cada Model.
- Configurar corretamente os relacionamentos entre usuário e chamado, já que um usuário pode atuar como solicitante ou técnico.
- Entender a função do `$fillable` e da propriedade `$table`.

**Decisões tomadas:**

- Criar dois relacionamentos diferentes entre `Usuario` e `Chamado`: chamados como solicitante e chamados como técnico.
- Manter os nomes dos Models em português conforme o padrão definido para o projeto.
- Utilizar Seeders para gerar os dados de demonstração da aplicação.
- Armazenar senhas de demonstração utilizando hash.
- Criar dados relacionados utilizando os IDs retornados pelos Models criados durante o Seeder.

**Testes realizados:**

- Utilização do comando `php artisan tinker` para verificar se os Models estavam sendo carregados corretamente.
- Consulta das classes `Usuario`, `Categoria`, `Chamado`, `Comentario` e `HistoricoStatus`.
- Execução do comando `php artisan migrate:fresh --seed`.
- Verificação da criação dos dados de demonstração.
- Teste dos relacionamentos entre chamados, usuários e categorias.
- Inicialização da aplicação utilizando `php artisan serve`.
- Teste da rota `GET /api/saude` utilizando `curl.exe`.
- Confirmação do retorno JSON indicando que a aplicação estava funcionando.

**Pendências:**

- N/A

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na criação dos Models, compreensão dos relacionamentos Eloquent, configuração dos Seeders e realização dos testes.
- Parte gerada ou sugerida: estrutura dos Models, relacionamentos `belongsTo` e `hasMany`, estrutura do `DatabaseSeeder` e comandos de teste.
- Alterações realizadas por mim: adaptação dos exemplos aos nomes, campos e relacionamentos definidos no projeto.
- Como foi testado ou validado: execução do Tinker, execução do `migrate:fresh --seed`, consulta dos Models e teste da rota de saúde com a aplicação em execução.

### Fechamento da semana

**Resumo da semana:**

- A estrutura do banco definida anteriormente foi convertida para migrations do Laravel.
- As chaves estrangeiras, restrições e índices foram configurados e testados.
- Foram criados os Models Eloquent e seus relacionamentos.
- Foram criados dados de demonstração utilizando Seeder.
- As migrations e os dados iniciais foram recriados com sucesso utilizando `php artisan migrate:fresh --seed`.
- A aplicação foi executada e a rota `GET /api/saude` retornou JSON corretamente.
- O projeto ficou preparado para iniciar a implementação dos controllers e endpoints da API.

**Pendências para a próxima semana:**

- N/A

---

## Semana 4 — 19/10/2026 e 21/10/2026

### Segunda-feira — 19/10/2026

**O que foi feito:**

- Início da implementação dos principais endpoints da API.
- Criação dos controllers `UsuarioController`, `CategoriaController` e `ChamadoController`.
- Criação dos Form Requests para validação dos dados recebidos pela API.
- Criação do `StoreUsuarioRequest`.
- Criação do `StoreCategoriaRequest`.
- Criação do `StoreChamadoRequest`.
- Criação do `UpdateChamadoRequest`.
- Implementação das regras de validação para usuários, categorias e chamados.
- Implementação das rotas de listagem e cadastro de usuários.
- Implementação das rotas de listagem e cadastro de categorias.
- Implementação das rotas de listagem, criação, consulta e atualização de chamados.
- Definição do status inicial `aberto` diretamente no servidor durante a criação de um chamado.
- Ajuste do `SESSION_DRIVER` para `file` após identificação de erro relacionado à ausência da tabela `sessions`.

**Dificuldades encontradas:**

- N/A

**Decisões tomadas:**

- Utilizar Form Requests para separar as regras de validação dos controllers.
- Utilizar `Rule::in()` para limitar valores como papel e prioridade.
- Utilizar `sometimes` nas validações de atualização para permitir alterações parciais através de `PATCH`.
- Não permitir que o cliente informe o status inicial de um chamado.
- Definir o status `aberto` diretamente no `ChamadoController`.
- Utilizar `SESSION_DRIVER=file`, pois a aplicação atual não necessita armazenar sessões no PostgreSQL.

**Testes realizados:**

- Verificação das rotas utilizando `php artisan route:list`.
- Teste da rota de saúde após os ajustes realizados.
- Testes iniciais de listagem dos recursos.
- Verificação do funcionamento das validações dos Form Requests.
- Verificação da comunicação entre rota, controller, Model e banco de dados.

**Pendências:**

- N/A

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na implementação das rotas, controllers e validações e explicar o funcionamento dos recursos utilizados.
- Parte gerada ou sugerida: estrutura inicial dos controllers, Form Requests, rotas e regras de validação.
- Alterações realizadas por mim: adaptação dos códigos aos Models, campos e regras existentes no projeto.
- Como foi testado ou validado: execução da aplicação, consulta das rotas e realização de requisições aos endpoints implementados.

### Quarta-feira — 21/10/2026

**O que foi feito:**

- Criação dos Resources `UsuarioResource`, `CategoriaResource` e `ChamadoResource`.
- Configuração dos Resources para controlar quais atributos são retornados pela API.
- Remoção da senha das respostas de usuários.
- Utilização de Resources para retornar registros únicos e coleções.
- Configuração do `ChamadoResource` para apresentar os relacionamentos carregados.
- Finalização dos métodos `index`, `store`, `show` e `update` necessários para o CRUD principal.
- Realização dos testes manuais exigidos pela atividade.
- Utilização do PowerShell com `Invoke-RestMethod` e `Invoke-WebRequest` para realizar requisições HTTP.
- Verificação dos códigos de resposta HTTP e das validações implementadas.

**Dificuldades encontradas:**

- N/A

**Decisões tomadas:**

- Utilizar Resources para controlar os atributos expostos pela API.
- Não retornar a senha dos usuários nas respostas JSON.
- Utilizar `UsuarioResource::collection()` e `CategoriaResource::collection()` para respostas contendo vários registros.
- Utilizar `new Resource(...)` para respostas contendo um único registro.
- Utilizar `Invoke-RestMethod` no PowerShell para facilitar o envio de corpos JSON.
- Utilizar `Invoke-WebRequest` quando necessário verificar explicitamente o código HTTP retornado.

**Testes realizados:**

- Criação válida de usuário.
- Tentativa de cadastro de usuário com e-mail repetido, retornando `422`.
- Listagem de categorias.
- Criação válida de categoria.
- Criação válida de chamado.
- Criação de chamado sem título, retornando `422`.
- Criação de chamado com categoria inexistente, retornando `422`.
- Consulta de chamado existente, retornando `200`.
- Consulta de chamado inexistente, retornando `404`.
- Atualização parcial de chamado utilizando `PATCH`.
- Validação de prioridade inválida.
- Verificação de que novos chamados são criados automaticamente com status `aberto`.
- Verificação de que os Resources não expõem atributos que não devem ser retornados, como a senha do usuário.

**Pendências:**

- N/A

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na criação dos Resources, compreensão do fluxo das respostas JSON e elaboração dos testes manuais.
- Parte gerada ou sugerida: estrutura dos Resources, ajustes nos controllers, comandos PowerShell para testes e explicações sobre os códigos HTTP.
- Alterações realizadas por mim: adaptação dos códigos e comandos ao projeto ChamadoJá e execução dos testes manualmente.
- Como foi testado ou validado: realização dos testes de criação, consulta, atualização e validação, comparando os resultados obtidos com os resultados esperados na atividade.

### Fechamento da semana

**Resumo da semana:**

- Foram implementadas as principais rotas da API para usuários, categorias e chamados.
- Os controllers foram configurados para realizar as operações principais do sistema.
- Os dados recebidos pela API passaram a ser validados por Form Requests.
- Os Resources foram implementados para controlar os atributos retornados nas respostas JSON.
- O CRUD principal de chamados foi implementado e validado.
- Todos os testes manuais mínimos solicitados pela atividade foram executados com os resultados esperados.
- A aplicação passou a possuir um fluxo completo entre requisição, validação, controller, Model, banco de dados, Resource e resposta JSON.

**Pendências para a próxima semana:**

- N/A

---

### Segunda-feira — 26/10/2026

**O que foi feito:**

- Implementação dos endpoints de comentários dos chamados.
- Criação do StoreComentarioRequest.
- Criação do ComentarioController.
- Criação do ComentarioResource.
- Implementação da listagem de comentários de um chamado.
- Implementação da criação de comentários vinculados a um chamado e a um usuário.
- Criação do AlterarStatusChamadoRequest.
- Criação do Service AlterarStatusDoChamado.
- Implementação das regras de transição de status.
- Utilização de DB::transaction() para garantir que a alteração do status e a criação do histórico sejam realizadas em conjunto.
- Criação do HistoricoStatusResource.
- Implementação do endpoint para consulta do histórico de status.
- Realização de testes de alteração válida e inválida de status.

**Dificuldades encontradas:**

- N/A

**Decisões tomadas:**

- Utilizar Form Requests para validar os dados enviados nos comentários e nas alterações de status.
- Obter o chamado_id através da rota, evitando que ele precise ser enviado no corpo da requisição.
- Criar os comentários através do relacionamento do chamado.
- Separar a regra de alteração de status em um Service.
- Utilizar DomainException para representar transições de status não permitidas.
- Utilizar transação no banco para garantir que a atualização do chamado e o registro no histórico ocorram juntos.

**Testes realizados:**

- Criação de comentário em chamado existente.
- Listagem dos comentários de um chamado.
- Alteração válida de status de em_atendimento para resolvido.
- Consulta do histórico de status.
- Tentativa de alteração inválida de resolvido para aberto, retornando 422.
- Verificação de que o chamado permaneceu com status resolvido após a tentativa inválida.
- Verificação de que nenhuma entrada inválida foi criada no histórico.

**Pendências:**

- N/A

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na implementação dos comentários, alteração de status, histórico e compreensão das regras de negócio.
- Parte gerada ou sugerida: estrutura dos Requests, Resources, Controller, Service e comandos PowerShell para realização dos testes.
- Alterações realizadas por mim: adaptação das regras e códigos ao modelo de dados do projeto ChamadoJá.
- Como foi testado ou validado: execução dos endpoints e realização dos testes manuais, verificando os status retornados e os registros criados no banco.

### Quarta-feira — 28/10/2026

**O que foi feito:**

- Criação do IndexChamadoRequest para validação dos parâmetros utilizados na listagem de chamados.
- Implementação de filtros por status.
- Implementação de filtros por prioridade.
- Implementação de filtros por categoria.
- Implementação de filtros por solicitante.
- Implementação de filtro por período de criação.
- Utilização de Chamado::query() para construção dinâmica da consulta.
- Utilização de when() para aplicar apenas os filtros informados na requisição.
- Implementação de ordenação por campos permitidos.
- Implementação de ordenação crescente e decrescente.
- Implementação de paginação com 15 registros por página.
- Criação do RelatorioController.
- Implementação do endpoint GET /api/relatorios/resumo-chamados.
- Implementação da contagem total de chamados.
- Implementação da contagem de chamados agrupados por status utilizando consulta agregada no banco de dados.
- Realização dos testes dos filtros, paginação, ordenação e resumo.

**Dificuldades encontradas:**

- Entendimento da construção dinâmica de consultas utilizando query() e when().
- Entendimento da utilização de funções reduzidas com fn.
- Entendimento da necessidade de limitar os campos permitidos para ordenação.
- Durante os testes, o PowerShell apresentou os dados aninhados do resumo de forma simplificada.

**Decisões tomadas:**

- Utilizar query parameters para os filtros do endpoint GET /api/chamados.
- Aplicar os filtros somente quando forem informados.
- Permitir ordenação apenas por campos previamente definidos.
- Utilizar created_at internamente para representar a data de criação dos chamados.
- Utilizar paginação de 15 registros por página.
- Criar um Controller separado para os relatórios.
- Realizar as contagens diretamente no banco utilizando COUNT e GROUP BY, evitando carregar todos os chamados para realizar a contagem em PHP.

**Testes realizados:**

- Filtro por status.
- Filtro por prioridade.
- Filtro por categoria.
- Filtro por solicitante.
- Combinação de filtros.
- Teste de ordenação dos chamados.
- Teste de paginação.
- Verificação da rota GET /api/relatorios/resumo-chamados.
- Consulta do resumo geral dos chamados.
- Verificação da quantidade total de chamados.
- Verificação da quantidade de chamados agrupados por status.

**Pendências:**

- N/A

**Alterações após revisão:**

- N/A

**Uso de IA:**

- Ferramenta utilizada: ChatGPT.
- Objetivo do uso: auxiliar na implementação dos filtros, paginação, ordenação e relatório de resumo dos chamados.
- Parte gerada ou sugerida: estrutura do IndexChamadoRequest, alterações no método index() do ChamadoController, criação do RelatorioController e comandos para testes.
- Alterações realizadas por mim: adaptação dos filtros, nomes dos campos, status e regras utilizadas no projeto ChamadoJá.
- Como foi testado ou validado: execução dos endpoints através do PowerShell e comparação dos resultados obtidos com os resultados esperados.

### Fechamento da semana

**Resumo da semana:**

- Foram implementados os endpoints de comentários dos chamados.
- Foi implementado o controle de transições de status.
- As alterações de status passaram a gerar registros no histórico.
- Foi utilizada transação de banco para garantir a consistência entre atualização de status e histórico.
- Foram implementados filtros na listagem de chamados.
- Foi implementada paginação dos resultados.
- Foi implementada ordenação controlada por campos permitidos.
- Foi criado um endpoint de relatório com o total de chamados e a quantidade agrupada por status.
- Os endpoints implementados foram testados manualmente com os resultados esperados.

**Pendências para a próxima semana:**

- N/A

---

## Semana 6 — 02/11/2026 e 04/11/2026

### Segunda-feira — 02/11/2026

**O que foi feito:**

- 

**Dificuldades encontradas:**

- 

**Decisões tomadas:**

- 

**Testes realizados:**

- 

**Pendências:**

- 

**Alterações após revisão:**

- 

**Uso de IA:**

- Ferramenta utilizada:
- Objetivo do uso:
- Parte gerada ou sugerida:
- Alterações realizadas por mim:
- Como foi testado ou validado:

### Quarta-feira — 04/11/2026

**O que foi feito:**

- 

**Dificuldades encontradas:**

- 

**Decisões tomadas:**

- 

**Testes realizados:**

- 

**Pendências:**

- 

**Alterações após revisão:**

- 

**Uso de IA:**

- Ferramenta utilizada:
- Objetivo do uso:
- Parte gerada ou sugerida:
- Alterações realizadas por mim:
- Como foi testado ou validado:

### Fechamento da semana

**Resumo da semana:**

- 

**Pendências para a próxima semana:**

- 

---

## Semana 7 — 09/11/2026 e 11/11/2026

### Segunda-feira — 09/11/2026

**O que foi feito:**

- 

**Dificuldades encontradas:**

- 

**Decisões tomadas:**

- 

**Testes realizados:**

- 

**Pendências:**

- 

**Alterações após revisão:**

- 

**Uso de IA:**

- Ferramenta utilizada:
- Objetivo do uso:
- Parte gerada ou sugerida:
- Alterações realizadas por mim:
- Como foi testado ou validado:

### Quarta-feira — 11/11/2026

**O que foi feito:**

- 

**Dificuldades encontradas:**

- 

**Decisões tomadas:**

- 

**Testes realizados:**

- 

**Pendências:**

- 

**Alterações após revisão:**

- 

**Uso de IA:**

- Ferramenta utilizada:
- Objetivo do uso:
- Parte gerada ou sugerida:
- Alterações realizadas por mim:
- Como foi testado ou validado:

### Fechamento da semana

**Resumo da semana:**

- 

**Pendências para a próxima semana:**

- 

---

## Semana 8 — 16/11/2026 e 18/11/2026

### Segunda-feira — 16/11/2026

**O que foi feito:**

- 

**Dificuldades encontradas:**

- 

**Decisões tomadas:**

- 

**Testes realizados:**

- 

**Pendências:**

- 

**Alterações após revisão:**

- 

**Uso de IA:**

- Ferramenta utilizada:
- Objetivo do uso:
- Parte gerada ou sugerida:
- Alterações realizadas por mim:
- Como foi testado ou validado:

### Quarta-feira — 18/11/2026

**O que foi feito:**

- 

**Dificuldades encontradas:**

- 

**Decisões tomadas:**

- 

**Testes realizados:**

- 

**Pendências:**

- 

**Alterações após revisão:**

- 

**Uso de IA:**

- Ferramenta utilizada:
- Objetivo do uso:
- Parte gerada ou sugerida:
- Alterações realizadas por mim:
- Como foi testado ou validado:

### Fechamento da semana

**Resumo final do projeto:**

- 

**Pendências ou melhorias futuras:**

- 