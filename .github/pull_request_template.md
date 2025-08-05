## 📝 Descrição

Este Pull Request tem como finalidade implementar as Migrations, Models e Seeders do projeto.
Durante o desenvolvimento, foi necessário realizar alterações em algumas tabelas do banco de dados para permitir que ilustradores, autores e mangakás fossem tratados de forma diferenciada. Essa mudança também visa preparar a estrutura para acomodar futuros cargos, como escritores, revisores e tradutores, garantindo flexibilidade e escalabilidade no gerenciamento dos envolvidos com os conteúdos.

Na tabela creators, foi adicionado o campo primary_role, responsável por identificar o papel principal de cada criador. Já na tabela pivô content_creators, foi incluído o campo role, permitindo definir o papel específico que o criador desempenhou em cada obra. Dessa forma, é possível representar corretamente casos em que, por exemplo, um mangaká atue apenas como ilustrador em uma obra, ou um ilustrador também contribua como autor em outra. A estrutura agora suporta múltiplas atribuições por criador, refletindo com mais precisão a realidade das colaborações nas obras.


---

## 🐛 Issues Resolvidas



* [x] Resolve #5 - [Setup] Criar as migrations e as seeders - https://github.com/Clocktale/api/issues/5




### ⚠ Pontos de Atenção para o Revisor


* Pessoal, peço atenção especial nas models e seeders deste template durante a revisão.


---

### 🌟 Checklist de Qualidade


* [X] O PR contém uma descrição completa com as mudanças feitas e imagens necessárias?
* [x] O código está de acordo com as diretrizes de estilo do projeto? (ESLint, padrões da linguagem, etc.)
* [ ] Os testes unitários e de integração foram atualizados/adicionados e estão passando?
* [x] As *migrações de banco de dados* (se existirem) foram criadas e testadas?
* [ ] A documentação da *API* (Swagger, Postman, etc.) foi atualizada para refletir as mudanças?
* [ ] O impacto na *performance* foi avaliado (para rotas críticas)?
* [ ] As *variáveis de ambiente* ou configurações sensíveis foram tratadas adequadamente e documentadas?
* [ ] Considerações de *segurança* (autenticação, autorização, sanitização de entrada) foram aplicadas?
* [x] As mensagens de commit seguem um padrão?
*
