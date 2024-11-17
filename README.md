# Sistema de Gestão de Eventos

O **Sistema de Gestão de Eventos** é uma aplicação desenvolvida para auxiliar organizadores e participantes na criação, gerenciamento e participação de eventos. A plataforma permite que organizadores configurem seus eventos com todos os detalhes necessários, incluindo controle de vagas e inscrições, comunicação com participantes e gerenciamento de presença. Participantes podem se inscrever, acompanhar eventos futuros e receber notificações para datas importantes. O sistema visa oferecer uma experiência completa e interativa para ambos os públicos, facilitando a organização e promovendo maior interação e controle.

> [!WARNING]
> Projeto em desenvolvimento, alterações estão sendo feitas e mudanças rigorosas podem acontecer a qualquer momento.

## 🛠️ To-Do

### 1. Autenticação de Usuários
- [x] Implementar registro de usuários.
- [x] Implementar login e logout de usuários.
- [x] Recuperação de senha para usuários registrados.

### 2. Perfil do Usuário
- [x] Editar perfil.
- [x] Excluir perfil.

### 2. CRUD de Eventos
[Issue link](https://github.com/carloshaam/event-management/issues/1)

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
- [ ] Refatorar integração com a News API.

### 12. Tradução
- [ ] Atualizar tradução pt-BR.
- [ ] Fazer integração da tradução no front-end.

## 📚 Tecnologias

- PHP 8.3.11
- Node.js ^19
- MySQL
- Laravel 11
- Inertia
- Vue
- Tailwindcss

## 📦 Instalação e Uso

```bash
docker-compose up -d --build

# Rode as seeds
php artisan db:seed
```

## 📆 Registro de alterações

Consulte [CHANGELOG](CHANGELOG.md) para obter mais informações sobre o que mudou recentemente.

## 🧪 Testando

``` bash
composer test
```

## 💞 Contribuindo

Consulte [CONTRIBUTING](CONTRIBUTING.md) e [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) para obter detalhes.

## 🧯 Segurança

Se você descobrir algum problema relacionado à segurança, envie um e-mail para email@gmail.com em vez de usar o rastreador de problemas.

## 🏅 Créditos

- [Carlos Moreira][link-author]

## ⚖️ Licença

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

[link-author]: https://twitter.com/carloshaam
