  <h1>SurfContest API</h1>

  <p>Bem-vindo à SurfContest API, uma aplicação desenvolvida em Laravel para gerenciar competições de surf. Esta API permite o cadastro de surfistas, criação de baterias, registro de ondas e notas, além de determinar o vencedor de cada bateria.</p>

  <h2>Esquema do Banco de Dados</h2>

  <h3>Tabelas Principais</h3>

  <ul>
    <li>
      <strong>surfistas:</strong>
      <ul>
        <li>número(PK)</li>
        <li>nome</li>
        <li>país</li>
      </ul>
    </li>
    <li>
      <strong>baterias:</strong>
      <ul>
        <li>id (PK)</li>
        <li>Surfista1 (FK referenciando surfistas)</li>
        <li>Surfista2 (FK referenciando surfistas)</li>
      </ul>
    </li>
    <li>
      <strong>ondas:</strong>
      <ul>
        <li>id (PK)</li>
        <li>Bateria (FK referenciando baterias)</li>
        <li>Surfista (FK referenciando baterias)</li>
      </ul>
    </li>
    <li>
      <strong>notas:</strong>
      <ul>
        <li>id (PK)</li>
        <li>Onda (FK referenciando ondas)</li>
        <li>notaParcial1</li>
        <li>notaParcial2</li>
        <li>notaParcial3</li>
      </ul>
    </li>
  </ul>

  <h3>Regras de Negócio</h3>

  <p>
    - Uma Nota consiste na média aritmética das 3 notas parciais que a compõem.
    <br>
    - O vencedor de uma Bateria é o Surfista cuja soma das duas maiores Notas for superior à do outro.
  </p>

  <h2>Funcionalidades</h2>

  <ol>
    <li>
    <strong>Listar Surfistas:</strong>
      <ul>
        <li>Método: GET</li>
        <li>Endpoint: `/surfista`</li>
        <li>Descrição: Lista todos os  surfistas.</li>
      </ul>
    </li>
    <li>
      <strong>Inserir Surfistas:</strong>
      <ul>
        <li>Método: POST</li>
        <li>Endpoint: `/surfista`</li>
        <li>Descrição: Cadastra um novo surfista.</li>
      </ul>
    </li>
    <li>
      <strong>Criar Novas Baterias:</strong>
      <ul>
        <li>Método: POST</li>
        <li>Endpoint: `/surfista`</li>
        <li>Descrição: Cadastra uma nova Bateria.</li>
      </ul>
    </li>
    <li>
      <strong>Cadastrar novas ondas em uma bateria</strong>
      <ul>
        <li>Método: POST</li>
        <li>Endpoint: `/{bateriaId}/cadastrar-ondas`</li>
        <li>Descrição: Cadastra uma onda baseado na bateria.</li>
      </ul>
    </li>
    <li>
      <strong>Cadastrar novas notas em uma onda</strong>
      <ul>
        <li>Método: POST</li>
        <li>Endpoint: `/{ondaId}/criar-nota`</li>
        <li>Descrição: Cadastra as notas parciais de uma onda</li>
      </ul>
    </li>
    <li>
      <strong>Obter o vencedor de uma bateria</strong>
      <ul>
        <li>Método: POST</li>
        <li>Endpoint: `/{bateriaId}/obter-vencedor`</li>
        <li>Descrição: Obtem o vencedor de uma bateria a partir da pontuação mais alta</li>
      </ul>
    </li>


  </ol>


  <h2>Requisitos</h2>

  <ul>
    <li>Backend em Laravel na última versão.</li>
    <li>Banco de dados à escolha (PostgreSQL, MongoDB, etc.).</li>
  </ul>

  <h2>Foco</h2>

  <ul>
    <li>Inserções de dados.</li>
    <li>README.md com instruções de configuração e instalação.</li>
    <li>Código disponível publicamente no GitHub.</li>
  </ul>

  <h2>Configuração e Instalação</h2>

  <ol>
    <li>Clone o repositório.</li>
    <li>Instale as dependências usando `composer install`.</li>
    <li>Configure as variáveis de ambiente no arquivo `.env`.</li>
    <li>Execute as migrações do banco de dados com `php artisan migrate`.</li>
    <li>Inicie o servidor com `php artisan serve`.</li>
  </ol>
