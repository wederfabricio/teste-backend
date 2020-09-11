

# Teste Backend GBLIX

O desenvolvedor através do Framework PHP Laravel deverá mostrar noções desenvolvimento de uma API RESTful com interações via console.

## Introdução

Através da internet temos várias APIs disponíveis, tanto para informações públicas, como informações privadas, e hoje elas são utilizadas para as mais diversas funções: Autenticação, Validação de Dados, Consulta e Cálculos de Preços, Realização de Pagamentos, Cruzamento de Informações e até para Machine Learning.

Para este teste iremos utilizar uma API pública relacionada ao Studio Ghibli, a sua documentação está disponível na seguinte URL: [https://ghibliapi.herokuapp.com/](https://ghibliapi.herokuapp.com/)

Com ela iremos trabalhar com os blocos de informações de FILMES (FILMS) e PESSOAS (PEOPLE), todas outras informações podem ser ignoradas.

## DESENVOLVIMENTO

Usando a API informada anteriormente temos que desenvolver uma aplicação que DEVERÁ ter dois formatos de execução:

- Comando Artisan, usando o seguinte nome: `api:crawl`
- Agendado via schedule do Laravel à cada duas horas

Esse crawler DEVE salvar TODAS as informações básicas da API de filmes e seus respectivos personagens e formatar ela em banco de dados, a estrutura do banco para este teste fica à cargo do desenvolvedor. As informações a serem salvas são:

**Filme:**

- Nome do Filme
- Descrição do Filme
- Diretor
- Produtor
- Ano de Lançamento
- Pontuação Rotten Tomato
- Personagens

**Personagens:**

- Nome do Personagem
- Genero
- Idade
- Cor dos Olhos
- Cor do Cabelo

### API

Usando as informações disponíveis no banco de dados DEVE-SE criar uma rota GET  `/people` que:

DEVE retornar as seguintes colunas:
- Nome do Personagem
- Idade do Personagem
- Título do Filme
- Ano de Lançamento do Filme
- Pontuação Rotten Tomato

DEVE retornar os resultados baseado no parâmetro `fmt` ou `Header Accept`, onde:
-  html: Uma página HTML com a tabela
-  json: Estrutura JSON do resultado
-  csv: Um arquivo no formato CSV tabulado com ponto e vírgula (;

PODERÁ filtrar a informação de alguma coluna usando o parâmetro `filter`

PODERÁ alterar ordenação de alguma coluna usando o parâmetro `order`

PODERÁ alterar a sequência da ordenação usando o parâmetro `sort`

### CONSIDERAÇÕES

O banco de dados DEVE ser criado via migration.

É RECOMENDÁVEL que o sistema tenha suporte ao Seed (utilizando Model Factory) para exemplificação da estrutura.

É RECOMENDÁVEL que a aplicação possua Unit-testing nativo do Laravel para garantir que o Eloquent esteja persistindo corretamente as informações.

### GOSTAMOS

- Reutilização de código;
- Não reinventar a rota;
- Legibilidade e performance contam;
- Facades não são tão malvadas quanto parecem;
- Aplicação da Metodologia SOLID;
- Desenvolvimento usando Services/Repositories;    
- Utilização de pacotes já existentes para responsabilidades complexas e extensíveis, exemplos: Manipulação de Imagem, Geração de Arquivos, Requisições à servidor remoto.

## PRAZO E ENTREGA

O prazo de entrega será combinado através da entrevista com nossa equipe.

A entrega poderá ser realizada de duas formas:

 1. Repositório público, ou não listado, em ferramentas como GitHub, Bitbucket ou Gitlab.
 2. Anexo compactado através de email combinado em entrevista

Este projeto não será utilizado para nenhum fim exceto a sua avaliação.

Divirta-se. :)
