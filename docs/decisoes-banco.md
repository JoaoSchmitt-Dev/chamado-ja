# Decisões de Banco de Dados

## usuarios

### Por que essa tabela existe?

A tabela usuarios existe para armazenar os dados cadastrais dos usuários do sistema e identificar o papel de cada um, diferenciando solicitantes e técnicos.

## categorias

### Por que essa tabela existe?

A tabela categorias existe para padronizar a classificação dos chamados, evitando repetição de dados e facilitando a criação, alteração e manutenção das categorias utilizadas no sistema.


### Por que o nome e a descrição da categoria não devem ficar diretamente na tabela `chamados`?

As categorias não ficam armazenadas diretamente na tabela chamados para facilitar o cadastro de novas categorias, evitar repetição de informações e permitir que alterações sejam feitas em um único local, sem a necessidade de atualizar vários registros de chamados.

## chamados

### Por que essa tabela existe?

A tabela chamados existe para centralizar as principais informações de cada chamado, como o usuário solicitante, o técnico responsável, o título, a descrição, a prioridade, o status e a categoria.

### Por que `solicitante_id`, `tecnico_id` e `categoria_id` são chaves estrangeiras?

Os campos solicitante_id, tecnico_id e categoria_id são chaves estrangeiras porque fazem referência a registros existentes nas tabelas usuarios e categorias, relacionando cada chamado ao solicitante, ao técnico responsável e à sua respectiva categoria.

### Por que `tecnico_id` pode ser nulo?

O campo tecnico_id pode ser nulo porque um chamado pode, em determinado momento, ainda não possuir um técnico responsável atribuído.

## comentarios

### Por que essa tabela existe?

A tabela comentarios existe para armazenar as interações realizadas durante o atendimento de um chamado, permitindo que vários comentários sejam associados ao mesmo chamado e identificando qual usuário realizou cada comentário.

### Por que os comentários não devem ficar armazenados diretamente na tabela `chamados`?

Os comentários não ficam armazenados diretamente na tabela `chamados` porque um chamado pode possuir vários comentários. Mantê-los em uma tabela separada evita repetição de campos e permite registrar cada comentário individualmente, com seu autor e data de criação.

## historico_status

### Por que essa tabela existe?

A tabela historico_status existe para manter o controle das alterações de status dos chamados, registrando qual chamado foi alterado, qual usuário realizou a alteração, o status anterior, o novo status e quando a mudança ocorreu.

### Por que o histórico de status não deve ficar armazenado diretamente na tabela `chamados`?

O histórico fica em uma tabela separada porque um chamado pode possuir várias alterações de status ao longo do tempo. Essa separação evita a sobrescrita de informações anteriores, melhora a organização dos dados e permite consultar o histórico completo de cada chamado de forma adequada.

---

# Valores permitidos

## Prioridade

A coluna `prioridade` da tabela `chamados` aceita apenas:

```text
baixa
media
alta
critica
```

### Por que limitar os valores possíveis?

Os valores possíveis são limitados para garantir maior controle sobre os dados inseridos, evitar informações inválidas ou inconsistentes e padronizar as opções disponíveis para os usuários do sistema.

---

## Status

As colunas relacionadas ao status aceitam:

```text
aberto
em_atendimento
aguardando
resolvido
fechado
```

### Por que limitar os valores possíveis?

Os valores possíveis são limitados para garantir maior controle sobre os dados inseridos, evitar informações inválidas ou inconsistentes e padronizar as opções disponíveis para os usuários do sistema.

# Por que nem todos os dados devem ficar em `chamados`?

Nem todos os dados ficam diretamente na tabela chamados para evitar repetição de informações, facilitar atualizações e manter o banco organizado. Dados como usuários, categorias, comentários e histórico possuem tabelas próprias e são relacionados ao chamado por meio de chaves estrangeiras.

### Exemplos

Em vez de armazenar diretamente:

```text
nome_solicitante
email_solicitante
nome_tecnico
nome_categoria
comentario_1
comentario_2
comentario_3
status_anterior_1
status_anterior_2
```

a tabela `chamados` armazena referências:

```text
solicitante_id
tecnico_id
categoria_id
```

e utiliza tabelas relacionadas para informações que podem ocorrer várias vezes, como:

```text
comentarios
historico_status
```

### Por que essa organização é melhor?

Mantém a integridade dos dados, evita informações repetidas, facilita alterações e deixa o banco mais organizado para realizar consultas e manter os relacionamentos entre as tabelas.
