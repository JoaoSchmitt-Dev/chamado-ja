# Rascunho de Requisitos do Sistema

**Projeto Integrador - João Vitor Schmit**

## 1. Objetivo do sistema

Descreva qual é o objetivo principal da aplicação.

*Perguntas de apoio: O que o sistema deve fazer? Qual problema pretende resolver? Qual resultado principal deve entregar ao usuário?*

**Resposta 1:** Cadastrar e consultar usuários e categorias, abrir, consultar, listar, atualizar e filtrar chamados, adicionar comentários aos chamados e consultar resumos dos mesmos.

**Resposta 2:** A empresa precisa de um sistema que organize essas informações e permita acompanhar cada atendimento desde a abertura até a resolução.

**Resposta 3:** A empresa precisa de um sistema que organize essas informações e permita acompanhar cada atendimento desde a abertura até a resolução.

## 2. Descrição do problema

Explique o problema que motivou a criação do sistema.

*Perguntas de apoio: Como o processo funciona atualmente? Quais dificuldades existem? O que é demorado, desorganizado ou sujeito a erros?*

**Resposta 1:** Atualmente, as solicitações chegam por mensagens, ligações e planilhas.

**Resposta 2:** Quem abriu a solicitação, qual o problema relatado, nível de urgência e que categoria o chamado pertence.

**Resposta 3:** Quem está acompanhando o atendimento, quais chamados estão pendentes, quais alterações foram feitas em cada chamado e quantos chamados existem por situação ou categoria.

## 3. Público que utilizará a aplicação

Liste os tipos de usuários e descreva brevemente a função de cada um.

- **Solicitante** - usuário que abre chamados de suporte técnico e acompanha o atendimento de suas solicitações.
- **Técnico** - usuário responsável por acompanhar os chamados, registrar comentários, alterar o status e conduzir o atendimento até a resolução.

## 4. Requisitos funcionais

### RF01 - Cadastrar e consultar usuários

O sistema deve permitir o cadastro de novos usuários e consultar usuários existentes.

### RF02 - Cadastrar e consultar categorias

O sistema deve permitir o cadastro de novas categorias e consultar categorias existentes.

### RF03 - Abrir chamados

O sistema deve permitir a abertura de novos chamados junto da sua descrição detalhada.

### RF04 - Consultar dados de um chamado especifico

O sistema deve permitir a consulta e visualização de chamados específicos.

### RF05 - Listar chamados

O sistema deve permitir a listagem dos chamados cadastrados.

### RF06 - Atualizar chamados

O sistema deve permitir a atualização dos dados de um chamado existente.

### RF07 - Filtrar e paginar chamados

O sistema deve permitir filtrar os chamados e apresentar os resultados de forma paginada.

### RF08 - Adicionar comentários

O sistema deve permitir adicionar comentários aos chamados durante o atendimento.

### RF09 - Alterar status de um chamado

O sistema deve permitir alterar o status de um chamado durante o atendimento.

### RF10 - Consultar histórico de status

O sistema deve permitir consultar o histórico de alterações de status de um chamado.

### RF11 - Consultar resumo dos chamados

O sistema deve permitir consultar informações resumidas dos chamados, incluindo quantidades por status, prioridade ou categoria.

### RF12 - Rejeitar dados inválidos

A API deve rejeitar dados inválidos enviados nas requisições.

## 5. Requisitos não funcionais

Os requisitos não funcionais descrevem restrições, qualidades e características esperadas do sistema.

### RNF01 - Tecnologia

O sistema deve ser desenvolvido utilizando PHP, Laravel, PostgreSQL, Git e Composer, além de uma ferramenta para teste de requisições HTTP. A aplicação deve seguir uma organização orientada a objetos. Os nomes criados pela equipe para classes, métodos, variáveis, tabelas, colunas e rotas devem estar em português e sem acentos nos identificadores.

### RNF02 - Banco de dados

O sistema deve utilizar PostgreSQL como banco de dados relacional. A estrutura do banco deve ser criada e mantida por meio de migrations do Laravel, com relacionamentos corretos entre as entidades e uso de seeders quando necessário.

### RNF03 - Segurança

O repositório não deve conter senhas, tokens ou credenciais.

### RNF04 - Usabilidade

A aplicação não precisa possuir interface visual. Seu funcionamento deve poder ser demonstrado por meio de ferramentas de requisições HTTP, como Postman, Insomnia, Bruno ou curl. A API deve apresentar mensagens de erro claras e utilizar códigos HTTP adequados.

### RNF05 - Manutenibilidade

O código deve seguir uma organização orientada a objetos e manter uma separação adequada de responsabilidades. A estrutura do projeto deve permanecer organizada e compreensível, permitindo manutenção e evolução ao longo das semanas. O projeto também deve possuir testes para os principais fluxos e documentação suficiente para sua reprodução.

### RNF06 - Versionamento e documentação

O código-fonte deve ser versionado utilizando Git, com commits realizados ao longo das entregas semanais para demonstrar a evolução do projeto. O repositório deve conter README atualizado e documentação do desenvolvimento, incluindo o diário do projeto. O README deverá permitir que outra pessoa compreenda, configure e execute a aplicação.

## 6. Regras iniciais de prioridade e status

### Prioridades

Todo chamado deverá possuir uma prioridade, utilizada para indicar o nível de urgência do atendimento.

- **Baixa** - Chamado com pouca urgência e que não exige atendimento imediato.
- **Média** - Chamado com urgência normal e que deve ser atendido conforme a ordem e disponibilidade.
- **Alta** - Chamado com impacto significativo e que necessita atendimento prioritário.
- **Crítica** - Chamado de alta urgência, com grande impacto, que necessita atendimento imediato.

**Regras:**

- **Quem pode definir a prioridade?**  
  Hipótese inicial: a prioridade será definida no momento da abertura do chamado e poderá ser ajustada pelo técnico responsável pelo atendimento.

- **A prioridade pode ser alterada?**  
  Hipótese inicial: sim, caso a urgência ou o impacto do chamado mude durante o atendimento.

- **Existe um valor padrão?**  
  Hipótese inicial: caso não seja informada uma prioridade, será utilizada a prioridade Média.

### Status

Todo chamado deverá possuir um status que representa a situação atual do atendimento. As alterações de status devem ser registradas no histórico do chamado.

- **Aberto** - Chamado criado e ainda não iniciado.
- **Em atendimento** - Chamado que está sendo analisado ou atendido por um técnico.
- **Aguardando** - Chamado que depende de alguma informação, ação ou recurso para continuar.
- **Resolvido** - Chamado em que o problema foi solucionado.
- **Fechado** - Chamado em que o atendimento foi finalizado.

**Regras:**

- **Qual é o status inicial?**  
  Hipótese inicial: todo novo chamado deverá iniciar com o status Aberto.

- **Quem pode alterar o status?**  
  Hipótese inicial: o técnico responsável pelo atendimento poderá alterar o status do chamado.

- **Existem transições de status proibidas?**  
  As regras de transição serão refinadas conforme novas especificações forem liberadas.

- **Um item concluído pode voltar para outro status?**  
  Inicialmente, será considerado que um chamado fechado permanece finalizado, se necessário alterações deve-se criar um novo chamado.

## 7. Limites do escopo

### Dentro do escopo

- Desenvolvimento de uma API em Laravel para gestão de chamados de suporte técnico, utilizando PostgreSQL como banco de dados.
- Cadastro e consulta de usuários e categorias, além da abertura, consulta, listagem e atualização de chamados.
- Registro de comentários, alteração de status, histórico de alterações, filtros, paginação e consulta de resumos dos chamados por status, prioridade ou categoria.
- Implementação de validações, testes básicos, documentação do projeto e versionamento utilizando Git.

### Fora do escopo

*Perguntas de apoio: O que o briefing exige obrigatoriamente? O que seria interessante, mas não é necessário? O que não cabe no prazo de 8 semanas?*

- Desenvolvimento obrigatório de uma interface visual, pois o funcionamento da aplicação poderá ser demonstrado por ferramentas como Postman, Insomnia, Bruno ou curl.
- Implementação obrigatória de autenticação com Laravel Sanctum. A autenticação deverá ser pesquisada, mas sua implementação funcional é considerada uma extensão do projeto principal.
- Implementação de todas as funcionalidades que poderiam existir em um sistema comercial completo. O projeto deve priorizar uma API menor, funcional, compreensível e bem documentada.
- Funcionalidades adicionais que ainda não tenham sido especificadas nas etapas semanais não serão consideradas obrigatórias até que sejam oficialmente solicitadas no decorrer do projeto. O briefing informa que as especificações detalhadas serão liberadas gradualmente.

## 8. Dúvidas e hipóteses da equipe

### Dúvidas

### Hipóteses

## Observações adicionais

Use este espaço para registrar informações relevantes do briefing que ainda não se encaixam claramente nas seções anteriores.
