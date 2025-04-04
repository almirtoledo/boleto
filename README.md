# Gerador de boleto

### Como usar?

Clone o repositório para sua máquina

```sh
git clone https://github.com/almirtoledo/boleto
```

Execute o container Docker

```sh
docker compose up -d
```

Acesse o container da aplicação

```sh
docker compose exec app bash
```

Dentro do terminal do container instale os pacotes

```sh
composer install
```

Agora acesse a aplicação em: http://localhost
