# Casos de Uso e Histórias de Usuário

## UC01 - Cadastrar usuário

Ator: Usuário responsável pelo cadastro

Objetivo: Cadastrar um novo usuário no sistema.

História de usuário:

Como usuário do sistema,  
quero cadastrar um novo usuário,  
para que ele possa participar do fluxo de atendimento dos chamados.

Resultado esperado:

O usuário é cadastrado com sucesso e fica disponível para consulta.

Critérios de aceite:
- os dados obrigatórios devem ser informados;
- dados inválidos devem ser rejeitados;
- o usuário cadastrado deve poder ser consultado posteriormente.

---

## UC02 - Cadastrar categoria

Ator: Usuário responsável pelo cadastro

Objetivo: Cadastrar uma nova categoria de chamado.

História de usuário:

Como usuário do sistema,  
quero cadastrar categorias,  
para classificar corretamente os chamados de suporte.

Resultado esperado:

A categoria é cadastrada e fica disponível para ser utilizada em chamados.

Critérios de aceite:
- os dados obrigatórios devem ser informados;
- dados inválidos devem ser rejeitados;
- a categoria criada deve poder ser consultada.

---

## UC03 - Abrir chamado

Ator: Solicitante

Objetivo: Registrar uma nova solicitação de suporte técnico.

História de usuário:

Como solicitante,  
quero abrir um chamado,  
para registrar um problema e solicitar atendimento.

Resultado esperado:

Um novo chamado é criado e armazenado no sistema.

Critérios de aceite:
- o chamado deve possuir um solicitante;
- o chamado deve pertencer a uma categoria;
- o chamado deve possuir título e descrição;
- o chamado deve possuir prioridade;
- o chamado deve possuir status;
- dados inválidos devem ser rejeitados.

---

## UC04 - Consultar chamado específico

Ator: Solicitante ou Técnico

Objetivo: Consultar os dados de um chamado específico.

História de usuário:

Como usuário do sistema,  
quero consultar um chamado específico,  
para visualizar suas informações e acompanhar o atendimento.

Resultado esperado:

O sistema retorna os dados do chamado solicitado.

Critérios de aceite:
- o chamado deve ser localizado por seu identificador;
- os dados do chamado devem ser apresentados;
- caso o chamado não exista, a API deve retornar uma resposta de erro adequada.

---

## UC05 - Listar e filtrar chamados

Ator: Técnico

Objetivo: Localizar chamados de acordo com critérios definidos.

História de usuário:

Como técnico,  
quero listar e filtrar chamados por status e prioridade,  
para localizar rapidamente os atendimentos que precisam de atenção.

Resultado esperado:

O sistema apresenta somente os chamados correspondentes aos filtros informados.

Critérios de aceite:
- deve ser possível listar os chamados cadastrados;
- o filtro de status deve aceitar somente valores definidos;
- o filtro de prioridade deve aceitar somente valores definidos;
- a listagem deve permitir paginação;
- dados de filtro inválidos devem ser rejeitados.

---

## UC06 - Atualizar chamado

Ator: Técnico

Objetivo: Atualizar informações de um chamado durante o atendimento.

História de usuário:

Como técnico,  
quero atualizar os dados de um chamado,  
para manter suas informações de atendimento atualizadas.

Resultado esperado:

As informações permitidas do chamado são atualizadas no sistema.

Critérios de aceite:
- o chamado deve existir;
- somente dados válidos devem ser aceitos;
- as alterações devem ser persistidas no banco de dados.

---

## UC07 - Adicionar comentário

Ator: Técnico

Objetivo: Registrar informações durante o atendimento.

História de usuário:

Como técnico,  
quero adicionar comentários a um chamado,  
para registrar informações relevantes sobre o atendimento.

Resultado esperado:

O comentário é registrado e associado ao chamado correto.

Critérios de aceite:
- o chamado deve existir;
- o comentário deve ficar associado ao chamado;
- um chamado pode possuir vários comentários;
- dados inválidos devem ser rejeitados.

---

## UC08 - Alterar status do chamado

Ator: Técnico

Objetivo: Atualizar a situação atual de um chamado.

História de usuário:

Como técnico,  
quero alterar o status de um chamado,  
para representar corretamente a situação atual do atendimento.

Resultado esperado:

O chamado recebe o novo status e a alteração é registrada no histórico.

Critérios de aceite:
- o chamado deve existir;
- o novo status deve ser válido;
- a alteração de status deve ser persistida;
- toda alteração de status deve gerar um registro no histórico.

---

## UC09 - Consultar histórico de status

Ator: Solicitante ou Técnico

Objetivo: Consultar as alterações realizadas no status de um chamado.

História de usuário:

Como usuário do sistema,  
quero consultar o histórico de status de um chamado,  
para acompanhar as mudanças ocorridas durante o atendimento.

Resultado esperado:

O sistema apresenta os registros de alteração de status vinculados ao chamado.

Critérios de aceite:
- o chamado deve existir;
- o histórico deve estar relacionado ao chamado correto;
- devem ser exibidas as alterações de status registradas.

---

## UC10 - Consultar resumo dos chamados

Ator: Técnico

Objetivo: Visualizar informações consolidadas sobre os chamados.

História de usuário:

Como técnico,  
quero consultar um resumo dos chamados,  
para acompanhar a quantidade de chamados por situação, prioridade ou categoria.

Resultado esperado:

O sistema apresenta dados resumidos sobre os chamados cadastrados.

Critérios de aceite:
- o sistema deve permitir consultar quantidades por status;
- o sistema deve permitir consultar quantidades por prioridade;
- o sistema deve permitir consultar quantidades por categoria;
- os dados apresentados devem refletir os chamados armazenados no sistema.
