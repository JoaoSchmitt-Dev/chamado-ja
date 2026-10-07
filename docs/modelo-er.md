# Modelo de Banco de Dados — ChamadoJá

## 1. Tabela `usuarios`

### SQL

```sql
CREATE TABLE usuarios (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    papel VARCHAR(20) NOT NULL,

    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT chk_usuarios_papel
        CHECK (papel IN ('solicitante', 'tecnico'))
);

CREATE INDEX idx_usuarios_papel
    ON usuarios(papel);
```
---

## 2. Tabela `categorias`

### SQL

```sql
CREATE TABLE categorias (
    id BIGSERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE,
    descricao TEXT,

    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
```
---

## 3. Tabela `chamados`

### SQL

```sql
CREATE TABLE chamados (
    id BIGSERIAL PRIMARY KEY,

    solicitante_id BIGINT NOT NULL,
    tecnico_id BIGINT,
    categoria_id BIGINT NOT NULL,

    titulo VARCHAR(200) NOT NULL,
    descricao TEXT NOT NULL,

    prioridade VARCHAR(20) NOT NULL DEFAULT 'media',
    status VARCHAR(30) NOT NULL DEFAULT 'aberto',

    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_chamados_solicitante
        FOREIGN KEY (solicitante_id)
        REFERENCES usuarios(id),

    CONSTRAINT fk_chamados_tecnico
        FOREIGN KEY (tecnico_id)
        REFERENCES usuarios(id),

    CONSTRAINT fk_chamados_categoria
        FOREIGN KEY (categoria_id)
        REFERENCES categorias(id),

    CONSTRAINT chk_chamados_prioridade
        CHECK (
            prioridade IN (
                'baixa',
                'media',
                'alta',
                'critica'
            )
        ),

    CONSTRAINT chk_chamados_status
        CHECK (
            status IN (
                'aberto',
                'em_atendimento',
                'aguardando',
                'resolvido',
                'fechado'
            )
        )
);
```

### Índices

```sql
CREATE INDEX idx_chamados_solicitante_id
    ON chamados(solicitante_id);

CREATE INDEX idx_chamados_tecnico_id
    ON chamados(tecnico_id);

CREATE INDEX idx_chamados_categoria_id
    ON chamados(categoria_id);

CREATE INDEX idx_chamados_status
    ON chamados(status);

CREATE INDEX idx_chamados_prioridade
    ON chamados(prioridade);

CREATE INDEX idx_chamados_created_at
    ON chamados(created_at);

CREATE INDEX idx_chamados_status_prioridade
    ON chamados(status, prioridade);

CREATE INDEX idx_chamados_tecnico_status
    ON chamados(tecnico_id, status);
```

---

## 4. Tabela `comentarios`

### SQL

```sql
CREATE TABLE comentarios (
    id BIGSERIAL PRIMARY KEY,

    chamado_id BIGINT NOT NULL,
    usuario_id BIGINT NOT NULL,

    conteudo TEXT NOT NULL,

    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_comentarios_chamado
        FOREIGN KEY (chamado_id)
        REFERENCES chamados(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_comentarios_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
);
```

### Índices

```sql
CREATE INDEX idx_comentarios_chamado_id
    ON comentarios(chamado_id);

CREATE INDEX idx_comentarios_usuario_id
    ON comentarios(usuario_id);

CREATE INDEX idx_comentarios_chamado_created_at
    ON comentarios(chamado_id, created_at);
```

---

## 5. Tabela `historico_status`

### SQL

```sql
CREATE TABLE historico_status (
    id BIGSERIAL PRIMARY KEY,

    chamado_id BIGINT NOT NULL,
    usuario_id BIGINT NOT NULL,

    status_anterior VARCHAR(30),
    status_novo VARCHAR(30) NOT NULL,

    alterado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_historico_status_chamado
        FOREIGN KEY (chamado_id)
        REFERENCES chamados(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_historico_status_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id),

    CONSTRAINT chk_historico_status_anterior
        CHECK (
            status_anterior IS NULL
            OR status_anterior IN (
                'aberto',
                'em_atendimento',
                'aguardando',
                'resolvido',
                'fechado'
            )
        ),

    CONSTRAINT chk_historico_status_novo
        CHECK (
            status_novo IN (
                'aberto',
                'em_atendimento',
                'aguardando',
                'resolvido',
                'fechado'
            )
        )
);
```

### Índices

```sql
CREATE INDEX idx_historico_status_chamado_id
    ON historico_status(chamado_id);

CREATE INDEX idx_historico_status_usuario_id
    ON historico_status(usuario_id);

CREATE INDEX idx_historico_status_status_novo
    ON historico_status(status_novo);

CREATE INDEX idx_historico_status_chamado_alterado_em
    ON historico_status(chamado_id, alterado_em);
```

---

# Relacionamentos e cardinalidades

```text
USUARIOS      1 -------- 0..N CHAMADOS
                     solicitante

USUARIOS      1 -------- 0..N CHAMADOS
                     tecnico

CATEGORIAS    1 -------- 0..N CHAMADOS

CHAMADOS      1 -------- 0..N COMENTARIOS

USUARIOS      1 -------- 0..N COMENTARIOS

CHAMADOS      1 -------- 0..N HISTORICO_STATUS

USUARIOS      1 -------- 0..N HISTORICO_STATUS
```

## Explicação das cardinalidades

### Usuário → Chamados como solicitante

Um usuário pode criar vários chamados, enquanto cada chamado possui somente um solicitante.

### Usuário → Chamados como técnico

Um técnico pode ser responsável por vários chamados. Um chamado pode inicialmente não possuir técnico responsável.

### Categoria → Chamados

Uma categoria pode estar associada a vários chamados, enquanto cada chamado pertence a uma categoria.

### Chamado → Comentários

Um chamado pode receber vários comentários. Cada comentário pertence somente a um chamado.

### Usuário → Comentários

Um usuário pode criar vários comentários. Cada comentário possui somente um autor.

### Chamado → Histórico de status

Um chamado pode passar por várias alterações de status. Cada alteração gera um novo registro no histórico.

---

# Estrutura resumida

```text
usuarios
├── id (PK)
├── nome
├── email (UNIQUE)
├── senha
└── papel

categorias
├── id (PK)
├── nome (UNIQUE)
└── descricao

chamados
├── id (PK)
├── solicitante_id (FK → usuarios.id)
├── tecnico_id (FK → usuarios.id)
├── categoria_id (FK → categorias.id)
├── titulo
├── descricao
├── prioridade
└── status

comentarios
├── id (PK)
├── chamado_id (FK → chamados.id)
├── usuario_id (FK → usuarios.id)
└── conteudo

historico_status
├── id (PK)
├── chamado_id (FK → chamados.id)
├── usuario_id (FK → usuarios.id)
├── status_anterior
├── status_novo
└── alterado_em
```