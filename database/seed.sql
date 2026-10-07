
-- Seed - Tabela Usuários

INSERT INTO usuarios (nome, email, senha, papel)
VALUES
    ('Joao Silva', 'joao@email.com', 'senha123', 'solicitante'),
    ('Maria Souza', 'maria@email.com', 'senha123', 'solicitante'),
    ('Pedro Santos', 'pedro@email.com', 'senha123', 'solicitante'),

    ('Carlos Lima', 'carlos@email.com', 'senha123', 'tecnico'),
    ('Ana Oliveira', 'ana@email.com', 'senha123', 'tecnico');

-- Seed - Tabela Categorias
    
INSERT INTO categorias (nome, descricao)
VALUES
    ('Hardware', 'Problemas relacionados a equipamentos'),
    ('Software', 'Problemas relacionados a sistemas e programas'),
    ('Rede', 'Problemas relacionados a internet e conectividade'),
    ('Acesso', 'Problemas relacionados a login e permissões');


-- Seed - Tabela Chamados

/* Chamado aberto e ainda sem técnico */

INSERT INTO chamados (
    solicitante_id,
    tecnico_id,
    categoria_id,
    titulo,
    descricao,
    prioridade,
    status,
    created_at,
    updated_at
)
VALUES (
    (SELECT id FROM usuarios WHERE email = 'joao@email.com'),
    NULL,
    (SELECT id FROM categorias WHERE nome = 'Hardware'),
    'Computador nao liga',
    'O computador nao apresenta sinal ao pressionar o botao de ligar.',
    'alta',
    'aberto',
    '2026-10-01 08:30:00',
    '2026-10-01 08:30:00'
);


/* Chamado em atendimento */

INSERT INTO chamados (
    solicitante_id,
    tecnico_id,
    categoria_id,
    titulo,
    descricao,
    prioridade,
    status,
    created_at,
    updated_at
)
VALUES (
    (SELECT id FROM usuarios WHERE email = 'maria@email.com'),
    (SELECT id FROM usuarios WHERE email = 'carlos@email.com'),
    (SELECT id FROM categorias WHERE nome = 'Software'),
    'Sistema fecha sozinho',
    'O sistema encerra inesperadamente durante o uso.',
    'critica',
    'em_atendimento',
    '2026-10-02 09:15:00',
    '2026-10-02 10:00:00'
);


/* Chamado aguardando */

INSERT INTO chamados (
    solicitante_id,
    tecnico_id,
    categoria_id,
    titulo,
    descricao,
    prioridade,
    status,
    created_at,
    updated_at
)
VALUES (
    (SELECT id FROM usuarios WHERE email = 'pedro@email.com'),
    (SELECT id FROM usuarios WHERE email = 'ana@email.com'),
    (SELECT id FROM categorias WHERE nome = 'Rede'),
    'Internet instavel',
    'A conexao com a internet apresenta quedas frequentes.',
    'media',
    'aguardando',
    '2026-10-03 13:20:00',
    '2026-10-03 15:00:00'
);


/* Chamado resolvido */

INSERT INTO chamados (
    solicitante_id,
    tecnico_id,
    categoria_id,
    titulo,
    descricao,
    prioridade,
    status,
    created_at,
    updated_at
)
VALUES (
    (SELECT id FROM usuarios WHERE email = 'joao@email.com'),
    (SELECT id FROM usuarios WHERE email = 'carlos@email.com'),
    (SELECT id FROM categorias WHERE nome = 'Acesso'),
    'Senha de acesso bloqueada',
    'Usuario nao consegue acessar o sistema devido ao bloqueio da senha.',
    'baixa',
    'resolvido',
    '2026-10-04 08:00:00',
    '2026-10-04 11:30:00'
);


/* Chamado fechado */

INSERT INTO chamados (
    solicitante_id,
    tecnico_id,
    categoria_id,
    titulo,
    descricao,
    prioridade,
    status,
    created_at,
    updated_at
)
VALUES (
    (SELECT id FROM usuarios WHERE email = 'maria@email.com'),
    (SELECT id FROM usuarios WHERE email = 'ana@email.com'),
    (SELECT id FROM categorias WHERE nome = 'Hardware'),
    'Teclado com defeito',
    'Algumas teclas nao estao funcionando corretamente.',
    'media',
    'fechado',
    '2026-10-05 09:45:00',
    '2026-10-05 16:20:00'
);


/* Outro chamado aberto */

INSERT INTO chamados (
    solicitante_id,
    tecnico_id,
    categoria_id,
    titulo,
    descricao,
    prioridade,
    status,
    created_at,
    updated_at
)
VALUES (
    (SELECT id FROM usuarios WHERE email = 'pedro@email.com'),
    NULL,
    (SELECT id FROM categorias WHERE nome = 'Software'),
    'Erro ao gerar relatorio',
    'O sistema apresenta erro ao tentar gerar um relatorio.',
    'alta',
    'aberto',
    '2026-10-06 14:00:00',
    '2026-10-06 14:00:00'
);


-- Seed - Tabela Comentarios

INSERT INTO comentarios (
    chamado_id,
    usuario_id,
    conteudo,
    created_at,
    updated_at
)
VALUES (
    (SELECT id FROM chamados WHERE titulo = 'Sistema fecha sozinho'),
    (SELECT id FROM usuarios WHERE email = 'maria@email.com'),
    'O problema acontece principalmente ao abrir varios registros.',
    '2026-10-02 09:30:00',
    '2026-10-02 09:30:00'
);

INSERT INTO comentarios (
    chamado_id,
    usuario_id,
    conteudo,
    created_at,
    updated_at
)
VALUES (
    (SELECT id FROM chamados WHERE titulo = 'Sistema fecha sozinho'),
    (SELECT id FROM usuarios WHERE email = 'carlos@email.com'),
    'Estou analisando os logs do sistema.',
    '2026-10-02 10:05:00',
    '2026-10-02 10:05:00'
);

INSERT INTO comentarios (
    chamado_id,
    usuario_id,
    conteudo,
    created_at,
    updated_at
)
VALUES (
    (SELECT id FROM chamados WHERE titulo = 'Internet instavel'),
    (SELECT id FROM usuarios WHERE email = 'ana@email.com'),
    'Foi solicitado ao usuario que teste novamente a conexao.',
    '2026-10-03 15:05:00',
    '2026-10-03 15:05:00'
);

insert
	into
	comentarios (
    chamado_id,
	usuario_id,
	conteudo,
	created_at,
	updated_at
)
values (
    (
select
	id
from
	chamados
where
	titulo = 'Senha de acesso bloqueada'),
    (
select
	id
from
	usuarios
where
	email = 'carlos@email.com'),
    'Senha redefinida e acesso normalizado.',
    '2026-10-04 11:20:00',
    '2026-10-04 11:20:00'
);

-- Seed - Tabela Historico Status

/* Computador nao liga */

INSERT INTO historico_status (
    chamado_id,
    usuario_id,
    status_anterior,
    status_novo,
    alterado_em
)
VALUES (
    (SELECT id FROM chamados WHERE titulo = 'Computador nao liga'),
    (SELECT id FROM usuarios WHERE email = 'joao@email.com'),
    NULL,
    'aberto',
    '2026-10-01 08:30:00'
);


/* Sistema fecha sozinho */

INSERT INTO historico_status (
    chamado_id,
    usuario_id,
    status_anterior,
    status_novo,
    alterado_em
)
VALUES
(
    (SELECT id FROM chamados WHERE titulo = 'Sistema fecha sozinho'),
    (SELECT id FROM usuarios WHERE email = 'maria@email.com'),
    NULL,
    'aberto',
    '2026-10-02 09:15:00'
),
(
    (SELECT id FROM chamados WHERE titulo = 'Sistema fecha sozinho'),
    (SELECT id FROM usuarios WHERE email = 'carlos@email.com'),
    'aberto',
    'em_atendimento',
    '2026-10-02 10:00:00'
);


/* Internet instavel */

INSERT INTO historico_status (
    chamado_id,
    usuario_id,
    status_anterior,
    status_novo,
    alterado_em
)
VALUES
(
    (SELECT id FROM chamados WHERE titulo = 'Internet instavel'),
    (SELECT id FROM usuarios WHERE email = 'pedro@email.com'),
    NULL,
    'aberto',
    '2026-10-03 13:20:00'
),
(
    (SELECT id FROM chamados WHERE titulo = 'Internet instavel'),
    (SELECT id FROM usuarios WHERE email = 'ana@email.com'),
    'aberto',
    'em_atendimento',
    '2026-10-03 14:00:00'
),
(
    (SELECT id FROM chamados WHERE titulo = 'Internet instavel'),
    (SELECT id FROM usuarios WHERE email = 'ana@email.com'),
    'em_atendimento',
    'aguardando',
    '2026-10-03 15:00:00'
);


/* Senha de acesso bloqueada */

INSERT INTO historico_status (
    chamado_id,
    usuario_id,
    status_anterior,
    status_novo,
    alterado_em
)
VALUES
(
    (SELECT id FROM chamados WHERE titulo = 'Senha de acesso bloqueada'),
    (SELECT id FROM usuarios WHERE email = 'joao@email.com'),
    NULL,
    'aberto',
    '2026-10-04 08:00:00'
),
(
    (SELECT id FROM chamados WHERE titulo = 'Senha de acesso bloqueada'),
    (SELECT id FROM usuarios WHERE email = 'carlos@email.com'),
    'aberto',
    'em_atendimento',
    '2026-10-04 09:00:00'
),
(
    (SELECT id FROM chamados WHERE titulo = 'Senha de acesso bloqueada'),
    (SELECT id FROM usuarios WHERE email = 'carlos@email.com'),
    'em_atendimento',
    'resolvido',
    '2026-10-04 11:30:00'
);


/* Teclado com defeito */

INSERT INTO historico_status (
    chamado_id,
    usuario_id,
    status_anterior,
    status_novo,
    alterado_em
)
VALUES
(
    (SELECT id FROM chamados WHERE titulo = 'Teclado com defeito'),
    (SELECT id FROM usuarios WHERE email = 'maria@email.com'),
    NULL,
    'aberto',
    '2026-10-05 09:45:00'
),
(
    (SELECT id FROM chamados WHERE titulo = 'Teclado com defeito'),
    (SELECT id FROM usuarios WHERE email = 'ana@email.com'),
    'aberto',
    'em_atendimento',
    '2026-10-05 11:00:00'
),
(
    (SELECT id FROM chamados WHERE titulo = 'Teclado com defeito'),
    (SELECT id FROM usuarios WHERE email = 'ana@email.com'),
    'em_atendimento',
    'resolvido',
    '2026-10-05 15:30:00'
),
(
    (SELECT id FROM chamados WHERE titulo = 'Teclado com defeito'),
    (SELECT id FROM usuarios WHERE email = 'ana@email.com'),
    'resolvido',
    'fechado',
    '2026-10-05 16:20:00'
);


/* Erro ao gerar relatorio */

INSERT INTO historico_status (
    chamado_id,
    usuario_id,
    status_anterior,
    status_novo,
    alterado_em
)
VALUES (
    (SELECT id FROM chamados WHERE titulo = 'Erro ao gerar relatorio'),
    (SELECT id FROM usuarios WHERE email = 'pedro@email.com'),
    NULL,
    'aberto',
    '2026-10-06 14:00:00'
);