<?php

class Projeto{

	// atributos
	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
	private $banco = 'empresa_projeto';
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
	public function cadastrar($id, $orcamento, $data_inicio, $horas){
		//ANTES DE CADASTRAR VERIFICA SE JA TEM A MATRICULA CADASTRADA
		//PRA ISSO BUSCO PELA MATRICULA DO ALUNO
		global $dbh;

		$sql = $this->dbh->prepare("SELECT id FROM projetos WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		//verifica se a matricula veio ou não
		if ($sql->rowCount() > 0) {//matricula ja existe no BD
			return false;
		}else{//não foi encontrada a matricula
			$sql = $this->dbh->prepare("INSERT INTO projetos (id, orcamento, data_inicio, horas) VALUES (:id, :orc, :dt, :hr)");
			$sql->bindValue(":id", $id);
			$sql->bindValue(":orc", $orcamento);
			$sql->bindValue(":dt", $data_inicio);
			$sql->bindValue(":hr", $horas);
			$sql->execute();
			return true; //significa que foi cadastrada
		}
	}

	public function buscarDados(){
		global $dbh;

		$result = array(); //caso esteja vazio não da nenhum erro
		$sql = $this->dbh->query("SELECT id, orcamento, data_inicio, horas FROM projetos ORDER BY id");
		//PDO::FETCH_ASSOC = economiza memória
		$result = $sql->fetchAll(PDO::FETCH_ASSOC); //variavel em forma de array
		return $result; //retorna a variavel
	}

	//MÉTODO PARA EXCLUIR
	public function excluirProjeto($id){//deletar pela matricula
		$sql = $this->dbh->prepare("DELETE FROM projetos WHERE id = :id");
		//substituir
		$sql->bindValue(":id", $id);
		$sql->execute();
	}


	//MÉTODO BUSCAR DADOS DE UM ALUNO
	public function buscarDadosProjeto($id)
	{ //passo por parametro o id
		//caso não venha os dados
		$result = array();
		$sql = $this->dbh->prepare("SELECT * FROM projetos WHERE id = :id");
		//substituição
		$sql->bindValue(":id", $id);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_ASSOC); //transforma a variavel
		return $result;
	}

	//Método mostra média de horas de todos os projetos
	public function mediaHoras()
	{
		$result = array(); //caso esteja vazio não da nenhum erro
		$sql = $this->dbh->prepare("SELECT AVG(horas) FROM projetos");
			//PDO::FETCH_ASSOC = economiza memória
		$result = $sql->fetchAll(PDO::FETCH_ASSOC); //variavel em forma de array
		return $result; //retorna a variavel
	}

}
?>