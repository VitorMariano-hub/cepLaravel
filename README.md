# Buscar CEP viaCep

Definido as rotas para index, pesquisa e download.  

No CepController foram definidos os métodos (__construct, index e show)  

* __construct: está recebendo a classe CepApiService via injeção de dependencia para ser utilizado no momento em que o controller é chamado.  
* index: retornando a view home.  
* show:  está chamando o método getCepData dentro da classe CepApiService através da referencia $this-> e passando o parametro da requisição que vem do form para pesquisa, o método faze validação verificando se a api retorna erro.  

A classe responsavel por realizar a consulta na api está em Services/CepApiService essa classe está separada do Controller e possui o método para buscar cep 'getCepData'  

* getCepData: está envolvido em um try-catch para manipulação de exceções e verificando se existe resposta api e retornando a resposta via json.  

A view home possuí três ações de clicks que são manipulados por javascript: Botão de pesquisar, download e limpar tela.  

* pesquisar: ao clicar no botão de pesquisa é chamado através do evento click o fetch() para rota de pesquisa /search e cada resultado é inserido um elemento td com os dados retornados e inseridos a tabela.  

* download: ao clicar em download é realizado um fetch() para a rota de download  

* limpar tela: evento de click limpa o innerHtml da tabela.

Tela:
![bears](https://i.postimg.cc/3JFpdyfw/Captur.png)  

Download:
![bears](https://i.postimg.cc/P5BtHybv/csvPNG.png)  
