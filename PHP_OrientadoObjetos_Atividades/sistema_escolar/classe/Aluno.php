<?php

class Aluno{

	// atributos
	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
	private $banco = 'sistema_escolar';
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
	public function cadastrar($matricula, $unidade_curricular, $primeira_avaliacao, $segunda_avaliacao, $media){
		//ANTES DE CADASTRAR VERIFICA SE JA TEM A MATRICULA CADASTRADA
		//PRA ISSO BUSCO PELA MATRICULA DO ALUNO
		global $dbh;

		$sql = $this->dbh->prepare("SELECT matricula FROM alunos WHERE matricula = :m");
		$sql->bindValue(":m", $matricula);
		$sql->execute();
		//verifica se a matricula veio ou não
		if ($sql->rowCount() > 0) {//matricula ja existe no BD
			return false;
		}else{//não foi encontrada a matricula
			$sql = $this->dbh->prepare("INSERT INTO alunos (matricula, unidade_curricular, primeira_avaliacao, segunda_avaliacao, media) VALUES (:m, :uc, :n1, :n2, :md)");
			$sql->bindValue(":m", $matricula);
			$sql->bindValue(":uc", $unidade_curricular);
			$sql->bindValue(":n1", $primeira_avaliacao);
			$sql->bindValue(":n2", $segunda_avaliacao);
			$sql->bindValue(":md", $media);
			$sql->execute();
			return true; //significa que foi cadastrada
		}
	}

	public function buscarDados(){
		global $dbh;

		$result = array(); //caso esteja vazio não da nenhum erro
		$sql = $this->dbh->query("SELECT matricula, unidade_curricular, primeira_avaliacao, segunda_avaliacao, media FROM alunos ORDER BY matricula");
		//PDO::FETCH_ASSOC = economiza memória
		$result = $sql->fetchAll(PDO::FETCH_ASSOC); //variavel em forma de array
		return $result; //retorna a variavel
	}

	//MÉTODO PARA EXCLUIR
	public function excluirAluno($matricula){//deletar pela matricula
		$sql = $this->dbh->prepare("DELETE FROM alunos WHERE matricula = :m");
		//substituir
		$sql->bindValue(":m", $matricula);
		$sql->execute();
	}

	//Método para cadastrar a média do aluno
	public function cadastraMedia($media)
	{

		//verifica se a matricula veio ou não
			$sql = $this->dbh->prepare("INSERT INTO alunos (media) VALUES (:md)");
			$sql->bindValue(":md", $media);
			$sql->execute();
			return true; //significa que foi cadastrada
		
	}


	//MÉTODO BUSCAR DADOS DE UM ALUNO
	public function buscarDadosPessoa($matricula)
	{ //passo por parametro o id
		//caso não venha os dados
		$result = array();
		$sql = $this->dbh->prepare("SELECT * FROM alunos WHERE matricula = :m");
		//substituição
		$sql->bindValue(":m", $matricula);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_ASSOC); //transforma a variavel
		return $result;
	}

	//MÉTODO ATUALIZAR DADOS NO BD
	public function atualizarDados($matricula, $unidade_curricular, $primeira_avaliacao, $segunda_avaliacao, $media)
	{
		//antes de atualizar, verifica se a matricula já está cadastrada
		$sql = $this->dbh->prepare("SELECT matricula FROM alunos WHERE matricula = :m");
		$sql->bindValue(":m", $matricula);
		$sql->execute();
		//verifica se a matricula veio ou não
		if ($sql->rowCount() > 0) {//matricula ja existe no BD
			return false;
		}else
			{//não foi encontrada a matricula
				$cmd = $this->dbh->prepare("UPDATE alunos SET unidade_curricular = :un, primeira_avaliacao = :n1, segunda_avaliacao = :n2, media = :md WHERE matricula = :m");
				$cmd->bindValue(":un", $unidade_curricular);
				$cmd->bindValue(":n1", $primeira_avaliacao);
				$cmd->bindValue(":n2", $segunda_avaliacao);
				$cmd->bindValue(":md", $media);
				$cmd->bindValue(":m", $matricula);
				$cmd->execute();
				return true;
			}
	}

	public function mediaAcima()
	{
		$cmd = $this->dbh->prepare("SELECT count(*) as TotalMedia FROM alunos");
	}

}
?>