<?php

class Funcionario{

	// atributos
	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
	private $banco = 'bd_funcionarios';
	private $porta = '3306';
	private $dbh;
	private $stmt;

	public function __construct(){

		//fonte de dados ou DSN contém as informações necessárias para conectar ao banco de dados.
		$dsn = 'mysql::host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
		//opção array
		$opcoes = [
			//armazena em cache a conexão para ser reutilizada, evita a sobrecarga de uma nova conexão, resultando em um aplicativo mais rápido
			PDO::ATTR_PERSISTENT => true,
			//lança uma PDOException se ocorrer um erro
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
		try { //tenta fazer a conexão
			//cria a instancia do PDO
			$this->dbh = new PDO($dsn, $this->usuario, $this->senha, $opcoes);		    
		} catch (PDOException $e) { //senão da erro
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
	
	//Método para Cadastrar
	public function cadastrar($matricula, $nome, $salario, $tempo_servico){
		//ANTES DE CADASTRAR VERIFICA SE JA TEM A MATRICULA CADASTRADA
		//PRA ISSO BUSCO PELA MATRICULA DO ALUNO
		global $dbh;

		$sql = $this->dbh->prepare("SELECT matricula FROM funcionarios WHERE matricula = :m");
		$sql->bindValue(":m", $matricula);
		$sql->execute();
		//verifica se a matricula veio ou não
		if ($sql->rowCount() > 0) {//matricula ja existe no BD
			return false;
		}else{//não foi encontrada a matricula
			$sql = $this->dbh->prepare("INSERT INTO funcionarios (matricula, nome, salario, tempo_servico) VALUES (:m, :nome, :sl, :ts)");
			$sql->bindValue(":m", $matricula);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":sl", $salario);
			$sql->bindValue(":ts", $tempo_servico);
			$sql->execute();
			return true; //significa que foi cadastrada
		}
	}

	public function buscarDados(){
		global $dbh;

		$result = array(); //caso esteja vazio não da nenhum erro
		$sql = $this->dbh->query("SELECT matricula, nome, salario, tempo_servico FROM funcionarios ORDER BY matricula");
		//PDO::FETCH_ASSOC = economiza memória
		$result = $sql->fetchAll(PDO::FETCH_ASSOC); //variavel em forma de array
		return $result; //retorna a variavel
	}

	//MÉTODO PARA EXCLUIR
	public function excluirProjeto($matricula){//deletar pela matricula
		$sql = $this->dbh->prepare("DELETE FROM funcionarios WHERE matricula = :m");
		//substituir
		$sql->bindValue(":m", $matricula);
		$sql->execute();
	}


	//MÉTODO BUSCAR DADOS DE UM ALUNO
	public function buscarDadosProjeto($matricula)
	{ //passo por parametro o id
		//caso não venha os dados
		$result = array();
		$sql = $this->dbh->prepare("SELECT * FROM funcionarios WHERE matricula = :m");
		//substituição
		$sql->bindValue(":m", $matricula);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_ASSOC); //transforma a variavel
		return $result;
	}

	//Método Incrementa uma opção que conte o número total que contenham a palavraMaria OU João em seu nome
	public function totalContemPalavra_Maria_Joao()
	{
		global $dbh;

		$result = array(); //caso esteja vazio não da nenhum erro
		$sql = $this->dbh->query("SELECT matricula, nome, salario, tempo_servico FROM funcionarios WHERE nome LIKE '%Maria%' OR nome LIKE '%João%'");
		//PDO::FETCH_ASSOC = economiza memória
		$result = $sql->fetchAll(PDO::FETCH_ASSOC); //variavel em forma de array
		return $result; //retorna a variavel
	}

}
?>