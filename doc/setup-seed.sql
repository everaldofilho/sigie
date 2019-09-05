USE `SIGIE`;

INSERT INTO `tb_instituicao` (`nome`, `cnpj`, `status`)
VALUES ('Exemplo Ltda', '06699254000126', '1');

INSERT INTO `tb_curso` (`id_instituicao`, `nome`, `duracao`, `status`)
VALUES ('1', 'Analise e Desenvolvimento de sistemas', '2 anos', '1'),
       ('1', 'Administração', '6 meses', '1'),
       ('1', 'Direito', '5 anos', '1')
;

INSERT INTO `tb_aluno` (`nome`, `cpf`, `data_nascimento`, `email`, `celular`, `cep`, `uf`, `cidade`, `bairro`, `endereco`, `numero`, `status`) 
VALUES ('Rodrigo Tiago Dias', '799.882.487-50', '1963-11-05', 'rrodrigotiagodias@allianceconsultoria.com.br', '(63) 98301-9564', '77819-006', 'TO', 'Araguaína', 'Setor Novo Horizonte', 'Rua Adevaldo de Moraes', '851', '1'),
       ('Felipe Henrique Isaac Ferreira', '450.140.795-63', '1966-10-06', 'felipehenriqueisaacferreira_@alvesbarcelos.com.br', '(86) 99400-9604', '64069-075', 'PI', 'Teresina', 'Vale do Gavião', 'Rua Deputado Heitor Cavalcante', '777', '1')
;

INSERT INTO `tb_aluno_curso` (`id_aluno`, `id_curso`, `dt_inicio`,`dt_termino`, `dt_cancelamento`, `status`) 
VALUES ('1', '1', '2019-10-01', null, null, '1'),
       ('1', '2', '2019-09-01', '2019-10-01', null, '2'),
       ('1', '3', '2019-09-01', null, '2019-10-01', '0'),
       ('2', '1', '2019-10-01', null, null, '1')
;