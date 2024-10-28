## Event Management

# Sistema de Gestão de Eventos (Em desenvolvimento)

O **Sistema de Gestão de Eventos** é uma aplicação desenvolvida para auxiliar organizadores e participantes na criação, gerenciamento e participação de eventos. A plataforma permite que organizadores configurem seus eventos com todos os detalhes necessários, incluindo controle de vagas e inscrições, comunicação com participantes e gerenciamento de presença. Participantes podem se inscrever, acompanhar eventos futuros e receber notificações para datas importantes. O sistema visa oferecer uma experiência completa e interativa para ambos os públicos, facilitando a organização e promovendo maior interação e controle.

## To-Do List do Projeto

### 1. Autenticação de Usuários
- [x] Implementar registro de usuários (organizadores e participantes).
- [x] Implementar login e logout de usuários.
- [x] Recuperação de senha para usuários registrados.
- [ ] Controle de acesso por tipo de usuário (organizadores e participantes).

### 2. Perfil do Usuário
- [x] Editar perfil.
- [x] Excluir perfil.
- [ ] Adicionar foto ao perfil

### 2. CRUD de Eventos
- [x] Criar formulário para cadastro de novos eventos (título, descrição, data, horário, local e categoria...).
- [x] Adicionar visibilidade para evento.
- [ ] Adicionar inclusão de capa para evento.
- [ ] Adicionar cadastro ingresso e preço para o evento (limite de vagas e preço).
- [ ] Implementar listagem de eventos disponíveis para visualização pública.
- [x] Implementar listagem de eventos do usuário organizador.
- [x] Implementar filtro da listagem de eventos do usuário organizador.
- [ ] Permitir que organizadores editem os detalhes dos eventos criados.
- [ ] Permitir que organizadores excluam eventos.
- [ ] Adicionar tipo de evento (presencial, online ou digital).

### 3. Inscrição em Eventos
- [ ] Implementar sistema de inscrição para participantes em eventos.
- [ ] Controle de vagas para limitar as inscrições quando o evento estiver cheio.
- [ ] Criar lista de espera para eventos sem vagas.

### 4. Gerenciamento de Participantes
- [ ] Visualizar lista de participantes inscritos nos eventos.
- [ ] Exportar lista de inscritos para CSV ou PDF.
- [ ] Cancelar ou remover inscrições de participantes.

### 5. Confirmação de Presença
- [ ] Enviar e-mails de confirmação de inscrição aos participantes.
- [ ] Criar lista de presença para o organizador marcar a presença dos participantes no evento.

### 6. Sistema de Notificações
- [ ] Notificar por e-mail ou SMS os participantes sobre a proximidade da data do evento.
- [ ] Notificar organizadores sobre o status das inscrições (lotação, data próxima).

### 7. Sistema de Pagamento
- [ ] Integrar pagamento para eventos pagos (ex.: PayPal, Stripe).
- [ ] Gerar e enviar comprovantes de pagamento.

### 8. Sistema de Avaliações e Feedback
- [ ] Permitir que participantes deixem comentários e avaliações após o evento.
- [ ] Fornecer questionário de feedback para melhorar eventos futuros.

### 9. Sistema de Certificados
- [ ] Criar e enviar certificados de participação para os inscritos.

### 10. Painel Administrativo para Organizadores
- [ ] Implementar painel para gerenciar eventos, inscrições e presença.
- [ ] Exibir estatísticas dos eventos (inscrições, presença, feedback).

### 11. Integrações e Outras Melhorias
- [ ] Integração com calendários (Google Calendar, Outlook).
- [ ] Sistema de convites para que organizadores enviem por e-mail.
- [ ] Criar perfis públicos para organizadores (portfólio de eventos).
- [x] Integração com notícias (News API).

### 12. Tradução
- [ ] Atualizar tradução pt-BR.
- [ ] Fazer integração da tradução no front-end.

## Tecnologias

- PHP 8.3.11
- Node.js ^19
- MySQL
- Laravel 11
- Inertia
- Vue
- Tailwindcss

## Uso

```bash
composer install

npm install

php artisan migrate

composer run dev
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
