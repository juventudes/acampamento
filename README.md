Plataforma em estágio inicial de desenvolvimento.

---

Pré-requisitos:

- PHP
- Composer
- VirtualBox
- Vagrant

Para começar a desenvolver, entre na pasta onde clonou o repositório e rode:

```
$ composer install
$ php vendor/bin/homestead make     # se você usa Linux/Mac
$ vendor\bin\homestead make         # se você usa Windows
$ vagrant up --provision
$ sed 's/SomeRandomString/'`openssl rand -hex 16`'/' .env.example > .env
```

Para rodar as migrações no banco de dados (necessário ao começar a desenvolver e recomendável sempre que se faz um `git pull`), conecte-se à máquina virtual via SSH:

- Linux: `ssh -p 2222 vagrant@127.0.0.1`
- Windows: use o PuTTY para se conectar a 127.0.0.1 na porta 2222 com usuário `vagrant`

E aí use:

```
vagrant@acampamento:~$ cd acampamento
vagrant@acampamento:~/acampamento$ php artisan migrate
vagrant@acampamento:~/acampamento$ php artisan db:seed  # opcional: alimenta BD
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
