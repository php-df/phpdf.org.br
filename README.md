# https://phpdf.org.br/


Sobre
============

Este é o código do [https://phpdf.org.br][site]. Este site é automaticamente compilado pelo [Jekyll][jekyll] a cada vez que um pull request for aceito.

 [site]:   https://phpdf.org.br
 [jekyll]: https://github.com/mojombo/jekyll


Contribuindo
============

 * Se você perceber que algo esta errado [abra uma issue no GitHub][issue].

 * Você mesmo pode consertar, simplesmente [eite o arquivo no GitHub][edit] e abra um novo pull request. O site será recompilado assim que o seu pull request for aceito.

 * Para testar localmente, voce pode instalar o Jekyll ou executar com Docker:

    * Executando com Docker

        ```bash
        docker-compose up -d --build
        ```

    * Instalando Jekyll

        ```bash
        gem install bundler
        bundle install
        ```

        Após isso, é só compilar:

        ```bash
        bundle exec jekyll serve
        ```

    * Acesse o link `http://localhost:4000` no seu navegador e divirta-se!
    

 [issue]: https://github.com/php-fig/php-fig.github.com/issues
 [edit]:  https://github.com/blog/905-edit-like-an-ace


>Tema em jekyll por [@arkadianriver](https://github.com/arkadianriver/spectral/)