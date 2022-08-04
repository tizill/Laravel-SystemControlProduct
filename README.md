# LEIA TODA A DOCUMENTAÇÃO !!
## Stacks

- Laravel
- Seqielize
- Mysql
- Blade

## Run: 
```bash
  git clone https://github.com/tizill/perfect-test-backend.git 
  cd perfect-test-backend 
  composer install --no-scripts
  cp .env.example .env
  php artisan key:generate
  npm install **or** yarn
  php artisan storage:link
```
-- Explicação passo a passo: --
- Apos Clonar o projeto com git clone git@github.com:seuprojeto
- Acesse o projeto com: cd nomeprojeto
- Verifique a Branch Selecionada
- Instale as dependecias e o framework com: composer install --no-scripts
- Copie o arquivo .env.example com: cp .env.example .env
- Crie uma nova chave para a aplicação com: php artisan key:generate
- Em seguida voce deve configurar o arquivo .env e odar as migrations com: php artisan migrate --seed

- Instale o npm no projeto tambem com: npm install
- (DEV)(Somente no dev do desafio, não em produção) A principio Crie um link de storage para que as imagens fiquem visiveis com: php artisan storage:link
# OBS:
Para ter acesso ao sistema logo apos ter realizado todos os passos de instalação do projeto e inicializado as migration, é necessario criar um usuario na tabela "USER" com os respecitvos campos (name, email e password) para que assim possa ser feito o login no sistema 
# Como foi desenvolvido o Projeto:
Com o prazo de 4 dias o projeto foi desenvolvido visando alguns dos principios do SOLID, como o single responsability, com o foco maior na parte do back-end, foi utilizado o arquivo blade do projeto porem com algumas edições, foi adicionado a opção de deletar produtos, e adicionar imagem tambem, foi utilizado banco de dados mySql, todas as query utiizando o ORM eloquent do laravel, no projeto tambem as partes das validações do banco de dados foi separada em um outro arquivo no diretorio Request, porem tambem não foi deixado de lado a parte do front onde algumas validações tambem foram feitas, com a utilização do jquery.