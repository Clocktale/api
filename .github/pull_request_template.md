## 📝 Descrição

Descreva aqui o que este Pull Request adiciona, modifica ou corrige no back-end. Seja breve sobre a **lógica de negócio implementada, alterações em APIs, integrações, ou melhorias de performance** feitas.

Adicione aqui também um exemplo de json de Request e Response (remover e desconsiderar a menos que um endpoint de API seja modificado ou criado)

```json
{
    // Request example
    "name": "John",
    "birth_date": "2002-02-26",
    "email" : "john.examplemail@outlook.com",
    "password": "12345678"
}
```


```json
{
    // Response 200 example (GET)
    "username": "John",
    "age": "32",
    "email" : "john.examplemail@outlook.com",
    "role": "user",
    "created_at": "2025-07-19T12:32:09"
}
```

---

## 🐛 Issues Resolvidas

Liste aqui todas as issues do seu sistema de gerenciamento de projetos que este Pull Request resolve. Utilize o formato de link da sua ferramenta (ex: #123, [ABC-456](link-para-issue)).

* [ ] Resolve #<número-da-issue-1> - <Breve descrição da issue>
* [ ] Resolve #<número-da-issue-2> - <Breve descrição da issue>
* [ ] ...

---

## 🧪 Como Testar

Forneça um passo a passo claro e conciso para testar as funcionalidades implementadas. Inclua instruções detalhadas para que o revisor possa reproduzir o cenário de teste, focando em testes de API, consumo de serviços ou validação de dados.

1.  **Pré-requisitos:** Certifique-se de que você tem <dependência 1>, <dependência 2>, etc. instaladas e que o serviço de back-end está rodando.
2.  **Passo 1:** <Descreva a requisição ou ação a ser feita>
    * Exemplo: Faça uma requisição GET para http://localhost:8080/api/v1/novo-recurso
    * Exemplo: Dispare o evento 'novo_usuario_cadastrado' no RabbitMQ com payload {...}
3.  **Passo 2:** <Descreva o que verificar>
    * Exemplo: Verifique se o status HTTP retornado é 200 OK e o payload contém os dados esperados.
    * Exemplo: Confirme se os dados foram persistidos corretamente no banco de dados na tabela 'usuarios'.
4.  **Cenário de Erro (Opcional):** <Descreva como testar um cenário de erro, se aplicável>
    * Exemplo: Tente enviar uma requisição POST para o endpoint 'clientes' sem o campo 'email'.
    * Exemplo: Verifique se o status HTTP 400 Bad Request é retornado e a mensagem de erro "Email é obrigatório" está presente no corpo da resposta.

---

### 📚 Referências/Documentação

Adicione links para documentação interna (especificações de API, diagramas de arquitetura, etc.), documentação externa de bibliotecas ou frameworks, ou artigos que sejam relevantes para o contexto e as decisões tomadas neste PR.

* Link 1
* Link 2
* Link 3
* ...

---

### ⚠ Pontos de Atenção para o Revisor

Destaque aqui quaisquer pontos específicos no código que você gostaria que o revisor prestasse atenção especial. Isso pode incluir decisões de arquitetura, áreas de alto risco, impactos em performance, ou seções onde você teve alguma dúvida.

* Otimização da query na função obterDadosGrandes().
* Tratamento de transações distribuídas no módulo de pagamento.
* Considerações sobre idempotência no endpoint POST /pedidos.
* Alterações no esquema do banco de dados na tabela produtos_servicos.
* ...

---

### 🌟 Checklist de Qualidade

Este checklist serve como um lembrete para você garantir que todos os pontos importantes foram verificados antes de abrir o Pull Request.

* [ ] O PR contém uma descrição completa com as mudanças feitas e imagens necessárias?
* [ ] O código está de acordo com as diretrizes de estilo do projeto? (ESLint, padrões da linguagem, etc.)
* [ ] Os testes unitários e de integração foram atualizados/adicionados e estão passando?
* [ ] As *migrações de banco de dados* (se existirem) foram criadas e testadas?
* [ ] A documentação da *API* (Swagger, Postman, etc.) foi atualizada para refletir as mudanças?
* [ ] O impacto na *performance* foi avaliado (para rotas críticas)?
* [ ] As *variáveis de ambiente* ou configurações sensíveis foram tratadas adequadamente e documentadas?
* [ ] Considerações de *segurança* (autenticação, autorização, sanitização de entrada) foram aplicadas?
* [ ] As mensagens de commit seguem um padrão?
*
## 📝 Descrição

Descreva aqui o que este Pull Request adiciona, modifica ou corrige no back-end. Seja breve sobre a **lógica de negócio implementada, alterações em APIs, integrações, ou melhorias de performance** feitas.

Adicione aqui também um exemplo de json de Request e Response (remover e desconsiderar a menos que um endpoint de API seja modificado ou criado)

```json
{
    // Request example
    "name": "John",
    "birth_date": "2002-02-26",
    "email" : "john.examplemail@outlook.com",
    "password": "12345678"
}
```


```json
{
    // Response 200 example (GET)
    "username": "John",
    "age": "32",
    "email" : "john.examplemail@outlook.com",
    "role": "user",
    "created_at": "2025-07-19T12:32:09"
}
```

---

## 🐛 Issues Resolvidas

Liste aqui todas as issues do seu sistema de gerenciamento de projetos que este Pull Request resolve. Utilize o formato de link da sua ferramenta (ex: #123, [ABC-456](link-para-issue)).

* [ ] Resolve #<número-da-issue-1> - <Breve descrição da issue>
* [ ] Resolve #<número-da-issue-2> - <Breve descrição da issue>
* [ ] ...

---

## 🧪 Como Testar

Forneça um passo a passo claro e conciso para testar as funcionalidades implementadas. Inclua instruções detalhadas para que o revisor possa reproduzir o cenário de teste, focando em testes de API, consumo de serviços ou validação de dados.

1.  **Pré-requisitos:** Certifique-se de que você tem <dependência 1>, <dependência 2>, etc. instaladas e que o serviço de back-end está rodando.
2.  **Passo 1:** <Descreva a requisição ou ação a ser feita>
    * Exemplo: Faça uma requisição GET para http://localhost:8080/api/v1/novo-recurso
    * Exemplo: Dispare o evento 'novo_usuario_cadastrado' no RabbitMQ com payload {...}
3.  **Passo 2:** <Descreva o que verificar>
    * Exemplo: Verifique se o status HTTP retornado é 200 OK e o payload contém os dados esperados.
    * Exemplo: Confirme se os dados foram persistidos corretamente no banco de dados na tabela 'usuarios'.
4.  **Cenário de Erro (Opcional):** <Descreva como testar um cenário de erro, se aplicável>
    * Exemplo: Tente enviar uma requisição POST para o endpoint 'clientes' sem o campo 'email'.
    * Exemplo: Verifique se o status HTTP 400 Bad Request é retornado e a mensagem de erro "Email é obrigatório" está presente no corpo da resposta.

---

### 📚 Referências/Documentação

Adicione links para documentação interna (especificações de API, diagramas de arquitetura, etc.), documentação externa de bibliotecas ou frameworks, ou artigos que sejam relevantes para o contexto e as decisões tomadas neste PR.

* Link 1
* Link 2
* Link 3
* ...

---

### ⚠ Pontos de Atenção para o Revisor

Destaque aqui quaisquer pontos específicos no código que você gostaria que o revisor prestasse atenção especial. Isso pode incluir decisões de arquitetura, áreas de alto risco, impactos em performance, ou seções onde você teve alguma dúvida.

* Otimização da query na função obterDadosGrandes().
* Tratamento de transações distribuídas no módulo de pagamento.
* Considerações sobre idempotência no endpoint POST /pedidos.
* Alterações no esquema do banco de dados na tabela produtos_servicos.
* ...

---

### 🌟 Checklist de Qualidade

Este checklist serve como um lembrete para você garantir que todos os pontos importantes foram verificados antes de abrir o Pull Request.

* [ ] O PR contém uma descrição completa com as mudanças feitas e imagens necessárias?
* [ ] O código está de acordo com as diretrizes de estilo do projeto? (ESLint, padrões da linguagem, etc.)
* [ ] Os testes unitários e de integração foram atualizados/adicionados e estão passando?
* [ ] As *migrações de banco de dados* (se existirem) foram criadas e testadas?
* [ ] A documentação da *API* (Swagger, Postman, etc.) foi atualizada para refletir as mudanças?
* [ ] O impacto na *performance* foi avaliado (para rotas críticas)?
* [ ] As *variáveis de ambiente* ou configurações sensíveis foram tratadas adequadamente e documentadas?
* [ ] Considerações de *segurança* (autenticação, autorização, sanitização de entrada) foram aplicadas?
* [ ] As mensagens de commit seguem um padrão?
*
