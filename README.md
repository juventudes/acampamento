Plataforma em estágio inicial de desenvolvimento.

---

Pré-requisitos:

- PHP
- Composer
- VirtualBox
- Vagrant

Para começar a desenvolver:

```
$ composer install
$ php vendor/bin/homestead make
$ vagrant up
```

---

Para desenvolver *client-side* há outros dois pré-requisitos:

- NPM
- Gulp (instalável via `npm install -g gulp`)

Para monitorar mudanças nos arquivos SASS e compilar para CSS:

```
$ npm install
$ gulp watch
```
