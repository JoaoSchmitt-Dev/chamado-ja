# Contrato Inicial da API

Este documento apresenta o contrato inicial da API do projeto **Chamado Já**, definindo as rotas conceituais previstas nesta etapa.


---

## 1. Rotas da API

### 1.1 Listar chamados

**Método HTTP:** `GET`  
**Rota:** `/api/chamados`  
**Objetivo:** Listar os chamados cadastrados no sistema, permitindo filtros e paginação.

**Dados de entrada:**

A rota não possui corpo obrigatório.

Poderá receber parâmetros pela URL:

- `status` — filtra os chamados pelo status;
- `prioridade` — filtra os chamados pela prioridade;
- `page` — informa a página que será consultada;
- `per_page` — informa a quantidade de registros por página.

Exemplo:

```text
GET /api/chamados?status=aberto&prioridade=alta&page=2&per_page=10
```

**Resposta esperada:**

Status HTTP: `200 OK`

```json
{
  "pagina_atual": 2,
  "por_pagina": 10,
  "total": 25,
  "total_paginas": 3,
  "dados": [
    {
      "id": 11,
      "solicitante_id": 1,
      "categoria_id": 2,
      "titulo": "Não consigo acessar o sistema",
      "descricao": "A mensagem de erro aparece depois do login.",
      "prioridade": "alta",
      "status": "aberto"
    }
  ]
}
```

**Comportamento esperado da paginação:**

- a API deverá retornar apenas os registros correspondentes à página solicitada;
- `page` define qual página será consultada;
- `per_page` define quantos registros serão retornados por página;
- a resposta deverá informar a página atual, a quantidade de registros por página, o total de registros e o total de páginas;
- os filtros de `status` e `prioridade` deverão ser aplicados antes da paginação.

**Possíveis erros:**

- `422 Unprocessable Entity` — filtro, página ou quantidade por página com valor inválido.

---

### 1.2 Abrir um chamado

**Método HTTP:** `POST`  
**Rota:** `/api/chamados`  
**Objetivo:** Registrar um novo chamado de suporte técnico.

**Dados de entrada:**

```json
{
  "solicitante_id": 1,
  "categoria_id": 2,
  "titulo": "Não consigo acessar o sistema",
  "descricao": "A mensagem de erro aparece depois do login.",
  "prioridade": "alta"
}
```

**Resposta esperada:**

Status HTTP: `201 Created`

```json
{
  "id": 1,
  "solicitante_id": 1,
  "categoria_id": 2,
  "titulo": "Não consigo acessar o sistema",
  "descricao": "A mensagem de erro aparece depois do login.",
  "prioridade": "alta",
  "status": "aberto"
}
```

**Possíveis erros:**

- `422 Unprocessable Entity` — dados inválidos ou obrigatórios não informados;
- `404 Not Found` — solicitante ou categoria informados não encontrados.

---

### 1.3 Consultar um chamado

**Método HTTP:** `GET`  
**Rota:** `/api/chamados/{id}`  
**Objetivo:** Consultar os dados de um chamado específico.

**Dados de entrada:**

O identificador do chamado é informado na própria rota.

Exemplo:

```text
GET /api/chamados/1
```

**Resposta esperada:**

Status HTTP: `200 OK`

```json
{
  "id": 1,
  "solicitante_id": 1,
  "categoria_id": 2,
  "titulo": "Não consigo acessar o sistema",
  "descricao": "A mensagem de erro aparece depois do login.",
  "prioridade": "alta",
  "status": "aberto"
}
```

**Possível erro:**

- `404 Not Found` — chamado não encontrado.

---

### 1.4 Atualizar dados do chamado

**Método HTTP:** `PATCH`  
**Rota:** `/api/chamados/{id}`  
**Objetivo:** Atualizar dados permitidos de um chamado existente.

**Dados de entrada:**

Exemplo:

```json
{
  "titulo": "Erro de acesso ao sistema",
  "descricao": "O erro continua ocorrendo depois do login.",
  "prioridade": "critica"
}
```

**Resposta esperada:**

Status HTTP: `200 OK`

```json
{
  "id": 1,
  "solicitante_id": 1,
  "categoria_id": 2,
  "titulo": "Erro de acesso ao sistema",
  "descricao": "O erro continua ocorrendo depois do login.",
  "prioridade": "critica",
  "status": "aberto"
}
```

**Possíveis erros:**

- `404 Not Found` — chamado não encontrado;
- `422 Unprocessable Entity` — dados inválidos.

---

### 1.5 Registrar comentário

**Método HTTP:** `POST`  
**Rota:** `/api/chamados/{id}/comentarios`  
**Objetivo:** Registrar um comentário relacionado a um chamado.

**Dados de entrada:**

```json
{
  "usuario_id": 2,
  "comentario": "Foi solicitado ao usuário que tente acessar novamente."
}
```

**Resposta esperada:**

Status HTTP: `201 Created`

```json
{
  "id": 1,
  "chamado_id": 1,
  "usuario_id": 2,
  "comentario": "Foi solicitado ao usuário que tente acessar novamente."
}
```

**Possíveis erros:**

- `404 Not Found` — chamado ou usuário não encontrado;
- `422 Unprocessable Entity` — comentário inválido ou vazio.

---

### 1.6 Alterar status

**Método HTTP:** `PATCH`  
**Rota:** `/api/chamados/{id}/status`  
**Objetivo:** Alterar o status atual de um chamado.

**Dados de entrada:**

```json
{
  "status": "em_atendimento"
}
```

**Resposta esperada:**

Status HTTP: `200 OK`

```json
{
  "id": 1,
  "status": "em_atendimento",
  "mensagem": "Status atualizado com sucesso."
}
```

**Possíveis erros:**

- `404 Not Found` — chamado não encontrado;
- `422 Unprocessable Entity` — status inválido.

> Toda alteração de status deverá gerar um registro no histórico do chamado.

---

### 1.7 Consultar histórico

**Método HTTP:** `GET`  
**Rota:** `/api/chamados/{id}/historico`  
**Objetivo:** Consultar o histórico de alterações de status de um chamado.

**Dados de entrada:**

O identificador do chamado é informado na rota.

Exemplo:

```text
GET /api/chamados/1/historico
```

**Resposta esperada:**

Status HTTP: `200 OK`

```json
{
  "chamado_id": 1,
  "historico": [
    {
      "status_anterior": "aberto",
      "status_novo": "em_atendimento",
      "alterado_em": "2026-09-30T14:30:00"
    }
  ]
}
```

**Possível erro:**

- `404 Not Found` — chamado não encontrado.

---

## 2. Resumo das rotas conceituais

| Método | Rota | Objetivo |
|---|---|---|
| GET | `/api/chamados` | Listar, filtrar e paginar chamados |
| POST | `/api/chamados` | Abrir um chamado |
| GET | `/api/chamados/{id}` | Consultar um chamado |
| PATCH | `/api/chamados/{id}` | Atualizar dados do chamado |
| POST | `/api/chamados/{id}/comentarios` | Registrar comentário |
| PATCH | `/api/chamados/{id}/status` | Alterar status |
| GET | `/api/chamados/{id}/historico` | Consultar histórico |

---

## 3. Plano inicial de trabalho

### Integrante e responsabilidades

- **João Vitor Schmitt** — responsável pelo levantamento de requisitos, modelagem do banco de dados, desenvolvimento da API, testes, documentação e versionamento no Git.

---

### Forma de revisão do código

O código deverá ser revisado antes de cada entrega semanal.

A revisão deverá verificar:

- se o código atende aos requisitos da etapa;
- se os nomes seguem o padrão definido para o projeto;
- se os dados de entrada estão sendo validados;
- se os códigos HTTP utilizados são adequados;
- se não existem credenciais ou informações sensíveis no repositório;
- se as funcionalidades alteradas foram testadas;
- se a documentação foi atualizada quando necessário.

---

### Organização inicial de branches

Inicialmente, será utilizada a branch principal:

```text
main
```

Como o projeto está sendo desenvolvido individualmente, não há necessidade de criar branches adicionais nesta primeira etapa.

Caso alguma funcionalidade precise ser desenvolvida de forma isolada, poderão ser utilizadas branches específicas, por exemplo:

```text
feature/chamados
feature/comentarios
feature/historico-status
```

Após revisão e testes, as alterações poderão ser integradas à branch `main`.

---

### Riscos do projeto

Riscos iniciais identificados:

- dificuldade na modelagem correta dos relacionamentos entre usuários, categorias, chamados, comentários e histórico;
- implementação incorreta das regras de prioridade e status;
- dificuldade na implementação de filtros e paginação da API;
- dificuldade na criação e execução dos testes;
- acúmulo de tarefas entre as semanas;
- alterações futuras nas especificações do projeto;
- inclusão acidental de senhas, tokens ou credenciais no repositório;
- implementação de funcionalidades sem compreensão ou sem testes adequados.

Os riscos deverão ser revisados durante o desenvolvimento. Novas dificuldades e decisões importantes deverão ser registradas no diário do projeto.
