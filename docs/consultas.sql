-- Consultas 

/* =====================================================
   1. Quais chamados estão abertos ou em atendimento?
   ===================================================== */

select
	id,
	titulo,
	prioridade,
	status,
	created_at
from
	chamados
where
	status in ('aberto', 'em_atendimento')
order by
	created_at asc;

/* =====================================================
   2. Quais chamados possuem maior prioridade?
   Ordena da prioridade mais alta para a mais baixa.
   ===================================================== */

select
	id,
	titulo,
	prioridade,
	status
from
	chamados
order by
	case
		prioridade
        when 'critica' then 1
		when 'alta' then 2
		when 'media' then 3
		when 'baixa' then 4
	end,
	created_at asc;

/* =====================================================
   3. Quem solicitou cada chamado e qual é sua categoria?
   ===================================================== */

select
	chamado.id,
	chamado.titulo,
	chamado.prioridade,
	chamado.status,
	usuario.nome as solicitante,
	categoria.nome as categoria
from
	chamados as chamado
join usuarios as usuario
    on
	usuario.id = chamado.solicitante_id
join categorias as categoria
    on
	categoria.id = chamado.categoria_id
order by
	chamado.id;

/* =====================================================
   4. Quantos chamados existem em cada status?
   ===================================================== */

select
	status,
	COUNT(*) as total_chamados
from
	chamados
group by
	status
order by
	total_chamados desc;

/* =====================================================
   5. Quantos chamados existem em cada categoria?
   ===================================================== */

select
	categoria.nome as categoria,
	COUNT(chamado.id) as total_chamados
from
	categorias as categoria
left join chamados as chamado
    on
	chamado.categoria_id = categoria.id
group by
	categoria.id,
	categoria.nome
order by
	total_chamados desc;

/* =====================================================
   6. Quais chamados foram criados entre
   01/10/2026 e 06/10/2026?
   ===================================================== */

select
	id,
	titulo,
	prioridade,
	status,
	created_at
from
	chamados
where
	created_at >= '2026-10-01 00:00:00'
	and created_at < '2026-10-07 00:00:00'
order by
	created_at asc;

/* =====================================================
   7. Quais são os comentários do chamado de ID 2
   e quem realizou cada comentário?
   ===================================================== */

select
	comentario.id,
	comentario.chamado_id,
	usuario.nome as autor,
	comentario.conteudo,
	comentario.created_at
from
	comentarios as comentario
join usuarios as usuario
    on
	usuario.id = comentario.usuario_id
where
	comentario.chamado_id = 2
order by
	comentario.created_at asc;

/* =====================================================
   8. Qual é o histórico de status do chamado de ID 2?
   ===================================================== */

select
	historico.id,
	historico.chamado_id,
	usuario.nome as usuario,
	historico.status_anterior,
	historico.status_novo,
	historico.alterado_em
from
	historico_status as historico
join usuarios as usuario
    on
	usuario.id = historico.usuario_id
where
	historico.chamado_id = 2
order by
	historico.alterado_em asc;