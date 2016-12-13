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
$ php vendor/bin/homestead make     # se você usa Linux/Mac
$ vendor\bin\homestead make         # se você usa Windows
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

Antes de fazer um commit, pare o processo `gulp watch` e rode:

```
$ gulp --production
```

(para mantermos os assets minificados no repositório)
